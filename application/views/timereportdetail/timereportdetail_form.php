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
        <h2 style="margin-top:0px">Timereportdetail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <input type="text" class="form-control" name="entityId" id="entityId" placeholder="EntityId" value="<?php echo $entityId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Code <?php echo form_error('Code') ?></label>
            <input type="text" class="form-control" name="Code" id="Code" placeholder="Code" value="<?php echo $Code; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">EmployeeId <?php echo form_error('employeeId') ?></label>
            <input type="text" class="form-control" name="employeeId" id="employeeId" placeholder="EmployeeId" value="<?php echo $employeeId; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">PeriodeDate <?php echo form_error('periodeDate') ?></label>
            <input type="text" class="form-control" name="periodeDate" id="periodeDate" placeholder="PeriodeDate" value="<?php echo $periodeDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">EngagementId <?php echo form_error('engagementId') ?></label>
            <input type="text" class="form-control" name="engagementId" id="engagementId" placeholder="EngagementId" value="<?php echo $engagementId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ApprovalBy <?php echo form_error('approvalBy') ?></label>
            <input type="text" class="form-control" name="approvalBy" id="approvalBy" placeholder="ApprovalBy" value="<?php echo $approvalBy; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">ApprovalStatus <?php echo form_error('approvalStatus') ?></label>
            <input type="text" class="form-control" name="approvalStatus" id="approvalStatus" placeholder="ApprovalStatus" value="<?php echo $approvalStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('description') ?></label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork1 <?php echo form_error('dateWork1') ?></label>
            <input type="text" class="form-control" name="dateWork1" id="dateWork1" placeholder="DateWork1" value="<?php echo $dateWork1; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork2 <?php echo form_error('dateWork2') ?></label>
            <input type="text" class="form-control" name="dateWork2" id="dateWork2" placeholder="DateWork2" value="<?php echo $dateWork2; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork3 <?php echo form_error('dateWork3') ?></label>
            <input type="text" class="form-control" name="dateWork3" id="dateWork3" placeholder="DateWork3" value="<?php echo $dateWork3; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork4 <?php echo form_error('dateWork4') ?></label>
            <input type="text" class="form-control" name="dateWork4" id="dateWork4" placeholder="DateWork4" value="<?php echo $dateWork4; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork5 <?php echo form_error('dateWork5') ?></label>
            <input type="text" class="form-control" name="dateWork5" id="dateWork5" placeholder="DateWork5" value="<?php echo $dateWork5; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork6 <?php echo form_error('dateWork6') ?></label>
            <input type="text" class="form-control" name="dateWork6" id="dateWork6" placeholder="DateWork6" value="<?php echo $dateWork6; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork7 <?php echo form_error('dateWork7') ?></label>
            <input type="text" class="form-control" name="dateWork7" id="dateWork7" placeholder="DateWork7" value="<?php echo $dateWork7; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork8 <?php echo form_error('dateWork8') ?></label>
            <input type="text" class="form-control" name="dateWork8" id="dateWork8" placeholder="DateWork8" value="<?php echo $dateWork8; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork9 <?php echo form_error('dateWork9') ?></label>
            <input type="text" class="form-control" name="dateWork9" id="dateWork9" placeholder="DateWork9" value="<?php echo $dateWork9; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork10 <?php echo form_error('dateWork10') ?></label>
            <input type="text" class="form-control" name="dateWork10" id="dateWork10" placeholder="DateWork10" value="<?php echo $dateWork10; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork11 <?php echo form_error('dateWork11') ?></label>
            <input type="text" class="form-control" name="dateWork11" id="dateWork11" placeholder="DateWork11" value="<?php echo $dateWork11; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork12 <?php echo form_error('dateWork12') ?></label>
            <input type="text" class="form-control" name="dateWork12" id="dateWork12" placeholder="DateWork12" value="<?php echo $dateWork12; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork13 <?php echo form_error('dateWork13') ?></label>
            <input type="text" class="form-control" name="dateWork13" id="dateWork13" placeholder="DateWork13" value="<?php echo $dateWork13; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork14 <?php echo form_error('dateWork14') ?></label>
            <input type="text" class="form-control" name="dateWork14" id="dateWork14" placeholder="DateWork14" value="<?php echo $dateWork14; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork15 <?php echo form_error('dateWork15') ?></label>
            <input type="text" class="form-control" name="dateWork15" id="dateWork15" placeholder="DateWork15" value="<?php echo $dateWork15; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork16 <?php echo form_error('dateWork16') ?></label>
            <input type="text" class="form-control" name="dateWork16" id="dateWork16" placeholder="DateWork16" value="<?php echo $dateWork16; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork17 <?php echo form_error('dateWork17') ?></label>
            <input type="text" class="form-control" name="dateWork17" id="dateWork17" placeholder="DateWork17" value="<?php echo $dateWork17; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork18 <?php echo form_error('dateWork18') ?></label>
            <input type="text" class="form-control" name="dateWork18" id="dateWork18" placeholder="DateWork18" value="<?php echo $dateWork18; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork19 <?php echo form_error('dateWork19') ?></label>
            <input type="text" class="form-control" name="dateWork19" id="dateWork19" placeholder="DateWork19" value="<?php echo $dateWork19; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork20 <?php echo form_error('dateWork20') ?></label>
            <input type="text" class="form-control" name="dateWork20" id="dateWork20" placeholder="DateWork20" value="<?php echo $dateWork20; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork21 <?php echo form_error('dateWork21') ?></label>
            <input type="text" class="form-control" name="dateWork21" id="dateWork21" placeholder="DateWork21" value="<?php echo $dateWork21; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork22 <?php echo form_error('DateWork22') ?></label>
            <input type="text" class="form-control" name="DateWork22" id="DateWork22" placeholder="DateWork22" value="<?php echo $DateWork22; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork23 <?php echo form_error('dateWork23') ?></label>
            <input type="text" class="form-control" name="dateWork23" id="dateWork23" placeholder="DateWork23" value="<?php echo $dateWork23; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork24 <?php echo form_error('dateWork24') ?></label>
            <input type="text" class="form-control" name="dateWork24" id="dateWork24" placeholder="DateWork24" value="<?php echo $dateWork24; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork25 <?php echo form_error('dateWork25') ?></label>
            <input type="text" class="form-control" name="dateWork25" id="dateWork25" placeholder="DateWork25" value="<?php echo $dateWork25; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork26 <?php echo form_error('dateWork26') ?></label>
            <input type="text" class="form-control" name="dateWork26" id="dateWork26" placeholder="DateWork26" value="<?php echo $dateWork26; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork27 <?php echo form_error('dateWork27') ?></label>
            <input type="text" class="form-control" name="dateWork27" id="dateWork27" placeholder="DateWork27" value="<?php echo $dateWork27; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork28 <?php echo form_error('dateWork28') ?></label>
            <input type="text" class="form-control" name="dateWork28" id="dateWork28" placeholder="DateWork28" value="<?php echo $dateWork28; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork29 <?php echo form_error('dateWork29') ?></label>
            <input type="text" class="form-control" name="dateWork29" id="dateWork29" placeholder="DateWork29" value="<?php echo $dateWork29; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork30 <?php echo form_error('dateWork30') ?></label>
            <input type="text" class="form-control" name="dateWork30" id="dateWork30" placeholder="DateWork30" value="<?php echo $dateWork30; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">DateWork31 <?php echo form_error('dateWork31') ?></label>
            <input type="text" class="form-control" name="dateWork31" id="dateWork31" placeholder="DateWork31" value="<?php echo $dateWork31; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Version <?php echo form_error('version') ?></label>
            <input type="text" class="form-control" name="version" id="version" placeholder="Version" value="<?php echo $version; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('timereportdetail') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>