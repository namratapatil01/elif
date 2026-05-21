<?php

defined('BASEPATH') or exit('No direct script access allowed');
use \Firebase\JWT\JWT;

require_once APPPATH . 'third_party/omnipay/vendor/autoload.php';
require_once APPPATH . 'third_party/omnipay/vendor/firebase/php-jwt/src/JWT.php';
//include_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');
//include_once(APPPATH . 'third_party/omnipay/vendor/Firebase/php-jwt/src/JWT.php');
class Zoom_api
{
    public $CI;
    private $zoom_api_key = '';
    private $zoom_api_secret = '';

    public function __construct($parameters = array())
    {

        $this->CI = &get_instance();
        if (!empty($parameters)) {
            $this->zoom_api_key = $parameters['zoom_api_key'];
            $this->zoom_api_secret = $parameters['zoom_api_secret'];
            if ($this->zoom_api_key == "" && $this->zoom_api_secret == "") {
                $setting_result = $this->CI->setting_model->getzoomsetting();
                $this->zoom_api_key = $setting_result->zoom_api_key;
                $this->zoom_api_secret = $setting_result->zoom_api_secret;
            }
        }

    }

    protected function sendRequest($data)
    {

        $request_url = 'https://api.zoom.us/v2/users/me/meetings';

        $headers = array(

            // 'authorization: Bearer ' . $this->generateJWTKey(),
            'authorization: Bearer ' . $this->generateToken(),
            'content-type: application/json',
        );

        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {

            return false;
        }

        return json_decode($response);
    }

    //function to generate JWT
    private function generateJWTKey()
    {
        $key = $this->zoom_api_key;
        $secret = $this->zoom_api_secret;
        $token = array(
            "iss" => $key,
            "exp" => time() + 3600, //60 seconds as suggested
        );

        return JWT::encode($token, $secret);
    }


    private function generateToken()
    {
        // // URL you want to send the request to
        $url = "https://zoom.us/oauth/token?grant_type=account_credentials&account_id=TUjcGkf7QSi9hOcNTIeCZA";

        // Your username and password
        $username = "yGm7PHcdQUi_6ASBmxYIzA";
        $password = "Sw3NF8US8yYZRZuggCwy1RTzNL6WoM6B";

        // Data you want to send in the POST request
        $postData = [];

        // Initialize a cURL session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the cURL option for basic authentication
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

        // Indicate that we want to send a POST request
        curl_setopt($ch, CURLOPT_POST, true);

        // Attach the POST data to the request
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        // Return the response instead of outputting it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request and fetch the response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Print the response
            // echo 'Response: ' . $response;
            $responseData = json_decode($response, true);
            return $responseData['access_token'];
        }

        // Close the cURL session
        curl_close($ch);


        exit();
    }

    public function createAMeeting($data = array())
    {

        $post_time = $data['date'];
        $start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));
        $createAMeetingArray = array();
        if (!empty($data['alternative_host_ids'])) {
            if (count($data['alternative_host_ids']) > 1) {
                $alternative_host_ids = implode(",", $data['alternative_host_ids']);
            } else {
                $alternative_host_ids = $data['alternative_host_ids'][0];
            }
        }
        $createAMeetingArray['topic'] = $data['title'];
        $createAMeetingArray['agenda'] = !empty($data['agenda']) ? $data['agenda'] : "";
        $createAMeetingArray['type'] = !empty($data['type']) ? $data['type'] : 2; //Scheduled
        $createAMeetingArray['start_time'] = $start_time;
        $createAMeetingArray['timezone'] = $data['timezone'];
        $createAMeetingArray['password'] = !empty($data['password']) ? $data['password'] : "";
        $createAMeetingArray['duration'] = !empty($data['duration']) ? $data['duration'] : 60;
        $createAMeetingArray['settings'] = array(
            'join_before_host' => !empty($data['join_before_host']) ? true : false,
            'host_video' => !empty($data['host_video']) ? true : false,
            'participant_video' => !empty($data['client_video']) ? true : false,
            'mute_upon_entry' => !empty($data['option_mute_participants']) ? true : false,
            'enforce_login' => !empty($data['option_enforce_login']) ? true : false,
            'auto_recording' => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
            'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : "",

            "watermark" => false,
            "use_pmi" => false,
            "approval_type" => 0,
            "registration_type" => 1,
            "audio" => "both",
            "waiting_room" => false
        );
        return $this->sendRequest($createAMeetingArray);
    }
    public function deleteMeeting($meetingId)
    {
        $request_url = 'https://api.zoom.us/v2/meetings/' . $meetingId;
        $headers = array(
            // 'authorization: Bearer ' . $this->generateJWTKey(),
             'authorization: Bearer ' . $this->generateToken(),
            'content-type: application/json',
        );
        $get_param = array('meetingId' => $meetingId);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {

            return false;
        }

        return json_decode($response);

    }

    public function getMeeting($meetingId)
    {
        $request_url = 'https://api.zoom.us/v2/meetings/' . $meetingId;
        $headers = array(
            // 'authorization: Bearer ' . $this->generateJWTKey(),
            'authorization: Bearer ' . $this->generateToken(),
            'content-type: application/json',
        );
        $get_param = array('meetingId' => $meetingId);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return false;
        }
        return json_decode($response);
    }
}
