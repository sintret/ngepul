<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ENTITY DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
        <table class="table">
	    <tr><td>Company Name</td><td><?php echo $company_name; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Fax</td><td><?php echo $fax; ?></td></tr>
	    <tr><td>Logo</td><td><img src="<?=base_url();?>assets/uploads/entity/<?php echo $logo ?>" class="circle"></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('entity') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
