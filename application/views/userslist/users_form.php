<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>Userlist</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
                 
                        <div class="form-group">
                        <label for="int">Company <?php echo form_error('entityId') ?></label>
<!--                        <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />-->
                        <select name="entityId" class="form-control">
                    <?php
                    foreach ($entities as $rsEntity) {
                        ?>
                        <option value="<?= $rsEntity->id; ?>" <?php if($entityId = $rsEntity->id){ echo "selected"; }else{};?> ><?= $rsEntity->company_name; ?></option>
                    <?php } ?>
                </select>
                    </div>

            <div class="form-group">
                <label for="tinyint">Active <?php echo form_error('active') ?></label>
                <select name="active" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="int">Userlevel <?php echo form_error('userlevelId') ?></label>

                <select name="userlevelId" class="selectpicker show-tick form-control" data-size="10" data-live-search="true">
                    <?php
                    foreach ($userlevels as $userlevel) {
                        ?>
                        <option value="<?= $userlevel->id; ?>" <?php if($userlevelId == $userlevel->id){ echo "selected"; }else{};?> ><?= $userlevel->userlevel_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="int">Employee <?php echo form_error('employeeId') ?></label>
                <select name="employeeId" class="selectpicker show-tick form-control" data-size="10" data-live-search="true">
                    <?php
                    foreach ($employees as $rsEmployee) {
                        ?>
                        <option value="<?= $rsEmployee->id; ?>" <?php if($employeeId = $rsEmployee->id){ echo "selected"; }else{};?> ><?= $rsEmployee->firstName; ?> <?= $rsEmployee->lastName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <?php
            if($segmentPage2 != "update"){
            ?>
            <div class="form-group">
                <label for="password">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="email" placeholder="password" value="<?php echo $password; ?>" />
            </div>
            <?php } ?>
             <?php
                if($segmentPage2 == "update"){
              ?>
            <div class="form-group">
                <img width="140px" height="140px" src="<?=base_url();?>assets/uploads/employee/<?php echo $avatar ?>" class="circle">
                <input type="hidden" class="form-control" name="oldAvatar" id="email" placeholder="password" value="<?= $avatar;?>"/>
            </div>
             <?php } ?>
            
            <div class="form-group">
                <label for="varchar">Avatar <?php echo form_error('avatar') ?></label>
               <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div> 
                        <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="avatar" >
                        </span> 
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                    </div>
                </div>
            </div>
            <!--	    <div class="form-group">
                        <label for="tinyint">Deleted <?php echo form_error('deleted') ?></label>
                        <input type="text" class="form-control" name="deleted" id="deleted" placeholder="Deleted" value="<?php echo $deleted; ?>" />
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
                    </div>-->
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <input type="hidden" name="pageId" value="<?php echo $this->uri->segment(5); ?>" /> 
                <a href="<?php echo site_url('userslist') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>




