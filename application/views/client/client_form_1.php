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
        <h2 style="margin-top:0px">Client <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">EnitityId <?php echo form_error('enitityId') ?></label>
            <input type="text" class="form-control" name="enitityId" id="enitityId" placeholder="EnitityId" value="<?php echo $enitityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ClientCode <?php echo form_error('clientCode') ?></label>
            <input type="text" class="form-control" name="clientCode" id="clientCode" placeholder="ClientCode" value="<?php echo $clientCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ClientName <?php echo form_error('clientName') ?></label>
            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="ClientName" value="<?php echo $clientName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ClientStatus <?php echo form_error('clientStatus') ?></label>
            <input type="text" class="form-control" name="clientStatus" id="clientStatus" placeholder="ClientStatus" value="<?php echo $clientStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">SectorId <?php echo form_error('sectorId') ?></label>
            <input type="text" class="form-control" name="sectorId" id="sectorId" placeholder="SectorId" value="<?php echo $sectorId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SubSector <?php echo form_error('subSector') ?></label>
            <input type="text" class="form-control" name="subSector" id="subSector" placeholder="SubSector" value="<?php echo $subSector; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">FsPeriode <?php echo form_error('fsPeriode') ?></label>
            <input type="text" class="form-control" name="fsPeriode" id="fsPeriode" placeholder="FsPeriode" value="<?php echo $fsPeriode; ?>" />
        </div>
	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">CityId <?php echo form_error('cityId') ?></label>
            <input type="text" class="form-control" name="cityId" id="cityId" placeholder="CityId" value="<?php echo $cityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ProvinceId <?php echo form_error('provinceId') ?></label>
            <input type="text" class="form-control" name="provinceId" id="provinceId" placeholder="ProvinceId" value="<?php echo $provinceId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MainProvince <?php echo form_error('mainProvince') ?></label>
            <input type="text" class="form-control" name="mainProvince" id="mainProvince" placeholder="MainProvince" value="<?php echo $mainProvince; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MainPostalCode <?php echo form_error('mainPostalCode') ?></label>
            <input type="text" class="form-control" name="mainPostalCode" id="mainPostalCode" placeholder="MainPostalCode" value="<?php echo $mainPostalCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MainPOBox <?php echo form_error('mainPOBox') ?></label>
            <input type="text" class="form-control" name="mainPOBox" id="mainPOBox" placeholder="MainPOBox" value="<?php echo $mainPOBox; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MainPhone <?php echo form_error('mainPhone') ?></label>
            <input type="text" class="form-control" name="mainPhone" id="mainPhone" placeholder="MainPhone" value="<?php echo $mainPhone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MainFax <?php echo form_error('mainFax') ?></label>
            <input type="text" class="form-control" name="mainFax" id="mainFax" placeholder="MainFax" value="<?php echo $mainFax; ?>" />
        </div>
	    <div class="form-group">
            <label for="billingAddress">BillingAddress <?php echo form_error('billingAddress') ?></label>
            <textarea class="form-control" rows="3" name="billingAddress" id="billingAddress" placeholder="BillingAddress"><?php echo $billingAddress; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">BillingCityId <?php echo form_error('billingCityId') ?></label>
            <input type="text" class="form-control" name="billingCityId" id="billingCityId" placeholder="BillingCityId" value="<?php echo $billingCityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingPostalCode <?php echo form_error('billingPostalCode') ?></label>
            <input type="text" class="form-control" name="billingPostalCode" id="billingPostalCode" placeholder="BillingPostalCode" value="<?php echo $billingPostalCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingPOBox <?php echo form_error('billingPOBox') ?></label>
            <input type="text" class="form-control" name="billingPOBox" id="billingPOBox" placeholder="BillingPOBox" value="<?php echo $billingPOBox; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCountry <?php echo form_error('billingCountry') ?></label>
            <input type="text" class="form-control" name="billingCountry" id="billingCountry" placeholder="BillingCountry" value="<?php echo $billingCountry; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPName <?php echo form_error('billingCPName') ?></label>
            <input type="text" class="form-control" name="billingCPName" id="billingCPName" placeholder="BillingCPName" value="<?php echo $billingCPName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">BillingCPSalutation <?php echo form_error('billingCPSalutation') ?></label>
            <input type="text" class="form-control" name="billingCPSalutation" id="billingCPSalutation" placeholder="BillingCPSalutation" value="<?php echo $billingCPSalutation; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPPosition <?php echo form_error('billingCPPosition') ?></label>
            <input type="text" class="form-control" name="billingCPPosition" id="billingCPPosition" placeholder="BillingCPPosition" value="<?php echo $billingCPPosition; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPPhone <?php echo form_error('billingCPPhone') ?></label>
            <input type="text" class="form-control" name="billingCPPhone" id="billingCPPhone" placeholder="BillingCPPhone" value="<?php echo $billingCPPhone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPFax <?php echo form_error('billingCPFax') ?></label>
            <input type="text" class="form-control" name="billingCPFax" id="billingCPFax" placeholder="BillingCPFax" value="<?php echo $billingCPFax; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPHandphone <?php echo form_error('billingCPHandphone') ?></label>
            <input type="text" class="form-control" name="billingCPHandphone" id="billingCPHandphone" placeholder="BillingCPHandphone" value="<?php echo $billingCPHandphone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BillingCPEmail <?php echo form_error('billingCPEmail') ?></label>
            <input type="text" class="form-control" name="billingCPEmail" id="billingCPEmail" placeholder="BillingCPEmail" value="<?php echo $billingCPEmail; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NpwpName <?php echo form_error('npwpName') ?></label>
            <input type="text" class="form-control" name="npwpName" id="npwpName" placeholder="NpwpName" value="<?php echo $npwpName; ?>" />
        </div>
	    <div class="form-group">
            <label for="npwpAddress">NpwpAddress <?php echo form_error('npwpAddress') ?></label>
            <textarea class="form-control" rows="3" name="npwpAddress" id="npwpAddress" placeholder="NpwpAddress"><?php echo $npwpAddress; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Npwp <?php echo form_error('npwp') ?></label>
            <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Ppn <?php echo form_error('ppn') ?></label>
            <input type="text" class="form-control" name="ppn" id="ppn" placeholder="Ppn" value="<?php echo $ppn; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">BpkmId <?php echo form_error('bpkmId') ?></label>
            <input type="text" class="form-control" name="bpkmId" id="bpkmId" placeholder="BpkmId" value="<?php echo $bpkmId; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Listed <?php echo form_error('listed') ?></label>
            <input type="text" class="form-control" name="listed" id="listed" placeholder="Listed" value="<?php echo $listed; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ListedType <?php echo form_error('listedType') ?></label>
            <input type="text" class="form-control" name="listedType" id="listedType" placeholder="ListedType" value="<?php echo $listedType; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">StockExchange <?php echo form_error('stockExchange') ?></label>
            <input type="text" class="form-control" name="stockExchange" id="stockExchange" placeholder="StockExchange" value="<?php echo $stockExchange; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ParentCompany <?php echo form_error('parentCompany') ?></label>
            <input type="text" class="form-control" name="parentCompany" id="parentCompany" placeholder="ParentCompany" value="<?php echo $parentCompany; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ParentCountry <?php echo form_error('parentCountry') ?></label>
            <input type="text" class="form-control" name="parentCountry" id="parentCountry" placeholder="ParentCountry" value="<?php echo $parentCountry; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PrevAuditor <?php echo form_error('prevAuditor') ?></label>
            <input type="text" class="form-control" name="prevAuditor" id="prevAuditor" placeholder="PrevAuditor" value="<?php echo $prevAuditor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ForeignShareholders <?php echo form_error('foreignShareholders') ?></label>
            <input type="text" class="form-control" name="foreignShareholders" id="foreignShareholders" placeholder="ForeignShareholders" value="<?php echo $foreignShareholders; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Multinational <?php echo form_error('multinational') ?></label>
            <input type="text" class="form-control" name="multinational" id="multinational" placeholder="Multinational" value="<?php echo $multinational; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">ClientDeleted <?php echo form_error('clientDeleted') ?></label>
            <input type="text" class="form-control" name="clientDeleted" id="clientDeleted" placeholder="ClientDeleted" value="<?php echo $clientDeleted; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserCreate <?php echo form_error('userCreate') ?></label>
            <input type="text" class="form-control" name="userCreate" id="userCreate" placeholder="UserCreate" value="<?php echo $userCreate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">CreateDate <?php echo form_error('createDate') ?></label>
            <input type="text" class="form-control" name="createDate" id="createDate" placeholder="CreateDate" value="<?php echo $createDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserUpdate <?php echo form_error('userUpdate') ?></label>
            <input type="text" class="form-control" name="userUpdate" id="userUpdate" placeholder="UserUpdate" value="<?php echo $userUpdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">UpdateDate <?php echo form_error('updateDate') ?></label>
            <input type="text" class="form-control" name="updateDate" id="updateDate" placeholder="UpdateDate" value="<?php echo $updateDate; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>