<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Bank</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

           <div class="form-group">
            <label for="varchar">City Name <?php echo form_error('cityName') ?></label>
            <input type="text" class="form-control" name="cityName" id="cityName" placeholder="CityName" value="<?php echo $cityName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Province <?php echo form_error('cityProvinceId') ?></label>
            <select name="cityProvinceId" class="form-control">
                <?php
                    foreach($provinces as $rsProvince){
                ?>
                <option value="<?= $rsProvince->id;?>"<?php if($rsProvince->id == $cityProvinceId){ echo "selected"; } {}?> >
                        <?= $rsProvince->provinceName;?>
                </option>
                <?php
                    }
                ?>
            </select>
        </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('bank') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>

