<div id="content_holder">
    <div class="inner">
        <div class="breadcrumb"> <a href="index.html">Home</a> Â» Payment Information</div>
        <h2 class="heading-title"><span>Payment Information</span></h2>

        <!-- END OF RIGHT COLUMN -->

        <div id="content" class="content-column-right">
            <div class="content account-page">
                <div class="box-login">
                    <div class="box-content fixed">
                        <div class="stitched"></div>
                        

                        <form  action="<?php echo base_url(); ?>checkout/place_order" method="post" onsubmit="return validateStandard(this)">
                            <div class="right" style="margin-top: -20px; height:350px">
                                
                                <div>
                                    <table class="form" style="font-weight: bolder;">
                                        <tbody>
                                            
                                            <tr>
                                                <td><input type="radio" class="large-field" name="payment_type" value="cash_on_delivery" /></td>
                                                <td> Cash On Delivery</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" class="large-field" name="payment_type" value="pay_by_card" /></td>
                                                <td> Pay by Card</td>
                                            </tr>
                                             <tr>
                                                 <td>&nbsp;</td>
                                                <td>
                                                    <textarea rows="4" cols="30" name="order_comments" placeholder="Comments...."></textarea>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="submit" id="sbtn" name="submit" value="Place Order"/></td>
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
