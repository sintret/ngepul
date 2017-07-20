<?php
//echo "<pre>"; print_r($qpositionGroup);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Department</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
<!--	    <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        </div>-->
	    <div class="form-group">
            <label for="varchar">DepartmentCode <?php echo form_error('departmentCode') ?></label>
            <input type="text" class="form-control" name="departmentCode" id="departmentCode" placeholder="DepartmentCode" value="<?php echo $departmentCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DepartmentName <?php echo form_error('departmentName') ?></label>
            <input type="text" class="form-control" name="departmentName" id="departmentName" placeholder="DepartmentName" value="<?php echo $departmentName; ?>" />
        </div>
<!--	    <div class="form-group">
            <label for="tinyint">Deleted <?php echo form_error('deleted') ?></label>
            <input type="text" class="form-control" name="deleted" id="deleted" placeholder="Deleted" value="<?php echo $deleted; ?>" />
        </div>-->
<hr/>
<center>    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('department') ?>" class="btn btn-default">Cancel</a>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
</center>
	</form>

</section>




