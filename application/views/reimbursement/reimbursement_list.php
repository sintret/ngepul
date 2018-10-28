
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Reimbursement List</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','create')){ ?>  
                    <li>
                        <a href="<?= base_url('reimbursement/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li> 
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','excel')){ ?>  
                    <li>
                        <a href="<?= base_url('reimbursement/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','word')){ ?>  
                    <li>
                        <a href="<?= site_url('reimbursement/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                   <?php } ?>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table id="mytable" class="stripe table-bordered order-column text-center" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>From:</th>
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
            $no=1;
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
			<td width="80px"><?php echo $no ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $reimbursement->fromName ?></span></td>
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
                                          <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','view')){ ?>  
                                            <a href="<?= base_url('reimbursement/read/' . $reimbursement->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                                            </a>
                                           <?php } ?> 
                                            <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','update')){ ?>  
                                                <a href="<?= base_url('reimbursement/update/' . $reimbursement->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                                            </a>
                                            <?php } ?>
                                            <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'reimbursement','delete')){ ?>  
                                               <a href="<?= base_url('reimbursement/delete/' . $reimbursement->id) ?>/page/<?=$start;?>"  onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                                            </a>
                                            <?php } ?>
                                        </span>
			
			</td>
		</tr>
                <?php
                $no++;
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