
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>PTS GENERAL REPORT</strong> </h4>
    </header>
    <div class="panel-body">
        <?= $this->session->flashdata('eroor_set'); ?>

        <form class="form-horizontal" action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-4">
                    <label for="varchar">Report Type</label>
                    <select name="type" class="form-control" >
                        <option value="1">Engagement</option>
                        <option value="2">Employee</option>
                        <option value="3">Reimbursement</option>
                        <option value="4">Non Chargeable</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="varchar">Start Date</label>
                    <input type="text" class="form-control" name="startDate" id="date" placeholder="Start Date"  />
                </div>
                <div class="col-sm-4">
                    <label for="varchar">End Date</label>
                    <input type="text" class="form-control" name="endDate" id="date" placeholder="End Date"  />
                </div>
            </div>
            <hr/>
            <center>    
                <a href="<?php echo site_url('report') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">SEARCH</button> 
            </center>
        </form>

    </div>
    
    <div class="panel-body">
        <header class="panel-heading btn-inverse">
        <h4><strong>REIMBURSEMENT REPORT</strong> </h4>
        </header>
        
         <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <center> <h4><strong><?= date('d M, Y',strtotime($startDate)). ' - '. date('d M, Y',strtotime($endDate));?></strong> </h4></center>
            </div>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
                <th>From:</th>
                <th>Engagement</th>
                <th>Period</th>
                <th>Expense</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            $no=11;
            foreach ($results as $reimbursement)
            {
               $approvalStatusId = $reimbursement->approvalStatusId;
               if($approvalStatusId == 1){
                   $btnApproval = '<span class="btn btn-danger btn-sm">PENDING</span>';
               } else {
                    $btnApproval = '<span class="btn btn-success btn-sm">APPROVED</span>';
               }
                ?>
                <tr>
			<td width="80px"><?= $no;?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $reimbursement->fullName ?></span></td>
			<td><span class="btn btn-default btn-sm"><?php echo $reimbursement->engagementName ?></span></td>
			<td><?php echo $reimbursement->periodDate ?></td>
			<td><span class="btn btn-default btn-sm"><?= $reimbursement->expenseName;?></span></td>
			<td><?php echo rupiah($reimbursement->expenseAmount) ?></td>
			<td><?php echo date("d M,Y", strtotime($reimbursement->expenseDate)) ?></td>
			<td><?php echo $reimbursement->expenseDesc ?></td>
			<td><?php echo $btnApproval ?></td>
		</tr>
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
        </div>
        
     </div>
</section>

