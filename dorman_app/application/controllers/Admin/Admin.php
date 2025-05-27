<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Admin extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    }

   function index() {

        $this->load->view('common/header');
        $this->load->view('admin/login');
        $this->load->view('common/source');
    }

    	function login() {

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
		  $options = array(
            'single' => TRUE,
            'table' => 'admin_login',
            'select' => '*',
            'where' => array('email' =>$email, 'password'=>$password),
            
        );
        $checkLogin = $this->Main_content_model->customGet($options);
			if($checkLogin){
				$session = array(
							'user_id'=> $checkLogin->id,
                            'email' => $checkLogin->email
						   );
			$this->session->set_userdata($session);
         
			redirect(base_url().'vehicle'); 
			} else {
				redirect(base_url().'Admin/Admin?pesan=gagal');
			}
		} else {
			redirect(base_url().'Admin/Admin?pesan=gagal');
		}
	}

        public function logout(){ 
        $this->session->unset_userdata('user_id'); 
        $this->session->unset_userdata('email'); 
        $this->session->sess_destroy(); 
        redirect('admin'); 
    } 

}