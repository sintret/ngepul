<?php
$no = 1;
$timesheets = $results['results'];
if ($timesheets)
    foreach ($timesheets as $timesheet) {
        ?>
        <tr>
            <td>#</td>
            <td><?php echo $timesheet->name; ?></td>
            <td><?php echo $timesheet->description; ?></td>
            <td>Approval</td>
            <?php for ($i = $results['time1']; $i <= $results['time2']; $i++) { ?>
                <td>0</td>
            <?php } ?>
            <td>Total</td>
        </tr>
        <?php
        $no++;
    }
?>