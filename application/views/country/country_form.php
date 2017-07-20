<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Bank</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
            <label for="varchar">CountryCode <?php echo form_error('CountryCode') ?></label>
            <input type="text" class="form-control" name="CountryCode" id="CountryCode" placeholder="CountryCode" value="<?php echo $CountryCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CountryName <?php echo form_error('CountryName') ?></label>
            <input type="text" class="form-control" name="CountryName" id="CountryName" placeholder="CountryName" value="<?php echo $CountryName; ?>" />
        </div>
	    <div class="form-group">
           
            <input type="hidden" class="form-control" name="CountryDeleted" id="CountryDeleted" placeholder="CountryDeleted" value="<?php echo $CountryDeleted; ?>" />
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('country') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
