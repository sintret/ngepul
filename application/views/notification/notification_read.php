<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Notification </strong> /READ</h4>
    </header>
    <div class="panel-body">
        <table class="table">
            <?php
            if($read == 1){
                    $spanClass = '<span class="btn btn-success btn-sm">READ</span>';
                } else {
                    $spanClass = '<span class="btn btn-danger btn-sm">UNREAD</span>';
                }
            ?>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>Read</td><td><?php echo $spanClass; ?></td></tr>
	    <tr><td>CreatedBy</td><td><?php echo $createdBy; ?></td></tr>
	    <tr><td>UpdatedAt</td><td><?php echo $updatedAt; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

