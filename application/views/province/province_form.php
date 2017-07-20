<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>Province</strong> /<?= $button ?></h4>
    </header>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
            <label for="tinyint">Country Code <?php echo form_error('countryCode') ?></label>
            <select name="countryCode" class="form-control">
                <?php
                    foreach($countrys as $rsCountry){
                ?>
                <option value="<?= $rsCountry->id;?>"<?php if($rsCountry->id == $countryCode){ echo "selected"; } {}?> >
                        <?= $rsCountry->CountryName;?>
                </option>
                <?php
                    }
                ?>
            </select>
            </div>
            <div class="form-group">
                <label for="varchar">Provinsi Code <?php echo form_error('provinceCode') ?></label>
                <input type="text" class="form-control" name="provinceCode" id="AccountNumber" placeholder="Province Code" value="<?php echo $provinceCode; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Provinsi Name <?php echo form_error('provinceName') ?></label>
                <input type="text" class="form-control" name="provinceName" id="AccountNumber" placeholder="Province Name" value="<?php echo $provinceName; ?>" />
            </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('province') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
