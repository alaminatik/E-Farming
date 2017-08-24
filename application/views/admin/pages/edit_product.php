<div class="row-fluid sortable">
    <div class="box span12">

        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>

        <?php
        $message = $this->session->userdata('message');
        if ($message) {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> 
                <?php
                echo $message;
                $this->session->unset_userdata('message');
                ?>
            </div>
        <?php } ?>

        <div class="box-content">
<!--            <form class="form-horizontal" action="<?php echo site_url('super_admin/update_product'); ?>" method="post">-->
            <form class="form-horizontal" action="<?php echo base_url(); ?>super_admin/update_product/<?php echo $product_byid->product_id; ?>"  method="POST" name="edit_product" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name </label>
                        <div class="controls">
<!--                            <input type="text" class="span6 typeahead" id="typeahead" name="product_name">-->
                            <input type="text" class="span6 typeahead" id="product_name"  name="product_name" value="<?php echo $product_byid->product_name; ?>" data-provide="typeahead" data-items="4" >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Name</label>
                        <div class="controls">
                            <select name="category_id">
                                <option disabled="true" selected="">Select Category Name</option>
                                <?php foreach ($all_published_category as $v_category) { ?>
                                    <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                <?php } ?>
                            </select>
<!--                            <textarea class="cleditor" id="textarea2" rows="3" name="manufacturer_description"></textarea>-->
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Manufacturer Name</label>
                        <div class="controls">
                            <select name="manufacturer_id">
                                <option disabled="true" selected="">Select Manufacturer Name</option>
                                <?php foreach ($all_published_manufacturer as $v_manufacturer) { ?>
                                    <option value="<?php echo $v_manufacturer->manufacturer_id; ?>"><?php echo $v_manufacturer->manufacturer_name; ?></option>
                                <?php } ?>
                            </select>
<!--                            <textarea class="cleditor" id="textarea2" rows="3" name="manufacturer_description"></textarea>-->
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Description</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" rows="3" name="product_description"><?php echo $product_byid->product_description; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="product_price"  name="product_price" value="<?php echo $product_byid->product_price; ?>" data-provide="typeahead" data-items="4" >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Stock</label>
                        <div class="controls">
                            <input type="number" class="span6 typeahead" id="product_stock"  name="product_stock" value="<?php echo $product_byid->product_stock;?>" data-provide="typeahead" data-items="4" >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Image</label>
                        <div class="controls">
                            <input type="file" name="product_image"> 
                            <h4 style="color:red;margin-left: 40px;">
                                <?php
                                $error = $this->session->userdata('error');
                                if ($error) {
                                    echo $error;
                                    $this->session->unset_userdata('error');
                                }
                                ?>
                            </h4>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Status</label>
                        <div class="controls">
                            <select name="product_status">
                                <option disabled="true" selected="">Select Product Status</option>
                                <option value="1">Featured</option>
                                <option value="0">Normal</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">update Product</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>
<script>
    document.forms['edit_product'].elements['publication_status'].value = '<?php echo $product_byid->publication_status; ?>';
    document.forms['edit_product'].elements['category_id'].value = '<?php echo $product_byid->category_id; ?>';
    document.forms['edit_product'].elements['manufacturer_id'].value = '<?php echo $product_byid->manufacturer_id; ?>';
    document.forms['edit_product'].elements['product_status'].value = '<?php echo $product_byid->product_status; ?>';

</script>
