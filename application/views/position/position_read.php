<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>POSITION</strong> /READ</h4>
    </header>
    <div class="panel-body">
         <table class="table">
             <tr><td>COMPANY ENTITY</td><td><span class="btn btn-default btn-sm"><?php echo $company_name; ?></span></td></tr>
            <tr><td>Position Group</td><td><span class="btn btn-default btn-sm"><?php echo $groupName; ?></span></td></tr>
            <tr><td>Position Max Job</td><td><span class="btn btn-default btn-sm"><?php echo $positionMaxJob; ?></span></td></tr>
	    <tr><td>Position Code</td><td><?php echo $positionCode; ?></td></tr>
	    <tr><td>Position Name</td><td><?php echo $positionName; ?></td></tr>
	    <tr><td>Position Billing Rate</td><td><?php echo rupiahs($positionBillingRate); ?></td></tr>
<!--	    <tr><td>PositionDeleted</td><td><?php echo $positionDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('position') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

