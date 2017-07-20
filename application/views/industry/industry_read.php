<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>INDUSTRY DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
        <table class="table">
<!--	    <tr><td>EtityId</td><td><?php echo $entityId; ?></td></tr>-->
	    <tr><td>Industry Name</td><td><?php echo $industryName; ?></td></tr>
	    <tr><td>Industry Description</td><td><?php echo $industryDescription; ?></td></tr>
<!--	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>-->
	    <tr><td>Update Date</td><td><?php echo date('d M, Y',strtotime($updateDate) ); ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('industry') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
