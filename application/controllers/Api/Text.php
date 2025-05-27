<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Text extends REST_Controller {
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

    public function upload_textfile_POST(){
      date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date('d-m-Y h:i:a');
    //  echo $currentDateTime; exit;
        //menu validation
       $config = array( 
                array(
                    'field' => 'name',
                    'rules' => 'required|trim'
                  ),
                array(
                    'field' => 'log_category',
                    'rules' => 'required|trim'
                  )
             );
        $this->form_validation->set_rules($config); //call validation
       
        if ($this->form_validation->run() == FALSE){
                //validation return error
                 $message = $this->validation_post_warning();
                 $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{
            $name = $this->input->post('name');
            $log_category = $this->input->post('log_category');
           // $id = $this->input->post('id');
           
             // $text_file = $this->input->post('text_file');
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'txt';
            $this->load->library('upload');
            $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('text_file')) {
          $this->response(array('status' => FALSE,'message' =>$this->upload->display_errors()), 400);
        }else{
         $text_file = $this->upload->data('file_name');
         $data = array('upload_data' => $this->upload->data());
         $array = array("name"=>$name, "text_file" => $text_file, "vehicle_id" => $name, "created_at" => $currentDateTime, "log_category"=>$log_category);
          $options   =  array(
                  'data'  =>  $array,
                  'table' =>  'upload_textfile'    
              );
          $insert = $this->Main_content_model->customInsert($options);
          $this->response(array('status' => TRUE, 'message' => "Text file uploaded successfully."), 200);
        }
        }
    }

}

?>