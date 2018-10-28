<?php

?>
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>TIMESHEET READ</strong> </h4>
    </header>
    <div class="panel-body">
        <table class="table">
	    <tr><td>Engagement</td><td><?php echo $row->engagementName; ?></td></tr>
	    <tr><td>Employee</td><td><?php echo $row->fullname; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Hour</td><td><?php echo $hour; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Update Date</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('timesheet') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

