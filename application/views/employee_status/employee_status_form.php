<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>EMPLOYEE STATUS </strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

        <div class="form-group">
            <label for="varchar">Employee Status <?php echo form_error('employeeStatus') ?></label>
            <input type="text" class="form-control" name="employeeStatus" id="employeeStatus" placeholder="EmployeeStatus" value="<?php echo $employeeStatus; ?>" />
        </div>
	<div class="form-group">
            <label for="varchar">status Info <?php echo form_error('statusInfo') ?></label>
            <input type="text" class="form-control" name="statusInfo" id="employeeStatusColors" placeholder="statusInfo" value="<?php echo $statusInfo; ?>" />
        </div>
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('employee_status') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
