<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>APPROVE  </strong> /REIMBURSEMENT</h4>
    </header>
    <div class="panel-body">
        <?php
        if ($approvalStatusId == 1) {
            $appStatus = '<span class="btn btn-danger btn-sm">PENDING</span>';
        } else if ($approvalStatusId == 2) {
            $appStatus = '<span class="btn btn-success btn-sm">APPROVE</span>';
        }else if ($approvalStatusId == 3) {
            $appStatus = '<span class="btn btn-warning btn-sm">CANCEL</span>';
        }
        ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th>From:</th>
                    <th>Engagement</th>
                    <th>Period</th>
                    <th>Expense</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Approval</th>
                    <th>Approval Description</th>

                </tr>

            </thead>

            <tbody align="center">

                <tr>
                    <td><span class="btn btn-default btn-sm"><?php echo $read->fromName ?></span></td>
                    <td><span class="btn btn-default btn-sm"><?php echo $read->engagementName ?></span></td>
                    <td><?php echo $read->periodDate ?></td>
                    <td><span class="btn btn-default btn-sm"><?php echo $read->expenseName ?></span></td>
                    <td><?php echo rupiah($read->expenseAmount) ?></td>
                    <td><?php echo date("d M,Y", strtotime($read->expenseDate)) ?></td>
                    <td><?php echo $read->expenseDesc ?></td>
                    <td><?= $appStatus; ?></td>
                    <td><?= $read->approvalDesc; ?></td>
                </tr>
            </tbody>
        </table>

        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" data-collabel="2" data-label="color"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-12"> 
                        <label for="int">Approve This</label>
                        <select name="approvalStatusId" class="form-control" >
                            <option value="2">Approve</option>
                            <option value="3">Cancel</option>
                        </select>
                    </div>
                    <div class="col-sm-12"> 
                        <label for="int">Description</label>
                        <textarea name="approvalDesc" class="form-control" required="required"></textarea>
                    </div>
                </div>
            </div>
            
                 <hr/>
            <center>    
                 <input type="hidden" name="fromId" value="<?php echo $employeeId; ?>" /> 
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">APROVE</button> 
            </center>
        </form>

    </div>
</section>
