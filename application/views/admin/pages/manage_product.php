<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h1><?php
                $message = $this->session->userdata('message');
                if ($message) {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h1>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>

                    <tr>
                        <th width="5%">Product ID</th>
                        <th width="5%">Product Image</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Manufacturer Name</th>
                        <th>Publication Status</th>
                        <th>Featured Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>   
                <tbody>
                    <?php
//                    echo '<pre>';
//                    print_r($products);
//                    exit();
                    ?>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product->product_id; ?></td>
                            <td><img src="<?php echo base_url() . $product->product_image; ?>" alt="Image" style="height: 40px; width: 40px;"></td>
                            <td class="center"><?php echo $product->product_name; ?></td>
                            <td class="center"><?php echo $product->category_name; ?></td>
                            <td class="center"><?php echo $product->manufacturer_name; ?></td>

                            <td class="center">
                                <?php if ($product->publication_status == 1) { ?>
                                    <span class="label label-success">Published</span>
                                <?php } else { ?>
                                    <span class="label label-warning">Unpublished</span>
                                <?php } ?>
                            </td>
                            <td class="center">
                                <?php if ($product->product_status == 1) { ?>
                                    <span class="label label-basic">Featured</span>
                                <?php } else { ?>
                                    <span class="label label-warning">Normal</span>
                                <?php } ?>
                            </td>
                            <td class="center">
                                <?php if ($product->publication_status == 1) { ?>
                                    <a class="btn btn-success"  href="<?php echo base_url(); ?>super_admin/unpublished_product/<?php echo $product->product_id; ?>" title="unpublished">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="<?php echo base_url(); ?>super_admin/published_product/<?php echo $product->product_id; ?>" title="published">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="<?php echo base_url(); ?>super_admin/edit_product/<?php echo $product->product_id; ?>" title="edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>super_admin/delete_product/<?php echo $product->product_id; ?>" onclick="return check_delete();" title="delete">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                                <?php if ($product->product_status == 1) { ?>
                                    <a class="btn btn-basic" href="<?php echo base_url(); ?>super_admin/normal_product/<?php echo $product->product_id; ?>" title="normal">
                                        <i class="halflings-icon certificate"></i> 
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-warning" href="<?php echo base_url(); ?>super_admin/featured_product/<?php echo $product->product_id; ?>" title="featured">
                                        <i class="halflings-icon certificate"></i> 
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>


