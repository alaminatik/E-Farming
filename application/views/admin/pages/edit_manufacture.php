<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h1><?php
            $message = $this->session->userdata('message');
            if ($message) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            ?>
        </h1>
        <div class="box-content">
            <form name="edit_manufacturer_form" class="form-horizontal" action="<?php echo site_url('Super_admin/update_manufacturer'); ?>" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manufacturer Name </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $manufacturer_byid->manufacturer_name; ?>" class="span6 typeahead" id="typeahead" name="manufacturer_name">
                            <input type="hidden" value="<?php echo $manufacturer_byid->manufacturer_id; ?>" class="span6 typeahead" id="typeahead" name="manufacturer_id">

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Manufacturer Description</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" rows="3" name="manufacturer_description"><?php echo $manufacturer_byid->manufacturer_description; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Manufacturer Status</label>
                        <div class="controls">
                            <select id="selectError3" name="manufacturer_status">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update manufacturer info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div>
</div>
<script>
    document.forms['edit_manufacturer_form'].elements['manufacturer_status'].value = '<?php echo $manufacturer_byid->manufacturer_status ?>';
</script>