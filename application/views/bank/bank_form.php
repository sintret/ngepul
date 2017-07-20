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
                <label for="varchar">Bank Code <?php echo form_error('BankCode') ?></label>
                <input type="text" class="form-control" name="BankCode" id="BankName" placeholder="BankCode" value="<?php echo $BankCode; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Bank Name <?php echo form_error('BankName') ?></label>
                <input type="text" class="form-control" name="BankName" id="BankName" placeholder="BankName" value="<?php echo $BankName; ?>" />
            </div>
            
            <div class="form-group">
                <label for="varchar">Account Number <?php echo form_error('AccountNumber') ?></label>
                <input type="text" class="form-control" name="AccountNumber" id="AccountNumber" placeholder="Account Number" value="<?php echo $AccountNumber; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Bank Description <?php echo form_error('Description') ?></label>
                <input type="text" class="form-control" name="Description" id="AccountNumber" placeholder="Bank Description" value="<?php echo $Description; ?>" />
            </div>
            <hr/>
            <center>    
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <a href="<?php echo site_url('bank') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </center>
        </form>

</section>
