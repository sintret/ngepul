<?php
//$counter = $_POST['counter'];
?>
<?php ?>
<tr id="appendTr<?= $counter; ?>">
    <td>
        <select name="detail[employeeId][]" class="form-control" id="dropDownEmployee">
            <?php
            foreach ($employees as $rsEmployee) {
            ?>
                <option value="<?= $rsEmployee->id; ?>" id="<?= rupiah($rsEmployee->costRate); ?>">
                    <?= $rsEmployee->firstName . '' . $rsEmployee->lastName; ?>
                </option>
            <?php
                }
             ?>
        </select>
    </td>
     <td>
           <input type="text" name="detail[costRate][]"class="form-control" id="price" readonly="readonly" placeholder="select employee first"/>
     </td>
     <td>
        <div class="input-group">                                              
            <input type="number" name="detail[budgetHour][]" pattern="[1-9][1-9]{0,4}" id="budgetHour" class="form-control" value="1" />
               <span class="input-group-addon"><b>HOUR</b></span>
         </div>
    </td>
    <td><input type="text" name="detail[subTotal][]" pattern="[1-9][1-9]{0,4}" id="subTotal" class="form-control" readonly="read"/></td>
    <td onclick="deleteTr('<?php echo $counter ?>')">
        <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
</tr>
