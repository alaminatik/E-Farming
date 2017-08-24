<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome">Home</a> » Account Login </div>
        <h2 class="heading-title"><span>Account Login</span></h2>

        <!-- LEFT COLUMN -->

        <!-- END OF LEFT COLUMN -->
        
        <h3 style="color:red">
            <?php
            $exception = $this->session->userdata('exception');
            if ($exception) {
                echo $exception;
                $this->session->unset_userdata('exception');
            }
            ?>
        </h3>

        <div id="content" class="content-column-left">
            <form class="form-horizontal" action="<?php echo base_url(); ?>welcome/login" method="post" enctype="multipart/form-data">
                <div class="content contacts-page">
                    <div class="box-contacts fixed">
                        <div class="box-content">
                            <div class="stitched"></div>
                            <div class="form"> 
                                <span class="label">E-mail Address:</span>
                                <input type="text" name="email_address" required placeholder="type username or email"/>
                                <br/>
                                <br/>
                                <span class="label">Password</span>
                                <input name="password" id="password" required type="password" placeholder="type password"/>
                                <br/>
                                <br/>
<!--                                <a href="<?php echo base_url();?>checkout/forget_password">Forget Password</a>-->
                                <br/>
                                <br/>
                                <span class="label">Login As</span>
                                <select id="selectError3" class="input-large span10" required name="registration_type">
                                    <option disabled="true" selected="">Login As</option>
                                    <option value="1">Farmer</option>
                                    <option value="2">Customer</option>
                                    <option value="3">Deller</option>
                                </select>

                            </div>
                            <div class="stitched"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="buttons" >
                        <div class="left" ><input type="submit" value="Login" class="button" id="button-contact" ></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
