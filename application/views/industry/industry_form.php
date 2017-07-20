<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>INDUSTRY SETTING</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

<!--            <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <input type="text" class="form-control" name="entityId" id="etityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        </div>-->
	    <div class="form-group">
            <label for="varchar">Industry Name <?php echo form_error('industryName') ?></label>
            <input type="text" class="form-control" name="industryName" id="industryName" placeholder="IndustryName" value="<?php echo $industryName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Industry Description <?php echo form_error('industryDescription') ?></label>
            <input type="text" class="form-control" name="industryDescription" id="industryDescription" placeholder="IndustryDescription" value="<?php echo $industryDescription; ?>" />
        </div>
<!--	    <div class="form-group">
            <label for="tinyint">Deleted <?php echo form_error('deleted') ?></label>
            <input type="text" class="form-control" name="deleted" id="deleted" placeholder="Deleted" value="<?php echo $deleted; ?>" />
        </div>-->
	
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('industry') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
