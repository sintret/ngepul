<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Clientcontactperson Read</h2>
        <table class="table">
	    <tr><td>EntityId</td><td><?php echo $entityId; ?></td></tr>
	    <tr><td>ClientId</td><td><?php echo $clientId; ?></td></tr>
	    <tr><td>ClientCode</td><td><?php echo $clientCode; ?></td></tr>
	    <tr><td>ContactName</td><td><?php echo $contactName; ?></td></tr>
	    <tr><td>Salutation</td><td><?php echo $salutation; ?></td></tr>
	    <tr><td>Position</td><td><?php echo $position; ?></td></tr>
	    <tr><td>Handphone</td><td><?php echo $handphone; ?></td></tr>
	    <tr><td>EmailAddress</td><td><?php echo $emailAddress; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('clientcontactperson') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>