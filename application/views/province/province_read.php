<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Country</strong> /READ</h4>
    </header>
    <div class="panel-body">
        <table class="table">
	    <tr><td>Country Name</td><td><?php echo $countryName; ?></td></tr>
	    <tr><td>Province Code</td><td><?php echo $provinceCode; ?></td></tr>
	    <tr><td>Province Name</td><td><?php echo $provinceName; ?></td></tr>
<!--	    <tr><td>ProvinceDeleted</td><td><?php echo $provinceDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('province') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
