
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Clientcontactperson</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('clientcontactperson/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('clientcontactperson/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('clientcontactperson/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
		<th>EntityId</th>
		<th>ClientId</th>
		<th>ClientCode</th>
		<th>ContactName</th>
		<th>Salutation</th>
		<th>Position</th>
		<th>Handphone</th>
		<th>EmailAddress</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($clientcontactperson_data as $clientcontactperson)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $clientcontactperson->entityId ?></td>
			<td><?php echo $clientcontactperson->clientId ?></td>
			<td><?php echo $clientcontactperson->clientCode ?></td>
			<td><?php echo $clientcontactperson->contactName ?></td>
			<td><?php echo $clientcontactperson->salutation ?></td>
			<td><?php echo $clientcontactperson->position ?></td>
			<td><?php echo $clientcontactperson->handphone ?></td>
			<td><?php echo $clientcontactperson->emailAddress ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('clientcontactperson/read/'.$clientcontactperson->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('clientcontactperson/update/'.$clientcontactperson->id),'edit'); 
				echo ' | '; 
				echo anchor(site_url('clientcontactperson/delete/'.$clientcontactperson->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>