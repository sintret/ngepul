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
        <h2>Industry List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EtityId</th>
		<th>IndustryName</th>
		<th>IndustryDescription</th>
		<th>IndustryDeleted</th>
		
            </tr><?php
            foreach ($industry_data as $industry)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $industry->etityId ?></td>
		      <td><?php echo $industry->IndustryName ?></td>
		      <td><?php echo $industry->IndustryDescription ?></td>
		      <td><?php echo $industry->IndustryDeleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>