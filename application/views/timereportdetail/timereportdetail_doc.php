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
        <h2>Timereportdetail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>Code</th>
		<th>EmployeeId</th>
		<th>PeriodeDate</th>
		<th>EngagementId</th>
		<th>ApprovalBy</th>
		<th>ApprovalStatus</th>
		<th>Description</th>
		<th>DateWork1</th>
		<th>DateWork2</th>
		<th>DateWork3</th>
		<th>DateWork4</th>
		<th>DateWork5</th>
		<th>DateWork6</th>
		<th>DateWork7</th>
		<th>DateWork8</th>
		<th>DateWork9</th>
		<th>DateWork10</th>
		<th>DateWork11</th>
		<th>DateWork12</th>
		<th>DateWork13</th>
		<th>DateWork14</th>
		<th>DateWork15</th>
		<th>DateWork16</th>
		<th>DateWork17</th>
		<th>DateWork18</th>
		<th>DateWork19</th>
		<th>DateWork20</th>
		<th>DateWork21</th>
		<th>DateWork22</th>
		<th>DateWork23</th>
		<th>DateWork24</th>
		<th>DateWork25</th>
		<th>DateWork26</th>
		<th>DateWork27</th>
		<th>DateWork28</th>
		<th>DateWork29</th>
		<th>DateWork30</th>
		<th>DateWork31</th>
		<th>Version</th>
		
            </tr><?php
            foreach ($timereportdetail_data as $timereportdetail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $timereportdetail->entityId ?></td>
		      <td><?php echo $timereportdetail->Code ?></td>
		      <td><?php echo $timereportdetail->employeeId ?></td>
		      <td><?php echo $timereportdetail->periodeDate ?></td>
		      <td><?php echo $timereportdetail->engagementId ?></td>
		      <td><?php echo $timereportdetail->approvalBy ?></td>
		      <td><?php echo $timereportdetail->approvalStatus ?></td>
		      <td><?php echo $timereportdetail->description ?></td>
		      <td><?php echo $timereportdetail->dateWork1 ?></td>
		      <td><?php echo $timereportdetail->dateWork2 ?></td>
		      <td><?php echo $timereportdetail->dateWork3 ?></td>
		      <td><?php echo $timereportdetail->dateWork4 ?></td>
		      <td><?php echo $timereportdetail->dateWork5 ?></td>
		      <td><?php echo $timereportdetail->dateWork6 ?></td>
		      <td><?php echo $timereportdetail->dateWork7 ?></td>
		      <td><?php echo $timereportdetail->dateWork8 ?></td>
		      <td><?php echo $timereportdetail->dateWork9 ?></td>
		      <td><?php echo $timereportdetail->dateWork10 ?></td>
		      <td><?php echo $timereportdetail->dateWork11 ?></td>
		      <td><?php echo $timereportdetail->dateWork12 ?></td>
		      <td><?php echo $timereportdetail->dateWork13 ?></td>
		      <td><?php echo $timereportdetail->dateWork14 ?></td>
		      <td><?php echo $timereportdetail->dateWork15 ?></td>
		      <td><?php echo $timereportdetail->dateWork16 ?></td>
		      <td><?php echo $timereportdetail->dateWork17 ?></td>
		      <td><?php echo $timereportdetail->dateWork18 ?></td>
		      <td><?php echo $timereportdetail->dateWork19 ?></td>
		      <td><?php echo $timereportdetail->dateWork20 ?></td>
		      <td><?php echo $timereportdetail->dateWork21 ?></td>
		      <td><?php echo $timereportdetail->DateWork22 ?></td>
		      <td><?php echo $timereportdetail->dateWork23 ?></td>
		      <td><?php echo $timereportdetail->dateWork24 ?></td>
		      <td><?php echo $timereportdetail->dateWork25 ?></td>
		      <td><?php echo $timereportdetail->dateWork26 ?></td>
		      <td><?php echo $timereportdetail->dateWork27 ?></td>
		      <td><?php echo $timereportdetail->dateWork28 ?></td>
		      <td><?php echo $timereportdetail->dateWork29 ?></td>
		      <td><?php echo $timereportdetail->dateWork30 ?></td>
		      <td><?php echo $timereportdetail->dateWork31 ?></td>
		      <td><?php echo $timereportdetail->version ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>