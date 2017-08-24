<?php
class Cart extends CI_Controller {
    //put your code here
    
    public function add_to_cart()
    {
        $qty=$this->input->post('qty',true);
        $product_id=$this->input->post('product_id',true);
        $product_info=$this->Cart_Model->select_product_by_id($product_id);
        $data = array(
        'id'      => $product_info->product_id,
        'qty'     => $qty,
        'price'   => $product_info->product_price,
        'name'    => $product_info->product_name,
        'image' => $product_info->product_image
);

$this->cart->insert($data);
    
    redirect('cart/show_cart');
    }
    public function update_cart()
    {
        $qty=$this->input->post('qty',true);
        $rowid=$this->input->post('rowid',true);
        $data = array(
        'rowid' =>$rowid,
        'qty'   => $qty
);

$this->cart->update($data);
redirect('cart/show_cart');
    }
    public function remove($rowid)
    {
        $this->cart->remove($rowid);
        redirect('cart/show_cart');
    }

    public function show_cart()
    {
        $data=array();
        $data['title']="Cart";
        $data['publish_categories']=  $this->Super_Admin_Model->select_all_published_category();
        $data['publish_manufacturer']=$this->Super_Admin_Model->select_all_published_manufacturer();
        $data['maincontent']=  $this->load->view('pages/shopping_cart',$data,true);
        $wish_count = $this->Wish_List_Model->select_wish_list_by_customer_id();
        $data['wish_count'] = $wish_count;
        $this->load->view('master',$data);
    }
    
}


