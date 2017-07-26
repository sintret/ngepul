<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>NON CHARGEABLE</strong> /READ</h4>
    </header>
    <?php
    if($leaveChargesType == 1){
        $btnView = '<span class="btn btn-success btn-sm">OFFICIAL CHARGE</span>';
    } else {
         $btnView = '<span class="btn btn-warning btn-sm">PERSONAL CHARGE</span>';
    }
    ?>
    <div class="panel-body">
          <table class="table">
	    <tr><td>Entity</td><td><?php echo $company_name; ?></td></tr>
	    <tr><td>LeaveCode</td><td><?php echo $leaveCode; ?></td></tr>
	    <tr><td>LeaveName</td><td><?php echo $leaveName; ?></td></tr>
            <tr><td>LeaveChargesType</td><td><?= $btnView;?></td></tr>
<!--	    <tr><td>LeaveDeleted</td><td><?php echo $leaveDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('leave') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</section>
