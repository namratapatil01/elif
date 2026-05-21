 <?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Checkout extends Patient_Controller
{
    public $pay_method;
    public $setting;

    public function __construct()
    {
        parent::__construct();
        
        $this->pay_method = $this->paymentsetting_model->getActiveMethod();
        $this->load->library('system_notification');
        $this->load->library('mailsmsconf');
        $this->load->library('datatables');
        $this->load->model(array('conference_model', 'conferencehistory_model'));
        $this->load->model('conference_model');

        $this->conference_setting = $this->setting_model->getzoomsetting();
        $this->load->helper('customfield_helper');
        $this->time_format = $this->customlib->getHospitalTimeFormat();
        $this->config->load("payroll");
        $this->search_type = $this->config->item('search_type');
        $this->opd_ipd     = $this->config->item("opd_ipd");
        $this->load->model(array('appointment_model','transaction_model','charge_model','staff_model'));
    }

    public function index($appointment_id)
    {
        $appointment_id = $appointment_id;
        $status = $this->customlib->isAppointmentBooked($appointment_id);
        if($status == 1){
            
            $this->appointment_model->deleteAppointment($appointment_id);
            echo "Slot Already Booked";
            return;
        }else{
           
            $this->session->set_userdata("appointment_id",$appointment_id);
            $data = array();
            if (!empty($this->pay_method)) {
                if ($this->pay_method->payment_type == "payu") {
                    redirect(base_url("patient/onlineappointment/payu"));
                } elseif ($this->pay_method->payment_type == "stripe") {
                    redirect(base_url("patient/onlineappointment/stripe"));
                } elseif ($this->pay_method->payment_type == "ccavenue") {
                    redirect(base_url("patient/onlineappointment/ccavenue"));
                } elseif ($this->pay_method->payment_type == "paypal") {
                    redirect(base_url("patient/onlineappointment/paypal"));
                } elseif ($this->pay_method->payment_type == "instamojo") {
                    redirect(base_url("patient/onlineappointment/instamojo"));
                } elseif ($this->pay_method->payment_type == "paytm") {
                    redirect(base_url("patient/onlineappointment/paytm"));
                } elseif ($this->pay_method->payment_type == "razorpay") {
                    redirect(base_url("patient/onlineappointment/razorpay"));
                } elseif ($this->pay_method->payment_type == "paystack") {
                    redirect(base_url("patient/onlineappointment/paystack"));
                } elseif ($this->pay_method->payment_type == "midtrans") {
                    redirect(base_url("patient/onlineappointment/midtrans"));
                }elseif ($this->pay_method->payment_type == "ipayafrica") {
                    redirect(base_url("patient/onlineappointment/ipayafrica"));
                }elseif ($this->pay_method->payment_type == "jazzcash") {
                    redirect(base_url("patient/onlineappointment/jazzcash"));
                }elseif ($this->pay_method->payment_type == "pesapal") {
                    redirect(base_url("patient/onlineappointment/pesapal"));
                }elseif ($this->pay_method->payment_type == "flutterwave") {
                    redirect(base_url("patient/onlineappointment/flutterwave"));
                }elseif ($this->pay_method->payment_type == "billplz") {
                    redirect(base_url("patient/onlineappointment/billplz"));
                }elseif ($this->pay_method->payment_type == "sslcommerz") {
                    redirect(base_url("patient/onlineappointment/sslcommerz"));
                }elseif ($this->pay_method->payment_type == "walkingm") {
                    redirect(base_url("patient/onlineappointment/walkingm"));
                }
            }
        }
    }
    public function successinvoice($appointment_id){

        $this->load->helper('url');
        $params   = array(
            'zoom_api_key'    => "",
            'zoom_api_secret' => "",
        );
        $this->load->library('zoom_api', $params);
        $appointment_details = $this->appointment_model->getDetails($appointment_id);
       
        $transaction_data = $this->transaction_model->getTransactionByAppointmentId($appointment_id);
        
        $appointment_payment = $this->appointment_model->getPaymentByAppointmentId($appointment_id);
        
        $charges = $this->charge_model->getChargeByChargeId($appointment_payment->charge_id);  
        $apply_charge = $charges['standard_charge'] + ($charges['standard_charge']*($charges['percentage']/100));
        $opd_details = array(
            'patient_id'   => $appointment_details['patient_id'],
        );
        $visit_details = array(
            'appointment_date'  => date("Y-m-d H:i:s"),
            'opd_details_id'    => 0,
            'cons_doctor'       => $appointment_details['doctor'],
            'patient_charge_id' => null,
            'transaction_id'    => $transaction_data->id,
            'can_delete'        => 'no',
        );
        $staff_data = $this->staff_model->getStaffByID($appointment_details['doctor']);
        $staff_name = composeStaffName($staff_data);
        $charge     = array(
            'opd_id'          => 0,
            'date'            => date('Y-m-d H:i:s'),
            'charge_id'       => $appointment_payment->charge_id,
            'qty'             => 1,
            'apply_charge'    => $charges['standard_charge'],
            'standard_charge' => $charges['standard_charge'],
            'amount'          => $appointment_payment->paid_amount,
            'created_at'      => date('Y-m-d H:i:s'),
            'note'            => $staff_name,               
            'tax'             => $charges['percentage'],
        );
        $status = $this->appointment_model->moveToOpd($opd_details,$visit_details,$charge,$appointment_id,$appointment_payment->paid_amount);

        $doctor_details =$this->notificationsetting_model->getstaffDetails($appointment_details['doctor']);
        $event_data=array(
            'appointment_date'=> $this->customlib->YYYYMMDDHisTodateFormat(date("Y-m-d H:i:s"), $this->customlib->getHospitalTimeFormat()),
            'patient_id'=>$appointment_details['patient_id'],
            'doctor_id'=>$appointment_details['doctor'],
            'doctor_name'=>composeStaffNameByString($doctor_details['name'], $doctor_details['surname'], $doctor_details['employee_id']),
            'message'=>$appointment_details['message'],
        );

        $event_data['appointment_status']= $this->lang->line('approved');
        $this->system_notification->send_system_notification('appointment_approved',$event_data);
   // Query the database
        $this->db->select('users.*');
        $this->db->from('patients');
        $this->db->join('users', 'patients.id = users.user_id');
        $this->db->where('patients.id', $appointment_details['patient_id']);
        $query = $this->db->get();
        $result = $query->row();
        $title="consult appointment";
        
        $insert_array = array(
            'staff_id'         => (int)$doctor_details['id'],
            'patient_id'       => (int)$result->id,
            'title'            => $title,
            'visit_details_id' => null,
            'ipd_id'           => null,
            'date'             => $appointment_details['date'],
            'duration'         => (int)30,
            'password'         => $result->password,
            'created_id'       => (int)$doctor_details['id'],
            'api_type'         => 'global',
            'purpose'          => 'consult',
            'host_video'       => (int)1,
            'client_video'     => (int)1,
            'description'      => null,
            'timezone'         => $this->customlib->getTimeZone(),
        );
        $response = $this->zoom_api->createAMeeting($insert_array);
     

        if ($response) {
            if (isset($response->id)) {
                $insert_array['return_response'] = json_encode($response);
                $insert_array['zoom_url']        = "https://zoom.us/s/".$response->id ;
                $conferenceid                    = $this->conference_model->add($insert_array);
                $sender_details                  = array('patient_id' => $result->id, 'conference_id' => $conferenceid, 'contact_no' => $result->mobileno, 'email' => $result->email);
                $this->mailsmsconf->mailsms('live_consult', $sender_details);
               //send mail to doctor 

               $sender_details                  = array('patient_id' => $doctor_details['id'], 'conference_id' => $conferenceid, 'contact_no' => $doctor_details['contact_no'], 'email' => $doctor_details['email']);
               $this->mailsmsconf->mailsms('live_consult_doctor', $sender_details);

                $response = array('status' => 1, 'message' => $this->lang->line('success_message'));
            } else {
                $response = array('status' => 0, 'error' => array($response->message));
            }

        } else {
            $response = array('status' => 0, 'error' => array('Something went wrong.'));
        }
        $doctor_details = $this->notificationsetting_model->getstaffDetails($doctor_details['id']);
        $event_data = array(
            'consultation_title'            => $title,
            'patient_id'                    => $result->id,
            'consultation_date'             => $this->customlib->YYYYMMDDHisTodateFormat($appointment_details['date'], $this->time_format),
            'doctor_id'                     => $doctor_details['id'],
            'doctor_name'                   => composeStaffNameByString($doctor_details['name'], $doctor_details['surname'], $doctor_details['employee_id']),
            'consultation_duration_minutes' => 30,
        );

        $this->system_notification->send_system_notification('patient_consultation_add', $event_data);
        $this->load->view("patient/onlineappointment/success_invoice");

    }

    public function paymentfailed(){
        $this->load->view("patient/onlineappointment/payment_failed");
    }     

}
 