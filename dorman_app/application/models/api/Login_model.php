<?php
     
class Login_model extends CI_Model {
        function __construct(){
        $this->table = 'Device';
}

      
    public function get_all_device()
        { //get all user
                $query = $this->db->get($this->table);
                return $query->result();
        }


   public function get_device($id)
        {   //login user 
               $password=md5($_POST['password']);
                $this->db->select('*');
                $this->db->from('Device');
                $this->db->where('id', $id);
                $query = $this->db->get();
                return $query->row();
        }


    public function update_device()
        {  
            //get post data
          $data = array(
                 'status'    => $_POST['status'],
          );     
          //insert  user data
                $this->db->where('id', $_POST['id']);
                $this->db->update('Device', $data);
                 return $this->db->affected_rows();
        }







        public function get_login()
        {   //login user 
               $password=md5($_POST['password']);
                $this->db->select('*');
                $this->db->from($this->table);
                $this->db->where('email', $_POST['email']);
                $this->db->where('password',$password);
                $query = $this->db->get();
                return $query->row();
        }

       public function get_profile(){
            // user get data
                $this->db->select('*');
                $this->db->from($this->table);
                $this->db->where('id', $_POST['id']);
                $query = $this->db->get();
                return $query->row();
       }
        public function update_token_device($getuser,$token)
        {
           if($getuser->device_token){
                $tok = $getuser->device_token;
                $tokenr = explode('|', $tok);
                $this->db->select('*');
                $this->db->from($this->table);
                $this->db->LIKE('device_token', $token);
                $query = $this->db->get();
                $row = $query->row();
                $count_record=$query->num_rows();
                if($count_record>0){
                       $device = $row->device_token;
                       $devicetoken= explode('|', $device);
                   if(!in_array($devicetoken, $tokenr)){
                         $this->device_token    = $getuser->device_token.'|'.$token;
                         $this->db->update($this->table,  array('id' => $getuser->id));      
                    }
                }else{

                       $device_token    = $getuser->device_token.'|'.$token;  
                       $this->db->set('device_token',$device_token);
                       $this->db->where('id', $getuser->id);
                       $this->db->update($this->table);      
                }

           }else{ //first time update token
                 $this->db->set('device_token',$token);
                 $this->db->where('id', $getuser->id);
                 $this->db->update($this->table);    
           }     
          
                
        }

        public function update_password()
        {   //update password
                 $password=md5($_POST['password']);
                 $this->db->set('password',$password);
                 $this->db->where('id', $_POST['id']);
                 $str = $this->db->update($this->table);  
                 return $str ;        
        }




        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        

}

?>