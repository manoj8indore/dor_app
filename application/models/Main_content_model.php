<?php

class Main_content_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

 


    public function customInsert($options) {
        $table = false;
        $data = false;

        extract($options);

        $this->db->insert($table, $data);

        return $this->db->insert_id();
    }

 

    public function customUpdate($options) {
        $table = false;
        $where = false;
        $orwhere = false;
        $data = false;

        extract($options);

        if (!empty($where)) {
            $this->db->where($where);
        }

        // using or condition in where  
        if (!empty($orwhere)) {
            $this->db->or_where($orwhere);
        }
        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    public function customGet($options) {

        $select = false;
        $table = false;
        $join = false;
        $order = false;
        $limit = false;
        $offset = false;
        $where = false;
        $or_where = false;
        $single = false;
        $where_not_in = false;

        extract($options);

        if ($select != false)
            $this->db->select($select);

        if ($table != false)
            $this->db->from($table);

        if ($where != false)
            $this->db->where($where);

        if ($where_not_in != false) {
            foreach ($where_not_in as $key => $value) {
                if (count($value) > 0)
                    $this->db->where_not_in($key, $value);
            }
        }

        if ($or_where != false)
            $this->db->or_where($or_where);

        if ($limit != false) {

            if (!is_array($limit)) {
                $this->db->limit($limit);
            } else {
                foreach ($limit as $limitval => $offset) {
                    $this->db->limit($limitval, $offset);
                }
            }
        }


        if ($order != false) {

            foreach ($order as $key => $value) {

                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }


        if ($join != false) {

            foreach ($join as $key => $value) {

                if (is_array($value)) {
                    if (count($value) == 3) {
                        $this->db->join($value[0], $value[1], $value[2]);
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $this->db->join($key1, $value1);
                        }
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }
        
        if (isset($having) && $having != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->having($having);
        
        if (isset($group_by) && $group_by != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->group_by($group_by);


        $query = $this->db->get();

        if ($single) {
            return $query->row();
        }
//echo $this->db->last_query();//die();
        return $query->result();
    }
     
       public function customDelete($options) {
        $table = false;
        $where = false;
        $orwhere = false;

        extract($options);

        if (!empty($where)) {
            $this->db->where($where);
        }

        // using or condition in where  
        if (!empty($orwhere)) {
            $this->db->or_where($orwhere);
        }
        $this->db->delete($table);

        return $this->db->affected_rows();
    }
 
 
    function sendMail($from, $to, $message) {
        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);


        $this->email->from($from, 'Team Socialwise');
        $this->email->to($to);
        //    $this->email->bcc('them@their-example.com');

        $this->email->subject("Socialwise");

        $this->email->message($message);
        $send = $this->email->send();
        if ($send) {
            return '1';
        } else {
            return '0';
        }
    }

 
}