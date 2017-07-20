<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>DEGREE</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

             <div class="form-group">
                <label for="varchar">Degree Name <?php echo form_error('degreeName') ?></label>
                <input type="text" class="form-control" name="degreeName" id="degreeName" placeholder="DegreeName" value="<?php echo $degreeName; ?>" />
            </div>
            
            <div class="form-group">
                <label for="varchar">Degree Description <?php echo form_error('degreeInfo') ?></label>
                <input type="text" class="form-control" name="degreeInfo" id="AccountNumber" placeholder="Degree Description" value="<?php echo $degreeInfo; ?>" />
            </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('degree') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
