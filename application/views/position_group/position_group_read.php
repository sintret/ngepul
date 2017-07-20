<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Country</strong> /READ</h4>
    </header>
    <div class="panel-body">
         <table class="table">
	    <tr><td>GroupName</td><td><?php echo $groupName; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
<!--	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('position_group') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

