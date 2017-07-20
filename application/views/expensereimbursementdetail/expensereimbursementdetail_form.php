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
        <h2 style="margin-top:0px">Expensereimbursementdetail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ExpenseId <?php echo form_error('expenseId') ?></label>
            <input type="text" class="form-control" name="expenseId" id="expenseId" placeholder="ExpenseId" value="<?php echo $expenseId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">EngagementId <?php echo form_error('engagementId') ?></label>
            <input type="text" class="form-control" name="engagementId" id="engagementId" placeholder="EngagementId" value="<?php echo $engagementId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">EmployeeId <?php echo form_error('employeeId') ?></label>
            <input type="text" class="form-control" name="employeeId" id="employeeId" placeholder="EmployeeId" value="<?php echo $employeeId; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">PeriodeDate <?php echo form_error('periodeDate') ?></label>
            <input type="text" class="form-control" name="periodeDate" id="periodeDate" placeholder="PeriodeDate" value="<?php echo $periodeDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">ExpenseDate <?php echo form_error('expenseDate') ?></label>
            <input type="text" class="form-control" name="expenseDate" id="expenseDate" placeholder="ExpenseDate" value="<?php echo $expenseDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('description') ?></label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ApprovalBy <?php echo form_error('approvalBy') ?></label>
            <input type="text" class="form-control" name="approvalBy" id="approvalBy" placeholder="ApprovalBy" value="<?php echo $approvalBy; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">ApprovalStatus <?php echo form_error('approvalStatus') ?></label>
            <input type="text" class="form-control" name="approvalStatus" id="approvalStatus" placeholder="ApprovalStatus" value="<?php echo $approvalStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Billed <?php echo form_error('billed') ?></label>
            <input type="text" class="form-control" name="billed" id="billed" placeholder="Billed" value="<?php echo $billed; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">BilledDate <?php echo form_error('billedDate') ?></label>
            <input type="text" class="form-control" name="billedDate" id="billedDate" placeholder="BilledDate" value="<?php echo $billedDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserCreate <?php echo form_error('userCreate') ?></label>
            <input type="text" class="form-control" name="userCreate" id="userCreate" placeholder="UserCreate" value="<?php echo $userCreate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">CreateDate <?php echo form_error('createDate') ?></label>
            <input type="text" class="form-control" name="createDate" id="createDate" placeholder="CreateDate" value="<?php echo $createDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserUpdate <?php echo form_error('userUpdate') ?></label>
            <input type="text" class="form-control" name="userUpdate" id="userUpdate" placeholder="UserUpdate" value="<?php echo $userUpdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">UpdateDate <?php echo form_error('updateDate') ?></label>
            <input type="text" class="form-control" name="updateDate" id="updateDate" placeholder="UpdateDate" value="<?php echo $updateDate; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('expensereimbursementdetail') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>