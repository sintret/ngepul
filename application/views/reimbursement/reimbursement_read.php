<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>EXPENSE DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
       <table class="table">
	    <tr><td>Engagement</td><td><?php echo $engagementId; ?></td></tr>
	    <tr><td>Period Date</td><td><?php echo $periodDate; ?></td></tr>
	    <tr><td>Approval TO</td><td><?php echo $approvalId; ?></td></tr>
	    <tr><td>Expense</td><td><?php echo $expenseId; ?></td></tr>
	    <tr><td>Expense Amount</td><td><?php echo $expenseAmount; ?></td></tr>
	    <tr><td>Expense Date</td><td><?php echo $expenseDate; ?></td></tr>
	    <tr><td>Expense Description</td><td><?php echo $expenseDesc; ?></td></tr>
	    <tr><td>Approval Status</td><td><?php echo $approvalStatusId; ?></td></tr>
	    <tr><td>Approval By</td><td><?php echo $approvalBy; ?></td></tr>
	    <tr><td>Approval Date</td><td><?php echo $approvalDate; ?></td></tr>
	    <tr><td>Approval DESCRIPTION</td><td><?php echo $approvalDesc; ?></td></tr>
	    <tr><td>User Create</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>User Update</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>Update Date</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('reimbursement') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
