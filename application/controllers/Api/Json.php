<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Json extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->config->load('api_keys');
        $headers = $this->input->request_headers();
        $client_key = isset($headers['X-API-KEY']) ? $headers['X-API-KEY'] : null;
        $server_key = $this->config->item('api_key');
        if ($client_key !== $server_key) {
            show_error('Unauthorized access', 401);
        }
    }

  //POST : <project url>/Api/Category/Edit_menu_category
    public function getdata_POST(){
        //menu validation
       $config = array(
                array(
                        'field' => 'make',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'model',
                        'rules' => 'required|trim'
                ),
                 array(
                        'field' => 'start_year',
                        'rules' => 'required|trim'
                ),
                  array(
                        'field' => 'end_year',
                        'rules' => 'required|trim'
                ),
              
             );
        $this->form_validation->set_rules($config); //call validation
        if ($this->form_validation->run() == FALSE){
                //validation return error
                 $message = $this->validation_post_warning();
                 $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{
              $make = $this->input->post('make');
              $model = $this->input->post('model');
              $start_year = $this->input->post('start_year');
              $end_year = $this->input->post('end_year');
             $options = array(
            'table' => 'add_vehicle',
            'select' => 'add_vehicle.link, vehicle_response.vehicle_id, vehicle_response.cmd_no, vehicle_response.cmd, vehicle_response.response, vehicle_response.delay, vehicle_response.cmd_to_redirect, vehicle_response.check_response, vehicle_response.message_display, vehicle_response.img_show, vehicle_response.skip_check_response',
            'where' => array('add_vehicle.make' => $make, 'add_vehicle.model' => $model, 'add_vehicle.start_year' => $start_year, 'add_vehicle.end_year' => $end_year),
            'join' => array(
                array('vehicle_response', 'vehicle_response.vehicle_id = add_vehicle.id', 'left'),
            ),
        );
        $query = $this->Main_content_model->customGet($options);
          if($query){ //return true response
                  $record = [];
                  foreach($query as $data){
                     $options = array(
                      'table' => 'multiple_response',
                      'select' => 'cmd_multi, result_to_show, next_cmd',
                      'where' => array('cmd_id' => $data->cmd_no, 'vehicle_id'=>$data->vehicle_id),
                      );
                  $query1 = $this->Main_content_model->customGet($options);
                  if($query1){
                    array_push($record, ['vehicle_id' => $data->vehicle_id, 'cmd_no' => $data->cmd_no, 'cmd' => $data->cmd, 'response' => $data->response, 'delay' => $data->delay, 'cmd_to_redirect' => $data->cmd_to_redirect, 'check_response' => $data->check_response, 'multiple_res'=>$query1, 'message_display' => $data->message_display, 'img_show' => $data->img_show, 'skip_check_response' => $data->skip_check_response]);
                  }else{
                     array_push($record, ['vehicle_id' => $data->vehicle_id, 'cmd_no' => $data->cmd_no, 'cmd' => $data->cmd, 'response' => $data->response, 'delay' => $data->delay, 'cmd_to_redirect' => $data->cmd_to_redirect, 'check_response' => $data->check_response, 'multiple_res'=>[], 'message_display' => $data->message_display, 'img_show' => $data->img_show, 'skip_check_response' => $data->skip_check_response]);
                  }
                   
              }
                   $this->response( array('status' => TRUE, 'total_cmd'=> count($query), 'image_url'=>$query[0]->link, 'result'=>$record),200);
          }else{ //return false response
                    $this->response( array('status' => False,'message'=>'No Record Found' ),200);
          }
        }
    }

    public function model_GET(){
        $options = array(
            'table' => 'add_vehicle',
            'select' => '*',
        );
        $query = $this->Main_content_model->customGet($options);
        if($query){ //return true response
            $record = [];
            foreach($query as $data){
                array_push($record, ['make' => $data->make, 'data'=>['model'=> $data->model,'start_year'=> $data->start_year, 'end_year'=> $data->end_year] ]);
            }
            $this->response( array('status' => TRUE, 'data'=>$record ),200);
        }else{
            $this->response( array('status' => False,'message'=>'No Record Found' ),200);
        }

    }

   //POST : <project url>/Api/Login/Login
    public function Login_POST(){
    	//login validation
       $config = array(
   
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|trim|valid_email'
                ),
                array(
                        'field' => 'token',
                        'label' => 'Device Token',
                        'rules' => 'required|trim'
                )
             );
    	$this->form_validation->set_rules($config); //call validation
        if ($this->form_validation->run() == FALSE){
                $message = $this->validation_post_warning();
                $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{
        	    //model function call login match data
                $query=$this->Login_model->get_login();
                if($query){ //return true response
                	//update token
                      $this->Login_model->update_token_device($query,$_POST['token']);
	                  $this->response( array('status' => TRUE,'message'=>'Login successful','data'=>$query ),200);
                }else{ //return false response
                       $this->response( array('status' => False,'message'=>'email and password invalid' ),200);
                }
           
        }

    }
 

     //POST : <project url>/Api/Login/Change_password
   public function Change_password_POST(){
	//login validation
       $config = array(
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'confirm_password',
                        'label' => 'Confirm Password',
                        'rules' => 'trim|required|matches[password]'
                ),
             );
    	   $this->form_validation->set_rules($config); //call validation
           if ($this->form_validation->run() == FALSE){
                   $message = $this->validation_post_warning();
                   $this->response(array('status' => FALSE,'message' =>$message), 400);
           }else{
           	   //model function call update password
                  $query=$this->Login_model->update_password();
                  if($query){ //return true response
	                       $this->response( array('status' => TRUE,'message'=>'Password Changed'),200);
                 }else{ //return false response
                           $this->response( array('status' => False,'message'=>'No change password' ),200);
                }

           }

    }



     //POST : <project url>/Api/Login/Change_password
   public function Profile_POST(){
	//login validation
       $config = array(
                array(
                        'field' => 'id',
                        'label' => 'User ID',
                        'rules' => 'required|trim'
                 ),
             );
    	   $this->form_validation->set_rules($config); //call validation
           if ($this->form_validation->run() == FALSE){
                   $message = $this->validation_post_warning();
                   $this->response(array('status' => FALSE,'message' =>$message), 400);
           }else{
           	        //model function call profile data
                   $query=$this->Login_model->get_profile();
                   if($query){ //return true response
	                       $this->response( array('status' => TRUE,'message'=>'User record','data'=>$query),200);
                   }else{ //return false response
                           $this->response( array('status' => False,'message'=>'Record Not Found' ),200);
                   }

           }

    }

}

?>