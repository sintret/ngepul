<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ENTITY DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
        <table class="table">
            <tr><td>Industry</td><td><span class="btn btn-default btn-sm"><?php echo $industryName; ?></span></td></tr>
	    <tr><td>Sector Name</td><td><?php echo $sectorName; ?></td></tr>
	    <tr><td>Sector Description</td><td><?php echo $sectorDescription; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo date('d M, Y H:i:s', strtotime($updateDate)); ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sector') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
