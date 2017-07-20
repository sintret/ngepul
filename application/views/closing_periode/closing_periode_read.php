<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>CLOSING DETAIL</strong> /READ</h4>
    </header>
    <div class="panel-body">
           <table class="table">
               <tr><td>Closing Periode</td><td><span class="btn btn-default btn-sm"><?php echo $closingPeriode; ?></span></td></tr>
	    <tr><td>Closing Description</td><td><?php echo $closingInfo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('closing_periode') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>