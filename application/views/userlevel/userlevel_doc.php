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
        <h2>Userlevel List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Userlevel Name</th>
		<th>Description</th>
		<th>Deleted</th>
		
            </tr><?php
            foreach ($userlevel_data as $userlevel)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $userlevel->userlevel_name ?></td>
		      <td><?php echo $userlevel->description ?></td>
		      <td><?php echo $userlevel->deleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>