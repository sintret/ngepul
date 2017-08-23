<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Engagement</strong> /<?= $button ?></h4>
    </header>
    <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

        <div class="panel-body">
            
            <div class="row">
               <div class="col-sm-4">
                    <label for="varchar">Engagement Name <?php echo form_error('name') ?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Project Name" value="<?php echo $name; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="varchar">Description <?php echo form_error('description') ?></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                </div>
                  <div class="col-sm-2">
                    <label for="datetime">Engagement Date <?php echo form_error('engagementDate') ?></label>
                    <input type="text" class="form-control" name="engagementDate" id="date" placeholder="EngagementDate" value="<?php if($engagementDate) { echo date('d/M/Y', strtotime($engagementDate) );} else { echo date('d/M/Y'); } ?>" />
                </div>
                  <div class="col-sm-2">
                    <label for="datetime">Lock Status <?php echo form_error('lockStatusId') ?></label>
                    <select name="lockStatusId" class="form-control">
                        <option value="0"  <?php if($lockStatusId == 0) { echo "selected"; }else {}?> >Unlock</option>
                        <option value="1"  <?php if($lockStatusId == 1) { echo "selected"; }else {}?> >Lock</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="int">Entity <?php echo form_error('entityId') ?></label>
                    <select name="entityId" class="form-control">
                        <?php
                        if ($entities)
                            foreach ($entities as $rsEntity) {
                                $selected = $rsEntity->id == $entityId ? 'selected' : '';
                                ?>
                                <option <?php echo $selected; ?> value="<?= $rsEntity->id; ?>"><?= $rsEntity->company_name; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="int">Client Name <?php echo form_error('clientId') ?></label>
                    <select name="clientId" class="selectpicker form-control col-sm-4" data-size="8"  data-live-search="true" >
                        <option data-divider="true"></option>
                        <?php
                        if ($clients)
                            foreach ($clients as $rsclient) {
                                ?>
                                <option value="<?= $rsclient->id; ?>" <?php if($clientId == $rsclient->id) { echo "selected"; } else {} ?>>
                                    <?= $rsclient->clientName; ?>
                                </option>
                            <?php } ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="int">Service Title <?php echo form_error('serviceTitleId') ?></label>
                    <select name="serviceTitleId" class="selectpicker form-control col-sm-4" data-size="8"  data-live-search="true" >
                        <option data-divider="true"></option>
                        <?php
                        if ($serviceTitles)
                            foreach ($serviceTitles as $rsService) {
                                ?>
                                <option value="<?= $rsService->id; ?>" <?php if($serviceTitleId == $rsService->id) { echo "selected"; } else {} ?>>
                                    <?= $rsService->serviceTitleName; ?>
                                </option>
                            <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
               
                <div class="col-sm-4">
                    <label for="varchar">Service Period</label>
                    <input type="month" name="yearService" class="form-control" id="myMonth" value="<?php if($yearService) { echo $yearService;} else { echo date('Y-m'); } ?>" />
                    <script>
                    function myFunction() {
                        document.getElementById("myMonth").defaultValue = "2017-08";
                    }
                    </script>
                </div>
                 <div class="col-sm-4">
                    <label for="startDate">Engagement Start Date <?php echo form_error('startDate') ?></label>
                    <input type="text" class="form-control" name="startDate" id="date" placeholder="Start Date" value="<?php if($engagementDate) { echo date('d/M/Y', strtotime($startDate) );} else { echo date('d/M/Y'); } ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="datetime">Engagement End Date <?php echo form_error('endDate') ?></label>
                    <input type="text" class="form-control" name="endDate" id="date" placeholder="End Date" value="<?php if($engagementDate) { echo date('d/M/Y', strtotime($endDate) );} else { echo date('d/M/Y'); } ?>" />
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-sm-12">
                        <label for="int">Partner <?php echo form_error('partnerId') ?></label>
                        <select name="partnerId"  class="selectpicker form-control" data-size="8"  data-live-search="true" id="partnerId" >
                          <option data-divider="true"></option>
                            <?php
                            if ($partners)
                                foreach ($partners as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" <?php if($partnerId == $employee->id) { echo "selected"; } else {} ?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                    </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Manager <?php echo form_error('managerId') ?></label>
                        <select name="managerId" class="selectpicker form-control " data-size="8"  data-live-search="true" id="managerId" >
                           <option data-divider="true"></option>
                            <?php
                            if ($managers)
                                foreach ($managers as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" <?php if($managerId == $employee->id) { echo "selected"; } else {} ?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Senior <?php echo form_error('seniorId') ?></label>
                        <select name="seniorId" class="selectpicker form-control " data-size="8"  data-live-search="true" id="seniorId">
                           <option data-divider="true"></option>
                            <?php
                            if ($seniors)
                                foreach ($seniors as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" <?php if($seniorId == $employee->id) { echo "selected"; } else {} ?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="col-sm-12">
                        <label for="decimal">Agreed Fees <?php echo form_error('agreedFees') ?></label>
                        <input type="text" required="required" class="form-control number" name="agreedFees" id="agreedFees" placeholder="AgreedFees" value="<?php echo $agreedFees; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="decimal">Agreed Expenses <?php echo form_error('agreedExpenses') ?></label>
                        <input type="text" required="required" class="form-control number" name="agreedExpenses" id="agreedExpenses" placeholder="AgreedExpenses" value="<?php echo $agreedExpenses; ?>" />
                    </div>
                    <div class="col-sm-12">
                        <label for="decimal">Estimated Cost <?php echo form_error('estimatedCost') ?></label>
                        <input type="text" required="required" class="form-control number" name="estimatedCost" id="estimatedCost" placeholder="EstimatedCost" value="<?php echo $estimatedCost; ?>" />
                    </div>
                </div> 
                <div class="col-sm-4">

                    <div class="col-sm-12">
                        <label for="int">Signing Partner <?php echo form_error('signingPartnerId') ?></label>
                       <select name="signingPartnerId" class="selectpicker form-control " data-size="8"  data-live-search="true" id="signingPartnerId" >
                           <option data-divider="true"></option>
                            <?php
                            if ($partners)
                                foreach ($partners as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" <?php if($signingPartnerId == $employee->id) { echo "selected"; } else {} ?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                    </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="int">Engagement Partner <?php echo form_error('engagementPartnerId') ?></label>
                       <select name="engagementPartnerId" class="selectpicker form-control " data-size="8"  data-live-search="true" id="engagementPartnerId" >
                           <option data-divider="true"></option>
                            <?php
                            if ($partners)
                                foreach ($partners as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" <?php if($engagementPartnerId == $employee->id) { echo "selected"; } else {} ?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                    </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                       <div class="row">
                        <div class="col-sm-6">
                    <label for="tinyint">Complexity <?php echo form_error('complexity') ?></label>
                    <select name="complexity" class="form-control">
                        <option value="1" <?php if($complexity == 1) { echo "selected"; }else {}?> >Low</option>
                        <option value="2" <?php if($complexity == 2) { echo "selected"; }else {}?>>Medium</option>
                        <option value="2" <?php if($complexity == 3) { echo "selected"; }else {}?>>High</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="tinyint">Risk <?php echo form_error('risk') ?></label>
                    <select name="risk" class="form-control">
                       <option value="1" <?php if($risk == 1) { echo "selected"; }else {}?>>Low</option>
                       <option value="2" <?php if($risk == 2) { echo "selected"; }else {}?>>Medium</option>
                       <option value="2" <?php if($risk == 3) { echo "selected"; }else {}?>>High</option>
                    </select>
                </div>
                        </div>
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
                                <table  id="employee-table" class="table table-fixed text-center table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Position</th>
                                            <th>Billing Rate</th>
                                            <th>Budget Hour</th>
                                            <th>Subtotal</th>
                                            <th><input type="button" value="+add" class="btn btn-success btn-sm add-employee"/></th>
    <!--                                        <th><span class="btn btn-success btn-sm">+ Add</span></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 1;
                                        if ($details)
                                            foreach ($details as $detail) {
                                                ?>
                                                <tr class="input-employee" id="appendTr<?php echo $counter; ?>">
                                                    <td>
                                                        <select name="detail[employeeId][]" class="form-control dropDownEmployee" id="dropDownEmployee<?php echo $counter; ?>">
                                                            <option>Pelase Select Employee first..</option>
                                                            <?php
                                                            foreach ($employees as $rsEmployee) {
                                                                $selected = $rsEmployee->id == $detail->employeeId ? 'selected':'';
                                                                ?>
                                                                <option <?php echo $selected;?> value="<?= $rsEmployee->id; ?>" data-level="<?php echo $rsEmployee->userlevelId; ?>"  data-jabatan="<?= $rsEmployee->positionName; ?>" data-price="<?php echo $rsEmployee->costRate; ?>">
                                                                    <?= $rsEmployee->firstName . '' . $rsEmployee->lastName; ?>
                                                                </option>
                                                                <?php
                                                                $counter++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="detail[jabatanId][]"  class="form-control jabatanId" readonly="readonly" />
                                                        <input type="hidden" name="detail[userlevelId][]"  class="userlevelId" readonly="readonly"  value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="detail[costRate][]"class="form-control costRate number" value="<?php echo $detail->costrate;?>" id="costRate<?php echo $counter; ?>" readonly="readonly" placeholder="select employee first"/>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">                                              
                                                            <input type="number" name="detail[budgetHour][]" pattern="[1-9][1-9]{0,4}" value="<?php echo $detail->budgetHour;?>"  id="budgetHour<?php echo $counter; ?>" class="form-control budgetHour" value="1" />
                                                            <span class="input-group-addon"><b>HOUR</b></span>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" name="detail[subTotal][]" pattern="[1-9][1-9]{0,4}" value="<?php echo $detail->billingRate;?>"  id="subTotal<?php echo $counter; ?>" class="form-control number totalHarga subTotal" readonly="read"/></td>
                                                    <td><span class="btn btn-danger btn-sm trash" data-trash="appendTr<?php echo $counter; ?>"><i class="fa fa-trash-o"></i></span></td>
                                                </tr>
                                            <?php } ?>

                                    </tbody>

                                </table>

                                <table class="table table-fixed text-center">
                                    <tr>
                                        <td align="right"><b class="budgetLabel">UNDER / OVER BUDGET</b></td>
                                        <td align="left"><b class="grandTotal number">-0</b><input type="hidden" id="grandTotal"/></td>
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
                                        <label for="varchar">Report No <?php echo form_error('reportNo') ?></label>
                                        <input type="text" class="form-control" name="reportNo" id="reportNo" placeholder="ReportNo" value="<?php echo $reportNo; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="datetime">Report Date <?php echo form_error('reportDate') ?></label>
                                        <input type="text" class="form-control" name="reportDate" id="date" placeholder="ReportDate" value="<?php echo $reportDate; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="varchar">Opinion <?php echo form_error('opinion') ?></label>
                                        <input type="text" class="form-control" name="opinion" id="opinion" placeholder="Opinion" value="<?php echo $opinion; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Job From Employee  <?php echo form_error('jobFromEmployeeId') ?></label>
                                        <select name="engagementPartnerId" class="form-control" id="engagementPartnerId" >
                                            <option value="0">Please Select One</option>
                                            <?php
                                            if ($employees)
                                                foreach ($employees as $employee) {
                                                    ?>
                                                    <option value="<?= $employee->id; ?>" <?php if($engagementPartnerId == $employee->id) { echo "selected"; } else {} ?>>
                                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                                    </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="datetime">Finish Date <?php echo form_error('finishDate') ?></label>
                                        <input type="text" class="form-control" name="finishDate" id="date" placeholder="FinishDate" value="<?php echo $finishDate; ?>" />
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
            <button type="submit" class="btn btn-primary submit-btn"><?php echo $button ?></button> 
        </center>
    </form>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    

<input type="hidden" name="counter" id="counter" value="1" >
<script type="text/javascript">
    $(document).ready(function(){
        calc();
    });
                                $(".add-employee").on("click", function () {
                                    var c = $("tr[class*='input-employee']").length;
                                    var count = c + 1;
                                    $.ajax({
                                        type: "POST",
                                        url: '<?= base_url(); ?>engagement/ajax_employee',
                                        data: {counter: count},
                                        success: function (html) {
                                            $("#employee-table tbody").append(html);
                                            calc();
                                        }
                                    });
                                });
                                
                                
                               
                                     
                                $(document).on("change", ".dropDownEmployee", function () {
                                    var price = $(this).find("option:selected").data("price");
                                    var userlevelId = $(this).find("option:selected").data("level");
                                    var jabatanId = $(this).find("option:selected").data("jabatan");
                                    $(this).closest("tr").find(".costRate").val(price);
                                    var budgetHour = $(this).closest("tr").find(".budgetHour").val();
                                    $(this).closest("tr").find(".subTotal").val(price * budgetHour);
                                    $(this).closest("tr").find(".userlevelId").val(userlevelId);
                                     $(this).closest("tr").find(".jabatanId").val(jabatanId);
                                    calc();
                                });

                                $(document).on("change", ".budgetHour", function () {
                                    $(this).closest("tr").find(".subTotal").val($(this).val() * $(this).closest("tr").find(".costRate").val());
                                    calc();
                                });

                                $("body").on("click", ".trash", function () {
                                    $("#" + $(this).data("trash")).remove();
                                    calc();
                                });

                                $("#estimatedCost").on("change", function () {
                                    calc();
                                });

                                function calc() {
                                    var sum = 0;
                                    $(".totalHarga").each(function ()
                                    {
                                        sum += isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val());
                                    });
                                    $("#grandTotal").val(sum);
                                    $(".grandTotal").html($.number(sum, 0, ",", "."));

                                    var estimatedCost = parseFloat($("#estimatedCost").val());
                                    if (sum <= estimatedCost) {
                                        $(".budgetLabel").html("UNDER");
                                        $(".add-employee").show();
                                        $(".submit-btn").show();
                                    } else {
                                        $(".budgetLabel").html("OVER BUDGET");
                                        $(".add-employee").hide();
                                        $(".submit-btn").hide();
                                    }
                                    $("input.number-ajax").number(true, 0);
                                }
</script>