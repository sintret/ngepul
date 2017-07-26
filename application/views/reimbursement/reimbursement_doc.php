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
        <h2>Reimbursement List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EngagementId</th>
		<th>PeriodDate</th>
		<th>ApprovalId</th>
		<th>ExpenseId</th>
		<th>ExpenseAmount</th>
		<th>ExpenseDate</th>
		<th>ExpenseDesc</th>
		<th>ApprovalStatusId</th>
		<th>ApprovalBy</th>
		<th>ApprovalDate</th>
		<th>ApprovalDesc</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($reimbursement_data as $reimbursement)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $reimbursement->engagementId ?></td>
		      <td><?php echo $reimbursement->periodDate ?></td>
		      <td><?php echo $reimbursement->approvalId ?></td>
		      <td><?php echo $reimbursement->expenseId ?></td>
		      <td><?php echo $reimbursement->expenseAmount ?></td>
		      <td><?php echo $reimbursement->expenseDate ?></td>
		      <td><?php echo $reimbursement->expenseDesc ?></td>
		      <td><?php echo $reimbursement->approvalStatusId ?></td>
		      <td><?php echo $reimbursement->approvalBy ?></td>
		      <td><?php echo $reimbursement->approvalDate ?></td>
		      <td><?php echo $reimbursement->approvalDesc ?></td>
		      <td><?php echo $reimbursement->userCreate ?></td>
		      <td><?php echo $reimbursement->createDate ?></td>
		      <td><?php echo $reimbursement->userUpdate ?></td>
		      <td><?php echo $reimbursement->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>