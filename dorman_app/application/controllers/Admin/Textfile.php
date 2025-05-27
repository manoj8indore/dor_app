<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Textfile extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
   
        // User login status 
    $isUserLoggedIn = $this->session->userdata('user_id'); 
    if(!$isUserLoggedIn){
        redirect(base_url().'admin');
    }
    }

    function index(){
       
        $options = array(
            'table' => 'textfile_vehicle',
            'select' => '*',
            'where' => array('status' => 1),
            'order' => array('id' => 'desc')
            
        );
        $data['record'] = $this->Main_content_model->customGet($options);
       // print_r($data); exit;
        $this->load->view('common/header');
        $this->load->view('common/navigation');
        $this->load->view('admin/textfile/vehicle_list', $data);
      //  $this->load->view('common/footer');
        $this->load->view('common/source');
    }

    function view_log(){
      $name = $this->input->get('name');
      $options = array(
            'table' => 'upload_textfile',
            'select' => '*',
            'where' => array('name' => $name),
            'order' => array('id' => 'desc')
            
        );
        $data['record'] = $this->Main_content_model->customGet($options);
       // print_r($data); exit;
        $this->load->view('common/header');
        $this->load->view('common/navigation');
        $this->load->view('admin/textfile/textfile_list', $data);
      //  $this->load->view('common/footer');
        $this->load->view('common/source');
    }

      public function download($id) {
          $options = array(
            'single' => TRUE,
            'table' => 'upload_textfile',
            'select' => '*',
            'where' => array('id' =>$id),
          );
        $data = $this->Main_content_model->customGet($options);
     
      $file_path = base_url().'uploads/'.$data->text_file; // Change this path to the actual path of your text file
      
      if($file_path){
       // echo $file_path."sdfsdf"; exit;
         $file_content = file_get_contents($file_path);
         // Set the appropriate headers for a text file download
         header('Content-Type: text/plain');
         header('Content-Disposition: attachment; filename='.$data->text_file);
         // Output the file content
         echo $file_content;
      } else {
         // Handle file not found scenario
         show_404();
      }
   }

     public function delete(){
      $id = $this->input->get("id");

      $options   =  array(
        'table' =>  'upload_textfile',
        'where' => array('id' => $id),    
      );
      $delete = $this->Main_content_model->customDelete($options);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function select_vehicle(){
        $options = array(
            'table' => 'textfile_vehicle',
            'select' => '*',
            'order' => array('id' => 'desc')
            
        );
        $data['record'] = $this->Main_content_model->customGet($options);
       // print_r($data); exit;
        $this->load->view('common/header');
        $this->load->view('common/navigation');
        $this->load->view('admin/textfile/select_vehicle', $data);
      //  $this->load->view('common/footer');
        $this->load->view('common/source');
    }

    public function download_apk(){
      $apk = $this->input->get('apk');
      $id = $this->input->get('id');
      $array = array("status"=>0);
      $options   =  array(
        'table' =>  'textfile_vehicle',
        'where' => array('id !=' => $id),
        'data'  =>  $array,    
      );
     $delete = $this->Main_content_model->customUpdate($options);
     $array1 = array("status"=>1);
     $options   =  array(
        'table' =>  'textfile_vehicle',
        'where' => array('id' => $id),
        'data'  =>  $array1,    
      );
     $delete = $this->Main_content_model->customUpdate($options);
     if($id == 0){
     	$options   =  array(
        'table' =>  'textfile_vehicle',
       // 'where' => array('id' => $id),
        'data'  =>  $array1,    
      );
     $delete = $this->Main_content_model->customUpdate($options);
     }
     $file_path = base_url().'uploads/apk/'.$apk;
  
      if($file_path){
         $file_content = file_get_contents($file_path);
         header('Content-Type: application/vnd.android.package-archive');
         header('Content-Disposition: attachment; filename='.$apk);
        // echo $file_content;
         readfile($file_content);
         
      } else {
         // Handle file not found scenario
         show_404();
      }
    }

}