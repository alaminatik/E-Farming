
<div class="row-fluid" >



    <div class="span4">
        <h3 style="text-decoration: underline;">Billing Info#</h3>
        <table class="form">
            <tbody>
                <tr>
                    <td><span class="required"></span> Name:</td>
                    <td><?php echo $billing_info->name; ?></td>
                </tr>

                <tr>
                    <td><span class="required"></span>Email Address:</td>
                    <td>
                        <?php echo $billing_info->email_address; ?>
                        <span id="res" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><span class="required"></span> Mobile Number:</td>
                    <td><?php echo $billing_info->mobile_number; ?></td>
                </tr>
                <tr>
                    <td><span class="required"></span> Address:</td>
                    <td><?php echo $billing_info->address; ?></td>
                </tr>
                <tr>
                    <td><span class="required"></span> City:</td>
                    <td><?php echo $billing_info->city; ?></td>
                </tr>

                <tr>
                    <td><span class="required"></span> Gender:</td>
                    <td><?php echo $billing_info->gender; ?></td>
                </tr>


            </tbody>
        </table>


    </div>







    <div class="span4">
        <h3 style="text-decoration: underline;">Shipping Info#</h3>
        <table class="form">
            <tbody>
                <tr>
                    <td><span class="required"></span> Name:</td>
                    <td><?php echo $shipping_info->name; ?></td>
                </tr>

                <tr>
                    <td><span class="required"></span>Email Address:</td>
                    <td>
                        <?php echo $shipping_info->email_address; ?>
                        <span id="res" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><span class="required"></span> Mobile Number:</td>
                    <td><?php echo $shipping_info->mobile_number; ?></td>
                </tr>
                <tr>
                    <td><span class="required"></span> Address:</td>
                    <td><?php echo $shipping_info->address; ?></td>
                </tr>
                <tr>
                    <td><span class="required"></span> City:</td>
                    <td><?php echo $shipping_info->city; ?></td>
                </tr>

                <tr>
                    <td><span class="required"></span> Country:</td>
                    <td><?php echo $shipping_info->country; ?></td>
                </tr>
                <tr>
                    <td><span class="required"></span> Zip Code:</td>
                    <td><?php echo $shipping_info->zip_code; ?></td>
                </tr>

            </tbody>
        </table>


    </div>

</div>

<br/>
<div class="row-fluid">
    <div class="span1"><strong>Order Info:</strong></div>
    <div class="span6">
        <table class="table table-condensed">
            <tr>
                <td>Order ID:</td>
                <td><?php echo $billing_info->order_id; ?></td>
                <td>Order Total:</td>
                <td><?php echo $billing_info->order_total; ?> tk</td>
                <td>Due Date:</td>
                <td><?php echo $billing_info->order_date; ?></td>
            </tr>

        </table> 
    </div>
</div>

<div class="row-fluid">
    <div class="span8">
        <table class="table table-condensed" border="1px">
            <tr>
                <td>Product Name</td>
                <td>Product Price</td>
                <td>Product Quantity</td>
                <td>Subtotal</td>

            </tr>

            <?php foreach ($order_details as $v_details) { ?>
                <tr>
                    <td><?php echo $v_details->product_name; ?></td>  
                    <td><?php echo $v_details->product_price; ?> tk</td>  
                    <td><?php echo $v_details->product_sales_quantity; ?></td>  
                    <td><?php echo $v_details->product_price * $v_details->product_sales_quantity; ?></td>  

                </tr>
            <?php } ?>
            <tr>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td><?php echo $billing_info->order_total; ?> tk&nbsp(including 7.5% VAT )</td>
            </tr>
        </table>
    </div>
</div>
<br/>
<br/>
<br/>
<div class="row-fluid">
    <div class="span1">
        <table class="form">
            <tr>
                <td><storng>Company Signature</storng></td>

            </tr>
        </table>
    </div>
</div>

