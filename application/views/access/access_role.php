<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ACCESS ROLE SETTING</strong></h4>
    </header>
    <div class="panel-body">
         <form class="form-horizontal" data-collabel="2" data-label="color" action="<?php echo $action; ?>" method="post">  

            <div class="col-md-12" >
                <div class="input-group">
                    <select name="userlevelId" class="form-control">
                       <?php
                       foreach($userlevels as $rsLevel){
                       ?>
                        <option value="<?= $rsLevel->id;?>"><?= $rsLevel->userlevel_name;?></option>
                       <?php
                        }
                       ?>
                    </select>
                    <span class="input-group-btn">
                        <input type="submit" class="button btn btn-primary" value="save" name="submit" id="mc-embedded-subscribe">
                    </span>
                </div>
                
            </div>
             <div class="col-md-12">
             <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
		<th>MENU </th>
                <th>CREATE <p><input type="checkbox" name="checkAll"></p></th>
		<th>UPDATE <p><input type="checkbox" name="checkAll"></p></th>
		<th>VIEW <p><input type="checkbox" name="checkAll"></p></th>
		<th>DELETE <p><input type="checkbox" name="checkAll"></p></th>
		<th>EXCEL <p><input type="checkbox" name="checkAll"></p></th>
		<th>WORD <p><input type="checkbox" name="checkAll"></p></th>    
            </tr>
            
	</thead>
            
            <tbody align="center">
                <?php
                foreach($controllers as $rsController){
                ?>
                <tr>
                    <td><?= $rsController;?></td>
                    <?php
                    foreach($methods as $rsMethod){
                    ?>
                    <td><input type="checkbox" name="<?=$rsController;?>[<?=$rsMethod?>]" class="<?=$rsController;?>" ></td>
                 
                    <?php
                    }
                    ?>
                   
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
             </div>

        </form>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
<script>
$('input[type="checkbox"]').change(function(){
    this.value = (Number(this.checked));
});
</script>