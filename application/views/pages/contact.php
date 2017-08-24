<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome/index">Home</a> » Contact Us </div>
        <h2 class="heading-title"><span>Contact Us</span></h2>

        <!-- LEFT COLUMN -->
        <div id="column-left">
            <div class="box">
                <h3 class="heading-title"><span>Our Location</span></h3>
                <div class="box-content box-contact-details">
                    <ul>
                        <li class="address"> <span>Address:</span><br />
                            Farming Web Service<br />
                            Jahurul Islam City, Aftabnagar
                            Dhaka-1212, Bangladesh</li>
                        <li class="phone"> <span>Telephone:</span><br />
                            +0292 123 45 67</li>
                        <li class="fax"> <span>Fax:</span><br />
                            +359 2 123 45 67</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END OF LEFT COLUMN -->
        <?php
        $message = $this->session->userdata('message');
        if ($message) {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong style="color: green">Well done!</strong> 
                <?php
                echo $message;
                $this->session->unset_userdata('message');
                ?>
            </div>
        <?php } ?>

        <div id="content" class="content-column-left">
            <form class="form-horizontal" action="<?php echo base_url(); ?>welcome/store_contact" method="post" enctype="multipart/form-data">
                <div class="content contacts-page">

                    <div class="box-contacts fixed">
                        <div class="box-content">
                            <div class="stitched"></div>
                            <div class="form"> <span class="label">Your Name:</span>
                                <input type="text" value="" required name="contact_name"/>
                                <br/>
                                <br/>
                                <span class="label">E-mail Address:</span>
                                <input type="text" value="" required name="email_address"/>
                                <br/>
                                <br/>
                                <span class="label">Enquiry:</span>                 
                                <textarea type="text" value="" required style="width: 98%;" rows="10" cols="40" name="enquiry">
                                
                                </textarea>
                                <br/>
                                <br/>
<!--                                <span class="label">Enter the code in the box below:</span>
                                <input type="text" value="" required name="captcha"/>
                                <br/>
                                <img id="captcha" alt="" src="<?php echo base_url(); ?>image/captcha.jpg"/> <br/>-->
                            </div>
                            <div class="stitched"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="buttons">
                        <div class="left"><a class="button" id="button-contact"><button type="submit">Submit</button></a></div>
                    </div>


                </div>
            </form>

        </div>
        <div class="clear"></div>
    </div>
</div>
