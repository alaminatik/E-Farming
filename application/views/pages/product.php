<!-- CONTENT -->
<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome">Home</a> » <a href="<?php echo base_url(); ?>welcome/category/<?php echo $product_byid->category_id; ?>"><?php echo $product_byid->category_name; ?></a> » <?php echo $product_byid->product_name; ?></div>
        <h2 class="heading-title"><span><?php echo $product_byid->product_name; ?></span></h2>

        <!-- PRODUCT INFO -->
        <div class="product-info fixed">
            <div class="left">
                <div class="image"> 
                    <a href="<?php echo base_url() . $product_byid->product_image; ?>" class="cloud-zoom" id="zoom1" rel="adjustX: 5, adjustY:0, zoomWidth:300, zoomHeight:400, showTitle: false"> <img src="<?php echo base_url() . $product_byid->product_image; ?>" style="height:400px;width:400px" alt='' title="Pizza Delicioso" /></a> 
                    <span class="pricetag"><?php echo $product_byid->product_price; ?></span> 
                </div>
                <div class="image-additional">
                    <div class="image_car_holder">
                        <ul class="jcarousel-skin-opencart">
                            <li>
                                <a href='<?php echo base_url(); ?>image/bigimage00.jpg' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url(); ?>image/smallimage.jpg' "> <img src="<?php echo base_url(); ?>image/tiny1.jpg" alt = "Thumbnail 1"/> </a>
                            </li>

                        </ul>
                    </div>
                    <script type="text/javascript"><!--
              $('.image-additional ul').jcarousel({
                            vertical: false,
                            visible: 4,
                            scroll: 1
                        });
                        //--></script> 
                </div>
            </div>
            <div class="right">
                <div class="description"> <span>Manufacturer Name:</span> <a href="#"><?php echo $product_byid->manufacturer_name; ?></a><br/>
                    <span>Product Code:</span> Product 15<br/>
                    <!--<span>Reward Points:</span> 100<br/>-->
                    <span>Availability:</span> In Stock 

                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style "><script type="text/javascript">
                        //<![CDATA[
                        document.write('<a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>');
                        //]]>
                        </script> 
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e7280075406aa87"></script> 
                    <!-- AddThis Button END -->

<!--                    <div class="reviews"> <img alt="3 reviews" src="<?php echo base_url(); ?>image/stars-5.png"/>
                        <p>Based on <a href="#" title="Read reviews">3 reviews</a></p>
                    </div>-->
                </div>
                <div class="options">
                    <div class="option" id="option-217"><b><span class="required">*</span> Select Size:</b>
                        <select name="option[217]">
                            <option value=""> --- Please Select --- </option>
                            <option value="4">Small (+$4.70) </option>
                            <option value="3">Middle (+$3.53) </option>
                            <option value="1">Large (+$1.18) </option>
                        </select>
                    </div>

                </div>
                <div class="cart"> 
                    <span class="label">Qty:</span>
                    <form action="<?php echo base_url(); ?>Cart/add_to_cart" method="post">
                        <input type="text" value="1" size="2" name="qty" id="qty"/>
                        <input type="hidden" value="<?php echo $product_byid->product_id; ?>" name="product_id">
                        <input type="submit" name="btn" value="Add to Cart">
                    </form>
                    <?php
                    $customer_id = $this->session->userdata('id');
                    if ($customer_id != NULL) {
                        ?>
                        <form action="<?php echo base_url(); ?>Wish_List/save_wish_list" method="POST">

                            <input type="hidden" value="<?php echo $product_byid->product_id; ?>" name="product_id">
                            <input type="submit" name="btn"  class="" value="Add to Wish List">
                        </form>
                    <?php } ?> 
                    <a href="#" class="compare_button" title="Add to Compare">Add to Compare</a> 
                </div>
                <div class="tags"> <span class="label">Tags:</span> <a href="#">Sapling</a> <a href="#">Seeds</a> <a href="#">Vegetable</a> <a href="#">Instrument</a> <a href="#">Rice</a> <a href="#">Tools</a> </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- END OF PRODUCT INFO -->

        <div id="content">
            <div class="box">
                <h2 class="heading-title"><span>Description</span></h2>
                <div class="box-content">
                    <p><?php echo $product_byid->product_description; ?></p>
<!--                    <p>Web service of  Farmer Product can give farmer greater profitability for their product and selling product easily.  For this service farmers are registered on this site.  Customer and dealer  are also helpful by using this website. Customer can buy necessary product from website. The dealer can buy the product from the website with cheap price. For this service customer and dealer are also registered on this site. In the website number of product posted in different categories and  manufacturer that can buy anyone who are registered on this site.</p>-->
                </div>
            </div>
            <div class="box">
                <h2 class="heading-title"><span>Reviews </span></h2>
                <div class="box-content box-rating"> 
                    <div class="box-comments">
                        <div class="content"> <span>Alamin Mia | 05/07/2017</span> <img src="<?php echo base_url(); ?>image/stars-5.png" alt="3 reviews"/>
                            <p>In this website number of product posted in different categories and  manufacturer that can buy anyone who are registered on this site.</p>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="cat_list">
                <h2 class="heading-title"><span>Related Products</span></h2>
                <?php
                foreach ($related_products as $r_product) {
                    if ($r_product->product_id != $product_byid->product_id) {
                        ?>
                        <div class="prod_hold"> 
                            <a class="wrap_link" href="<?php echo base_url(); ?>welcome/product/<?php echo $r_product->product_id; ?>">
                                <span class="image"><img src="<?php echo base_url() . $r_product->product_image; ?>" alt="Product Image" style="height: 180px; width: 180px;" /></span>
                            </a>
                            <div class="pricetag_small"> 
        <!--                            <span class="old_price">$ 19 999,99</span> -->
                                <span class="new_price">BDT <?php echo $r_product->product_price; ?></span> 
                            </div>
                            <div class="info">
                                <h3><?php echo $r_product->product_name; ?></h3>
                                <p><?php echo $r_product->product_description; ?></p>
                                <a class="add_to_cart_small" href="#">Add to cart</a> <a class="wishlist_small" href="#">Wishlist</a> <a class="compare_small" href="#">Compare</a> </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!-- END OF CONTENT --> 