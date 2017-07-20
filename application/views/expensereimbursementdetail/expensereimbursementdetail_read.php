<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Expensereimbursementdetail Read</h2>
        <table class="table">
	    <tr><td>EntityId</td><td><?php echo $entityId; ?></td></tr>
	    <tr><td>ExpenseId</td><td><?php echo $expenseId; ?></td></tr>
	    <tr><td>EngagementId</td><td><?php echo $engagementId; ?></td></tr>
	    <tr><td>EmployeeId</td><td><?php echo $employeeId; ?></td></tr>
	    <tr><td>PeriodeDate</td><td><?php echo $periodeDate; ?></td></tr>
	    <tr><td>ExpenseDate</td><td><?php echo $expenseDate; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>ApprovalBy</td><td><?php echo $approvalBy; ?></td></tr>
	    <tr><td>ApprovalStatus</td><td><?php echo $approvalStatus; ?></td></tr>
	    <tr><td>Billed</td><td><?php echo $billed; ?></td></tr>
	    <tr><td>BilledDate</td><td><?php echo $billedDate; ?></td></tr>
	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('expensereimbursementdetail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>