<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
$accesslevelId = $this->session->userdata('userlevelId');
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>REIMBURSEMENT </strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" data-collabel="2" data-label="color"  enctype="multipart/form-data">
           
        <div class="row">
            <div class="col-lg-12">
                 <div class="row">
                      <div class="col-sm-12"> 
                                <label for="int">employee <?php echo form_error('employeeId') ?></label>
                                <input type="text" name="employeeId" value="<?php echo $this->session->userdata('employeeId'); ?>" /> 
                        </div>
                        
                        <div class="col-sm-3">                          
                                <label for="int">Engagement <?php echo form_error('engagementId') ?></label>
                                <select name="engagementId" class="form-control" >
                                    <?php 
                                    foreach($engagements as $rsEngagement){
                                    ?>
                                        <option value="<?= $rsEngagement->id;?>" <?php if($rsEngagement->id == $engagementId) { echo "selected"; }?>>
                                                <?= $rsEngagement->name;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        
                        <div class="col-sm-3">                            
                                    <label for="varchar">Period Date <?php echo form_error('periodDate') ?></label>
                                    <input type="text" class="form-control" name="periodDate" id="date" placeholder="PeriodDate" value="<?php if($id) { echo date('d/m/Y',strtotime($periodDate));} else { echo date('d/m/Y'); } ?>" />
                        </div>
                        
                         <div class="col-sm-3">             
                             <label for="date">Expense Date <?php echo form_error('expenseDate') ?></label>
                             <input type="text" class="form-control" name="expenseDate" id="date" placeholder="ExpenseDate" value="<?php if($id) { echo date('d/m/Y',strtotime($expenseDate));} else { echo date('d/m/Y'); } ?>" />
                          </div>
                        <div class="col-sm-3"> 
                                <label for="int">Approval To <?php echo form_error('approvalId') ?></label>
                               <select name="approvalId" class="form-control" >
                                    <?php 
                                    foreach($employees as $rsEmployee){
                                    ?>
                                        <option value="<?= $rsEmployee->id;?>" <?php if($rsEmployee->id == $approvalId) { echo "selected"; }?>>
                                            <?= $rsEmployee->firstName;?>  <?= $rsEmployee->lastName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                </div>
                </div>
                
                 <div class="col-lg-12">
                    <div class="row">
                         <div class="col-sm-3">             
                                <label for="int">Expense <?php echo form_error('expenseId') ?></label>
                                <select name="expenseId" class="form-control" >
                                    <?php 
                                    foreach($expenses as $rsExpense){
                                    ?>
                                        <option value="<?= $rsExpense->id;?>"  <?php if($rsExpense->id == $expenseId) { echo "selected"; }?>>
                                            <?= $rsExpense->expenseName;?> 
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                         <div class="col-sm-3">                             
                                    <label for="double">Expense Amount <?php echo form_error('expenseAmount') ?></label>
                                    <input type="text" class="form-control" name="expenseAmount" id="expenseAmount" placeholder="ExpenseAmount" value="<?php echo $expenseAmount; ?>" />
                          </div>
                         <div class="col-sm-6">
                            <label for="expenseDesc">Expense Description <?php echo form_error('expenseDesc') ?></label>
                             <input type="text" class="form-control" rows="3" name="expenseDesc" id="expenseDesc" placeholder="ExpenseDesc" value="<?php echo $expenseDesc; ?>" >
                        </div>
                        </div>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="row"> <br/>
                            <div class="col-sm-12">
                                <h5><b>APPROVAL :</b></h5>
                                </div>
                             </div>
                        </div>   
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-4">
                                     <label for="tinyint">Approval Status <?php echo form_error('approvalStatusId') ?></label>
                                    <select name="approvalStatusId" class="form-control" >
                                        <option value="1" <?php if($approvalStatusId == 1) { echo "selected"; }?>>PENDING</option>
                                        <option value="2" <?php if($approvalStatusId == 2) { echo "selected"; }?>>Approve</option>
                                </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="int">Approval By <?php echo form_error('approvalBy') ?></label>
                                   <select name="approvalBy" class="form-control" >
                                    <?php 
                                    foreach($employees as $rsEmployee){
                                    ?>
                                        <option value="<?= $rsEmployee->id;?>" <?php if($rsEmployee->id == $approvalBy) { echo "selected"; }?>>
                                            <?= $rsEmployee->firstName;?>  <?= $rsEmployee->lastName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="date">Approval Date <?php echo form_error('approvalDate') ?></label>
                                    <input type="text" class="form-control" name="approvalDate" id="date" placeholder="ApprovalDate" value="<?php if($id) { echo date('d/m/Y',strtotime($approvalDate));} else { echo date('d/m/Y'); } ?>" />
                                </div>
                                <div class="col-sm-12">
                                     <label for="approvalDesc">Approval Desc <?php echo form_error('approvalDesc') ?></label>
                                    <textarea class="form-control" rows="3" name="approvalDesc" id="approvalDesc" placeholder="ApprovalDesc"><?php echo $approvalDesc; ?></textarea>
                                </div>
                            </div>
                        </div>
            </div>
        <div>
           
        
	 
	    
	   
	   
            
            <hr/>
            <center>    
                
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('reimbursement') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
