<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>READ</strong> </h4>
    </header>
    <div class="panel-body">
        <table class="table">
	    <tr><td>Bank Code</td><td><?php echo $BankCode; ?></td></tr>
	    <tr><td>Bank Name</td><td><?php echo $BankName; ?></td></tr>
	    <tr><td>Account Number</td><td><?php echo $AccountNumber; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $Description; ?></td></tr>
<!--	    <tr><td>BankDeleted</td><td><?php echo $BankDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('bank') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
