<?php

class Admin_Model extends CI_Model {
    
    public function check_admin_login_info($email_address,$admin_password,$access_label){
        
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('email_address',$email_address);
        $this->db->where('admin_password',$admin_password);
        $this->db->where('access_label',$access_label);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }


}


