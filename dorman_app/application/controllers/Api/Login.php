<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller {
    
        public function __construct() {
                parent::__construct();
                $this->load->model('api/Login_model');
                $this->config->load('api_keys');
                $headers = $this->input->request_headers();
                $client_key = isset($headers['X-API-KEY']) ? $headers['X-API-KEY'] : null;
                $server_key = $this->config->item('api_key');
                if ($client_key !== $server_key) {
                    show_error('Unauthorized access', 401);
                }
        }
   // GET : <project url>/Api/Login/User_list
   public function Device_list_GET(){  //user all record get
	      //model function call
          $query=$this->Login_model->get_all_device();
          if($query){ //return true response
	                 $this->response( array('status' => TRUE,'message'=>'Device Found','data'=>$query ),200);
          }else{ //return false response
                    $this->response( array('status' => False,'message'=>'No Device Found' ),200);
          }

   }
   
   
 //POST : <project url>/Api/Login/Login
    public function getdevice_POST(){
    	//login validation
       $config = array(
   
                array(
                        'field' => 'id',
                        'label' => 'id',
                        'rules' => 'required|trim'
                ),
               
             );
    	$this->form_validation->set_rules($config); //call validation
        if ($this->form_validation->run() == FALSE){
                $message = $this->validation_post_warning();
                $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{
        	    //model function call login match data
                $query=$this->Login_model->get_device();
        }

    }
   




  //POST : <project url>/Api/Category/Edit_menu_category
    public function Device_status_POST(){
        //menu validation
       $config = array(
                array(
                        'field' => 'id',
                        'label' => 'id',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required|trim'
                ),
              
             );
        $this->form_validation->set_rules($config); //call validation
        if ($this->form_validation->run() == FALSE){
                //validation return error
                 $message = $this->validation_post_warning();
                 $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{

                //model function call insert menu
                $query=$this->Login_model->update_device();
                if($query){ //return true response
                $status= $_POST['status'];
                $file = fopen("getvalue.json", "w") or die("can't open file");
                fwrite($file, '{"status": "'.$status.'"}');
                 fclose($file);  
                      $this->response( array('status' => TRUE,'message'=>'Status Updated successfully ','data'=>$query ),200);
                }else{ //return false response
                       $this->response( array('status' => False,'message'=>'No update Data' ),400);
                }
                 
           
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