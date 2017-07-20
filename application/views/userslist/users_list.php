
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Users</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('userslist/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('userslist/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('userslist/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>Avatar</th>
		<th>User level</th>
		<th>Employee Name</th>
		<th>Username</th>
		<th>Email</th>
<!--		<th>Password</th>-->
		<th>Active</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($userslist_data as $userslist)
            {
                if($userslist->active == 1){
                    $spans = '<span class="btn btn-inverse">Active</span>';
                } else {                    
                    $spans = '<span class="btn btn-danger">Non Active</span>';
                }
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
                        <td><img width="80px" height="80px" src="<?=base_url();?>assets/uploads/employee/<?php echo $userslist->avatar ?>" class="circle"></td>
			<td><?= $userslist->userlevel_name ?></td>
			<td><?= $userslist->firstName ;?> <?=$userslist->lastName; ?></td>
			<td><?= $userslist->username ?></td>
			<td><?= $userslist->email ?></td>
<!--			<td><?= $userslist->password ?></td>-->
                        <td><?=$spans ?></td>
			<td style="text-align:center" width="200px">
                             <span class="tooltip-area">
                                        <a href="<?= base_url() ?>userslist/update/<?= $userslist->id; ?>" class="btn btn-default btn-sm" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= base_url() ?>userslist/read/<?= $userslist->id; ?>" class="btn btn-default btn-sm" title="detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url() ?>userslist/delete/<?= $userslist->id; ?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete">
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