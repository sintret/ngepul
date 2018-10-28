<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h5><strong>Reset Employee Password</strong></h5>
    </header>
    <div class="panel-body">
        <form action="<?= base_url("userslist/reset_password_do");?>" method="post"  enctype="multipart/form-data">
        <?= $this->session->flashdata('eroor_set');?>
            <div class="form-group">
                <label for="int">Employee </label>
                <select name="employeeId" class="form-control">
                    <?php
                    foreach ($employee as $rsEmployee) {
                        ?>
                        <option value="<?= $rsEmployee->id; ?>" ><?= $rsEmployee->firstName; ?> <?= $rsEmployee->lastName; ?></option>
                    <?php } ?>
                </select>
            </div>
                <div class="form-group">
            <label for="varchar">NEW PASSWORD</label>
            <input type="password" class="form-control" name="newPassword" id="password" placeholder="new password"  />
        </div>
	    <div class="form-group">
            <label for="varchar">RETYPE NEW PASSWORD</label>
            <input type="password" class="form-control" name="retypeNewPassword" id="retypePassword" placeholder="new password"  />
        </div>
          
         
            <center>    
              
                <a href="<?php echo site_url('userslist') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">SAVE</button> 
            </center>
        </form>

</section>




