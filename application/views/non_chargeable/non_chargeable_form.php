<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>NON CHARGEABLE</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-12">
                 <div class="row">
                      <div class="col-sm-12"> 
                                <label for="int">employee <?php echo form_error('employeeId') ?></label>
                               <select name="employeeId" class="selectpicker form-control" data-size="10"  data-live-search="true" >
                                    <option data-divider="true"></option>
                                    <?php 
                                    foreach($employees as $rsEmployee){
                                    ?>
                                        <option value="<?= $rsEmployee->id;?>" <?php if($rsEmployee->id == $employeeId) { echo "selected"; }?>>
                                            <?= $rsEmployee->firstName;?>  <?= $rsEmployee->lastName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                        
                        <div class="col-sm-2">                            
                                    <label for="varchar">Period Date <?php echo form_error('periode') ?></label>
                                    <input type="text" class="form-control" name="periode" id="date" placeholder="periode" value="<?php if($id) { echo date('d/m/Y',strtotime($periode));} else { echo date('d/m/Y'); } ?>" />
                        </div>
                        
                          <div class="col-sm-4">
                               <label for="int">Non Charge Parameter <?php echo form_error('leaveId') ?></label>
                                
                                <select name="leaveId" class="selectpicker form-control" data-live-search="true" data-size="10">
                                    <option data-divider="true"></option>
                                    <?php 
                                    foreach($leaves as $rsLeave){
                                    ?>
                                        <option value="<?= $rsLeave->id;?>" <?php if($rsLeave->id == $leaveId) { echo "selected"; }?>>
                                           <?= $rsLeave->leaveName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                
                          
                          
                          </div>
                          
                         <div class="col-sm-3">             
                             <label for="date">Expense Date <?php echo form_error('date') ?></label>
                             <input type="text" class="form-control" name="date" id="date" placeholder="ExpenseDate" value="<?php if($id) { echo date('d/m/Y',strtotime($date));} else { echo date('d/m/Y'); } ?>" />
                          </div>
                         <div class="col-sm-3">
                              <label for="time">Hour <?php echo form_error('hour') ?></label>
                             <input type="number" class="form-control" name="hour" id="time" placeholder="hour" value="<?php echo $hour; ?>" />
                         </div> 
                         
                         <div class="col-sm-12">
                              <label for="nonChargeDesc">NonChargeDesc <?php echo form_error('nonChargeDesc') ?></label>
                                <textarea class="form-control" rows="3" name="nonChargeDesc" id="nonChargeDesc" placeholder="NonChargeDesc"><?php echo $nonChargeDesc; ?></textarea>
                         </div> 
                         
                          
                        </div>
                        </div>
                        </div>
                        </div>
             
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('non_chargeable') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

