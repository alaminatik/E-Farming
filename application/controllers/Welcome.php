<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* class Welcome extends CI_Controller { */

class Welcome extends CI_Controller {

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
    public function index() {
        $data = array();
        $data['title'] = "Home";
        $data['featured_product'] = $this->Super_Admin_Model->select_featured_products();
        $data['latest_product'] = $this->Super_Admin_Model->select_latest_products();
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
//        echo '<pre>';
//        print_r($data['publish_categories']);
//        exit();
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $data['maincontent'] = $this->load->view('pages/home', $data, true);

        $this->load->view('master', $data);
    }

    public function category($category_id) {
        $data = array();
        $data['title'] = "Category";
//        $data['all_published_category'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['category_products'] = $this->Super_Admin_Model->select_products_by_category_id($category_id);
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['category_byid']=$this->Super_Admin_Model->getcategory_byid($category_id);
        $data['maincontent'] = $this->load->view('pages/category', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function about() {
        $data = array();
        $data['title'] = "About";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/about', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function my_account() {
        $data = array();
        $data['title'] = "My account";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/my_account', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function compare() {
        $data = array();
        $data['title'] = "Compare";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['published_product']= $this->Super_Admin_Model->select_featured_product();
        $data['maincontent'] = $this->load->view('pages/compare',$data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function shopping_cart() {
        $data = array();
        $data['title'] = "Shopping Cart";
        $data['cart_js'] = true;
        $data['cart_jquery'] = true;
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/shopping_cart', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function checkout() {
        $data = array();
        $data['title'] = "Checkout";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/checkout', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function contact() {
        $data = array();
        $data['title'] = "Contact us";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/contact', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function store_contact() {

        $this->Super_Admin_Model->save_contact_info();
        $sdata = array();
        $sdata['message'] = "Contact info save successfully";
        $this->session->set_userdata($sdata);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        return redirect('Welcome/contact');
    }

    public function product($product_id) {
        $data = array();
        $data['title'] = "Product";
        $data['product_js'] = true;
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['product_byid'] = $this->Super_Admin_Model->select_product_info_by_id($product_id);
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['related_products'] = $this->Super_Admin_Model->select_related_products($product_id);

        $data['maincontent'] = $this->load->view('pages/product', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function sitemap() {
        $data = array();
        $data['title'] = "Sitemap";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/sitemap', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function login_form() {
        $data = array();
        $data['title'] = "login";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/login_p', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function login() {

        $email_address = $this->input->post('email_address', true);
        $password = md5($this->input->post('password', true));
        //$password = $this->input->post('password', true);
        $registration_type = $this->input->post('registration_type', true);

        $user_info = $this->Super_Admin_Model->check_login_info($email_address, $password, $registration_type);
        //echo '<pre>';
        //print_r($user_info);
        //exit();
        $sdata = array();

        if ($user_info) {
            $sdata['id'] = $user_info->id;
            $sdata['name'] = $user_info->name;
            $sdata['registration_type'] = $user_info->registration_type;

            $this->session->set_userdata($sdata);
            redirect('welcome/index');
        } else {

            $sdata['exception'] = "Your User Id Or Password Invalid !";
            $this->session->set_userdata($sdata);
            redirect('welcome/login_form');
        }
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('registration_type');
        $this->session->unset_userdata('shipping_id');
        $sdata = array();
        $sdata['message'] = "You are successfully Logout !";
        $this->session->set_userdata($sdata);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        redirect("welcome/index");
    }

    public function register() {
        $data = array();
        $data['title'] = "Register";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/register', '', true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function store_user() {

        $reg_info = $this->Super_Admin_Model->save_user_info();

        $this->session->set_userdata($reg_info);

        $sdata = array();
        $sdata['message'] = "User info save successfully";
        $this->session->set_userdata($sdata);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        return redirect('Welcome/index');
    }

    public function wish_list() {
        $data = array();
        $data['title'] = "Wish List";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['wish_count'] = 0;
        $data['product_info'] = $this->Wish_List_Model->select_product_info();
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $data['maincontent'] = $this->load->view('pages/wish_list', $data, true);
        $this->load->view('master', $data);
    }

}
