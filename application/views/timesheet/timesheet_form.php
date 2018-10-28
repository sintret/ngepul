<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
$accesslevelId = $this->session->userdata('userlevelId');
?>
<section class="panel">
    <header class="panel-heading btn-inverse">
        <h4><strong>TIMESHEET</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data" id="target">
          

        <div class="form-group">
             <?php
                //echo $accesslevelId;
                if ($accesslevelId == 1 || $accesslevelId == 2) {
             ?>
            <label for="int">Employee <?php echo form_error('employeeId') ?></label>
            <select name="employeeId" class="selectpicker show-tick form-control" data-size="10" data-live-search="true">
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
            
            <?php
                } else {
            ?>
             
            <input type="text" name="employeeShowId" disabled="disabled" readonly="readonly" class="form-control" value="<?php echo $this->session->userdata('fullName'); ?>" /> 
                            <input type="hidden" name="employeeId" value="<?php echo $this->session->userdata('employeeId'); ?>" /> 
                           
                         <?php
                        }
                        ?>
        </div>
            
         <div class="form-group">
            <label for="int">Engagement Name <?php echo form_error('engagementId') ?></label>
            <select name="engagementId" class="form-control selectpicker  show-tick" data-live-search="true">
                <option value="0" <?php if($engagementId == 0) { echo "selected"; } else {}?>>Non Engagement</option>
                                    <?php 
                                    foreach($engagements as $rsEngagement){
                                    ?>
                                        <option value="<?= $rsEngagement->id;?>" <?php if($rsEngagement->id == $engagementId) { echo "selected"; }?>>
                                                <?= $rsEngagement->name;?>
                                        </option>
                                    <?php
                                    }
                                    ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php if($id) { echo date('d/m/Y',strtotime($date));} else { echo date('d/m/Y'); } ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Hour <?php echo form_error('hour') ?></label>
            <input type="text" class="form-control" name="hour" id="hour" placeholder="Hour" value="<?php echo $hour; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('description') ?></label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
        </div>
           
            <hr/>
            <center>    
           
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('timesheet') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script type="text/javascript">
  $("#target :input").prop("disabled", false);  
 </script>