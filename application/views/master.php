<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/stylesheet.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheet/jquery-ui-1.8.9.custom.css" />
        <!-- jQuery and Custom scripts -->
        <script src="<?php echo base_url(); ?>js/country.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jsval.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.cycle.lite.1.0.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url(); ?>js/custom_scripts.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.roundabout.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.9.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/tabs.js"></script>
        <!-- for cart_ -->
        <script src="<?php echo base_url(); ?>js/cloud-zoom.1.0.2.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/carousel.css" type="text/css" media="screen" />
        <script src="<?php echo base_url(); ?>js/jquery.jcarousel.min.js" type="text/javascript"></script>
        <!-- Tipsy -->
        <script src="<?php echo base_url(); ?>js/tipsy/jquery.tipsy.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>js/tipsy/css.tipsy.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>js/jquery.tweet.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>js/jquery.tweet.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- MAIN WRAPPER -->
        <div id="container"> 

            <!-- SIDEFEATURES -->
            
            <!-- END OF SIDEFEATURES --> 

            <!-- HEADER -->
            <div id="header">
                <div class="inner">
                    <ul class="main_menu menu_left">
                        <li><a href="<?php echo base_url(); ?>welcome/my_account">My Account</a></li>
                        <?php
                        $customer_id = $this->session->userdata('id');
                        if ($customer_id) {
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>welcome/wish_list">Wish List <b>(<?php echo $wish_count; ?>)</b></a>
                            </li>

                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>welcome/about">About Us</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>welcome/index">Home</a>
<!--                            <ul class="secondary">
                                <li><a href="index2.html">Home with LI SLIDER</a></li>
                                <li><a href="#">Test</a></li>
                                <li><a href="#">ABC</a></li>
                                <li><a href="#">DEF</a></li>
                                <li><a href="#">GHI</a></li>
                            </ul>-->
                        </li>
                    </ul>
                    <div id="logo"><a href="<?php echo base_url(); ?>welcome/index"><img src="<?php echo base_url(); ?>image/logo.png" width="200" height="141" alt="farming logo" /></a></div>
                    <ul class="main_menu menu_right">
<!--                        <li><a href="<?php echo base_url(); ?>welcome/compare">Compare</a></li>-->
                        <li><a href="<?php echo base_url(); ?>cart/show_cart">Shopping Cart(<?php echo $this->cart->total_items() ?>)</a></li>
                        <!--                        -->
                        <?php
                        $customer_id = $this->session->userdata('id');
                        $shipping_id = $this->session->userdata('shipping_id');
                        if ($customer_id != NULL && $shipping_id != NULL) {
                            ?>
                            <li><a href="<?php echo base_url(); ?>Checkout/payment_order">Checkout</a></li>
                            <?php
                        } else if ($customer_id != NULL) {
                            ?>
                            <li><a href="<?php echo base_url(); ?>Checkout/shipping_address">Checkout</a></li>

                        <?php } else { ?>

                            <li><a href="<?php echo base_url(); ?>Welcome/register">Checkout</a></li>

                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>welcome/contact">Contact Us</a></li>
                    </ul>


                    <?php if ($this->session->userdata('id')) { ?>
                        <div id = "welcome">
                            <ul class="main_menu menu_left">
                                <li class="warning">
                                    <a href="#" class="current" style="color: fuchsia">
                                        <?php echo $this->session->userdata('name'); ?>

                                    </a>
                                    <ul  class="secondary">
                                        <li>
                                            <a href="#">Account Settings</a> 
                                        </li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="<?php echo base_url(); ?>welcome/logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div id = "welcome">
<!--                            <h6>Welcome visitor you can</h6> -->
                            <a href = "<?php echo base_url(); ?>welcome/login_form"><h5>Login</h5></a><a href = "<?php echo base_url(); ?>welcome/register">Register</a>
                        </div>
                    <?php } ?>

                    <div class="menu">
                        <ul id="topnav">
                            <?php foreach ($publish_categories as $p_category) { ?>
                            <li><a style="font-size: 14px; color: #009999;" href="<?php echo base_url(); ?>welcome/category/<?php echo $p_category->category_id; ?>"><?php echo $p_category->category_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <h3 style="color:green" align="center">
                        <?php
                        $message = $this->session->userdata('message');
                        if ($message) {
                            echo $message;
                            $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                </div>
            </div>
            <!-- END OF HEADER --> 

            <!-- CONTENT -->
            <?php echo $maincontent; ?>

            <!-- END OF CONTENT --> 

            <!-- PRE-FOOTER -->
            <div id="pre_footer">
                <div class="inner">

                </div>
            </div>
            <!-- END OF PRE-FOOTER --> 

            <!-- FOOTER -->
            <div id="footer">
                <div class="inner">
                    <div class="column_big"> 
                        <!-- FOOTER MODULES AREA -->
                        <div class="footer_modules">
                            <h3>About Farming web service</h3>
                            <p>Web service of  Farmer Product can give farmer greater profitability for their product and selling product easily.  For this service farmers are registered on this site.  Customer and dealer  are also helpful by using this website. Customer can buy necessary product from website. The dealer can buy the product from the website with cheap price. For this service customer and dealer are also registered on this site.</p>
                        </div>
                        <!-- END OF FOOTER MODULES AREA -->
                        <div class="footer_social">
                            <h3>Spread the word</h3>
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style "><script type="text/javascript">
                                //<![CDATA[
                                document.write('<a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>');
                                //]]>
                                </script> 
                            </div>
                            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e7280075406aa87"></script> 
                            <!-- AddThis Button END --> 
                        </div>
                    </div>
                    <div class="column_small">
                        <h3>Customer Service</h3>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>welcome">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/my_account">My Account</a></li>
                            <li><a href="#">Order History</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome">Returns</a></li>
                        </ul>
                    </div>
                    <div class="column_small">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>welcome/about">About Us</a></li>
<!--                            <li><a href="#">Discount Offer</a></li>-->
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/contact">Contact Us</a></li>
                            <li><a href="#">SMS Service</a></li>
                        </ul>
                    </div>
                    <div class="column_small">
                        <h3>Extras</h3>
                        <ul>
                            <?php foreach ($publish_manufacturer as $p_manufacturer) { ?>
                                <li><a href="#"><?php echo $p_manufacturer->manufacturer_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <span class="copyright">Developed by <a href="https://www.facebook.com/alaminmia4">Alamin Mia</a></span> </div>
            </div>
            <!-- END OF FOOTER --> 

        </div>
        <!-- END OF MAIN WRAPPER --> 
        <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script> 
        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/d_koev.json?callback=twitterCallback2&amp;count=3"></script> 
        <script type="text/javascript"><!--
        $(document).ready(function () {
                $('#twitter_update_list').cycle({
                    fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                    next: '#tweet_next',
                    prev: '#tweet_prev'
                });
            });
            //--></script> 
        <script type="text/javascript">
            $(document).ready(function () {
                var interval;
                $('ul#myRoundabout')
                        .roundabout({
                            'btnNext': '.next_round',
                            'btnPrev': '.previous_round'
                        }
                        )
                        .hover(
                                function () {

                                    clearInterval(interval);
                                },
                                function () {

                                    interval = startAutoPlay();
                                });

                interval = startAutoPlay();
            });
            function startAutoPlay() {
                return setInterval(function () {
                    $('ul#myRoundabout').roundabout_animateToPreviousChild();
                }, 3000);
            }
        </script>
    </body>
</html>
