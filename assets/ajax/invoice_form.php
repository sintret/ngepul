<?php
//include ("../_lib/config.php");


$counter = $_POST['counter'];
?>
<tr id="appendTr<?= $counter; ?>">
<td>
        <select name="detail[room][]" id="room" required="required" class="form-control">
            <option value=''>Please Select One</option>
            <option value=>sta</option>

    </select>
</td>
<td onclick="deleteTr('<?php echo $counter ?>')">
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
</tr>

