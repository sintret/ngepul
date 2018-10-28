<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
$accesslevelId = $this->session->userdata('userlevelId');
?>
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>REIMBURSEMENT </strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" data-collabel="2" data-label="color"  enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        //echo $accesslevelId;
                        if ($accesslevelId == 1 || $accesslevelId == 2) {
                            ?>
                            <div class="col-sm-12"> 
                                <label for="int">employee <?php echo form_error('employeeId') ?></label>
                                <select name="employeeId" class="form-control selectpicker  show-tick" data-live-search="true">
                                    <?php
                                    foreach ($employees as $rsEmployee) {
                                        ?>
                                        <option value="<?= $rsEmployee->id; ?>" <?php if ($rsEmployee->id == $employeeId) {
                                    echo "selected";
                                } ?>>
                                        <?= $rsEmployee->firstName; ?>  <?= $rsEmployee->lastName; ?> 
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                        } else {
                            ?>
                          <div class="col-sm-12"> 
                           <input type="text" name="employeeShowId" disabled="disabled" class="form-control" value="<?php echo $this->session->userdata('fullName'); ?>" /> 
                            <input type="hidden" name="employeeId" value="<?php echo $this->session->userdata('employeeId'); ?>" /> 
                          </div>   
                         <?php
                        }
                        ?>
                        <div class="col-sm-3">                          
                            <label for="int">Engagement <?php echo form_error('engagementId') ?></label>
                            <select name="engagementId" class="form-control selectpicker  show-tick" data-live-search="true" >
                                <?php
                                foreach ($engagements as $rsEngagement) {
                                    ?>
                                    <option value="<?= $rsEngagement->id; ?>" <?php if ($rsEngagement->id == $engagementId) {
                                        echo "selected";
                                    } ?>>
                                    <?= $rsEngagement->name; ?>
                                    </option>
    <?php
}
?>
                            </select>
                        </div>

                        <div class="col-sm-3">                            
                            <label for="varchar">Period Date <?php echo form_error('periodDate') ?></label>
                            <input type="text" class="form-control" name="periodDate" id="date" placeholder="PeriodDate" value="<?php if ($id) {
    echo date('d/m/Y', strtotime($periodDate));
} else {
    echo date('d/m/Y');
} ?>" />
                        </div>

                        <div class="col-sm-3">             
                            <label for="date">Expense Date <?php echo form_error('expenseDate') ?></label>
                            <input type="text" class="form-control" name="expenseDate" id="date" placeholder="ExpenseDate" value="<?php if ($id) {
                                    echo date('d/m/Y', strtotime($expenseDate));
                                } else {
                                    echo date('d/m/Y');
                                } ?>" />
                        </div>
                        <div class="col-sm-3"> 
                            <label for="int">Approval To <?php echo form_error('approvalId') ?></label>
                            <select name="approvalId" class="form-control selectpicker  show-tick" data-live-search="true" >
<?php
foreach ($employees as $rsEmployee) {
    ?>
                                    <option value="<?= $rsEmployee->id; ?>" <?php if ($rsEmployee->id == $approvalId) {
        echo "selected";
    } ?>>
                                    <?= $rsEmployee->firstName; ?>  <?= $rsEmployee->lastName; ?>
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
                            <select name="expenseId" id="expenseId" class="form-control">
                                    <?php
                                    foreach ($expenses as $rsExpense) {
                                        if($rsExpense->fixStatusId == 1){
                                            $statusExpense = "true";
                                        } else {
                                            $statusExpense = "false";
                                        }
                                        ?>
                                    <option value="<?= $rsExpense->id; ?>" 
                                            data-price="<?= rupiah($rsExpense->expenseCost);?>" data-status="<?= $rsExpense->fixStatusId;?>" 
                                            <?php if ($rsExpense->id == $expenseId) {
                                                echo "selected";
                                            } ?>>
                                        <?= $rsExpense->expenseName; ?> 
                                    </option>
                                   <?php
                                    }
                                    ?>
                            </select>

                        </div>

                        <div class="col-sm-3">                             
                            <label for="double">Expense Amount <?php echo form_error('expenseAmount') ?></label>
                            <input type="text" class="form-control" name="showExpenseAmount" id="showExpenseAmount" placeholder="ExpenseAmount" value="<?php echo $expenseAmount; ?>" />
                            <input type="hidden" class="form-control" name="expenseAmount" id="expenseAmount" placeholder="ExpenseAmount" value="<?php echo $expenseAmount; ?>" />
                            <input type="hidden" class="form-control" name="expenseStatus" id="expenseStatus" placeholder="expenseStatus"  />
                        </div>
                        <div class="col-sm-6">
                            <label for="expenseDesc">Expense Description <?php echo form_error('expenseDesc') ?></label>
                            <input type="text" class="form-control" rows="3" name="expenseDesc" id="expenseDesc" placeholder="ExpenseDesc" value="<?php echo $expenseDesc; ?>" >
                        </div>
                    </div>
                </div>


            </div>
    </div>
        <hr/>
        <center>    

            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <a href="<?php echo site_url('reimbursement') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        </center>
        </form>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
<script>
$(document).ready(function() {

    $("#expenseId option").filter(function() {
        return $(this).val() == $("#firstname").val();
    }).attr('selected', true);

    $("#expenseId").on("change", function() {
        $("#showExpenseAmount").val($(this).find("option:selected").data("price"));
        $("#expenseAmount").val($(this).find("option:selected").data("price"));        
        $("#expenseStatus").val($(this).find("option:selected").data("status"));
       // document.getElementById("showExpenseAmount").disabled = true;
    });
    $('#expenseId').change(function() {
  	if( $("#expenseStatus").val() == 1) 
        {
            $('#showExpenseAmount').prop( "disabled", false );
        } else {       
            $('#showExpenseAmount').prop( "disabled", true );
        }
  });
    
});
</script>