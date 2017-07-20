<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ENTITY SETTING</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
            <label for="varchar">Company Name <?php echo form_error('company_name') ?></label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="double">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Fax <?php echo form_error('fax') ?></label>
            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" value="<?php echo $fax; ?>" />
        </div>
<!--	    <div class="form-group">
            <label for="varchar">Logo <?php echo form_error('logo') ?></label>
            <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
        </div>-->
            
             <?php
                if($segmentPage2 == "update"){
              ?>
            <div class="form-group">
                <img width="140px" height="140px" src="<?=base_url();?>assets/uploads/entity/<?php echo $logo ?>" class="circle">
                <input type="hidden" class="form-control" name="oldLogo"  value="<?= $logo;?>"/>
            </div>
             <?php } ?>
            
            <div class="form-group">
                <label for="varchar">Company Logo <?php echo form_error('avatar') ?></label>
               <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div> 
                        <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="logo" >
                        </span> 
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                    </div>
                </div>
            </div>
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('entity') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
