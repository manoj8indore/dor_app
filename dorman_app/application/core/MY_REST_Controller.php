<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Make sure this is included
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class MY_REST_Controller extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Enforce HTTPS
        if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
            $this->response(['status' => FALSE, 'message' => 'HTTPS Required'], REST_Controller::HTTP_FORBIDDEN);
        }

        // Authorization: Bearer <API_KEY>
        $authHeader = $this->input->get_request_header('Authorization');
        if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $this->response(['status' => FALSE, 'message' => 'Missing token'], REST_Controller::HTTP_UNAUTHORIZED);
        }

        $token = $matches[1];
        $this->load->config('api_keys');
        $validKey = $this->config->item('api_key');

        if ($token !== $validKey) {
            $this->response(['status' => FALSE, 'message' => 'Invalid token'], REST_Controller::HTTP_UNAUTHORIZED);
        }

        // Optional: Rate limiting
        // (You can add that part later if needed)
    }
}
