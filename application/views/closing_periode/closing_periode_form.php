<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>CLOSING PERIODE</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

           <div class="form-group">
            <label for="varchar">Closing Periode <?php echo form_error('closingPeriode') ?></label>
            <input type="text" class="form-control" name="closingPeriode" id="closingPeriode" placeholder="ClosingPeriode" value="<?php echo $closingPeriode; ?>" />
        </div>
	    <div class="form-group">
            <label for="closingInfo">Closing Description <?php echo form_error('closingInfo') ?></label>
            <textarea class="form-control" rows="3" name="closingInfo" id="closingInfo" placeholder="ClosingInfo"><?php echo $closingInfo; ?></textarea>
        </div>
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('closing_periode') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
