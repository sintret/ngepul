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
        <h2>Expensereimbursementdetail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>ExpenseId</th>
		<th>EngagementId</th>
		<th>EmployeeId</th>
		<th>PeriodeDate</th>
		<th>ExpenseDate</th>
		<th>Amount</th>
		<th>Description</th>
		<th>ApprovalBy</th>
		<th>ApprovalStatus</th>
		<th>Billed</th>
		<th>BilledDate</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($expensereimbursementdetail_data as $expensereimbursementdetail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $expensereimbursementdetail->entityId ?></td>
		      <td><?php echo $expensereimbursementdetail->expenseId ?></td>
		      <td><?php echo $expensereimbursementdetail->engagementId ?></td>
		      <td><?php echo $expensereimbursementdetail->employeeId ?></td>
		      <td><?php echo $expensereimbursementdetail->periodeDate ?></td>
		      <td><?php echo $expensereimbursementdetail->expenseDate ?></td>
		      <td><?php echo $expensereimbursementdetail->amount ?></td>
		      <td><?php echo $expensereimbursementdetail->description ?></td>
		      <td><?php echo $expensereimbursementdetail->approvalBy ?></td>
		      <td><?php echo $expensereimbursementdetail->approvalStatus ?></td>
		      <td><?php echo $expensereimbursementdetail->billed ?></td>
		      <td><?php echo $expensereimbursementdetail->billedDate ?></td>
		      <td><?php echo $expensereimbursementdetail->userCreate ?></td>
		      <td><?php echo $expensereimbursementdetail->createDate ?></td>
		      <td><?php echo $expensereimbursementdetail->userUpdate ?></td>
		      <td><?php echo $expensereimbursementdetail->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>