<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>SERVICE AREA</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
            <label for="int">COMPANY ENTITY <?php echo form_error('entityId') ?></label>
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
            <label for="varchar">Code <?php echo form_error('serviceCode') ?></label>
            <input type="text" class="form-control" name="serviceCode" id="serviceCode" placeholder="ServiceCode" value="<?php echo $serviceCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Service Name <?php echo form_error('serviceName') ?></label>
            <input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="ServiceName" value="<?php echo $serviceName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Description <?php echo form_error('serviceDescription') ?></label>
            <input type="text" class="form-control" name="serviceDescription" id="serviceDescription" placeholder="ServiceDescription" value="<?php echo $serviceDescription; ?>" />
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('service') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

