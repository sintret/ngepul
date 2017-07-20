
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Engagement</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('engagement/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('engagement/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('engagement/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>Code</th>
		<th>EngagementDate</th>
		<th>ClientId</th>
		<th>ServiceTitleId</th>
		<th>YearService</th>
		<th>Description</th>
		<th>PartnerId</th>
		<th>ManagerId</th>
		<th>SeniorId</th>
		<th>Complexity</th>
		<th>Risk</th>
		<th>AgreedFees</th>
		<th>AgreedExpenses</th>
		<th>EstimatedCost</th>
		<th>SigningPartnerId</th>
		<th>EngagementPartnerId</th>
		<th>Asset</th>
		<th>Rl</th>
		<th>ReportNo</th>
		<th>ReportDate</th>
		<th>Opinion</th>
		<th>JobFromEmployeeId</th>
		<th>FinishStatusId</th>
		<th>FinishDate</th>
		<th>FinishApproveBy</th>
		<th>Closing</th>
		<th>ClosingDate</th>
		<th>Deleted</th>
		<th>Inputby</th>
		<th>Version</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($engagement_data as $engagement)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $engagement->entityId ?></td>
			<td><?php echo $engagement->code ?></td>
			<td><?php echo $engagement->engagementDate ?></td>
			<td><?php echo $engagement->clientId ?></td>
			<td><?php echo $engagement->serviceTitleId ?></td>
			<td><?php echo $engagement->yearService ?></td>
			<td><?php echo $engagement->description ?></td>
			<td><?php echo $engagement->partnerId ?></td>
			<td><?php echo $engagement->managerId ?></td>
			<td><?php echo $engagement->seniorId ?></td>
			<td><?php echo $engagement->complexity ?></td>
			<td><?php echo $engagement->risk ?></td>
			<td><?php echo $engagement->agreedFees ?></td>
			<td><?php echo $engagement->agreedExpenses ?></td>
			<td><?php echo $engagement->estimatedCost ?></td>
			<td><?php echo $engagement->signingPartnerId ?></td>
			<td><?php echo $engagement->engagementPartnerId ?></td>
			<td><?php echo $engagement->asset ?></td>
			<td><?php echo $engagement->rl ?></td>
			<td><?php echo $engagement->reportNo ?></td>
			<td><?php echo $engagement->reportDate ?></td>
			<td><?php echo $engagement->opinion ?></td>
			<td><?php echo $engagement->jobFromEmployeeId ?></td>
			<td><?php echo $engagement->finishStatusId ?></td>
			<td><?php echo $engagement->finishDate ?></td>
			<td><?php echo $engagement->finishApproveBy ?></td>
			<td><?php echo $engagement->closing ?></td>
			<td><?php echo $engagement->closingDate ?></td>
			<td><?php echo $engagement->deleted ?></td>
			<td><?php echo $engagement->inputby ?></td>
			<td><?php echo $engagement->version ?></td>
			<td><?php echo $engagement->userCreate ?></td>
			<td><?php echo $engagement->createDate ?></td>
			<td><?php echo $engagement->userUpdate ?></td>
			<td><?php echo $engagement->updateDate ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('engagement/read/'.$engagement->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('engagement/update/'.$engagement->id),'edit'); 
				echo ' | '; 
				echo anchor(site_url('engagement/delete/'.$engagement->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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