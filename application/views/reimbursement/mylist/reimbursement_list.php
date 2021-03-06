
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Reimbursement List</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('reimbursement/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
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
                <th>Engagement</th>
                <th>Period</th>
                <th>Approval</th>
                <th>Expense</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($reimbursement_data as $reimbursement)
            {
               $approvalStatusId = $reimbursement->approvalStatusId;
               if($approvalStatusId == 1){
                   $btnApproval = '<span class="btn btn-danger btn-sm">PENDING</span>';
               } else {
                    $btnApproval = '<span class="btn btn-success btn-sm">APPROVED</span>';
               }
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $reimbursement->engagementName ?></span></td>
			<td><?php echo $reimbursement->periodDate ?></td>
			<td><span class="btn btn-inverse btn-sm"><?php echo $reimbursement->fullname ?></span></td>
			<td><span class="btn btn-default btn-sm"><?php echo $reimbursement->expenseName ?></span></td>
			<td><?php echo rupiah($reimbursement->expenseAmount) ?></td>
			<td><?php echo date("d M,Y", strtotime($reimbursement->expenseDate)) ?></td>
			<td><?php echo $reimbursement->expenseDesc ?></td>
			<td><?php echo $btnApproval ?></td>
			<td style="text-align:center" width="200px">
                 <span class="tooltip-area">
                                            <a href="<?= site_url('reimbursement/update/' . $reimbursement->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= site_url('reimbursement/read/' . $reimbursement->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                                            </a>
                                           <!-- <a href="<?= site_url('reimbursement/delete/' . $reimbursement->id) ?>"  onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                                            </a>-->
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