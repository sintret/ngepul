<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>SECTOR </strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
                <label for="int">Industry <?php echo form_error('industryId') ?></label>
                <select class="form-control" name="industryId">
                    <?php
                        foreach($industrys as $indust){
                    ?>
                        <option value="<?= $indust->id;?>" <?php if($indust->id == $industryId){ echo "selected"; } else {}?>>
                            <?= $indust->industryName;?>
                        </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
	    <div class="form-group">
            <label for="varchar">Sector Name <?php echo form_error('sectorName') ?></label>
            <input type="text" class="form-control" name="sectorName" id="sectorName" placeholder="SectorName" value="<?php echo $sectorName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sector Description <?php echo form_error('sectorDescription') ?></label>
            <input type="text" class="form-control" name="sectorDescription" id="sectorDescription" placeholder="SectorDescription" value="<?php echo $sectorDescription; ?>" />
        </div>
	    
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('sector') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

