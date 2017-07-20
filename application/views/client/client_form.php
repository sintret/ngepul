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
                            <label for="varchar">Client Code <?php echo form_error('clientCode') ?></label>
                            <input type="text" class="form-control" name="clientCode" id="clientCode" placeholder="ClientCode" value="<?php echo $clientCode; ?>" />
                        </div>
                        <div class="col-sm-6">
                            <label for="varchar">Client Name <?php echo form_error('clientName') ?></label>
                            <input type="text" class="form-control" name="clientName" id="clientName" placeholder="ClientName" value="<?php echo $clientName; ?>" />
                        </div>
                        <div class="col-sm-3">
                            <label for="int">Client Status <?php echo form_error('clientStatus') ?></label>
                            <select name="clientStatus" id="clientStatus" class="form-control" >
                                <option value="1" <?php
                                if ($clientStatus == 1) {
                                    echo "selected";
                                } else {
                                    
                                }
                                ?>>Company</option>
                                <option value="2" <?php
                                if ($clientStatus == 2) {
                                    echo "selected";
                                } else {
                                    
                                }
                                ?>>Individual</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="varchar">Sector <?php echo form_error('sectorId') ?></label>
                            <select name="sectorId" id="sectorId" class="form-control" >
                                <?php
                                foreach ($sectors as $rsSector) {
                                    ?>
                                    <option value="<?= $rsSector->id; ?>" <?php
                                                if ($rsSector->id == $sectorId) {
                                                    echo "selected";
                                                } else {
                                                    
                                                }
                                                ?>>
    <?= $rsSector->sectorName; ?>
                                    </option>
    <?php
}
?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="char">Closing Periode <?php echo form_error('fsPeriode') ?></label>
                            <select name="fsPeriode" id="fsPeriode" class="form-control" >
                                <?php
                                        foreach ($periodes as $rsPeriode) {
                                            ?>
                                    <option value="<?= $rsPeriode->id; ?>" <?php
                                    if ($rsPeriode->id == $fsPeriode) {
                                        echo "selected";
                                    } else {
                                        
                                    }
                                    ?>>
    <?= $rsPeriode->closingPeriode; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="tinyint">Multinational Company:<?php echo form_error('multinational') ?></label>
                            <select name="multinational" id="multinational" class="form-control" >
                                <option value="0" <?php
                                        if ($multinational == 1) {
                                            echo "selected";
                                        } else {
                                            
                                        }
                                        ?>>No</option>
                                <option value="1" <?php
                                        if ($multinational == 2) {
                                            echo "selected";
                                        } else {
                                            
                                        }
                                        ?>>Yes</option>
                            </select>
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
                                        <label for="varchar">Address <?php echo form_error('address') ?></label>
                                        <textarea class="form-control md-input" name="address" id="address" placeholder="Address" rows="2" data-width="320" ><?php echo $address; ?></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">City <?php echo form_error('cityId') ?></label>
                                        <select name="cityId" id="cityId" class="form-control" >
                                            <?php
                                            foreach ($citys as $rsCity) {
                                                ?>
                                                <option value="<?= $rsCity->id; ?>" <?php
                                                if ($rsCity->id == $cityId) {
                                                    echo "selected";
                                                } else {
                                                    
                                                }
                                                ?>>
                                                <?= $rsCity->cityName; ?>
                                                </option>
                                                <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="int">Province<?php echo form_error('provinceId') ?></label>
                                        <select name="provinceId" id="provinceId" class="form-control" >
<?php
foreach ($provinces as $rsProvince) {
    ?>
                                                <option value="<?= $rsProvince->id; ?>" <?php
                                                if ($rsProvince->id == $provinceId) {
                                                    echo "selected";
                                                } else {
                                                    
                                                }
                                                ?>>
                                                <?= $rsProvince->provinceName; ?>
                                                </option>
                                                            <?php
                                                        }
                                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Country <?php echo form_error('parentCountry') ?></label>
                                        <select name="countryId" id="countryId" class="form-control" >
<?php
foreach ($countrys as $rsCountry) {
    ?>
                                                <option value="<?= $rsCountry->id; ?>" <?php
    if ($rsCountry->id == $countryId) {
        echo "selected";
    } else {
        
    }
    ?>>
    <?= $rsCountry->CountryName; ?>
                                                </option>
    <?php
}
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="varchar">Main Postal Code <?php echo form_error('mainPostalCode') ?></label>
                                        <input type="text" class="form-control" name="mainPostalCode" id="mainPostalCode" placeholder="MainPostalCode" value="<?php echo $mainPostalCode; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="varchar">Main POBox <?php echo form_error('mainPOBox') ?></label>
                                        <input type="text" class="form-control" name="mainPOBox" id="mainPOBox" placeholder="MainPOBox" value="<?php echo $mainPOBox; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Main Phone <?php echo form_error('mainPhone') ?></label>
                                        <input type="text" class="form-control" name="mainPhone" id="mainPhone" placeholder="MainPhone" value="<?php echo $mainPhone; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Main Fax <?php echo form_error('mainFax') ?></label>
                                        <input type="text" class="form-control" name="mainFax" id="mainFax" placeholder="MainFax" value="<?php echo $mainFax; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4><b>Main Contact Person:</b></h4>

                                        <hr/>
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                                <tr>
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
                                               <?php
                                              if($id){
                                               $no = 0;
                                               $countMain = count($mainContacts);
                                               foreach($mainContacts as $rsMainContact){
                                               ?>
                                                <tr id='addr<?=$no;?>'>
                                                    <td>
                                                        <select class="form-control" name="main[salutationId][<?=$no;?>]">          
                                                            <option value="1">1. Mr</option>
                                                            <option value="2">2. Mrs</option>
                                                            <option value="3">3. Ms</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type='text' name='main[contactName][<?=$no;?>]' value="<?= $rsMainContact->contactName;?>" placeholder='contact name'  class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type='text' name='main[position][<?=$no;?>]' value="<?= $rsMainContact->position;?>" placeholder='position' class='form-control'>
                                                    </td>
                                                    <td>
                                                        <input type='text' name='main[handphone][<?=$no;?>]' value="<?= $rsMainContact->handphone;?>" placeholder='handphone'  class='form-control'>
                                                    </td>
                                                    <td>
                                                        <input type='text' name='main[emailAddress][<?=$no;?>]' value="<?= $rsMainContact->emailAddress;?>"  placeholder='email' class='form-control'>
                                                    </td>
                                                </tr>
                                               <?php 
                                                $no++;                                                     
                                                 } 
                                               } else{
                                               $no = 0;
                                               $countMain = 0;
                                               }
                                               ?>
                                                <input type="hidden" name="counter" id="counter" value="2" >
                                                <tr id='addr<?=$countMain;?>'></tr>
                                            </tbody>
                                        </table>
                                        <a id="add_row" class="btn btn-success pull-left"> <i class="fa fa-plus"></i> Add New</a>
                                        <a id='delete_row' class="pull-right btn btn-danger"><i class="fa fa-trash-o"></i> Delete Row</a>

                                    </div>
                                </div>
                            </div>
                            <!-- //tab1 -->

                            <div class="tab-pane fade" id="tab2">
                                <div class="row ">
                                
                                <div class="col-sm-4">
                                    <label for="billingAddress">Same With Main Billing Address</label>
                                    <select name="sameAsMainAddress" id="showhide" class="form-control">
                                        <option value="1" >Yes</option>
                                        <option value="showme" >No</option>
                                    </select> 
                                </div>
                                </div>
                                
                                    <hr/>
                               
                                    <div class="showme box">
                                    
                                    <div class="row ">
                                     
                                    
                                    <div class="col-sm-4">
                                        <label for="billingAddress">Billing Address <?php echo form_error('billingAddress') ?></label>
                                        <textarea class="form-control" rows="2" name="billingAddress" id="billingAddress" placeholder="BillingAddress"><?php echo $billingAddress; ?></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">Billing City <?php echo form_error('billingCityId') ?></label>
                                        <select name="billingCityId" id="billingCityId" class="form-control" >
<?php
foreach ($citys as $rsCity) {
    ?>
                                                <option value="<?= $rsCity->id; ?>" <?php
                                                if ($rsCity->id == $billingCityId) {
                                                    echo "selected";
                                                } else {
                                                    
                                                }
                                                ?>>
                                                <?= $rsCity->cityName; ?>
                                                </option>
                                                            <?php
                                                        }
                                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Billing Postal  Code <?php echo form_error('billingPostalCode') ?></label>
                                        <input type="text" class="form-control" name="billingPostalCode" id="billingPostalCode" placeholder="BillingPostalCode" value="<?php echo $billingPostalCode; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Billing Country <?php echo form_error('billingCountryId') ?></label>
                                        <select name="billingCountryId" id="billingCountryId" class="form-control" >
<?php
foreach ($countrys as $rsCountry) {
    ?>
                                                <option value="<?= $rsCountry->id; ?>" <?php
    if ($rsCountry->id == $billingCountryId) {
        echo "selected";
    } else {
        
    }
    ?>>
                                                        <?= $rsCountry->CountryName; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p class="help-block">Contact Person.</p>
                                    <div class="col-sm-4">
                                        <label for="varchar">Billing CP Name <?php echo form_error('billingCPName') ?></label>
                                        <input type="text" class="form-control" name="billingCPName" id="billingCPName" placeholder="BillingCPName" value="<?php echo $billingCPName; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="int">Billing CP Salutation <?php echo form_error('billingCPSalutation') ?></label>
                                        <select name="billingCPSalutation" id="multinational" class="form-control" >
                                            <option value="1" <?php
                                            if ($billingCPSalutation == 1) {
                                                echo "selected";
                                            } else {
                                                
                                            }
                                            ?>>Mr</option>
                                            <option value="2" <?php
                                            if ($billingCPSalutation == 2) {
                                                echo "selected";
                                            } else {
                                                
                                            }
                                            ?>>Mrs</option>
                                            <option value="3" <?php
                                            if ($billingCPSalutation == 3) {
                                                echo "selected";
                                            } else {
                                                
                                            }
                                            ?>>Ms</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Billing CP Position <?php echo form_error('billingCPPosition') ?></label>
                                        <input type="text" class="form-control" name="billingCPPosition" id="billingCPPosition" placeholder="BillingCPPosition" value="<?php echo $billingCPPosition; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Billing CP Phone <?php echo form_error('billingCPPhone') ?></label>
                                        <input type="text" class="form-control" name="billingCPPhone" id="billingCPPhone" placeholder="BillingCPPhone" value="<?php echo $billingCPPhone; ?>" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p class="help-block">Contact Person.</p>
                                    <div class="col-sm-4">
                                        <label for="varchar">Billing CP Fax <?php echo form_error('billingCPFax') ?></label>
                                        <input type="text" class="form-control" name="billingCPFax" id="billingCPFax" placeholder="BillingCPFax" value="<?php echo $billingCPFax; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="varchar">Billing CP Handphone <?php echo form_error('billingCPHandphone') ?></label>
                                        <input type="text" class="form-control" name="billingCPHandphone" id="billingCPHandphone" placeholder="BillingCPHandphone" value="<?php echo $billingCPHandphone; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Billing CP Email <?php echo form_error('billingCPEmail') ?></label>
                                        <input type="text" class="form-control" name="billingCPEmail" id="billingCPEmail" placeholder="BillingCPEmail" value="<?php echo $billingCPEmail; ?>" />
                                    </div>
                                </div>
                            </div><!-- //end show hide div -->
                            </div>
                            <!-- //tab2 -->

                            <div class="tab-pane fade" id="tab3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="varchar">Npwp Name <?php echo form_error('npwpName') ?></label>
                                        <input type="text" class="form-control" name="npwpName" id="npwpName" placeholder="NpwpName" value="<?php echo $npwpName; ?>" />
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="npwpAddress">Npwp Address <?php echo form_error('npwpAddress') ?></label>
                                        <textarea class="form-control" rows="3" name="npwpAddress" id="npwpAddress" placeholder="NpwpAddress"><?php echo $npwpAddress; ?></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="varchar">Npwp Number<?php echo form_error('npwp') ?></label>
                                        <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="decimal">Ppn (%)<?php echo form_error('ppn') ?></label>
                                        <input type="text" class="form-control" name="ppn" id="ppn" placeholder="Ppn" value="<?php echo $ppn; ?>" />
                                    </div>
                                </div>
                            </div>
                            <!-- //tab3 -->
                            <div class="tab-pane fade" id="tab4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="tinyint">Bpkm <?php echo form_error('bpkmId') ?></label>
                                        <select name="bpkmId" id="billingCountryId" class="form-control" >
                                            <?php
                                            foreach ($lsBpkm as $rsBpkm) {
                                                ?>
                                                <option value="<?= $rsBpkm->id; ?>" <?php
                                            if ($rsBpkm->id == $bpkmId) {
                                                echo "selected";
                                            } else {
                                                
                                            }
                                                ?>>
                                                <?= $rsBpkm->name; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tinyint">Listed <?php echo form_error('listedId') ?></label>
                                        <select name="listedId" id="listedId" class="form-control" >
                                            <?php
                                            foreach ($listeds as $rsListed) {
                                                ?>
                                                <option value="<?= $rsListed->id; ?>" <?php
                                                if ($rsListed->id == $listedId) {
                                                    echo "selected";
                                                } else {
                                                    
                                                }
                                                ?>>
    <?= $rsListed->listedName; ?>
                                                </option>
    <?php
}
?>
                                        </select>
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <label for="varchar">Parent Country <?php echo form_error('parentCountry') ?></label>
                                        <select name="parentCountry" id="parentCountry" class="form-control" >
<?php
foreach ($countrys as $rsCountry) {
    ?>
                                                <option value="<?= $rsCountry->id; ?>" <?php
    if ($rsCountry->id == $parentCountry) {
        echo "selected";
    } else {
        
    }
    ?>>
    <?= $rsCountry->CountryName; ?>
                                                </option>
    <?php
}
?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">                                  
                                    <div class="col-sm-4">
                                        <label for="varchar">Parent Company <?php echo form_error('parentCompany') ?></label>
                                        <input type="text" class="form-control" name="parentCompany" id="parentCompany" placeholder="ParentCompany" value="<?php echo $parentCompany; ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="varchar">Foreign Shareholders <?php echo form_error('foreignShareholders') ?></label>
                                        <input type="text" class="form-control" name="foreignShareholders" id="foreignShareholders" placeholder="ForeignShareholders" value="<?php echo $foreignShareholders; ?>" />
                                    </div>
                                </div>
                            </div>
                            <!-- //tab4 -->
                        </div>
                        <!-- //tab-content --> 
                    </div>

                    <hr/>
                    <center>    
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        <a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    </center>
                </form>

        </section>
    </div>

</div>
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<script type="text/javascript">
   $(document).ready(function(){
    //var i=2;
     var i=<?=$countMain;?>;
   // var i = document.getElementById("counter").value;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><select class='form-control' name='main[salutationId]["+i+"]'><option value='1'>1. Mr</option><option value='2'>2. Mrs</option><option value='3'>3. Ms</option></select></td><td><input type='text' name='main[contactName]["+i+"]'  placeholder='contact name'  class='form-control' /></td><td><input type='text' name='main[position]["+i+"]' placeholder='position' class='form-control'></td><td><input type='text' name='main[handphone]["+i+"]'  placeholder='handphone'  class='form-control'/> </td><td><input type='text' name='main[emailAddress]["+i+"]' placeholder='email' class='form-control'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
                                        </script>