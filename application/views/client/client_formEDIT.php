<div class="row">

    <div class="col-lg-12">
        <section class="panel corner-flip">
            <div class="panel-tools" align="right" data-toolscolor="#6CC3A0" style="text-align: left">
                <h4><strong>Client</strong> Add</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" data-collabel="2" data-label="color" action="<?php echo $action; ?>" method="post">  
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="varchar">ClientCode <?php echo form_error('clientCode') ?></label>
                            <input type="text" class="form-control" name="clientCode" id="clientCode" placeholder="ClientCode" value="<?php echo $clientCode; ?>" />
                        </div>
                        <div class="col-sm-6">
                            <label for="varchar">ClientName <?php echo form_error('clientName') ?></label>
                            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="ClientName" value="<?php echo $clientName; ?>" />
                        </div>
                        <div class="col-sm-3">
                            <label for="int">ClientStatus <?php echo form_error('clientStatus') ?></label>
                            <select name="clientStatus" id="clientStatus" class="selectpicker form-control show-menu-arrow" data-style="btn-theme-inverse">
                                <option value="1">Company</option>
                                <option value="2">Individual</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="varchar">SubSector <?php echo form_error('subSector') ?></label>
                            <input type="text" class="form-control" name="subSector" id="subSector" placeholder="SubSector" value="<?php echo $subSector; ?>" />
                        </div>
                        <div class="col-sm-6">
                            <label for="char">FsPeriode <?php echo form_error('fsPeriode') ?></label>
                            <input type="text" class="form-control" name="fsPeriode" id="fsPeriode" placeholder="FsPeriode" value="<?php echo $fsPeriode; ?>" />
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tinyint">Multinational Company:<?php echo form_error('multinational') ?></label>
                                <div class="col-sm-4 iSwitch flat-switch">
                                    <div class="switch">
                                        <input checked type="checkbox" value="<?php echo $multinational; ?>">
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="tabbable">
                        <ul class="nav nav-tabs" data-provide="tabdrop">
                            <li class="active"><a href="#tab1" data-toggle="tab">Main Address</a></li>
                            <li><a href="#tab2" data-toggle="tab">Billing Address</a></li>
                            <li><a href="#tab3" data-toggle="tab">NPWP</a></li>
                            <li><a href="#tab4" data-toggle="tab">Others</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="tab1">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="varchar">Address <?php echo form_error('subSector') ?></label>
                                        <textarea class="form-control md-input" id="address" placeholder="Address" rows="2" data-width="320" ><?php echo $address; ?></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">CityId <?php echo form_error('cityId') ?></label>
                                        <input type="text" class="form-control" name="cityId" id="cityId" placeholder="CityId" value="<?php echo $cityId; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="int">ProvinceId <?php echo form_error('provinceId') ?></label>
                                        <input type="text" class="form-control" name="provinceId" id="provinceId" placeholder="ProvinceId" value="<?php echo $provinceId; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Country <?php echo form_error('parentCountry') ?></label>
                                        <input type="text" class="form-control" name="parentCountry" id="parentCountry" placeholder="ParentCountry" value="<?php echo $parentCountry; ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="varchar">MainPostalCode <?php echo form_error('mainPostalCode') ?></label>
                                        <input type="text" class="form-control" name="mainPostalCode" id="mainPostalCode" placeholder="MainPostalCode" value="<?php echo $mainPostalCode; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="varchar">MainPOBox <?php echo form_error('mainPOBox') ?></label>
                                        <input type="text" class="form-control" name="mainPOBox" id="mainPOBox" placeholder="MainPOBox" value="<?php echo $mainPOBox; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">MainPhone <?php echo form_error('mainPhone') ?></label>
                                        <input type="text" class="form-control" name="mainPhone" id="mainPhone" placeholder="MainPhone" value="<?php echo $mainPhone; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">MainFax <?php echo form_error('mainFax') ?></label>
                                        <input type="text" class="form-control" name="mainFax" id="mainFax" placeholder="MainFax" value="<?php echo $mainFax; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Contact Person:</h4>
                                        <table class="table-bordered " id="tab_logic" style="width:100%">				
                                            <thead>
                                                <tr >
                                                    <th class="text-center">
                                                        Salutation
                                                    </th>
                                                    <th class="text-center">
                                                        Contact Name
                                                    </th>
                                                    <th class="text-center">
                                                        Position
                                                    </th>
                                                    <th class="text-center">
                                                        handphone
                                                    </th>
                                                    <th class="text-center">
                                                        Email
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="language_read">
                                                            <option selected value="na">Choose One:</option>               
                                                            <option value="1">1. Mr</option>
                                                            <option value="2">2. Mrs</option>
                                                            <option value="3">3. Ms</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='language_name'  placeholder='contact name'  class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='language_name'  placeholder='position' class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='language_name'  placeholder='handphone'  class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='language_name'  placeholder='email' class="form-control"/>
                                                    </td>
                                                </tr>


                                            </tbody>   			
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- //tab1 -->

                            <div class="tab-pane fade" id="tab2">
                                <div class="row">
                                    <p class="help-block">copy data from main address.</p>
                                    <div class="col-sm-4">
                                        <label for="billingAddress">BillingAddress <?php echo form_error('billingAddress') ?></label>
                                        <textarea class="form-control" rows="2" name="billingAddress" id="billingAddress" placeholder="BillingAddress"><?php echo $billingAddress; ?></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">BillingCityId <?php echo form_error('billingCityId') ?></label>
                                        <input type="text" class="form-control" name="billingCityId" id="billingCityId" placeholder="BillingCityId" value="<?php echo $billingCityId; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">BillingPostalCode <?php echo form_error('billingPostalCode') ?></label>
                                        <input type="text" class="form-control" name="billingPostalCode" id="billingPostalCode" placeholder="BillingPostalCode" value="<?php echo $billingPostalCode; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Country <?php echo form_error('parentCountry') ?></label>
                                        <input type="text" class="form-control" name="parentCountry" id="parentCountry" placeholder="ParentCountry" value="<?php echo $parentCountry; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p class="help-block">Contact Person.</p>
                                    <div class="col-sm-4">
                                        <label for="varchar">BillingCPName <?php echo form_error('billingCPName') ?></label>
                                        <input type="text" class="form-control" name="billingCPName" id="billingCPName" placeholder="BillingCPName" value="<?php echo $billingCPName; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">BillingCPSalutation <?php echo form_error('billingCPSalutation') ?></label>
                                        <input type="text" class="form-control" name="billingCPSalutation" id="billingCPSalutation" placeholder="BillingCPSalutation" value="<?php echo $billingCPSalutation; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">BillingCPPosition <?php echo form_error('billingCPPosition') ?></label>
                                        <input type="text" class="form-control" name="billingCPPosition" id="billingCPPosition" placeholder="BillingCPPosition" value="<?php echo $billingCPPosition; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">BillingCPPhone <?php echo form_error('billingCPPhone') ?></label>
                                        <input type="text" class="form-control" name="billingCPPhone" id="billingCPPhone" placeholder="BillingCPPhone" value="<?php echo $billingCPPhone; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p class="help-block">Contact Person.</p>
                                    <div class="col-sm-4">
                                        <label for="varchar">BillingCPFax <?php echo form_error('billingCPFax') ?></label>
                                        <input type="text" class="form-control" name="billingCPFax" id="billingCPFax" placeholder="BillingCPFax" value="<?php echo $billingCPFax; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="varchar">BillingCPHandphone <?php echo form_error('billingCPHandphone') ?></label>
                                        <input type="text" class="form-control" name="billingCPHandphone" id="billingCPHandphone" placeholder="BillingCPHandphone" value="<?php echo $billingCPHandphone; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">BillingCPEmail <?php echo form_error('billingCPEmail') ?></label>
                                        <input type="text" class="form-control" name="billingCPEmail" id="billingCPEmail" placeholder="BillingCPEmail" value="<?php echo $billingCPEmail; ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- //tab2 -->

                            <div class="tab-pane fade" id="tab3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="varchar">NpwpName <?php echo form_error('npwpName') ?></label>
                                        <input type="text" class="form-control" name="npwpName" id="npwpName" placeholder="NpwpName" value="<?php echo $npwpName; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="npwpAddress">NpwpAddress <?php echo form_error('npwpAddress') ?></label>
                                        <textarea class="form-control" rows="3" name="npwpAddress" id="npwpAddress" placeholder="NpwpAddress"><?php echo $npwpAddress; ?></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Npwp <?php echo form_error('npwp') ?></label>
                                        <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="decimal">Ppn <?php echo form_error('ppn') ?></label>
                                        <input type="text" class="form-control" name="ppn" id="ppn" placeholder="Ppn" value="<?php echo $ppn; ?>" />
                                    </div>
                                </div>
                            </div>
                            <!-- //tab3 -->
                            <div class="tab-pane fade" id="tab4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="tinyint">BpkmId <?php echo form_error('bpkmId') ?></label>
                                        <input type="text" class="form-control" name="bpkmId" id="bpkmId" placeholder="BpkmId" value="<?php echo $bpkmId; ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tinyint">Listed <?php echo form_error('listed') ?></label>
                                        <input type="text" class="form-control" name="listed" id="listed" placeholder="Listed" value="<?php echo $listed; ?>" />
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <label for="varchar">ParentCountry <?php echo form_error('parentCountry') ?></label>
                                        <input type="text" class="form-control" name="parentCountry" id="parentCountry" placeholder="ParentCountry" value="<?php echo $parentCountry; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">                                  
                                    <div class="col-sm-4">
                                        <label for="varchar">ParentCompany <?php echo form_error('parentCompany') ?></label>
                                        <input type="text" class="form-control" name="parentCompany" id="parentCompany" placeholder="ParentCompany" value="<?php echo $parentCompany; ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="varchar">ForeignShareholders <?php echo form_error('foreignShareholders') ?></label>
                                        <input type="text" class="form-control" name="foreignShareholders" id="foreignShareholders" placeholder="ForeignShareholders" value="<?php echo $foreignShareholders; ?>" />
                                    </div>
                                </div>
                            </div>
                            <!-- //tab4 -->
                        </div>
                        <!-- //tab-content --> 
                    </div>


                </form>

        </section>
    </div>

</div>