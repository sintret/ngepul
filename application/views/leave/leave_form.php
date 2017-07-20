<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>LEAVE</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

             <div class="form-group">
            <label for="int">Company <?php echo form_error('entityId') ?></label>
           <select name="entityId" class="form-control">
                <?php
                    foreach($entitys as $rsEntity){
                ?>
                <option value="<?= $rsEntity->id;?>"<?php if($rsEntity->id == $entityId){ echo "selected"; } {}?> >
                        <?= $rsEntity->company_name;?>
                </option>
                <?php
                    }
                ?>
            </select>
            </div>
            
	    <div class="form-group">
            <label for="int"> Charges Type <?php echo form_error('leaveChargesType') ?></label>
            <select name="leaveChargesType" class="form-control">
                <option value="1" <?php if($leaveChargesType == 1){ echo "selected"; } {}?> >Official Charge</option>
                <option value="2" <?php if($leaveChargesType == 2){ echo "selected"; } {}?> >Personal Charge</option>
            </select>
            
            </div>
	    <div class="form-group">
            <label for="varchar">Code <?php echo form_error('leaveCode') ?></label>
            <input type="text" class="form-control" name="leaveCode" id="leaveCode" placeholder="LeaveCode" value="<?php echo $leaveCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Leave Name <?php echo form_error('leaveName') ?></label>
            <input type="text" class="form-control" name="leaveName" id="leaveName" placeholder="LeaveName" value="<?php echo $leaveName; ?>" />
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('leave') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

