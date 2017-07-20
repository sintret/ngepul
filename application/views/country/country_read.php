<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Country</strong> /READ</h4>
    </header>
    <div class="panel-body">
         <table class="table">
	    <tr><td>CountryCode</td><td><?php echo $CountryCode; ?></td></tr>
	    <tr><td>CountryName</td><td><?php echo $CountryName; ?></td></tr>
	    <tr><td>CountryDeleted</td><td><?php echo $CountryDeleted; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('country') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
