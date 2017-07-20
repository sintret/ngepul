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
        <h2 style="margin-top:0px">Employee List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('employee/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('employee/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('employee'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('employee/read/'.$employee->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('employee/update/'.$employee->id),'edit'); 
				echo ' | '; 
				echo anchor(site_url('employee/delete/'.$employee->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('employee/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('employee/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>