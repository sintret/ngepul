<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Client List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($client_data as $client)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>