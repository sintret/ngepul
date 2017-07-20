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
        <h2>Department List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>DepartmentCode</th>
		<th>DepartmentName</th>
		<th>Deleted</th>
		
            </tr><?php
            foreach ($department_data as $department)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $department->entityId ?></td>
		      <td><?php echo $department->departmentCode ?></td>
		      <td><?php echo $department->departmentName ?></td>
		      <td><?php echo $department->deleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>