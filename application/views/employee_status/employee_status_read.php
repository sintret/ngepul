<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>EMPLOYEE STATUS DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
       <table class="table">
	    <tr><td>Employee Status</td><td><?php echo $employeeStatus; ?></td></tr>
	    <tr><td>Employee Status Description</td><td><?php echo $statusInfo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee_status') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
