<?php

class Checkout extends CI_Controller {

    //put your code here
    public function shipping_address() {
        $data = array();
        $data['title'] = "Shipping_Address";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/shipping_info', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function ajax_email_check($email_address = NULL) {
        $result = $this->Checkout_Model->check_email_address($email_address);

        if ($email_address == NULL) {
            echo "Email Address Required";
        } else if ($result) {
            echo "Alredy Exists !";
        } else {
            echo "Avilable";
        }
    }

    public function save_shipping() {
        $this->Checkout_Model->save_shipping_info();
        redirect("checkout/payment_order");
    }

    public function payment_order() {
        $data = array();
        $data['title'] = "Payment";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/payment_order_form', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

    public function place_order() {
        $payment_type = $this->input->post('payment_type');
        $this->Checkout_Model->save_payment_info();
        if ($payment_type == 'cash_on_delivery') {
            $this->Checkout_Model->save_order_info();
            /*
             * Start Send Email
             */
            $order_id = $this->session->userdata('order_id');
            $mdata['billing_info'] = $this->Super_Admin_Model->select_billing_info($order_id);
            $mdata['shipping_info'] = $this->Super_Admin_Model->select_shipping_info($order_id);
            $mdata['order_details'] = $this->Super_Admin_Model->select_order_details($order_id);
            $mdata['from_address'] = "alamin@farmingassistants.com";
            $mdata['admin_full_name'] = "Alamin";
            $mdata['to_address'] = $mdata['billing_info']->email_address;
            $mdata['subject'] = "Successfull Order ";
            $mdata['name'] = $mdata['billing_info']->name;
            $this->Mailer_Model->send_email($mdata, 'order_complete_email');
            /*
             * End Send Email
             */

            redirect("checkout/order_successfull");
        } else if ($payment_type == 'pay_by_card') {
            $this->Checkout_Model->save_order_info();
            $data['name']= $this->session->userdata('name');
            $data['gtotal'] = $this->session->userdata('g_total');
            $this->load->view('stripe/index',$data);
            //$order_id = $this->session->userdata('order_id');
            //$data['order_all'] = $this->Super_Admin_Model->select_all_order();
            //$data['order_total'] = $data['order_all']->order_total;
            
        }
    }

    public function order_successfull() {
        $data = array();
        $data['title'] = "Order Successfull";
        $data['publish_categories'] = $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer'] = $this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent'] = $this->load->view('pages/order_successfull', $data, true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master', $data);
    }

}
