
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Employee Status</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('employee_status/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('employee_status/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('employee_status/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>Employee Status</th>
		<th>Description</th>
<!--		<th>EmployeeStatusColors</th>-->
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($employee_status_data as $employee_status)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $employee_status->employeeStatus ?></td>
			<td><?php echo $employee_status->statusInfo ?></td>
<!--                        <td class="<?php echo $employee_status->employeeStatusColors ?>">button Colors</td>-->
			<td style="text-align:center" width="200px">
                            <span class="tooltip-area">
                                        <a href="<?= base_url() ?>employee_status/update/<?= $employee_status->id; ?>" class="btn btn-default btn-sm" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= base_url() ?>employee_status/read/<?= $employee_status->id; ?>" class="btn btn-default btn-sm" title="detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url() ?>employee_status/delete/<?= $employee_status->id; ?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete">
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