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
        <h2 style="margin-top:0px">Clientcontactperson <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ClientId <?php echo form_error('clientId') ?></label>
            <input type="text" class="form-control" name="clientId" id="clientId" placeholder="ClientId" value="<?php echo $clientId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ClientCode <?php echo form_error('clientCode') ?></label>
            <input type="text" class="form-control" name="clientCode" id="clientCode" placeholder="ClientCode" value="<?php echo $clientCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ContactName <?php echo form_error('contactName') ?></label>
            <input type="text" class="form-control" name="contactName" id="contactName" placeholder="ContactName" value="<?php echo $contactName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Salutation <?php echo form_error('salutation') ?></label>
            <input type="text" class="form-control" name="salutation" id="salutation" placeholder="Salutation" value="<?php echo $salutation; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Position <?php echo form_error('position') ?></label>
            <input type="text" class="form-control" name="position" id="position" placeholder="Position" value="<?php echo $position; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Handphone <?php echo form_error('handphone') ?></label>
            <input type="text" class="form-control" name="handphone" id="handphone" placeholder="Handphone" value="<?php echo $handphone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmailAddress <?php echo form_error('emailAddress') ?></label>
            <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="EmailAddress" value="<?php echo $emailAddress; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('clientcontactperson') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>