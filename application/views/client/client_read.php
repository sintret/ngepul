<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Client Read</h2>
        <table class="table">
	    <tr><td>EnitityId</td><td><?php echo $enitityId; ?></td></tr>
	    <tr><td>ClientCode</td><td><?php echo $clientCode; ?></td></tr>
	    <tr><td>ClientName</td><td><?php echo $clientName; ?></td></tr>
	    <tr><td>ClientStatus</td><td><?php echo $clientStatus; ?></td></tr>
	    <tr><td>SectorId</td><td><?php echo $sectorId; ?></td></tr>
	    <tr><td>SubSector</td><td><?php echo $subSector; ?></td></tr>
	    <tr><td>FsPeriode</td><td><?php echo $fsPeriode; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>CityId</td><td><?php echo $cityId; ?></td></tr>
	    <tr><td>ProvinceId</td><td><?php echo $provinceId; ?></td></tr>
	    <tr><td>MainProvince</td><td><?php echo $mainProvince; ?></td></tr>
	    <tr><td>MainPostalCode</td><td><?php echo $mainPostalCode; ?></td></tr>
	    <tr><td>MainPOBox</td><td><?php echo $mainPOBox; ?></td></tr>
	    <tr><td>MainPhone</td><td><?php echo $mainPhone; ?></td></tr>
	    <tr><td>MainFax</td><td><?php echo $mainFax; ?></td></tr>
	    <tr><td>BillingAddress</td><td><?php echo $billingAddress; ?></td></tr>
	    <tr><td>BillingCityId</td><td><?php echo $billingCityId; ?></td></tr>
	    <tr><td>BillingPostalCode</td><td><?php echo $billingPostalCode; ?></td></tr>
	    <tr><td>BillingPOBox</td><td><?php echo $billingPOBox; ?></td></tr>
	    <tr><td>BillingCountry</td><td><?php echo $billingCountry; ?></td></tr>
	    <tr><td>BillingCPName</td><td><?php echo $billingCPName; ?></td></tr>
	    <tr><td>BillingCPSalutation</td><td><?php echo $billingCPSalutation; ?></td></tr>
	    <tr><td>BillingCPPosition</td><td><?php echo $billingCPPosition; ?></td></tr>
	    <tr><td>BillingCPPhone</td><td><?php echo $billingCPPhone; ?></td></tr>
	    <tr><td>BillingCPFax</td><td><?php echo $billingCPFax; ?></td></tr>
	    <tr><td>BillingCPHandphone</td><td><?php echo $billingCPHandphone; ?></td></tr>
	    <tr><td>BillingCPEmail</td><td><?php echo $billingCPEmail; ?></td></tr>
	    <tr><td>NpwpName</td><td><?php echo $npwpName; ?></td></tr>
	    <tr><td>NpwpAddress</td><td><?php echo $npwpAddress; ?></td></tr>
	    <tr><td>Npwp</td><td><?php echo $npwp; ?></td></tr>
	    <tr><td>Ppn</td><td><?php echo $ppn; ?></td></tr>
	    <tr><td>BpkmId</td><td><?php echo $bpkmId; ?></td></tr>
	    <tr><td>Listed</td><td><?php echo $listed; ?></td></tr>
	    <tr><td>ListedType</td><td><?php echo $listedType; ?></td></tr>
	    <tr><td>StockExchange</td><td><?php echo $stockExchange; ?></td></tr>
	    <tr><td>ParentCompany</td><td><?php echo $parentCompany; ?></td></tr>
	    <tr><td>ParentCountry</td><td><?php echo $parentCountry; ?></td></tr>
	    <tr><td>PrevAuditor</td><td><?php echo $prevAuditor; ?></td></tr>
	    <tr><td>ForeignShareholders</td><td><?php echo $foreignShareholders; ?></td></tr>
	    <tr><td>Multinational</td><td><?php echo $multinational; ?></td></tr>
	    <tr><td>ClientDeleted</td><td><?php echo $clientDeleted; ?></td></tr>
	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>