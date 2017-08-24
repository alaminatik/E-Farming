<div id="content_holder">
    <div class="inner">
        <div class="breadcrumb"> <a href="index.html">Home</a> » Product Comparison</div>
        <h2 class="heading-title"><span>Product Comparison</span></h2>
        <div id="content">
            <table class="compare-info">
                <thead>
                    <tr>
                        <td colspan="4">Product Details</td>
                    </tr>
                </thead>
                <?php foreach ($published_product as $c_product) { ?>
                    <tbody>

                        <tr>
                            <td>Product Name</td>

                            <td class="name"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $c_product->product_id; ?>"><?php echo $c_product->product_name; ?></a></td>

                        </tr>
                        <tr class="even">
                            <td>Image</td>
                            <td class="image"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $c_product->product_id; ?>"><img src="<?php echo base_url() . $c_product->product_image; ?>" alt="Product image" style="height: 180px; width: 180px;" /></a></td>

                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>BDT <?php echo $c_product->product_price; ?></td>

                        </tr>

<!--                        <tr class="even">
                            <td>Availability</td>
                            <td>In Stock</td>
                            <td>In Stock</td>
                            <td>In Stock</td>
                        </tr>-->



                    </tbody>
                <?php } ?>




<!--                <tbody>
                    <tr>
                        <td></td>
                        <td><a class="button" href="#"><span>Add to Cart</span></a></td>
                        <td><a class="button" href="#"><span>Add to Cart</span></a></td>
                        <td><a class="button" href="#"><span>Add to Cart</span></a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" value="43" name="remove"/>
                            <a href="#"><span>Remove</span></a></td>
                        <td><input type="hidden" value="44" name="remove"/>
                            <a href="#"><span>Remove</span></a></td>
                        <td><input type="hidden" value="46" name="remove"/>
                            <a href="#"><span>Remove</span></a></td>
                    </tr>
                </tbody>-->
            </table>
        </div>
    </div>
</div>