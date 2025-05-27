<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Command_sequence extends CI_Controller { 
     
    function __construct() { 
        parent::__construct();  
    }

       public function index(){ 
       	$message = $this->session->flashdata('message');
         if($message != ""){
            $data["message"] = $message;
         }
       	$options = array(
          'table' => 'add_vehicle',
          'select' => 'id, make'
          );
        $data["vehicles"] = $this->Main_content_model->customGet($options);
        $this->load->view('command', $data);
    } 

public function save_command(){
$multi_res = $this->input->post("contacts"); 

	$this->form_validation->set_rules('vehicle_id', 'Vehicle', 'trim|required'); 
    $this->form_validation->set_rules('cmd_no', 'Command Number', 'trim|required'); 
    $this->form_validation->set_rules('cmd', 'Command', 'trim|required'); 
    $this->form_validation->set_rules('response', 'Response', 'trim|required'); 
    $this->form_validation->set_rules('delay', 'Delay', 'trim|required'); 
    $this->form_validation->set_rules('cmd_to_redirect', 'CMD to Redirect', 'trim|required'); 
    $this->form_validation->set_rules('check_response', 'Check Response', 'trim|required'); 
    //$this->form_validation->set_rules('message_display', 'Message Display'); 
    $this->form_validation->set_rules('img_show', 'Image Show', 'trim|required'); 
    $this->form_validation->set_rules('skip_check_response', 'Skip Check Response', 'trim|required'); 
             
    if($this->form_validation->run() == true){ 
    	$vehicle_id = $this->input->post("vehicle_id");
    	$cmd_no = $this->input->post("cmd_no");
    	$cmd = $this->input->post("cmd");
    	$response = $this->input->post("response");
    	$delay = $this->input->post("delay");
    	$cmd_to_redirect = $this->input->post("cmd_to_redirect");
    	$check_response = $this->input->post("check_response");
    	$message_display = $this->input->post("message_display");
    	$img_show = $this->input->post("img_show");
    	$skip_check_response = $this->input->post("skip_check_response");

    	$array = array("vehicle_id"=>$vehicle_id, "cmd_no"=>$cmd_no, "cmd"=>$cmd, "response"=>$response, "delay"=>$delay, "cmd_to_redirect"=>$cmd_to_redirect, "check_response"=>$check_response, "message_display"=>$message_display, "img_show"=>$img_show, "skip_check_response"=>$skip_check_response);

        $options   =  array(
            'data'  =>  $array,
            'table' =>  'vehicle_response'    
        );
        $insert = $this->Main_content_model->customInsert($options);
        if($insert){
        	$cmd_multi = $this->input->post("cmd_multi");
        	$result_to_show = $this->input->post("result_to_show");
        	$next_cmd = $this->input->post("next_cmd");
            if($cmd_multi != "" && $result_to_show != "" && $next_cmd != ""){
            	
            $array1 = array("cmd_multi"=>$cmd_multi, "result_to_show"=>$result_to_show, "next_cmd"=>$next_cmd, "cmd_id"=>$cmd_no, "vehicle_id"=>$vehicle_id);
	        $options1   =  array(
	            'data'  =>  $array1,
	            'table' =>  'multiple_response'    
	        );
	        $insert1 = $this->Main_content_model->customInsert($options1);
	       // $multi_res = $this->input->post("contacts");
            }
            if($multi_res != ""){
             $res = explode(';', $multi_res);
             foreach($res as $responses){
               $val = explode('|', $responses); 
            $array2 = array("cmd_multi"=>$val[0], "result_to_show"=>$val[1], "next_cmd"=>$val[2], "cmd_id"=>$cmd_no, "vehicle_id"=>$vehicle_id);
	        $options2   =  array(
	            'data'  =>  $array2,
	            'table' =>  'multiple_response'    
	        );
	        $insert2 = $this->Main_content_model->customInsert($options2);
             }
         }
        	$success_msg = "Data inserted successfully.";
        	$this->session->set_flashdata('message', $success_msg);
        }else{
        	$error_msg = "Something went wrong please try again.";
        	$this->session->set_flashdata('message', $error_msg);
        }
        redirect('Command_sequence');
       /* $options = array(
          'table' => 'add_vehicle',
          'select' => 'id, make'
          );
        $data["vehicles"] = $this->Main_content_model->customGet($options);
        $this->load->view('command', $data);*/
    }else{ 
    	$options = array(
          'table' => 'add_vehicle',
          'select' => 'id, make'
          );
        $data["vehicles"] = $this->Main_content_model->customGet($options);
        $data['error_msg'] = 'Please fill all the mandatory fields.'; 
        $this->load->view('command', $data);
        } 
}
    
}