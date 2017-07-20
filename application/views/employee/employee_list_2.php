
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Employee</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('employee/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('employee/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('employee/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
		<th>code</th>
		<th>fullname</th>
		<th>Handphone</th>
		<th>Position</th>
		<th>Status</th>
		<th>Sex</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($employee_data as $employee)
            {
                $sex = $employee->sex;
                if($sex == 1){
                    $gender = '<span class="label label-success">Man</span>';                    
                } else {
                    $gender = '<span class="label label-warning">Women</span>';
                }
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?= $employee->employee_code ?></td>
			<td><?= $employee->firstName.' '. $employee->lastName ?></td>
			<td><?= $employee->handphone ?></td>
			<td><span class="<?= $employee->employeeStatusColors ?>"><?= $employee->employeeStatus ?></span></td>
			<td><?= $employee->positionName; ?></td>
			<td><?= $gender ?></td>
			<td style="text-align:center" width="200px">
                            <span class="tooltip-area">
                                    <a href="<?= base_url() ?>employee/update/<?=$employee->id;?>" class="btn btn-default btn-sm" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?= base_url() ?>employee/read/<?=$employee->id;?>" class="btn btn-default btn-sm" title="detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url() ?>employee/delete/<?=$employee->id;?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </span>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>