<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Province</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Religion Code <?php echo form_error('religionCode') ?></label>
            <input type="text" class="form-control" name="religionCode" id="religionCode" placeholder="ReligionCode" value="<?php echo $religionCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Religion Name <?php echo form_error('religionName') ?></label>
            <input type="text" class="form-control" name="religionName" id="religionName" placeholder="ReligionName" value="<?php echo $religionName; ?>" />
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('religion') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>


