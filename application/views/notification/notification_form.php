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
        <h2 style="margin-top:0px">Notification <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">UserId <?php echo form_error('userId') ?></label>
            <input type="text" class="form-control" name="userId" id="userId" placeholder="UserId" value="<?php echo $userId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="message">Message <?php echo form_error('message') ?></label>
            <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"><?php echo $message; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Read <?php echo form_error('read') ?></label>
            <input type="text" class="form-control" name="read" id="read" placeholder="Read" value="<?php echo $read; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">CreatedBy <?php echo form_error('createdBy') ?></label>
            <input type="text" class="form-control" name="createdBy" id="createdBy" placeholder="CreatedBy" value="<?php echo $createdBy; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">UpdatedAt <?php echo form_error('updatedAt') ?></label>
            <input type="text" class="form-control" name="updatedAt" id="updatedAt" placeholder="UpdatedAt" value="<?php echo $updatedAt; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>