<section class="panel" >
    <header class="panel-heading btn-inverse">
        <h4><strong>READ</strong> </h4>
    </header>
    <div class="panel-body">
        <table class="table">
	    <tr><td>Client Code</td><td><?php echo $clientCode; ?></td></tr>
	    <tr><td>Client Name</td><td><?php echo $clientName; ?></td></tr>
            <tr><td>Client Status</td><td><?php if($clientStatus ==1) { echo "active"; } else { echo "non active"; } ?></td></tr>
            <tr><td>Sector</td><td><?php if(empty($row->sectorName) || $row->sectorName == 0) { echo "not set"; } else {  echo $row->sectorName; }?></td></tr>
	    <tr><td>FsPeriode</td><td><?php echo $row->closingPeriode; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>CityI</td><td><?php echo $row->cityName; ?></td></tr>
	    <tr><td>Province</td><td><?php if(empty($row->provinceId) || $row->provinceId == 0) { echo "not set"; } else {  echo $row->provinceName; }?></td></tr>
	    <tr><td>Main Postal Code</td><td><?php echo $mainPostalCode; ?></td></tr>
	    <tr><td>Main POBox</td><td><?php echo $mainPOBox; ?></td></tr>
	    <tr><td>Main Phone</td><td><?php echo $mainPhone; ?></td></tr>
	    <tr><td>Main Fax</td><td><?php echo $mainFax; ?></td></tr>
	    <tr><td>Billing Address</td><td><?php echo $billingAddress; ?></td></tr>
	    <tr><td>Billing CityId</td><td><?php echo $billingCityId; ?></td></tr>
	    <tr><td>Billing Postal Code</td><td><?php echo $billingPostalCode; ?></td></tr>
	    <tr><td>Billing PO Box</td><td><?php echo $billingPOBox; ?></td></tr>
<!--	    <tr><td>BillingCountry</td><td><?php echo $billingCountry; ?></td></tr>-->
	    <tr><td>Billing CP Name</td><td><?php echo $billingCPName; ?></td></tr>
	    <tr><td>Billing CP Salutation</td><td><?php echo $billingCPSalutation; ?></td></tr>
	    <tr><td>Billing CP Position</td><td><?php echo $billingCPPosition; ?></td></tr>
	    <tr><td>Billing CP Phone</td><td><?php echo $billingCPPhone; ?></td></tr>
	    <tr><td>Billing CP Fax</td><td><?php echo $billingCPFax; ?></td></tr>
	    <tr><td>Billing CP Handphone</td><td><?php echo $billingCPHandphone; ?></td></tr>
	    <tr><td>Billing CP Email</td><td><?php echo $billingCPEmail; ?></td></tr>
	    <tr><td>Npwp Name</td><td><?php echo $npwpName; ?></td></tr>
	    <tr><td>Npwp Address</td><td><?php echo $npwpAddress; ?></td></tr>
	    <tr><td>Npwp</td><td><?php echo $npwp; ?></td></tr>
	    <tr><td>Ppn</td><td><?php echo $ppn; ?></td></tr>
	    <tr><td>BpkmId</td><td><?php echo $bpkmId; ?></td></tr>
<!--	    <tr><td>Listed</td><td><?php echo $listed; ?></td></tr>
	    <tr><td>ListedType</td><td><?php echo $listedType; ?></td></tr>-->
	    <tr><td>Stock Exchange</td><td><?php echo $stockExchange; ?></td></tr>
	    <tr><td>Parent Company</td><td><?php echo $parentCompany; ?></td></tr>
<!--	    <tr><td>ParentCountry</td><td><?php echo $parentCountry; ?></td></tr>-->
	    <tr><td>Prev Auditor</td><td><?php echo $prevAuditor; ?></td></tr>
	    <tr><td>Foreign Shareholders</td><td><?php echo $foreignShareholders; ?></td></tr>
	    <tr><td>Multinational</td><td><?php echo $multinational; ?></td></tr>
<!--	    <tr><td>ClientDeleted</td><td><?php echo $clientDeleted; ?></td></tr>-->
<!--	    <tr><td>UserCreate</td><td><?php echo $userCreate; ?></td></tr>
	    <tr><td>CreateDate</td><td><?php echo $createDate; ?></td></tr>
	    <tr><td>UserUpdate</td><td><?php echo $userUpdate; ?></td></tr>-->
	    <tr><td>UpdateDate</td><td><?php echo $updateDate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

</section>
