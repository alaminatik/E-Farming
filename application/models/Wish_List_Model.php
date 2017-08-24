<?php

class Wish_List_Model extends CI_Model {

    public function save_customer_wish_list() {
        $data = array();
        $data['product_id'] = $this->input->post('product_id');
        $data['id'] = $this->session->userdata('id');
        $this->db->select("*");
        $this->db->from('tbl_wish_list');
        $this->db->where('product_id',$data['product_id']);
        $this->db->where('id',$data['id']);
        $query_result=  $this->db->get();
        $result=$query_result->result();
        //echo '<pre>';
        //print_r($result);
        //exit();
        if($result){
            $sdata=array();
            $sdata['message']="This Product is already in your wish list";
            $this->session->set_userdata($sdata);
     
        }else{
            $this->db->insert('tbl_wish_list', $data);
        }
        
    }

    public function select_product_info() {
        $customer_id=  $this->session->userdata('id');
        $sql = "SELECT * FROM tbl_product as p,tbl_wish_list as w WHERE p.product_id=w.product_id and w.id='$customer_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    public function remove_wish_list_by_id($wish_list_id){
        $this->db->where('wish_list_id',$wish_list_id);
        $this->db->delete('tbl_wish_list');
        
    }
    public function select_wish_list_by_customer_id(){
        $customer_id=  $this->session->userdata('id');
        $this->db->select("*");
        $this->db->from("tbl_wish_list");
        $this->db->where('id',$customer_id);
        $query_result=  $this->db->get();
        $result=$query_result->num_rows();
        return $result;
    }

}


