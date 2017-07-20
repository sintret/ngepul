<tr class="input-employee" id="appendTr<?php echo $counter;?>">
    <td>
        <select name="detail[employeeId][]" class="form-control dropDownEmployee" id="dropDownEmployee<?php echo $counter;?>">
            <option>Pelase Select Employee first..</option>
            <?php
            foreach ($employees as $rsEmployee) {
                ?>
                <option value="<?= $rsEmployee->id; ?>" data-price="<?php echo $rsEmployee->costRate; ?>">
                    <?= $rsEmployee->firstName . '' . $rsEmployee->lastName; ?>
                </option>
                <?php
            }
            ?>
        </select>
    </td>
    <td>
        <input type="text" name="detail[costRate][]"class="form-control costRate number-ajax" id="costRate<?php echo $counter;?>" readonly="readonly" placeholder="select employee first"/>
    </td>
    <td>
        <div class="input-group">                                              
            <input type="number" name="detail[budgetHour][]" pattern="[1-9][1-9]{0,4}" id="budgetHour<?php echo $counter;?>" class="form-control budgetHour" value="1" />
            <span class="input-group-addon"><b>HOUR</b></span>
        </div>
    </td>
    <td><input type="text" name="detail[subTotal][]" pattern="[1-9][1-9]{0,4}" id="subTotal<?php echo $counter;?>" class="form-control number-ajax totalHarga subTotal" readonly="read"/></td>
    <td><span class="btn btn-danger btn-sm trash" data-trash="appendTr<?php echo $counter;?>"><i class="fa fa-trash-o"></i></span></td>
</tr>