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
        <h2>Position List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>PositionCode</th>
		<th>PositionName</th>
		<th>PositionBillingRate</th>
		<th>PositionGroup</th>
		<th>PositionDeleted</th>
		
            </tr><?php
            foreach ($position_data as $position)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $position->entityId ?></td>
		      <td><?php echo $position->positionCode ?></td>
		      <td><?php echo $position->positionName ?></td>
		      <td><?php echo $position->positionBillingRate ?></td>
		      <td><?php echo $position->positionGroup ?></td>
		      <td><?php echo $position->positionDeleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>