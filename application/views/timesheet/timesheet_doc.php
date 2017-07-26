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
        <h2>Timesheet List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EngagementId</th>
		<th>EmployeeId</th>
		<th>Date</th>
		<th>Hour</th>
		<th>Description</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($timesheet_data as $timesheet)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $timesheet->engagementId ?></td>
		      <td><?php echo $timesheet->employeeId ?></td>
		      <td><?php echo $timesheet->date ?></td>
		      <td><?php echo $timesheet->hour ?></td>
		      <td><?php echo $timesheet->description ?></td>
		      <td><?php echo $timesheet->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>