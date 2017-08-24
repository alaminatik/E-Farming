<?php

class Wish_List extends CI_Controller {

    public function save_wish_list() {
        $this->Wish_List_Model->save_customer_wish_list();
        $product_id = $this->input->post('product_id');
        redirect('Wish_List/wish_list_display');
    }

    public function wish_list_display() {
        $data = array();
        $data['title'] = "Wish_list";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['product_info'] = $this->Wish_List_Model->select_product_info();
        $data['publish_manufacturer']=$this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/wish_list', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function remove_wish_list($wish_list_id) {
        $this->Wish_List_Model->remove_wish_list_by_id($wish_list_id);
        redirect('Wish_List/wish_list_display');
    }

    public function wish_list_count() {
        $data = array();
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        
        $this->load->view('master', $data);
    }

}

