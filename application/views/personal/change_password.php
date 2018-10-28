
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>CHANGE YOUR PASSWORD</strong> </h4>
    </header>
    <div class="panel-body">
        <?= $this->session->flashdata('eroor_set');?>
        <form action="<?= base_url();?>personal/change_password_add" method="post"  enctype="multipart/form-data">

	    <div class="form-group">
            <label for="varchar">OLD PASSWORD</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="old password" />
        </div>
	    <div class="form-group">
            <label for="varchar">NEW PASSWORD</label>
            <input type="password" class="form-control" name="newPassword" id="password" placeholder="new password"  />
        </div>
	    <div class="form-group">
            <label for="varchar">RETYPE NEW PASSWORD</label>
            <input type="password" class="form-control" name="retypeNewPassword" id="retypePassword" placeholder="new password"  />
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?= $this->session->userdata('id');?>" /> 
                <a href="<?php echo site_url('personal/change_password') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button> 
            </center>
        </form>

</section>

