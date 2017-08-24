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
        serverPage = '<?php echo base_url(); ?>checkout/ajax_email_check/'+ given_text;
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
                if (xmlhttp.responseText == 'Alredy Exists !')
                {
                    document.getElementById('sbtn').disabled = true;
                }
                if (xmlhttp.responseText == 'Email Address Required')
                {
                    document.getElementById('sbtn').disabled = true;
                }
                if (xmlhttp.responseText == 'Avilable')
                {
                    document.getElementById('sbtn').disabled = false;
                }
            }
        }
        xmlhttp.send(null);
    }

//-->
</script>
<div id="content_holder">
    <div class="inner">
        <div class="breadcrumb"> <a href="index.html">Home</a> » Shipping Information</div>
        <h2 class="heading-title"><span>Shipping Information</span></h2>

        <!-- END OF RIGHT COLUMN -->

        <div id="content" class="content-column-right">
            <div class="content account-page">
                <div class="box-login">
                    <div class="box-content fixed">
                        <div class="stitched"></div>
                        <div class="left">
                            <!--                <h3>Login</h3>
                                            <h4 style="color: red;">
                            <?php
                            $ex_message = $this->session->userdata('ex_message');
                            if ($ex_message) {
                                echo $ex_message;
                                $this->session->unset_userdata('ex_message');
                            }
                            ?>
                                            </h4>-->
                            <!--                <form action="" method="post">
                                            <span class="label">E-mail Address:</span>
                                            <input type="email" value="" name="email_address"/>
                                            <br/>
                                            <br/>
                                            <span class="label">Password:</span>
                                            <input type="password" value="" name="password"/>
                                            <a href="#" class="forgotten">Forgotten Password?</a> 
                                            <button type="submit" class="button" id="button-login"><span>Login</span></button> 
                                            </form>-->
                        </div>

                        <form  action="<?php echo base_url(); ?>checkout/save_shipping" method="post" onsubmit="return validateStandard(this)" >
                            <div class="right" style="margin-top: -20px; height:350px">

                                <div>
                                    <table class="form">
                                        <tbody>
                                            <tr>
                                                <td><span class="required">*</span> Name:</td>
                                                <td><input type="text" class="large-field" value="" required regexp="JSVAL_RX_ALPHA" maxlength="100" name="name"/></td>
                                            </tr>

                                            <tr>
                                                <td><span class="required">*</span>Email Address:</td>
                                                <td>
                                                    <input type="text" class="large-field" value="" required regexp="JSVAL_RX_EMAIL" maxlength="256" name="email_address" onblur="makerequest(this.value, 'res')" />
                                                    <span id="res" style="color: red"></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="required">*</span> Mobile Number:</td>
                                                <td><input type="text" class="large-field" value="" name="mobile_number"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="required">*</span> Address:</td>
                                                <td><input type="text" class="large-field" value="" name="address"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="required">*</span> City:</td>
                                                <td><input type="text" class="large-field" value="" name="city"/></td>
                                            </tr>

                                            <tr>
                                                <td><span class="required">*</span> Country:</td>
                                                <td><select class="large-field" required exclude=" " name="country">
                                                        <option value=" "> --- Please Select --- </option>
                                                        <script type="text/javascript">
                                                            printCountryOptions();
                                                        </script>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><span class="required">*</span> Zip Code:</td>
                                                <td><input type="text" class="large-field" value="" name="zip_code"/></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="submit" id="sbtn" name="submit" value="Save Shipping"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <div class="stitched"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>


