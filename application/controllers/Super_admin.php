<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* class Welcome extends CI_Controller { */
//session_start();

class Super_Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id==NULL)
        {
            redirect("admin/index");
        }
        $this->load->model('Super_Admin_Model');
    }

    public function dashboard() {
        $data=array();
        $data['total_published_product'] = $this->Super_Admin_Model->total_product_count();
        $data['total_unpublished_product'] = $this->Super_Admin_Model->u_total_product_count();
        $data['home_content']=$this->load->view('admin/home_content',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function add_category(){
        $data=array();
        $data['home_content']=$this->load->view('admin/category_form','',true);
        $this->load->view('admin/admin_master',$data);
    }
    public function store_category(){
        $this->Super_Admin_Model->save_category_info();
        $sdata=array();
        $sdata['message']="Category info save successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/add_category');
    }
    public function manage_category(){
        $data=array();
        $data['categories']=$this->Super_Admin_Model->get_allcategory();
        $data['home_content']=$this->load->view('admin/manage_category',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function unpublished_category($category_id){
        $this->Super_Admin_Model->unpublished_category_byid($category_id);
        $data=array();
        $data['message']="Category info unpublished successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_category');
    }
    public function published_category($category_id){
        $this->Super_Admin_Model->published_category_byid($category_id);
        $data=array();
        $data['message']="Category info published successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_category');
    }
    public function edit_category($category_id){
        $data=array();
        $data['category_byid']=$this->Super_Admin_Model->getcategory_byid($category_id);
        $data['home_content']=$this->load->view('admin/edit_category', $data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function update_category(){
        $this->Super_Admin_Model->update_category_info();
        $sdata=array();
        $sdata['message']="Category info update successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_category');
    }
    public function delete_category($category_id){
        $this->Super_Admin_Model->delete_category_byid($category_id);
        $sdata=array();
        $sdata['message']="Category info Delete succesfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_category');
    } 
    public function add_manufacturer(){
        $data=array();
        $data['home_content']=$this->load->view('admin/pages/add_manufacturer','',true);
        $this->load->view('admin/admin_master',$data);
    }
    public function store_manufacturer(){
        $this->Super_Admin_Model->save_manufacturer_info();
        $sdata=array();
        $sdata['message']="Manufacturer info save successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/add_manufacturer');
    }
    public function manage_manufacturer(){
        $data=array();
        $data['manufactureis']=$this->Super_Admin_Model->get_allmanufacturer();
        $data['home_content']=$this->load->view('admin/pages/manage_manufacturer',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function unpublished_manufacturer($manufacturer_id){
        $this->Super_Admin_Model->unpublished_manufacturer_byid($manufacturer_id);
        $data=array();
        $data['message']="Manufacturer info unpublished successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_manufacturer');
    }
    public function published_manufacturer($manufacturer_id){
        $this->Super_Admin_Model->published_manufacturer_byid($manufacturer_id);
        $data=array();
        $data['message']="Manufacturer info published successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_manufacturer');
    }
    public function edit_manufacturer($manufacturer_id){
        $data=array();
          
        $data['manufacturer_byid']=$this->Super_Admin_Model->getmanufacturer_byid($manufacturer_id);
        
        
        $data['home_content']=$this->load->view('admin/pages/edit_manufacture',$data,true);
        
        $this->load->view('admin/admin_master',$data);
    }
    public function update_manufacturer(){
        $this->Super_Admin_Model->update_manufacturer_info();
        $sdata=array();
        $sdata['message']="Manufacturer info update successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_manufacturer');
    }
    public function delete_manufacturer($manufacturer_id){
        $this->Super_Admin_Model->delete_manufacturer_byid($manufacturer_id);
        $sdata=array();
        $sdata['message']="Manufacturer info Delete succesfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_manufacturer');
    }
    public function add_product(){
        $data=array();
        $data['all_published_category'] = $this->Super_Admin_Model->select_all_published_category();
        
        $data['all_published_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        
        $data['home_content']=$this->load->view('admin/pages/add_product',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function store_product(){
        $this->Super_Admin_Model->save_product_info();
        $sdata=array();
        $sdata['message']="Product info save successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/add_product');
    }
    public function manage_product(){
        $data=array();
        $data['products']=$this->Super_Admin_Model->get_allproduct();
        
//        echo '<pre>';
//        print_r($data['products']);
//        exit();
        
        $data['home_content']=$this->load->view('admin/pages/manage_product',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function unpublished_product($product_id){
        $this->Super_Admin_Model->unpublished_product_byid($product_id);
        $data=array();
        $data['message']="Product info unpublished successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_product');
    }
    public function published_product($product_id){
        $this->Super_Admin_Model->published_product_byid($product_id);
        $data=array();
        $data['message']="Product info published successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_product');
    }
    public function edit_product($product_id){
        $data=array();
        $data['all_published_category']=$this->Super_Admin_Model->select_all_published_category();
        $data['all_published_manufacturer']=$this->Super_Admin_Model->select_all_published_manufacturer();
        
        $data['product_byid']=$this->Super_Admin_Model->getproduct_byid($product_id);
        $data['home_content']=$this->load->view('admin/pages/edit_product', $data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function update_product($product_id){
        $this->Super_Admin_Model->update_product_info($product_id);
        $sdata=array();
        $sdata['message']="Product info update successfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_product');
    }
    public function delete_product($product_id){
        $this->Super_Admin_Model->delete_product_byid($product_id);
        $sdata=array();
        $sdata['message']="Product info Delete succesfully";
        $this->session->set_userdata($sdata);
        return redirect('super_admin/manage_product');
    }
    public function featured_product($product_id){
        $this->Super_Admin_Model->featured_product_byid($product_id);
        $data=array();
        $data['message']="Product featured successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_product');
    }
    public function normal_product($product_id){
        $this->Super_Admin_Model->normal_product_byid($product_id);
        $data=array();
        $data['message']="Product info normal successfully";
        $this->session->set_userdata($data);
        return redirect('super_admin/manage_product');
    }
  
    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('access_label');
        $sdata = array();
        $sdata['message'] = "You are successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect("admin/index");
    }
    public function manage_order() {
        $data = array();
        $data['all_order'] = $this->Super_Admin_Model->select_all_order();
        $data['home_content'] = $this->load->view('admin/pages/manage_order', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function delete_order($order_id) {
        $this->Super_Admin_Model->delete_order_by_id($order_id);
        redirect('Super_admin/manage_order');
    }

    public function view_invoice($order_id) {
        $data = array();
        $data['billing_info'] = $this->Super_Admin_Model->select_billing_info($order_id);
        $data['shipping_info'] = $this->Super_Admin_Model->select_shipping_info($order_id);
        $data['order_details']=  $this->Super_Admin_Model->select_order_details($order_id);
        $data['home_content'] = $this->load->view('admin/pages/view_invoice',$data,true);
        $this->load->view('admin/admin_master', $data);
    }
    public function download_invoice($order_id){
        $data = array();
        $data['billing_info'] = $this->Super_Admin_Model->select_billing_info($order_id);
        $data['shipping_info'] = $this->Super_Admin_Model->select_shipping_info($order_id);
        $data['order_details']=  $this->Super_Admin_Model->select_order_details($order_id);
        //$this->load->view('admin/pages/download_invoice', $data);
        $this->load->helper('dompdf');
        $view_file=$this->load->view('admin/pages/download_invoice', $data,true);
        $file_name=pdf_create($view_file, 'inv-00'.$order_id);
        echo $file_name;
    }

}
