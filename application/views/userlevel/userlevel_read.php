<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>READ</strong> </h4>
    </header>
    <div class="panel-body">
        <table class="table">
            <tr><td>Userlevel Name</td><td><?php echo $userlevel_name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
<!--	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('userlevel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
