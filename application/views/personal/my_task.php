
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>My Engagement Task</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
               
            </div>
        <div class="panel-body">    
        <table  class="table table-striped table-hover tex-center" data-provide="data-table" id="toggle-column">
        <thead>
            <tr>
                <th>No</th>
		<th>Code</th>
		<th>ClientId</th>
		<th>Partner</th>
		<th>Manager</th>
		<th>Senior</th>
		<th>Date</th>
		<th>Update Date</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            if($engagement_data)
            foreach ($engagement_data as $engagement)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $engagement->code ?></td>
			<td><?php echo $engagement->clientName ?></td>
			<td><button type="button" class="btn btn-xs btn-primary btn-transparent"><?= $engagement->partner ?></button></td>
			<td><button type="button" class="btn btn-xs btn-success btn-transparent"><?= $engagement->manager ?></button></td>
			<td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $engagement->senior ?></button></td>
			<td><?php echo $engagement->engagementDate ?></td>
			<td><?php echo $engagement->updateDate ?></td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <!--<div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>-->
    
    </div>
    </div>