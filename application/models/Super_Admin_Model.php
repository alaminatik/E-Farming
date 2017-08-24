<?php

class Super_Admin_Model extends CI_Model {

    public function save_category_info() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $this->db->insert('tbl_category', $data);
    }

    public function get_allcategory() {

        $this->db->select('*');

        $this->db->from('tbl_category');
        //$this->db->order_by("category_id","desc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function unpublished_category_byid($category_id) {
        $this->db->set('publication_status', 0);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');
    }

    public function published_category_byid($category_id) {
        $this->db->set('publication_status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category');
    }

    public function getcategory_byid($category_id) {
        //$this->db->order_by("category_id","desc");
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_category_info() {
        $data = array();
        $category_id = $this->input->post('category_id', true);
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);

        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
    }

    public function delete_category_byid($category_id) {

        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
    }

    public function save_manufacturer_info() {
        $data = array();
        $data['manufacturer_name'] = $this->input->post('manufacturer_name', true);
        $data['manufacturer_description'] = $this->input->post('manufacturer_description', true);
        $data['manufacturer_status'] = $this->input->post('manufacturer_status', true);
        $this->db->insert('tbl_manufacturer', $data);
    }

    public function get_allmanufacturer() {

        $this->db->select('*');

        $this->db->from('tbl_manufacturer');
        //$this->db->order_by("category_id","desc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function unpublished_manufacturer_byid($manufacturer_id) {
        $this->db->set('manufacturer_status', 0);
        $this->db->where('manufacturer_id', $manufacturer_id);
        $this->db->update('tbl_manufacturer');
    }

    public function published_manufacturer_byid($manufacturer_id) {
        $this->db->set('manufacturer_status', 1);
        $this->db->where('manufacturer_id', $manufacturer_id);
        $this->db->update('tbl_manufacturer');
    }

    public function getmanufacturer_byid($manufacturer_id) {
        //$this->db->order_by("manufacturer_id","desc");
        $this->db->select('*');
        $this->db->from('tbl_manufacturer');
        $this->db->where('manufacturer_id', $manufacturer_id);

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_manufacturer_info() {
        $data = array();
        $manufacturer_id = $this->input->post('manufacturer_id', true);
        $data['manufacturer_name'] = $this->input->post('manufacturer_name', true);
        $data['manufacturer_description'] = $this->input->post('manufacturer_description', true);
        $data['manufacturer_status'] = $this->input->post('manufacturer_status', true);

        $this->db->where('manufacturer_id', $manufacturer_id);
        $this->db->update('tbl_manufacturer', $data);
    }

    public function delete_manufacturer_byid($manufacturer_id) {

        $this->db->where('manufacturer_id', $manufacturer_id);
        $this->db->delete('tbl_manufacturer');
    }

    public function select_all_published_category() {

        $this->db->select("*");
        $this->db->from('tbl_category');
        $this->db->where('publication_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_published_manufacturer() {

        $this->db->select("*");
        $this->db->from('tbl_manufacturer');
        $this->db->where('manufacturer_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function save_product_info() {
        $data = array();
        $data['product_name'] = $this->input->post('product_name');
        $data['category_id'] = $this->input->post('category_id');
        $data['manufacturer_id'] = $this->input->post('manufacturer_id');
        $data['product_description'] = $this->input->post('product_description');

        $data['product_price'] = $this->input->post('product_price');
        $data['product_stock'] = $this->input->post('product_stock');
        $data['product_status'] = $this->input->post('product_status');
        $data['publication_status'] = $this->input->post('publication_status');
        /* Start Image Upload */
        $config['upload_path'] = './product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('product_image')) {
            $sdata['error'] = $this->upload->display_errors();
            $this->session->set_userdata($sdata);
        } else {
            $fdata = $this->upload->data();
            $data['product_image'] = $config['upload_path'] . $fdata['file_name'];
        }
        /* End Image Upload */
        $this->db->insert('tbl_product', $data);
    }

    public function get_allproduct() {
        $this->db->select('p.*,c.category_name,c.publication_status as category_status,m.manufacturer_name');
        $this->db->from('tbl_product p');
        $this->db->join('tbl_category c', 'p.category_id = c.category_id'); // this joins the user table to topics
        $this->db->join('tbl_manufacturer m', 'm.manufacturer_id = p.manufacturer_id');
        $query_result = $this->db->get();
        $result = $query_result->result();

//        echo 'Product<pre>';
//        print_r($result);
//        exit();

        return $result;
    }

    public function unpublished_product_byid($product_id) {
        $this->db->set('publication_status', 0);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product');
    }

    public function published_product_byid($product_id) {
        $this->db->set('publication_status', 1);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product');
    }
    public function select_featured_product() {

        $this->db->select("*");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where('product_status', 1);
        $this->db->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function getproduct_byid($product_id) {
        //$this->db->order_by("product_id","desc");
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id', $product_id);

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_product_info($product_id) {
        $data = array();

        $data['product_name'] = $this->input->post('product_name');
        $data['category_id'] = $this->input->post('category_id');
        $data['manufacturer_id'] = $this->input->post('manufacturer_id');
        $data['product_description'] = $this->input->post('product_description');

        $data['product_price'] = $this->input->post('product_price');
        $data['product_stock'] = $this->input->post('product_stock');
        $data['product_status'] = $this->input->post('product_status');
        $data['publication_status'] = $this->input->post('publication_status');

//        echo '<pre>';
//        print_r($data);
//        exit();
        /* Start Image Upload */
        $config['upload_path'] = './product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('product_image')) {
            $sdata['error'] = $this->upload->display_errors();
            $this->session->set_userdata($sdata);
        } else {
            $fdata = $this->upload->data();
            $data['product_image'] = $config['upload_path'] . $fdata['file_name'];
        }
        /* End Image Upload */

        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product', $data);
    }

    public function delete_product_byid($product_id) {

        $this->db->where('product_id', $product_id);
        $this->db->delete('tbl_product');
    }

    public function featured_product_byid($product_id) {

        $this->db->set('product_status', 1);
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product');
    }
    public function normal_product_byid($product_id){
        $this->db->set('product_status', 0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }


        public function select_products_by_category_id($category_id) {
        $this->db->select("*");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_product_info_by_id($product_id) {
        $sql = "SELECT a.category_name,b.*,c.manufacturer_name FROM tbl_category as a,tbl_product as b,tbl_manufacturer as c WHERE a.category_id=b.category_id and b.manufacturer_id=c.manufacturer_id and product_id='$product_id'";
//        
//        $this->db->where('publication_status',1);
//        $this->db->where('product_id',$product_id);
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function select_latest_products() {
        $this->db->select("*");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(8);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_featured_products() {
        $this->db->select("*");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where('product_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_related_products($product_id) {
        $this->db->select("category_id");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where('product_id', $product_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        $category_id = $result->category_id;
        $this->db->select("*");
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function check_login_info($email_address,$password,$registration_type){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address',$email_address);
        $this->db->where('password',$password);
        $this->db->where('registration_type',$registration_type);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function save_user_info() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['email_address'] = $this->input->post('email_address');
        $data['mobile_number'] = $this->input->post('mobile_number');
        $data['dob'] = $this->input->post('dob');

        $data['city'] = $this->input->post('city');
        $data['password'] = md5($this->input->post('password'));
        $data['address'] = $this->input->post('address');
        $data['registration_type'] = $this->input->post('registration_type');
        $data['gender'] = $this->input->post('gender');
        /* Start Image Upload */
        $config['upload_path'] = './profile_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('profile_image')) {
            $sdata['error'] = $this->upload->display_errors();
            $this->session->set_userdata($sdata);
        } else {
            $fdata = $this->upload->data();
            $data['profile_image'] = $config['upload_path'] . $fdata['file_name'];
        }
        /* End Image Upload */
        $this->db->insert('tbl_user', $data);
        
        $id = $this->db->insert_id();
        
        
        $info = array();
                $info['id']=$id;
                $info['name']=$data['name'];
                $info['registration_type']=$data['registration_type'];
                return $info;
        
    }
    public function select_all_order() {
        $this->db->select("*");
        $this->db->from('tbl_order');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function delete_order_by_id($order_id){
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    public function select_billing_info($order_id){
       $sql="SELECT * FROM tbl_user as c,tbl_order as o WHERE order_id='$order_id' and c.id=o.id";
       $query_result=  $this->db->query($sql);
       $result=$query_result->row();
       return $result;
               
    }
     public function select_shipping_info($order_id){
       $sql="SELECT * FROM tbl_shipping as s,tbl_order as o WHERE order_id='$order_id' and s.shipping_id=o.shipping_id";
       $query_result=  $this->db->query($sql);
       $result=$query_result->row();
       return $result;
               
    }
    public function select_order_details($order_id){
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id',$order_id);
        $query_result=  $this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function save_contact_info(){
        $data = array();
        $data['contact_name'] = $this->input->post('contact_name');
        $data['email_address'] = $this->input->post('email_address');
        $data['enquiry'] = $this->input->post('enquiry');
        $data['captcha'] = $this->input->post('captcha');
        
        $this->db->insert('tbl_contact', $data);
    }
   public function total_product_count(){
        $this->db->where('publication_status',1);
        $this->db->from('tbl_product');
        $count = $this->db->count_all_results();
        return $count;
    }
    public function u_total_product_count(){
        $this->db->where('publication_status',0);
        $this->db->from('tbl_product');
        $count = $this->db->count_all_results();
        return $count;
    }

}
