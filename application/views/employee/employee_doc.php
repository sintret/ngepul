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
        <h2>Employee List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>Employee Code</th>
		<th>EmployeeStatusId</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Sex</th>
		<th>ReligionId</th>
		<th>PositionId</th>
		<th>DepartmentId</th>
		<th>Phone</th>
		<th>Handphone</th>
		<th>Email1</th>
		<th>Email2</th>
		<th>Address</th>
		<th>Birthday</th>
		<th>CostRate</th>
		<th>School</th>
		<th>Degree</th>
		<th>SertificateNo</th>
		<th>Accountant</th>
		<th>RegAccountantNo</th>
		<th>CPA</th>
		<th>CPANo</th>
		<th>Entry</th>
		<th>Resign</th>
		<th>ResignDate</th>
		<th>FunctionType</th>
		<th>BankId</th>
		<th>AccNo</th>
		<th>AccName</th>
		<th>BankBranch</th>
		<th>Deleted</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		
            </tr><?php
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $employee->entityId ?></td>
		      <td><?php echo $employee->employee_code ?></td>
		      <td><?php echo $employee->employeeStatusId ?></td>
		      <td><?php echo $employee->firstName ?></td>
		      <td><?php echo $employee->lastName ?></td>
		      <td><?php echo $employee->sex ?></td>
		      <td><?php echo $employee->religionId ?></td>
		      <td><?php echo $employee->positionId ?></td>
		      <td><?php echo $employee->departmentId ?></td>
		      <td><?php echo $employee->phone ?></td>
		      <td><?php echo $employee->handphone ?></td>
		      <td><?php echo $employee->email1 ?></td>
		      <td><?php echo $employee->email2 ?></td>
		      <td><?php echo $employee->address ?></td>
		      <td><?php echo $employee->birthday ?></td>
		      <td><?php echo $employee->costRate ?></td>
		      <td><?php echo $employee->school ?></td>
		      <td><?php echo $employee->degree ?></td>
		      <td><?php echo $employee->sertificateNo ?></td>
		      <td><?php echo $employee->accountant ?></td>
		      <td><?php echo $employee->regAccountantNo ?></td>
		      <td><?php echo $employee->CPA ?></td>
		      <td><?php echo $employee->CPANo ?></td>
		      <td><?php echo $employee->entry ?></td>
		      <td><?php echo $employee->resign ?></td>
		      <td><?php echo $employee->resignDate ?></td>
		      <td><?php echo $employee->functionType ?></td>
		      <td><?php echo $employee->bankId ?></td>
		      <td><?php echo $employee->accNo ?></td>
		      <td><?php echo $employee->accName ?></td>
		      <td><?php echo $employee->bankBranch ?></td>
		      <td><?php echo $employee->deleted ?></td>
		      <td><?php echo $employee->userCreate ?></td>
		      <td><?php echo $employee->createDate ?></td>
		      <td><?php echo $employee->userUpdate ?></td>
		      <td><?php echo $employee->updateDate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>