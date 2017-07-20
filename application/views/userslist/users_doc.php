<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>UserlevelId</th>
		<th>Avatar</th>
		<th>EmployeeId</th>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
		<th>Active</th>
		<th>Deleted</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($userslist_data as $userslist)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $userslist->entityId ?></td>
		      <td><?php echo $userslist->userlevelId ?></td>
		      <td><?php echo $userslist->avatar ?></td>
		      <td><?php echo $userslist->employeeId ?></td>
		      <td><?php echo $userslist->username ?></td>
		      <td><?php echo $userslist->email ?></td>
		      <td><?php echo $userslist->password ?></td>
		      <td><?php echo $userslist->active ?></td>
		      <td><?php echo $userslist->deleted ?></td>
		      <td><?php echo $userslist->userCreate ?></td>
		      <td><?php echo $userslist->createDate ?></td>
		      <td><?php echo $userslist->userUpdate ?></td>
		      <td><?php echo $userslist->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>