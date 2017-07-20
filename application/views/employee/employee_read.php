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
        <h2 style="margin-top:0px">Employee Read</h2>
        <table class="table">
	    <tr><td>EntityId</td><td><?php echo $entityId; ?></td></tr>
	    <tr><td>Employee Code</td><td><?php echo $employee_code; ?></td></tr>
	    <tr><td>EmployeeStatusId</td><td><?php echo $employeeStatusId; ?></td></tr>
	    <tr><td>FirstName</td><td><?php echo $firstName; ?></td></tr>
	    <tr><td>LastName</td><td><?php echo $lastName; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $sex; ?></td></tr>
	    <tr><td>ReligionId</td><td><?php echo $religionId; ?></td></tr>
	    <tr><td>PositionId</td><td><?php echo $positionId; ?></td></tr>
	    <tr><td>DepartmentId</td><td><?php echo $departmentId; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Handphone</td><td><?php echo $handphone; ?></td></tr>
	    <tr><td>Email1</td><td><?php echo $email1; ?></td></tr>
	    <tr><td>Email2</td><td><?php echo $email2; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Birthday</td><td><?php echo $birthday; ?></td></tr>
	    <tr><td>CostRate</td><td><?php echo $costRate; ?></td></tr>
	    <tr><td>School</td><td><?php echo $school; ?></td></tr>
	    <tr><td>Degree</td><td><?php echo $degree; ?></td></tr>
	    <tr><td>SertificateNo</td><td><?php echo $sertificateNo; ?></td></tr>
	    <tr><td>Accountant</td><td><?php echo $accountant; ?></td></tr>
	    <tr><td>RegAccountantNo</td><td><?php echo $regAccountantNo; ?></td></tr>
	    <tr><td>CPA</td><td><?php echo $CPA; ?></td></tr>
	    <tr><td>CPANo</td><td><?php echo $CPANo; ?></td></tr>
	    <tr><td>Entry</td><td><?php echo $entry; ?></td></tr>
	    <tr><td>Resign</td><td><?php echo $resign; ?></td></tr>
	    <tr><td>ResignDate</td><td><?php echo $resignDate; ?></td></tr>
	    <tr><td>FunctionType</td><td><?php echo $functionType; ?></td></tr>
	    <tr><td>BankId</td><td><?php echo $bankId; ?></td></tr>
	    <tr><td>AccNo</td><td><?php echo $accNo; ?></td></tr>
	    <tr><td>AccName</td><td><?php echo $accName; ?></td></tr>
	    <tr><td>BankBranch</td><td><?php echo $bankBranch; ?></td></tr>
	    <tr><td>Deleted</td><td><?php echo $deleted; ?></td></tr>
	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>