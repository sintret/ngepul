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
        <h2 style="margin-top:0px">Non_chargeable Read</h2>
        <table class="table">
	    <tr><td>Periode</td><td><?php echo $periode; ?></td></tr>
	    <tr><td>EmployeeId</td><td><?php echo $employeeId; ?></td></tr>
	    <tr><td>LeaveId</td><td><?php echo $leaveId; ?></td></tr>
	    <tr><td>NonChargeDesc</td><td><?php echo $nonChargeDesc; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('non_chargeable') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>