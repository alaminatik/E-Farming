<div id="content_holder" class="fixed">
    <div class="inner">
        <div id="content">
            <div class="box featured-box">
                <h2 class="heading-title"><span>Featured Products</span></h2>
                <div class="box-content">
                    <ul id="myRoundabout">
                        <?php foreach ($featured_product as $f_product) { ?>
                            <li>
                                <div class="prod_holder"> <a href="<?php echo base_url(); ?>welcome/product/<?php echo $f_product->product_id;?>"> <img src="<?php echo base_url() . $f_product->product_image; ?>" alt="Product Image" /> </a>
                                    <h3><?php echo $f_product->product_name; ?></h3>
                                </div>
                                <span class="pricetag">&nbsp;<?php echo $f_product->product_price; ?></span> </li>
                        <?php } ?>
                    </ul>
                    <a href="#" class="previous_round">Previous</a> <a href="#" class="next_round">Next</a> </div>
            </div>
            <div class="box">
                <h2 class="heading-title"><span>Welcome to Farming Assistant</span></h2>
                <div class="box-content">
                    <p style="color: orchid">Web service of  Farmer Product can give farmer greater profitability for their product and selling product easily.  For this service farmers are registered on this site.  Customer and dealer  are also helpful by using this website. Customer can buy necessary product from website. The dealer can buy the product from the website with cheap price. For this service customer and dealer are also registered on this site. In the website number of product posted in different categories and  manufacturer that can buy anyone who are registered on this site.</p>
                </div>
            </div>
            <div class="box">
                <div class="banner">
                    <div><a href="#"><img src="<?php echo base_url(); ?>image/banner1.jpg" alt="Spicylicious store" /></a></div>
                    <div><a href="#"><img src="<?php echo base_url(); ?>image/banner2.jpg" alt="Spicylicious store" /></a></div>
                </div>
            </div>
            <div class="box">
                <h2 class="heading-title"><span>Latest Products</span></h2>
                <div class="box-content">
                    <div class="box-product fixed">
                        <?php foreach ($latest_product as $l_product) { ?>
                            <div class="prod_hold"> 
                                <a class="wrap_link" href="<?php echo base_url(); ?>welcome/product/<?php echo $l_product->product_id;?>"> 
                                    <span class="image"><img src="<?php echo base_url() . $l_product->product_image; ?>" alt="Product Image" style="height: 180px; width: 180px;" /></span> 
                                </a>
                                <div class="pricetag_small"> 
    <!--                                <span class="old_price">$ 19 999,99</span> -->
                                    <span class="new_price"><?php echo $l_product->product_price; ?></span> 
                                </div>
                                <div class="info">
                                    <h3><?php echo $l_product->product_name; ?></h3>
                                    <p> <?php echo $l_product->product_description; ?></p>
                                    <a class="add_to_cart_small" href="#">Add to cart</a> <a class="wishlist_small" href="#">Wishlist</a> <a class="compare_small" href="#">Compare</a> 
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>