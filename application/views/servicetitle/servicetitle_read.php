<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>MAIN SERVICE</strong> /READ</h4>
    </header>
    <div class="panel-body">
         <table class="table">
	    <tr><td>COMPANY ENTITY</td><td><?php echo $company_name; ?></td></tr>
            <tr><td>Service Area</td><td><span class="btn btn-default btn-sm"><?php echo $serviceName; ?></span></td></tr>
	    <tr><td>Main Service Name</td><td><?php echo $serviceTitleName; ?></td></tr>
	    <tr><td>Service Description</td><td><?php echo $serviceTitleDescription; ?></td></tr>
<!--	    <tr><td>ServiceTitleDeleted</td><td><?php echo $serviceTitleDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('servicetitle') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
