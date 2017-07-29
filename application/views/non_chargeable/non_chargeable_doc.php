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
        <h2>Non_chargeable List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Periode</th>
		<th>EmployeeId</th>
		<th>LeaveId</th>
		<th>NonChargeDesc</th>
		<th>Date</th>
		<th>Time</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($non_chargeable_data as $non_chargeable)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $non_chargeable->periode ?></td>
		      <td><?php echo $non_chargeable->employeeId ?></td>
		      <td><?php echo $non_chargeable->leaveId ?></td>
		      <td><?php echo $non_chargeable->nonChargeDesc ?></td>
		      <td><?php echo $non_chargeable->date ?></td>
		      <td><?php echo $non_chargeable->time ?></td>
		      <td><?php echo $non_chargeable->userCreate ?></td>
		      <td><?php echo $non_chargeable->createDate ?></td>
		      <td><?php echo $non_chargeable->userUpdate ?></td>
		      <td><?php echo $non_chargeable->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>