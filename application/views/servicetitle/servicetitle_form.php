<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>MAIN SERVICE</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
            <label for="int">EntityId <?php echo form_error('entityId') ?></label>
            <select name="entityId" class="form-control">
                <?php
                    foreach($entitys as $rsEntity){
                ?>
                <option value="<?= $rsEntity->id;?>"<?php if($rsEntity->id == $entityId){ echo "selected"; } {}?> >
                        <?= $rsEntity->company_name;?>
                </option>
                <?php
                    }
                ?>
            </select>
            </div>
	    <div class="form-group">
            <label for="int">Service Area<?php echo form_error('serviceId') ?></label>
            
            <select name="serviceId" class="form-control">
                <?php
                    foreach($services as $rsService){
                ?>
                <option value="<?= $rsService->id;?>"<?php if($rsService->id == $serviceId){ echo "selected"; } {}?> >
                       <?= $rsService->serviceName;?> (<?= $rsService->serviceCode;?>)
                </option>
                <?php
                    }
                ?>
            </select>
            </div>
	    <div class="form-group">
            <label for="varchar">Main Service Name <?php echo form_error('serviceTitleName') ?></label>
            <input type="text" class="form-control" name="serviceTitleName" id="serviceTitleName" placeholder="ServiceTitleName" value="<?php echo $serviceTitleName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('serviceTitleDescription') ?></label>
            <input type="text" class="form-control" name="serviceTitleDescription" id="serviceTitleDescription" placeholder="ServiceTitleDescription" value="<?php echo $serviceTitleDescription; ?>" />
        </div> 
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('servicetitle') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
