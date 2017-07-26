<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>EXPENSE PARAMETER SETTING</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

       
	    <div class="form-group">
            <label for="varchar">Expense Code <?php echo form_error('expenseCode') ?></label>
            <input type="text" class="form-control" name="expenseCode" id="expenseCode" placeholder="ExpenseCode" value="<?php echo $expenseCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Expense Name <?php echo form_error('expenseName') ?></label>
            <input type="text" class="form-control" name="expenseName" id="expenseName" placeholder="ExpenseName" value="<?php echo $expenseName; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Expense Cost <?php echo form_error('expenseCost') ?></label>
            <input type="text" class="form-control" name="expenseCost" id="expenseCost" placeholder="ExpenseCost" value="<?php echo $expenseCost; ?>" />
        </div>
            
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('expense') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

