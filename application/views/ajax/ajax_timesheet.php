<?php
$no = 1;
$timesheets = $results['results'];
$ym = $results['ym'];
$ids = $results['ids'];
$totals = $results['totals'];
?>

<thead>
    <tr>
        <th>#</th>
        <th>Project Name</th>
        <th>Budget Hour</th>
        <th>Periode</th>
        <?php foreach ($results['array'] as $arr) { ?>
            <th><?php echo $arr ?></th>
        <?php } ?>
        <th>Total</th>
    </tr>
</thead>
<?php
if ($timesheets)
    foreach ($timesheets as $timesheet) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $timesheet->name; ?></td>
            <td><?php echo $timesheet->budgetHour; ?></td>
            <td><?php echo $timesheet->startDate . '' . $timesheet->endDate; ?></td>
            <?php foreach ($results['dates'] as $arr) { ?>
                <td><button id="ts<?php echo $timesheet->id . '_' . $arr; ?>" type="button" data-engagementId="<?= $timesheet->id; ?>" data-title="<?= str_replace('"', "", $timesheet->name . ' with' . $arr); ?>" data-no="<?= $no; ?>" data-description="<?= isset($ids[$timesheet->id][$arr]['description']) ? str_replace('"', '', $ids[$timesheet->id][$arr]['description']) : ''; ?>" data-date="<?= $arr; ?>" class="btn btn-link tInput"><?= isset($ids[$timesheet->id][$arr]['hour']) ? $ids[$timesheet->id][$arr]['hour'] : 0 ?></button></td>
            <?php } ?>
                <td id="total<?php echo $timesheet->id; ?>"><?php echo $totals[$timesheet->id];?></td>
        </tr>
        <?php
        $no++;
    }
?>