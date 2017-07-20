
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Client</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('client/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('client/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('client/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>EnitityId</th>
		<th>ClientCode</th>
		<th>ClientName</th>
		<th>ClientStatus</th>
		<th>SectorId</th>
		<th>SubSector</th>
		<th>FsPeriode</th>
		<th>Address</th>
		<th>CityId</th>
		<th>ProvinceId</th>
		<th>MainProvince</th>
		<th>MainPostalCode</th>
		<th>MainPOBox</th>
		<th>MainPhone</th>
		<th>MainFax</th>
		<th>BillingAddress</th>
		<th>BillingCityId</th>
		<th>BillingPostalCode</th>
		<th>BillingPOBox</th>
		<th>BillingCountry</th>
		<th>BillingCPName</th>
		<th>BillingCPSalutation</th>
		<th>BillingCPPosition</th>
		<th>BillingCPPhone</th>
		<th>BillingCPFax</th>
		<th>BillingCPHandphone</th>
		<th>BillingCPEmail</th>
		<th>NpwpName</th>
		<th>NpwpAddress</th>
		<th>Npwp</th>
		<th>Ppn</th>
		<th>BpkmId</th>
		<th>Listed</th>
		<th>ListedType</th>
		<th>StockExchange</th>
		<th>ParentCompany</th>
		<th>ParentCountry</th>
		<th>PrevAuditor</th>
		<th>ForeignShareholders</th>
		<th>Multinational</th>
		<th>ClientDeleted</th>
		<th>UserCreate</th>
		<th>CreateDate</th>
		<th>UserUpdate</th>
		<th>UpdateDate</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($client_data as $client)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $client->enitityId ?></td>
			<td><?php echo $client->clientCode ?></td>
			<td><?php echo $client->clientName ?></td>
			<td><?php echo $client->clientStatus ?></td>
			<td><?php echo $client->sectorId ?></td>
			<td><?php echo $client->subSector ?></td>
			<td><?php echo $client->fsPeriode ?></td>
			<td><?php echo $client->address ?></td>
			<td><?php echo $client->cityId ?></td>
			<td><?php echo $client->provinceId ?></td>
			<td><?php echo $client->mainProvince ?></td>
			<td><?php echo $client->mainPostalCode ?></td>
			<td><?php echo $client->mainPOBox ?></td>
			<td><?php echo $client->mainPhone ?></td>
			<td><?php echo $client->mainFax ?></td>
			<td><?php echo $client->billingAddress ?></td>
			<td><?php echo $client->billingCityId ?></td>
			<td><?php echo $client->billingPostalCode ?></td>
			<td><?php echo $client->billingPOBox ?></td>
			<td><?php echo $client->billingCountry ?></td>
			<td><?php echo $client->billingCPName ?></td>
			<td><?php echo $client->billingCPSalutation ?></td>
			<td><?php echo $client->billingCPPosition ?></td>
			<td><?php echo $client->billingCPPhone ?></td>
			<td><?php echo $client->billingCPFax ?></td>
			<td><?php echo $client->billingCPHandphone ?></td>
			<td><?php echo $client->billingCPEmail ?></td>
			<td><?php echo $client->npwpName ?></td>
			<td><?php echo $client->npwpAddress ?></td>
			<td><?php echo $client->npwp ?></td>
			<td><?php echo $client->ppn ?></td>
			<td><?php echo $client->bpkmId ?></td>
			<td><?php echo $client->listed ?></td>
			<td><?php echo $client->listedType ?></td>
			<td><?php echo $client->stockExchange ?></td>
			<td><?php echo $client->parentCompany ?></td>
			<td><?php echo $client->parentCountry ?></td>
			<td><?php echo $client->prevAuditor ?></td>
			<td><?php echo $client->foreignShareholders ?></td>
			<td><?php echo $client->multinational ?></td>
			<td><?php echo $client->clientDeleted ?></td>
			<td><?php echo $client->userCreate ?></td>
			<td><?php echo $client->createDate ?></td>
			<td><?php echo $client->userUpdate ?></td>
			<td><?php echo $client->updateDate ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('client/read/'.$client->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('client/update/'.$client->id),'edit'); 
				echo ' | '; 
				echo anchor(site_url('client/delete/'.$client->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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