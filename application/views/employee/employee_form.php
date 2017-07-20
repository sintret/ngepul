<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Employee</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" role="form-inline"  enctype="multipart/form-data">
            <div class="col-md-12" >
                <div class="col-sm-6">
                    <div class="row">                           

                        <h5><strong>Personal Info:</strong></h5>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="varchar">Employee Code <?php echo form_error('employee_code') ?></label>
                                <input type="text" class="form-control" name="employee_code" id="employee_code" placeholder="Employee Code" value="<?php echo $employee_code; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="int">Employee Status<?php echo form_error('employeeStatusId') ?></label>                                
                                <select name="employeeStatusId" class="form-control">
                                    <?php
                                    foreach($statuses as $status){
                                    ?>
                                        <option value="<?= $status->id;?>" <?php if($employeeStatusId == $status->id){ echo "selected"; } else {}?>>
                                            <?= $status->employeeStatus;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div> 
                        </div>
                         <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="datetime">Entry <?php echo form_error('entry') ?></label>
                                <input type="text" class="form-control" name="entry" id="date" placeholder="Entry" value="<?php if($entry){ echo date('d/m/Y',strtotime($entry)); } ?>" />
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idcard"><b>FirstName :</b></label>
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $firstName; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idcard"><b>Lastname :</b></label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="LastName" value="<?php echo $lastName; ?>" />
                            </div>
                        </div>
                        <div class="col-sm-4">  
                            <div class="form-group">
                                <label for="tinyint">Sex <?php echo form_error('sex') ?></label>
                                <select name="sex" class="form-control">
                                    <option value="1" <?php if($sex == 1){ echo "selected"; } else {}?>> MAN </option>
                                    <option value="2" <?php if($sex == 2){ echo "selected"; } else {}?>> WOMAN </option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-sm-4">  
                            <div class="form-group">
                                <label for="int">Religion <?php echo form_error('religionId') ?></label>
                                <?php //echo "<pre>"; print_r($religions);?>
                                <select name="religionId" class="form-control">
                                    <?php
                                    foreach($religions as $religon){
                                    ?>
                                        <option value="<?= $religon->id;?>" <?php if($religionId == $religon->id){ echo "selected"; } else {}?>>
                                            <?= $religon->religionName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 

                        <div class="col-sm-4">                    
                            <div class="form-group">
                                <label for="varchar">Email1 <?php echo form_error('email1') ?></label>
                                <input type="text" class="form-control" name="email1" id="email1" placeholder="Email1" value="<?php echo $email1; ?>" />
                            </div>
                        </div> 
                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label for="varchar">Email2 <?php echo form_error('email2') ?></label>
                                <input type="text" class="form-control" name="email2" id="email2" placeholder="Email2" value="<?php echo $email2; ?>" />
                            </div>
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="datetime">Birthday <?php echo form_error('birthday') ?></label>
                                <input type="text" class="form-control" name="birthday" id="date" placeholder="Birthday" value="<?php if($birthday){ echo date('d/m/Y',strtotime($birthday)); } ?>" />
                            </div>
                        </div> 
                        
                        <div class="col-sm-4">                    
                            <div class="form-group">
                                <label for="varchar">Phone <?php echo form_error('phone') ?></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                            </div>
                        </div> 
                        <div class="col-sm-4">        
                            <div class="form-group">
                                <label for="varchar">Handphone <?php echo form_error('handphone') ?></label>
                                <input type="text" class="form-control" name="handphone" id="handphone" placeholder="Handphone" value="<?php echo $handphone; ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address <?php echo form_error('address') ?></label>
                                <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                            </div>
                        </div>

                        

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">   
                        <h5><strong>Other Information:</strong></h5>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label for="int">Position <?php echo form_error('positionId') ?></label>
                                <select name="positionId" class="form-control">
                                    <?php
                                    foreach($positions as $position){
                                    ?>
                                        <option value="<?= $position->id;?>" <?php if($positionId == $position->id){ echo "selected"; } else {}?>>
                                            <?= $position->positionName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="int">Department <?php echo form_error('departmentId') ?></label>
                                <select name="departmentId" class="form-control">
                                    <?php
                                    foreach($departments as $department){
                                    ?>
                                        <option value="<?= $department->id;?>" <?php if($departmentId == $department->id){ echo "selected"; } else {}?>>
                                            <?= $department->departmentName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="decimal">CostRate <?php echo form_error('costRate') ?></label>
                                <input type="text" class="form-control" name="costRate" id="costRate" placeholder="CostRate" value="<?php echo $costRate; ?>" />
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="varchar">Univ. /School <?php echo form_error('school') ?></label>
                                <input type="text" class="form-control" name="school" id="school" placeholder="School" value="<?php echo $school; ?>" />
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="int">Degree <?php echo form_error('degree') ?></label>
                                <select name="degree" class="form-control">
                                    <?php
                                    foreach($degrees as $rsDegree){
                                    ?>
                                        <option value="<?= $rsDegree->id;?>" <?php if($degree == $rsDegree->id){ echo "selected"; } else {}?>>
                                            <?= $rsDegree->degreeName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="varchar">SertificateNo <?php echo form_error('sertificateNo') ?></label>
                                <input type="text" class="form-control"  name="sertificateNo" id="sertificateNo" placeholder="SertificateNo" value="<?php echo $sertificateNo; ?>" />
                            </div>
                        </div> 
                         
                        <div class="col-md-12"> 
                            <div class="form-group">
                            <label class="control-label col-md-3">Accountant Status: <?php echo form_error('accountantStatusId') ?></label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="accountantStatusId" id="inlineRadio1" value="1" <?php if($accountantStatusId == 1){ echo 'checked'; }else {}?>> Ya
                                </label>
                                <label class="radio-inline">
                                 <input type="text" class="form-control" name="regAccountantNo" id="regAccountantNo" placeholder="Reg Accountant No" value="<?php echo $regAccountantNo; ?>" />
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-12"> 
                            <div class="form-group">
                            <label class="control-label col-md-3">CPA Status: </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="cpaStatusId" value="1" id="inlineRadio1" <?php if($cpaStatusId == 1){ echo 'checked'; }else {}?>> Ya
                                </label>
                                <label class="radio-inline">
                                 <input type="text" class="form-control" name="cpaNo" id="CPANo" placeholder="CPA Number" value="<?php echo $cpaNo; ?>" />
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label class="control-label col-md-3">Resign Status: </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="resign" value="1" id="inlineRadio1"  <?php if($resign == 1){ echo 'checked'; }else {}?>> Ya
                                </label>
                                <label class="radio-inline">
                                    <input type="text" class="form-control" id="date" name="resignDate" placeholder="Resign Date" value="<?php if($resign == 1){ echo date('d/m/Y',strtotime($resignDate));} else {}?>">
                                </label>
                            </div>
                        </div>
                        
                       
                    </div>
                            <h5><strong>Bank Account:</strong></h5>
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                    <label for="tinyint">Bank <?php echo form_error('bankId') ?></label>
                                    <select name="bankId" class="form-control">
                                    <?php
                                    foreach($banks as $bank){
                                    ?>
                                        <option value="<?= $bank->id;?>" <?php if($bankId == $bank->id){ echo "selected"; } else {}?>>
                                             <?= $bank->BankCode;?> - <?= $bank->BankName;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                    <label for="varchar">BankBranch <?php echo form_error('bankBranch') ?></label>
                                    <input type="text" class="form-control" name="bankBranch" id="bankBranch" placeholder="BankBranch" value="<?php echo $bankBranch; ?>" />
                                </div>
                            </div>
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                    <label for="varchar">AccNo <?php echo form_error('accNo') ?></label>
                                    <input type="text" class="form-control" name="accNo" id="accNo" placeholder="AccNo" value="<?php echo $accNo; ?>" />
                                </div>
                            </div>
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label for="varchar">Acc Name <?php echo form_error('accName') ?></label>
                                    <input type="text" class="form-control" name="accName" id="accName" placeholder="AccName" value="<?php echo $accName; ?>" />
                                </div>
                            </div>



                </div>

            </div>

    </div>







    <input type="hidden" class="form-control" name="userCreate" id="userCreate" placeholder="UserCreate" value="<?php echo $userCreate; ?>" />
    <input type="hidden" class="form-control" name="createDate" id="createDate" placeholder="CreateDate" value="<?php echo $createDate; ?>" />
    <input type="hidden" class="form-control" name="userUpdate" id="userUpdate" placeholder="UserUpdate" value="<?php echo $userUpdate; ?>" />
    <input type="hidden" class="form-control" name="updateDate" id="updateDate" placeholder="UpdateDate" value="<?php echo $updateDate; ?>" />

    <center>
        <input type="hidden" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <a href="<?php echo site_url('employee') ?>" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    </center>
    <hr/>
</form>

</section>

