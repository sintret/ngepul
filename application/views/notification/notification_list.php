
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong> My Notification List</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('notification/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('notification/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('notification/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>Title</th>
		<th>Message</th>
		<th>Approval Link</th>
		<th>Read</th>
		<th>UpdatedAt</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            if(empty($notification_data)){
                echo "Your Notification Is Empty";
            } else {
            foreach ($notification_data as $notification)
            {
                if($notification->read == 1){
                    $spanClass = '<span class="btn btn-success btn-sm">READ</span>';
                } else {
                    $spanClass = '<span class="btn btn-danger btn-sm">UNREAD</span>';
                }
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $notification->title ?></td>
			<td><?php echo $notification->message ?></td>
			<td>
                            <a href="<?php echo $notification->url ?>">
                                <span class="btn btn-info btn-sm">Visit To Approve</span>
                            </a>
                        </td>
                        <td><?php echo $spanClass ?></td>
			<td><?php echo $notification->updatedAt ?></td>
			<td style="text-align:center" width="200px">
                                        <span class="tooltip-area">
<!--                                            <a href="<?= site_url('notification/update/' . $notification->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                                            </a>-->
                                            <a href="<?= site_url('notification/read/' . $notification->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?= site_url('notification/mark_read/' . $notification->id) ?>"  onclick="javasciprt: return confirm('Mark this as read ?')" class="btn btn-default btn-sm" title="Mark As Read" onclick="javasciprt: return confirm('Mark As Read ?')"><i class="fa fa-eraser"></i>
                                            </a>
                                        </span>
				
			</td>
		</tr>
                <?php
            }
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