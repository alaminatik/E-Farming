

<!-- CONTENT -->
<div id="content_holder">
    <div class="inner">
        <div class="breadcrumb"><a href="<?php echo base_url(); ?>welcome">Home</a> » <a href="<?php echo base_url(); ?>welcome/my_account">Account</a> » Wish List</div>
        <h2 class="heading-title"><span>My Wish List</span></h2>

        <!-- RIGHT COLUMN -->
        <div id="column-right">
            <div class="box">
                <h3 class="heading-title"><span>My Account</span></h3>
                <div class="box-content box-account">
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Forgotten Password</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a class="active" href="#">Wish List</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Downloads</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Transactions</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END OF RIGHT COLUMN -->

        <div id="content" class="content-column-right">
            <div class="wishlist-product">

                <h4 style="color: #ccccff">
                    <?php
                    $message = $this->session->userdata('message');
                    if ($message) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    }
                    ?>
                </h4>
                <table>
                    <thead>
                        <tr>

                            <td class="image">Image</td>
                            <td class="name">Product Name</td>

                            <td class="price">Unit Price</td>
                            <td class="remove">Remove</td>
                            <td class="cart">Buy Now</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product_info as $v_product) { ?>
                            <tr>
                                

                                <td class="image"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $v_product->product_id; ?>"><img alt="product image" src="<?php echo base_url() . $v_product->product_image; ?>" height="100" width="100" /></a></td>
                                <td class="name"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $v_product->product_id; ?>"><?php echo $v_product->product_name; ?></a></td>
                                <td class="price"><div class="price"> <?php echo $v_product->product_price; ?> tk </div></td>
                                <td><a href="<?php echo base_url(); ?>Wish_List/remove_wish_list/<?php echo $v_product->wish_list_id; ?>">Remove</a></td>

                                <td class="cart">
                                    <form action="<?php echo base_url(); ?>cart/add_to_cart" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $v_product->product_id;?>">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="submit" name="btn" value="ADD TO CART">
                                    </form>
                                </td>

                            </tr>
                        <?php
                        }
                       
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                <div class="left"><a class="button" href="http://metagraphics.eu/cartmania1_5/index.php?route=account/account"><span>Back</span></a></div>
                <div class="right"><a class="button" onclick="$('#wishlist').submit();"><span>Update</span></a></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<!-- END OF CONTENT --> 

