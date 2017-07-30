<?php
$no = 1;
$timesheets = $results['results'];
$ym = $results['ym'];
$ids = $results['ids'];
if ($timesheets)
    foreach ($timesheets as $timesheet) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $timesheet->name; ?></td>
            <td><?php echo $timesheet->description; ?></td>
            <td>Approval</td>
            <?php
            for ($i = $results['time1']; $i <= $results['time2']; $i++) {
                if ($i < 10) {
                    $dt = '0' . $i;
                } else {
                    $dt = $i;
                }
                $d = $ym . $dt;
                ?>
                <td><button id="ts<?php echo $timesheet->id . '_' . $d; ?>" type="button" data-engagementId="<?= $timesheet->id; ?>" data-title="<?= str_replace('"', "", $timesheet->name . ' with' . $d); ?>" data-no="<?= $no; ?>" data-description="<?= isset($ids[$timesheet->id][$d]['description']) ? str_replace('"', '', $ids[$timesheet->id][$d]['description']) : ''; ?>" data-date="<?= $d; ?>" class="btn btn-link tInput"><?= isset($ids[$timesheet->id][$d]['hour']) ? $ids[$timesheet->id][$d]['hour'] : 0 ?></button></td>
            <?php } ?>
            <td id="total<?php echo $timesheet->id; ?>"></td>
        </tr>
        <?php
        $no++;
    }
?>