<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>EXPENSE DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
       <table class="table">
	    
	    <tr><td>Expense Code</td><td><?php echo $expenseCode; ?></td></tr>
	    <tr><td>Expense Name</td><td><?php echo $expenseName; ?></td></tr>
	    <tr><td>Expense Cost</td><td><?php echo rupiah($expenseCost); ?></td></tr>
	  
	    <tr><td></td><td><a href="<?php echo site_url('expense') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>

