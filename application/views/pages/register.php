<script type="text/javascript">
<!--
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert(xmlhttp);
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
        // alert(e);

//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
            // alert(E);
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
//alert(typeof XMLHttpRequest);
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }
    function makerequest(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = '<?php echo base_url(); ?>checkout/ajax_email_check/' + given_text;


        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                if (xmlhttp.responseText == 'Alredy Exists!')
                {
                    document.getElementById('sbtn').disabled = true;
                }
                else if (xmlhttp.responseText == 'Email Address Required') {
                    document.getElementById('sbtn').disabled = true;
                }
                else if (xmlhttp.responseText == 'Available')
                {
                    document.getElementById('sbtn').disabled = false;
                }

            }
        }
        xmlhttp.send(null);
    }

//-->
</script>


<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> <a href="<?php echo base_url(); ?>welcome">Home</a> » registration </div>
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

        <div id="content"> 

            <!-- ACCORDION -->
            <form class="form-horizontal" action="<?php echo base_url(); ?>welcome/store_user" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
                <div id="" class="checkout">
                    <h2>Registration Form</h2>
                    <div>
                        <table class="form">
                            <tbody>
                                <tr>
                                    <td><span class="required">*</span> Name:</td>
                                    <td><input type="text" class="large-field" value="" required regexp="JSVAL_RX_ALPHA" name="name"/></td>
                                </tr>
                                <tr>
                                    <td><span class="required">*</span> Email Address:</td>
                                    <td>
                                        <input type="text" class="large-field" value="" required regexp="JSVAL_RX_EMAIL" name="email_address" onblur="makerequest(this.value, 'res')"/>
                                        <span id="res" style="color: red"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Mobile Number:</td>
                                    <td><input type="text" class="large-field" value="" required name="mobile_number"/></td>
<!--                                    <td><input type='tel' pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)'></td>-->
                                </tr>
                                <tr>
                                    <td><span class="required">*</span> Date of Birth:</td>
                                    <td><input type="date" class="large-field" value="" name="dob"/></td>
                                </tr>
                                <tr class="control-group hidden-phone">
                                    <td class="control-label" for="textarea2">Profile Image:</td>
                                    <td class="controls"><input type="file" class="large-field" name="profile_image"/>
                                        <h4 style="color:red;margin-left: 20px;">
                                            <?php
                                            $error = $this->session->userdata('error');
                                            if ($error) {
                                                echo $error;
                                                $this->session->unset_userdata('error');
                                            }
                                            ?>
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="required">*</span> City:</td>
                                    <td><input type="text" class="large-field" value="" required name="city"/></td>
                                </tr>
                                <tr>
                                    <td><span class="required">*</span> Password:</td>
                                    <td><input type="password" class="large-field" value="" required name="password"/></td>
                                </tr>
                                <tr>
                                    <td><span class="required">*</span> Address:</td>


                                    <td><input type="text" class="large-field" value="" required name="address"/></td>

                                </tr>
                                <tr>
                                    <td><span class="required">*</span>Registration Type:</td>
                                    <td>
                                        <select class="large-field" name="registration_type">
                                            <option disabled="true" selected=""> --- Register As --- </option>
                                            <option value="1">Farmer</option>
                                            <option value="2">Customer</option>
                                            <option value="3">Dealer</option>


                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><input type="radio" checked="checked" id="flat.flat" value="male" required name="gender"/></td>
                                    <td><label for="flat.flat">Male</label></td>
                                    <td style="text-align: right;"><label for="flat.flat"></label></td>
                                </tr>
                                <tr>
                                    <td style="width: 1px;"><input type="radio" checked="checked" id="dhl" value="female" required name="gender"/></td>
                                    <td><label for="dhl">Female</label></td>
                                    <td style="text-align: right;"><label for="flat.flat"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br/>
                    <br/>
                    <div class="buttons">
                        <div class="left"><a class="button" id="sbtn"><button type="submit">Register</button></a></div>
                    </div>
                </div>
            </form>
            <!-- END OF ACCORDION --> 

        </div>
    </div>
</div>