<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Country</strong> /READ</h4>
    </header>
    <div class="panel-body">
          <table class="table">
	    <tr><td>COMPANY ENTITY </td><td><?php echo $company_name; ?></td></tr>
	    <tr><td>Service Code</td><td><?php echo $serviceCode; ?></td></tr>
	    <tr><td>Service Name</td><td><?php echo $serviceName; ?></td></tr>
	    <tr><td>Service Description</td><td><?php echo $serviceDescription; ?></td></tr>
<!--	    <tr><td>ServiceDeleted</td><td><?php echo $serviceDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('service') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

