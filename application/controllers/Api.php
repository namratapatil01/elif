<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('custom');
    }

    /**
     * GET /index.php/api/doctors
     * Expose list of active doctors with their specialties
     */
    public function doctors() {
        $doctors = $this->staff_model->getEmployeeByRoleID(3); // Role ID 3 is Doctor
        $result = array();
        
        foreach ($doctors as $doc) {
            $result[] = array(
                'id' => $doc['id'],
                'name' => composeStaffNameByString($doc['name'], $doc['surname'], $doc['employee_id']),
                'specialization' => $doc['specialization'] ?? '',
                'specialist_id' => $doc['specialist'] ?? '',
            );
        }
        
        echo json_encode(array(
            'status' => 'success',
            'doctors' => $result
        ));
    }

    /**
     * GET /index.php/api/specialists
     * Expose list of specialties
     */
    public function specialists() {
        $specialists = $this->staff_model->getSpecialist();
        echo json_encode(array(
            'status' => 'success',
            'specialists' => $specialists
        ));
    }

    /**
     * GET /index.php/api/slots
     * Params: doctor_id, date (YYYY-MM-DD), global_shift_id (optional)
     * Return list of available slots and booking status
     */
    public function slots() {
        $doctor_id = $this->input->get('doctor_id') ?: $this->input->post('doctor_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        $global_shift_id = $this->input->get('global_shift_id') ?: $this->input->post('global_shift_id');
        
        if (empty($doctor_id) || empty($date)) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'doctor_id and date parameters are required.'
            ));
            return;
        }
        
        $day = date('l', strtotime($date));
        $global_shifts = $this->onlineappointment_model->getGlobalDoctorShift($doctor_id);
        
        if (empty($global_shift_id) && !empty($global_shifts)) {
            $global_shift_id = $global_shifts[0]['id'];
        }
        
        if (empty($global_shift_id)) {
            echo json_encode(array(
                'status' => 'success',
                'global_shift_id' => null,
                'shift_id' => null,
                'slots' => array(),
                'message' => 'No active shifts assigned to this doctor.'
            ));
            return;
        }
        
        $doctor_shifts = $this->onlineappointment_model->getShiftdata($doctor_id, $day, $global_shift_id);
        $slots = array();
        
        if (!empty($doctor_shifts)) {
            $shift_id = $doctor_shifts[0]->id;
            $all_slots = $this->customlib->getSlotByDoctorShift($doctor_id, $shift_id);
            $booked = $this->onlineappointment_model->getAppointments($doctor_id, $shift_id, $date);
            
            $booked_times = array();
            foreach ($booked as $b) {
                $booked_times[] = date("H:i:s", strtotime($b->time));
            }
            
            foreach ($all_slots as $index => $slot_time) {
                $time_24h = date("H:i:s", strtotime($slot_time));
                $slots[] = array(
                    'index' => $index,
                    'time' => $slot_time,
                    'time_24h' => $time_24h,
                    'is_booked' => in_array($time_24h, $booked_times),
                );
            }
            
            echo json_encode(array(
                'status' => 'success',
                'global_shift_id' => $global_shift_id,
                'shift_id' => $shift_id,
                'slots' => $slots
            ));
        } else {
            echo json_encode(array(
                'status' => 'success',
                'global_shift_id' => $global_shift_id,
                'shift_id' => null,
                'slots' => array(),
                'message' => 'No slots available for this doctor on ' . $day . '.'
            ));
        }
    }

    /**
     * POST /index.php/api/book_appointment
     * Handles patient check, registration (if new), and books the appointment
     */
    public function book_appointment() {
        $raw_input = json_decode(file_get_contents('php://input'), true);
        $input = !empty($raw_input) ? $raw_input : $_POST;
        
        $name = $input['patient_name'] ?? '';
        $email = $input['email'] ?? '';
        $phone = $input['phone'] ?? '';
        $gender = $input['gender'] ?? 'Male';
        $doctor_id = $input['doctor_id'] ?? '';
        $date = $input['date'] ?? ''; // YYYY-MM-DD
        $global_shift_id = $input['global_shift_id'] ?? '';
        $shift_id = $input['shift_id'] ?? '';
        $slot_index = $input['slot_index'] ?? '';
        $message = $input['message'] ?? '';
        $live_consult = $input['live_consult'] ?? 'no';
        $priority = $input['priority'] ?? 1;
        
        if (empty($name) || empty($email) || empty($phone) || empty($doctor_id) || empty($date)) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Required parameters missing: patient_name, email, phone, doctor_id, date.'
            ));
            return;
        }
        
        // 1. Get or Create Patient in DB
        $patient_id = $this->get_or_create_patient($name, $email, $phone, $gender);
        
        // 2. Auto-detect Shift and Slot if not fully specified
        if (empty($global_shift_id) || empty($shift_id) || empty($slot_index)) {
            $day = date('l', strtotime($date));
            $global_shifts = $this->onlineappointment_model->getGlobalDoctorShift($doctor_id);
            if (!empty($global_shifts)) {
                $global_shift_id = $global_shifts[0]['id'];
                $doctor_shifts = $this->onlineappointment_model->getShiftdata($doctor_id, $day, $global_shift_id);
                if (!empty($doctor_shifts)) {
                    $shift_id = $doctor_shifts[0]->id;
                    $all_slots = $this->customlib->getSlotByDoctorShift($doctor_id, $shift_id);
                    if (!empty($all_slots)) {
                        $slot_index = 0; // Default to first slot
                    }
                }
            }
        }
        
        if (empty($shift_id)) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'No active shift found for this doctor on the selected date.'
            ));
            return;
        }
        
        $all_slots = $this->customlib->getSlotByDoctorShift($doctor_id, $shift_id);
        if (!isset($all_slots[$slot_index])) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'The selected timeslot index is invalid.'
            ));
            return;
        }
        
        $slot_time = $all_slots[$slot_index];
        $time_24h = date("H:i:s", strtotime($slot_time));
        
        // 3. Double booking check
        $booked = $this->onlineappointment_model->getAppointments($doctor_id, $shift_id, $date);
        $booked_times = array();
        foreach ($booked as $b) {
            $booked_times[] = date("H:i:s", strtotime($b->time));
        }
        
        if (in_array($time_24h, $booked_times)) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'This timeslot has already been booked.'
            ));
            return;
        }
        
        // 4. Register Appointment
        $appointment = array(
            "patient_id" => $patient_id,
            "doctor" => $doctor_id,
            "global_shift_id" => $global_shift_id,
            "shift_id" => $shift_id,
            "date" => $date . " " . $time_24h,
            "live_consult" => $live_consult,
            "message" => $message,
            "is_queue" => 0,
            "time" => $time_24h,
            "appointment_status" => "pending",
            "source" => "Online",
            "priority" => $priority,
        );
        
        $appointment = $this->security->xss_clean($appointment);
        $insert_id = $this->onlineappointment_model->addAppointment($appointment);
        
        if ($insert_id) {
            // Trigger background Email/SMS notifications if possible
            try {
                $doctor_details = $this->notificationsetting_model->getstaffDetails($doctor_id);
                $event_data = array(
                    'appointment_date' => $this->customlib->YYYYMMDDHisTodateFormat($date . " " . $time_24h, $this->customlib->getHospitalTimeFormat()),
                    'patient_id' => $patient_id,
                    'doctor_id' => $doctor_id,
                    'doctor_name' => composeStaffNameByString($doctor_details['name'], $doctor_details['surname'], $doctor_details['employee_id']),
                    'message' => $message,
                );
                
                $this->system_notification->send_system_notification('notification_appointment_created', $event_data);
                
                $sender_details = array(
                    'patient_name' => $name,
                    'doctor' => $doctor_id,
                    'date' => $date,
                    'time' => $time_24h,
                    'contact_no' => $phone,
                    'email' => $email,
                    'patient_id' => $patient_id,
                    'appointment_id' => $insert_id
                );
                $this->mailsmsconf->mailsms('appointment_approved', $sender_details);
            } catch (\Exception $e) {
                // Suppress background errors if mail/sms settings are not complete locally
            }
            
            echo json_encode(array(
                'status' => 'success',
                'message' => 'Appointment booked successfully.',
                'appointment_id' => $insert_id
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Failed to write appointment to database.'
            ));
        }
    }

    /**
     * Resolves existing patient ID by email/phone or registers a new patient
     */
    private function get_or_create_patient($name, $email, $phone, $gender) {
        $this->db->select('id');
        $this->db->from('patients');
        $this->db->where('email', $email);
        $this->db->or_where('mobileno', $phone);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
        
        // Register new patient
        $patient_data = array(
            'patient_name' => $name,
            'mobileno' => $phone,
            'email' => $email,
            'gender' => $gender,
            'is_active' => 'yes',
        );
        $patient_data = $this->security->xss_clean($patient_data);
        $patient_id = $this->patient_model->add_front_patient($patient_data);
        
        // Generate patient portal credentials automatically
        $user_password = $this->role->get_random_password(6, 10, false, true, true);
        $user_name = $this->role->get_random_password(3, 3, false, true, false);
        $username = "pat" . $user_name . '_' . $patient_id;
        
        $data_patient_login = array(
            'username' => $username,
            'password' => $user_password,
            'user_id' => $patient_id,
            'role' => 'patient',
        );
        $data_patient_login = $this->security->xss_clean($data_patient_login);
        $this->user_model->add($data_patient_login);
        
        return $patient_id;
    }
}
