<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Engagement</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-3">
                    <label for="datetime">Engagement Date <?php echo form_error('engagementDate') ?></label>
                    <input type="text" class="form-control" name="engagementDate" id="engagementDate" placeholder="EngagementDate" value="<?php echo $engagementDate; ?>" />
                </div>
                <div class="col-sm-4">
                     <label for="varchar">Service Period</label>
                     <input id="ChromeMonthPicker" type="month" class="form-control" />
                     <div class="row">
                         <div class="col-md-6">
                              <select name="month" class="form-control col-md-6">
                                    <?php
                                    foreach($closingPeriodes as $rsClosing){
                                    ?>
                                    <option value="<?= $rsClosing->id;?>"><?= $rsClosing->closingPeriode;?></option>
                                    <?php } ?>
                                </select>
                           
                         </div>
                            <div class="col-md-6">
                                  <select id="year" name="year" class="form-control col-md-6"></select>
                            </div>
                          </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                               
                              
                                </div>
                        </div>
                        
                        <div class="col-xs-6">                            
                            <div class="form-group">                              
                                  
                            </div>
                            <script>
                                var start = 1900;
                                        var end = new Date().getFullYear();
                                        var options = "";
                                        for(var year = start ; year <=end; year++){
                                          options += "<option>"+ year +"</option>";
                                        }
                                        document.getElementById("year").innerHTML = options;
                            </script>
                                
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-2">
                    <label for="tinyint">Complexity <?php echo form_error('complexity') ?></label>
                    <select name="complexity" class="form-control">
                        <option value="1">Low</option>
                        <option value="2">Midle</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="tinyint">Risk <?php echo form_error('risk') ?></label>
                    <select name="risk" class="form-control">
                        <option value="1">Low</option>
                        <option value="2">Midle</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label for="int">Entity <?php echo form_error('entityId') ?></label>
                    <select name="entityId" class="form-control">
                        <?php
                        if($entities)
                        foreach($entities as $rsEntity){
                            $selected = $rsEntity->id == $entityId ? 'selected':'';
                        ?>
                        <option <?php echo $selected;?> value="<?= $rsEntity->id;?>"><?= $rsEntity->company_name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="int">Client Name <?php echo form_error('clientId') ?></label>
                    <select name="clientId" class="form-control">
                        <?php
                        if($clients)
                        foreach($clients as $rsclient){
                        ?>
                        <option value="<?= $rsclient->id;?>"><?= $rsclient->clientName;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="int">Service Title <?php echo form_error('serviceTitleId') ?></label>
                    <select name="clientId" class="form-control">
                        <?php
                        if($serviceTitles)
                        foreach($serviceTitles as $rsService){
                        ?>
                        <option value="<?= $rsService->id;?>"><?= $rsService->serviceTitleName;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="varchar">Description <?php echo form_error('description') ?></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-sm-12">
                        <label for="int">Partner <?php echo form_error('partnerId') ?></label>
                        <input type="text" class="form-control" name="partnerId" id="partnerId" placeholder="PartnerId" value="<?php echo $partnerId; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Manager <?php echo form_error('managerId') ?></label>
                        <input type="text" class="form-control" name="managerId" id="managerId" placeholder="ManagerId" value="<?php echo $managerId; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Senior <?php echo form_error('seniorId') ?></label>
                        <input type="text" class="form-control" name="seniorId" id="seniorId" placeholder="SeniorId" value="<?php echo $seniorId; ?>" />
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="col-sm-12">
                        <label for="decimal">Agreed Fees <?php echo form_error('agreedFees') ?></label>
                        <input type="text" class="form-control" name="agreedFees" id="agreedFees" placeholder="AgreedFees" value="<?php echo $agreedFees; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="decimal">Agreed Expenses <?php echo form_error('agreedExpenses') ?></label>
                        <input type="text" class="form-control" name="agreedExpenses" id="agreedExpenses" placeholder="AgreedExpenses" value="<?php echo $agreedExpenses; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="decimal">Estimated Cost <?php echo form_error('estimatedCost') ?></label>
                        <input type="text" class="form-control" name="estimatedCost" id="estimatedCost" placeholder="EstimatedCost" value="<?php echo $estimatedCost; ?>" />
                    </div>
                </div> 
                <div class="col-sm-4">

                    <div class="col-sm-12">
                        <label for="int">Signing Partner <?php echo form_error('signingPartnerId') ?></label>
                        <input type="text" class="form-control" name="signingPartnerId" id="signingPartnerId" placeholder="SigningPartnerId" value="<?php echo $signingPartnerId; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Engagement Partner <?php echo form_error('engagementPartnerId') ?></label>
                        <input type="text" class="form-control" name="engagementPartnerId" id="engagementPartnerId" placeholder="EngagementPartnerId" value="<?php echo $engagementPartnerId; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Senior <?php echo form_error('seniorId') ?></label>
                        <input type="text" class="form-control" name="seniorId" id="seniorId" placeholder="SeniorId" value="<?php echo $seniorId; ?>" />
                    </div>

                </div>

            </div>
    </div>


    <div class="col-sm-12">

        <div class="tabbable">
            <ul class="nav nav-tabs" data-provide="tabdrop">
                <li class="active"><a href="#tab1" data-toggle="tab"><b>TIME BUDGET</b></a></li>
                <li><a href="#tab2" data-toggle="tab"><b>CLOSING INFO</b></a></li>
            </ul>
            <div class="tab-content"  style="border:1px solid #cecece;">

                <div class="tab-pane fade in active" id="tab1">
                    <div class="row">
                        <div class="col-sm-12">
                            <table  id="append" class="table table-fixed text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Billing Rate</th>
                                        <th>Budget Hour</th>
                                        <th>Subtotal</th>
                                        <th onclick="add()"><input type="button" value="+add" class="btn btn-success btn-sm"/></th>
<!--                                        <th><span class="btn btn-success btn-sm">+ Add</span></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="appendTr0">
                                        <td>
                                            <select name="detail[employeeId][]" class="form-control" id="dropDownEmployee">
                                                <option>Pelase Select Employee first..</option>
                                                <?php 
                                                foreach($employees as $rsEmployee){
                                                ?>
                                                    <option value="<?= $rsEmployee->id;?>" id="<?= rupiah($rsEmployee->costRate);?>">
                                                        <?= $rsEmployee->firstName.''.$rsEmployee->lastName;?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="detail[costRate][]"class="form-control" id="price" readonly="readonly" placeholder="select employee first"/>
                                        </td>
                                        <td>
                                            <div class="input-group">                                              
                                            <input type="number" name="detail[budgetHour][]" pattern="[1-9][1-9]{0,4}" id="budgetHour" class="form-control" value="1" />
                                            <span class="input-group-addon"><b>HOUR</b></span>
                                              </div>
                                        </td>
                                        <td><input type="text" name="detail[subTotal][]" pattern="[1-9][1-9]{0,4}" id="subTotal" class="form-control" readonly="read"/></td>
                                        <td onclick="deleteTr(0)"><span class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></span></td>
                                    </tr>

                                    
                                </tbody>
                                   <tr>
                                       <td colspan="3" align="right"><b>UNDER / OVER BUDGET</b></td>
                                       <td colspan="2"><b>-0</b></td>
                                    </tr>
                                   





                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab2">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="decimal">Asset <?php echo form_error('asset') ?></label>
                                    <input type="text" class="form-control" name="asset" id="asset" placeholder="Asset" value="<?php echo $asset; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="decimal">Rl <?php echo form_error('rl') ?></label>
                                    <input type="text" class="form-control" name="rl" id="rl" placeholder="Rl" value="<?php echo $rl; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">ReportNo <?php echo form_error('reportNo') ?></label>
                                    <input type="text" class="form-control" name="reportNo" id="reportNo" placeholder="ReportNo" value="<?php echo $reportNo; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="datetime">ReportDate <?php echo form_error('reportDate') ?></label>
                                    <input type="text" class="form-control" name="reportDate" id="reportDate" placeholder="ReportDate" value="<?php echo $reportDate; ?>" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="varchar">Opinion <?php echo form_error('opinion') ?></label>
                                    <input type="text" class="form-control" name="opinion" id="opinion" placeholder="Opinion" value="<?php echo $opinion; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="int">JobFromEmployeeId <?php echo form_error('jobFromEmployeeId') ?></label>
                                    <input type="text" class="form-control" name="jobFromEmployeeId" id="jobFromEmployeeId" placeholder="JobFromEmployeeId" value="<?php echo $jobFromEmployeeId; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="datetime">FinishDate <?php echo form_error('finishDate') ?></label>
                                    <input type="text" class="form-control" name="finishDate" id="finishDate" placeholder="FinishDate" value="<?php echo $finishDate; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" class="form-control" name="code" id="code" placeholder="Code" value="<?php echo $code; ?>" />


    <hr/>
    <center>    
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <a href="<?php echo site_url('engagement') ?>" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    </center>
</form>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    

<input type="hidden" name="counter" id="counter" value="1" >
<script>
function add(){
	var counter =$("#counter").val();
	$.ajax({
		url:'<?=base_url();?>engagement/ajax_employee',          
		type:"POST",
		data:{counter:counter},
		success:function(msg){
			$("#counter").val(parseInt(counter)+1);
			$("#append").append(msg);
		},
		})
}

function deleteTr(n){
	$("#appendTr"+n).remove();
}
</script>
 <script type="text/javascript">
    var mydropdown = document.getElementById('dropDownEmployee');
    var mytextbox = document.getElementById('mytext');
    var basePrice = document.getElementById('price');
    var CountBudgetHour = document.getElementById('budgetHour');
    mydropdown.onchange = function(){
         // mytextbox.value = mytextbox.value  + this.value; //to appened
         //mytextbox.innerHTML = this.value;
       $('input[id=price]').val($(this).find('option:selected').attr('id'));
       $('input[id=budgetHour]').val(1);
       $('input[id=subTotal]').val($(this).find('option:selected').attr('id'));
    }    
    CountBudgetHour.onchange = function(){
        var price = document.getElementById('price');
         // mytextbox.value = mytextbox.value  + this.value; //to appened
         //mytextbox.innerHTML = this.value;
        $('input[id=subTotal]').val();
    }
</script>