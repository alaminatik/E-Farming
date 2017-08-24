<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome">Home</a> » About Us </div>
        <h2 class="heading-title"><span>About Farming Assistant</span></h2>

        <!-- LEFT COLUMN -->
        <div id="column-left">
            <div class="box">
                <h3 class="heading-title"><span>Information</span></h3>
                <div class="box-content box-category">
                    <ul>
                        <li><a class="active" href="<?php echo base_url(); ?>welcome/about">About Us</a></li>
<!--                        <li><a href="#">Discount Offer</a></li>-->
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="<?php echo base_url(); ?>welcome/contact">Contact Us</a></li>
                        <li><a href="#">SMS Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="box">
                <h3 class="heading-title"><span>Categories</span></h3>
                <div class="box-content box-category">
                    <ul>
                        <?php foreach ($publish_categories as $p_category) { ?>
                            <li><a href="<?php echo base_url(); ?>welcome/category/<?php echo $p_category->category_id; ?>"><?php echo $p_category->category_name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END OF LEFT COLUMN -->

        <div id="content" class="content-column-left">
            <div class="content info-page">
                <p style="color: violet"><font size="2">Web service of  Farmer Product can give farmer greater profitability for their product and selling product easily.  For this service farmers are registered on this site.  Customer and dealer  are also helpful by using this website. Customer can buy necessary product from website. The dealer can buy the product from the website with cheap price. For this service customer and dealer are also registered on this site. In the website number of product posted in different categories and  manufacturer that can buy anyone who are registered on this site.</font></p>
                
                <h4>Our Service</h4>
                <p style="color: violet" ><font size="2.5">We provide farmer product online marketing such as:</font></p>
                
                <ul style="color: violet">
                    <font size="2.5">
                    <li>Product Buy</li>
                    <li>Product Sell</li>
                    <li>Online Payment</li>
                    <li>Cash payment</li>
                    <li>Discount Offer</li>
                    <li>SMS Service</li>
                    </font>
                </ul>
                <h5>Other Service</h5>
                <ul style="color: violet">
                    <li>Delivery Product</li>
                    <li>Privacy policy</li>
                    <li>Terms and conditions</li>
                    <li>Courier Product</li>
                    <li>Direct Collect</li>
                </ul>
                
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>