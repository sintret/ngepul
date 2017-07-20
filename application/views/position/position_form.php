<?php
//echo "<pre>"; print_r($qpositionGroup);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Position</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
            <!--	    <div class="form-group">
                        <label for="int">EntityId <?php echo form_error('entityId') ?></label>
                        <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
                    </div>-->
            
            <div class="form-group">
                <label for="int">Position Group <?php echo form_error('positionGroup') ?></label>
                <select name="positionGroup" id="positionGroup" class="form-control">
                    <option>Please Select One..</option>
                    <?php
                    foreach($qpositionGroup as $rsPosition){
                    ?>            
                    <option value="<?= $rsPosition->id;?>"<?php if($rsPosition->id == $positionGroup){echo "selected";}?>>
                        <?= $rsPosition->groupName;?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Position Code <?php echo form_error('positionCode') ?></label>
                <input type="text" class="form-control" name="positionCode" id="positionCode" placeholder="PositionCode" value="<?php echo $positionCode; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Position Name <?php echo form_error('positionName') ?></label>
                <input type="text" class="form-control" name="positionName" id="positionName" placeholder="PositionName" value="<?php echo $positionName; ?>" />
            </div>
            <div class="form-group">
                <label for="decimal">Position Billing Rate <?php echo form_error('positionBillingRate') ?></label>
                <input type="text" class="form-control" name="positionBillingRate" id="positionBillingRate" placeholder="PositionBillingRate" value="<?php echo $positionBillingRate; ?>" />
            </div>
            <div class="form-group">
                <label for="decimal">Position Max Jobs <?php echo form_error('positionMaxJob') ?></label>
                <input type="text" class="form-control" name="positionMaxJob" id="positionMaxJob" placeholder="Position Max Job" value="<?php echo $positionMaxJob; ?>" />
            </div>
            <center>                
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('position') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>  

</section>

