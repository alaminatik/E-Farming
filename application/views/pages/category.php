<div id="content_holder" class="fixed">
    <div class="inner">
        <div class="breadcrumb"> 
            <a href="<?php echo base_url(); ?>welcome">Home</a> » <?php echo $category_byid->category_name; ?>
            <!--             here category name like Home > category name-->
        </div>
        <div class="box">
<!--            <h2 class="heading-title"><span><?php echo $category_byid->category_name; ?></span></h2>-->
            <div class="box-content">
                <p style="font-size: 17px; color: violet;"><?php echo $category_byid->category_description;?></p>
<!--                <p>In this website number of product posted in different categories and  manufacturer that can buy anyone who are registered on this site. From all product Instrument category product have few kind of instrument such as tractor,Water Barrel,Grass Hook,Water Pump,Rice Transplanter etc.</p>-->
            </div>
        </div>
        <div class="box">
            <h2 class="heading-title"><span>Refine Search</span></h2>
            <div class="box-content">
                <ul class="sub_cats">
                    <?php foreach ($category_products as $c_product) { ?>
                    <li class="cat_hold"><a href="<?php echo base_url(); ?>welcome/product/<?php echo $c_product->product_id; ?>"> <img src="<?php echo base_url() . $c_product->product_image; ?>" alt="Product Image" style="height: 100px; width: 120px;" />  </a> </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="product-filter">
            <div class="product-compare"><a href="#" id="compare_total">Product Compare (0)</a></div>
            <div class="limit"><b>Show:</b>
                <select>
                    <option value="" selected="selected">8</option>
                    <option value="">25</option>
                    <option value="">50</option>
                    <option value="">75</option>
                    <option value="">100</option>
                </select>
            </div>
            <div class="sort"><b>Sort By:</b>
                <select>
                    <option value="" selected="selected">Default</option>
                    <option value="">Name (A - Z)</option>
                    <option value="">Name (Z - A)</option>
                    <option value="">Price (Low &gt; High)</option>
                    <option value="">Price (High &gt; Low)</option>
                    <option value="">Rating (Highest)</option>
                    <option value="">Rating (Lowest)</option>
                    <option value="">Model (A - Z)</option>
                    <option value="">Model (Z - A)</option>
                </select>
            </div>
        </div>

        <!-- LEFT COLUMN -->
        <div id="column-left">
            <div class="box">
                <h3 class="heading-title"><span>Categories</span></h3>
                <div class="box-content box-category">
                    <ul>
                        <?php foreach ($publish_categories as $p_category) { ?>
                            <li><a href="<?php echo base_url(); ?>welcome/category/<?php echo $p_category->category_id; ?>"><?php echo $p_category->category_name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <!-- END OF LEFT COLUMN -->

        <div id="content" class="content-column-left">
            <div class="cat_list fixed">
                <?php foreach ($category_products as $c_product) { ?>
                    <div class="prod_hold"> 
                        <a class="wrap_link" href="<?php echo base_url(); ?>welcome/product/<?php echo $c_product->product_id; ?>">
                            <span class="image"><img src="<?php echo base_url() . $c_product->product_image; ?>" alt="Product Image" style="height: 180px; width: 180px;"/></span>
                        </a>
                        <div class="pricetag_small"> 
            <!--                <span class="old_price">$ 19 999,99</span> -->
                            <span class="new_price"><?php echo $c_product->product_price; ?> </span> 
                        </div>
                        <div class="info">
                            <h3><?php echo $c_product->product_name; ?></h3>
                            <p><?php echo $c_product->product_description; ?></p>
                            
                            <a class="add_to_cart_small" href="<?php echo base_url(); ?>welcome/product/<?php echo $c_product->product_id; ?>">add to cart</a> 
                            <a class="wishlist_small" href="#">Wishlist</a> 
                            <a class="compare_small" href="#">Compare</a> 
                        </div>
                    </div>
                <?php } ?>
                <div class="clear"></div>
            </div>
            <div class="pagination">
                <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a> </div>
                <div class="results">Showing 1 to 12 of 23 (2 Pages)</div>
            </div>
        </div>
    </div>
</div>