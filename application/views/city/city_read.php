<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>CITY</strong> /READ</h4>
    </header>
    <div class="panel-body">
         <table class="table">
	    <tr><td>CODE</td><td><?php echo $cityCode; ?></td></tr>
	    <tr><td>City Name</td><td><?php echo $cityName; ?></td></tr>
	    <tr><td>City Province</td><td><?php echo $provinceName; ?></td></tr>
<!--	    <tr><td>CityDeleted</td><td><?php echo $cityDeleted; ?></td></tr>-->
	    <tr><td></td><td><a href="<?php echo site_url('city') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
