<?php

$counter = $_POST['counter'];
?>
<?php

?>
<tr id="appendTr<?= $counter; ?>">
<td>
        <select name="detail[room][]" id="room" required="required" class="form-control">
            <option value=''>Please Select One</option>
            <?php
            //foreach($employess as $rsEmployee){
            ?>
                <option value=""></option>
            <?php
           //  }
            ?>
    </select>
</td>
<td onclick="deleteTr('<?php echo $counter ?>')">
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
</tr>

