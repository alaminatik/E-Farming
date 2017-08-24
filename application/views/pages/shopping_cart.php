
<?php
$contents = $this->cart->contents();
//echo '<pre>';
//print_r($contents);
?>
<!-- CONTENT -->
<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome">Home</a> » <a href="<?php echo base_url(); ?>welcome/my_account">Account</a> » Shopping Cart</div>
        <h2 class="heading-title"><span>Shopping Cart </span></h2>
        <div id="content">
            <div class="cart-info">
                <table>
                    <thead>
                        <tr>

                            <td class="image">Image</td>
                            <td class="name">Product Name</td>

                            <td class="quantity">Quantity</td>
                            <td class="price">Unit Price</td>
                            <td class="total">Sub Total</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
//                        echo '<pre>';
//                        print_r($contents);
//                        exit();
                        foreach ($contents as $v_contents) {
                            ?>
                            <tr>

                                <td class="image"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $v_contents['id']; ?>"><img src="<?php echo base_url() . $v_contents['image']; ?>" width="50" height="50" alt="<?php echo $v_contents['name'] ?>" /></a></td>
                                <td class="name"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $v_contents['id']; ?>"><?php echo $v_contents['name'] ?></a> <span class="stock"></span>
                                    <div> </div></td>

                                <td class="quantity">
                                    <form action="<?php echo base_url(); ?>cart/update_cart" method="post" >
                                        <input type="text" size="3" value="<?php echo $v_contents['qty'] ?>" name="qty"/>
                                        <input type="hidden" size="3" value="<?php echo $v_contents['rowid'] ?>" name="rowid"/>
                                        <input style="font-size: 12px" type="submit" name="btn" value="Update">
                                    </form>
                                    <a href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid'] ?>">Remove</a>
                                </td>
                                <td class="price">BDT <?php echo $v_contents['price'] ?></td>
                                <td class="total">BDT <?php echo $v_contents['subtotal'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-total">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td class="right"><b>Total:</b></td>
                            <td class="right numbers">BDT <?php echo $this->cart->total(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="right"><b>VAT 7.5%:</b></td>
                            <td class="right numbers">
                                <?php
                                $vat = (7.5 * $this->cart->total()) / 100;
                                echo 'BDT ' . $vat;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="right numbers_total"><b>Grand Total:</b></td>
                            <td class="right numbers_total">BDT &nbsp;
                                <?php
                                $g_total=$this->cart->total() + $vat;
                                $sdata=array();
                                $sdata['g_total']=$g_total;
                                $this->session->set_userdata($sdata);
                                echo $g_total;
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                
                <?php
                $user_id = $this->session->userdata('id');
                $shipping_id = $this->session->userdata('shipping_id');
                if ($user_id != NULL && $shipping_id != NULL) {
                    ?>   
                    <div class="right"><a class="button" href="<?php echo base_url(); ?>checkout/payment_order"><span>Checkout</span></a></div>
                    <?php
                } 
                else if ($user_id != NULL) 
                    {
                    ?>
                    <div class="right"><a class="button" href="<?php echo base_url(); ?>checkout/shipping_address" onclick="return check_total_cart('<?php echo $this->cart->total_items() ?>')"><span>Checkout</span></a></div>
                <?php } else { ?>
                    <div class="right"><a class="button" href="<?php echo base_url(); ?>welcome/register" onclick="return check_total_cart('<?php echo $this->cart->total_items() ?>')"><span>Checkout</span></a></div>
                <?php } ?>

                <div class="center"><a class="button" href="<?php echo base_url(); ?>welcome"><span>Continue Shopping</span></a></div>
            </div>
        </div>
    </div>
</div>
<!-- END OF CONTENT --> 
<script>
    function check_total_cart(cart_count){
        if(cart_count>0){
            //alert('yes');
            return true;
        }else{
            alert('You have not selected any item in cart list.');
            return false;
            
        }
        //alert(cart_count);
    }
</script>
