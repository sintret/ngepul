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
        <h2 style="margin-top:0px">Users Read</h2>
        <table class="table">
	    <tr><td>EntityId</td><td><?php echo $entityId; ?></td></tr>
	    <tr><td>UserlevelId</td><td><?php echo $userlevelId; ?></td></tr>
	    <tr><td>Avatar</td><td><?php echo $avatar; ?></td></tr>
	    <tr><td>EmployeeId</td><td><?php echo $employeeId; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>
	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('userslist') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>