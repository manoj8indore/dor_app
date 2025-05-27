<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Command_array extends REST_Controller {
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
    public function get_array_data_POST(){
        //menu validation
       $config = array(
                array(
                        'field' => 'make',
                        'rules' => 'required|trim'
                )
             );
        $this->form_validation->set_rules($config); //call validation
        if ($this->form_validation->run() == FALSE){
                //validation return error
                 $message = $this->validation_post_warning();
                 $this->response(array('status' => FALSE,'message' =>$message), 400);
        }else{

        	$make = $this->input->post('make');
        	// Your CodeIgniter Active Record query
			$this->db->select('*');
			$this->db->from('vehicle_array');
			$this->db->where("FIND_IN_SET('$make', vehicle) > 0");
            $query = $this->db->get();
            $result = $query->result();
   
        if($result){
                  $record = [];
                  foreach($result as $data){
                     $options = array(
                      'table' => 'array_command',
                      'select' => 'cmd, response',
                      'where' => array('array_id' => $data->id),
                      );
                  $query1 = $this->Main_content_model->customGet($options);
                  if($query1){
                    array_push($record, ['delay' => $data->delay, $data->array_name => $query1]);
                  }else{
                    array_push($record, ['delay' => $data->delay, $data->array_name => []]);
                  }
              }
              $this->response($record);
              }else{ //return false response
                        $this->response( array('message'=>'No Record Found' ),200);
              }
        }
    }

}

/*$array = array('classesID' => '5,6,7');
$this->db->select();
$this->db->from($this->_table_name);
$this->db->where("FIND_IN_SET('classesID',".$array['classesID'].")",null,false);
$this->db->order_by($this->_order_by);
$query = $this->db->get();
return $query->result(); */