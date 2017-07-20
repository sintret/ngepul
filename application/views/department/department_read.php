<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ENTITY DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
       <table class="table">
<!--	    <tr><td>EntityId</td><td><?php echo $entityId; ?></td></tr>-->
	    <tr><td>Department Code</td><td><?php echo $departmentCode; ?></td></tr>
	    <tr><td>Department Name</td><td><?php echo $departmentName; ?></td></tr>
<!--	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('department') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
