<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Userlist</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
                 
                
	<div class="form-group">
            <label for="varchar">Userlevel Name <?php echo form_error('userlevel_name') ?></label>
            <input type="text" class="form-control" name="userlevel_name" id="userlevel_name" placeholder="Userlevel Name" value="<?php echo $userlevel_name; ?>" />
        </div>
	<div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
           
            <hr/>
            <center>    
             <input type="hidden" class="form-control" name="deleted" id="deleted" placeholder="Deleted" value="<?php echo $deleted; ?>" />
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('userlevel') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
