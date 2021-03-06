
<div class="container">
    <h1>Your Work Dashboard</h1>
</div>

<div id="exTab1" class="container">
    <ul  class="nav nav-pills">
        <li class="active">
            <a  href="#1a" data-toggle="tab">Todo List</a>
        </li>
        <li>
            <a href="#timesheets" data-toggle="tab">TimeSheet</a>
        </li>
        <li>
            <a href="#2a" data-toggle="tab">On Closed</a>
        </li>

    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <div class="row">
                <div class="col-md-11">
                    <table class="table table-bordered" style="margin-bottom: 10px;margin-right: 10px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Periode</th>
                                <th>Client</th>
                                <th>Partner</th>
                                <th>Manager</th>
                                <th>Senior</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        if ($todolists)
                            foreach ($todolists as $todolist) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $todolist->name; ?></td>
                                        <td><?php echo $todolist->startDate . ' until ' . $todolist->endDate; ?></td>
                                        <td><?php echo $todolist->clientName; ?></td>
                                        <td><button type="button" class="btn btn-xs btn-success btn-transparent"><?php echo $todolist->partner; ?> </button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->manager; ?></button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->senior; ?></button></td>
                                        <td><?php echo rupiah($todolist->billingRate); ?></td>
                                        <td>
                                            <span class="tooltip-area">
                                                <a href="<?php echo base_url()?>engagement/update/<?php echo $todolist->engagementId;?>" class="btn btn-default btn-sm" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                            </span>
                                        </td>
                                    </tr>

                                </tbody>
                                <?php
                                $no++;
                            }
                        ?>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>

        </div>
        <div class="tab-pane" id="timesheets">
            <h3>Select Periode :</h3>
            <p>
            <form class="form-inline">
                <div class="form-group" style="margin: 0 5px">
                    <label for="periode">Month:</label>
                    <select name="month" id="tsMonth" class="form-control">
                        <?php
                        $no = 0;
                        foreach (dropdown_months() as $k => $v) {
                            $selected = $k == date("m") ? 'selected' : '';
                            ?>
                            <option data-id="<?php echo $no; ?>" <?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
                            <?php
                            $no++;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group"  style="margin: 0 5px">
                    <label for="pwd">Year:</label>
                    <select name="year" id="tsYear" class="form-control">
                        <?php foreach (dropdown_years() as $k => $v) { ?>
                            <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="checkbox"  style="margin: 0 5px">
                    <label style="margin: 0 5px"><input type="radio" checked="" id="option1" name="option" class="form-control"><span id="span-option1"> 1-15 </span></label>
                    <label style="margin: 0 5px"><input type="radio" id="option2" name="option" class="form-control"><span id="span-option2"> 16-31 </span></label>
                </div>
                <button type="button" id="goTimesheets" class="btn btn-success"> Go!</button>
            </form>
            <p>&nbsp;</p>

            <div class="row">
                <div class="col-md-11">
                    <table class="table table-bordered" id="table-timesheet" style="margin-bottom: 10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Budget Hour</th>
                                <th>Periode</th>
                                <?php for ($i = $results['time1']; $i <= $results['time2']; $i++) { ?>
                                    <th><?php echo $i < 10 ? '0' . $i : $i; ?></th>
                                <?php } ?>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                        <td><?php echo $timesheet->budgetHour; ?></td>
                                        <td><?php echo $timesheet->startDate. '' .$timesheet->endDate; ?></td>
                                        <?php
                                        for ($i = $results['time1']; $i <= $results['time2']; $i++) {
                                            if($i <10){
                                                $dt = '0'.$i;
                                            }else{
                                                $dt = $i;
                                            }
                                            $d = $ym . $dt;
                                            ?>
                                            <td><button id="ts<?php echo $timesheet->id . '_' . $d; ?>" type="button" data-engagementId="<?= $timesheet->id; ?>" data-title="<?= str_replace('"', "", $timesheet->name . ' with' . $d); ?>" data-no="<?= $no; ?>" data-description="<?= isset($ids[$timesheet->id][$d]['description']) ? str_replace('"', '', $ids[$timesheet->id][$d]['description']) : ''; ?>" data-date="<?= $d; ?>" class="btn btn-link tInput"><?= isset($ids[$timesheet->id][$d]['hour']) ? $ids[$timesheet->id][$d]['hour'] : 0 ?></button></td>
                                        <?php } ?>
                                        <td id="total<?php echo $timesheet->id; ?>"><?php echo $timesheet->total;?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="tab-pane" id="2a">

            <div class="row">
                <div class="col-md-11">
                    <table class="table table-bordered" style="margin-bottom: 10px;margin-right: 10px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Periode</th>
                                <th>Client</th>
                                <th>Partner</th>
                                <th>Manager</th>
                                <th>Senior</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;
                        if ($closeds)
                            foreach ($closeds as $todolist) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $todolist->name; ?></td>
                                        <td><?php echo $todolist->startDate . ' - ' . $todolist->endDate; ?></td>
                                        <td><?php echo $todolist->clientName; ?></td>
                                        <td><button type="button" class="btn btn-xs btn-success btn-transparent"><?php echo $todolist->partner; ?> </button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->manager; ?></button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->senior; ?></button></td>
                                        <td><?php echo rupiah($todolist->billingRate); ?></td>
                                        <td>
                                            <span class="tooltip-area">
                                                <a href="<?php echo base_url()?>engagement/update/<?php echo $todolist->engagementId;?>" class="btn btn-default btn-sm" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                            </span>
                                        </td>
                                    </tr>

                                </tbody>
                                <?php
                                $no++;
                            }
                        ?>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    

<script type="text/javascript">
    function daysInMonth(iMonth, iYear)
    {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }

    function timesheets(month, year, index) {
        $.ajax({
            type: "POST",
            url: '<?= base_url(); ?>dashboard/ajax_timesheet',
            data: {month: month, year: year, index: index},
            success: function (html) {
                $("#table-timesheet tbody").html(html);
            }
        });
    }

    var iMonth = $("#tsMonth").find("option:selected").data("id");
    var iYear = $("#tsYear").find("option:selected").val();
    $("#span-option2").html('16-' + daysInMonth(iMonth, iYear));

    $("#tsMonth").on("change", function () {
        var iMonth = $(this).find("option:selected").data("id");
        var iYear = $("#tsYear").val();
        $("#span-option2").html('16-' + daysInMonth(iMonth, iYear));
    });
    $("#tsYear").on("change", function () {
        var iMonth = $("#tsMonth").find("option:selected").data("id");
        $("#span-option2").html('16-' + daysInMonth(iMonth, $(this).val()));
    });
    $("#goTimesheets").on("click", function () {
        var m = $("#tsMonth").find("option:selected").data("id");
        var iMonth = $("#tsMonth").find("option:selected").val();
        var iYear = $("#tsYear").find("option:selected").val();
        var l = daysInMonth(m, iYear);

        var c = 1;
        var p = 0;

        if ($("#option2").is(":checked")) {
            c = 2;
            var head = '<tr><th>#</th><th>Project Name</th><th>Budget Hour</th><th>Periode</th>';
            for (i = 26; i <= l; i++) {
                head += '<th>' + i + '</th>';
            }
            head += '<th>Total</th></tr>';
            $("#table-timesheet thead").html(head);
        } else {
            c = 1;
            var head = '<tr><th>#</th><th>Project Name</th><th>Budget Hour</th><th>Periode</th>';
            for (i = 11; i <= 25; i++) {
                if (i < 10)
                    p = '0' + i;
                else
                    p = i;
                head += '<th>' + p + '</th>';
            }
            head += '<th>Total</th></tr>';
            $("#table-timesheet thead").html(head);
        }
        timesheets(iMonth, iYear, c);
    });

    $(document).on("click", ".tInput", function (e) {
        $('#tModal').modal('show');
        $("#tHour").val($(this).html());
        $("#tDescription").val($(this).data("description"));
        $("#tTitle").html($(this).data("title"));
        $("#tEngagementId").val($(this).data("engagementid"));
        $("#tDate").val($(this).data("date"));
    });

    $(document).on("click", "#tSave", function () {
        $.ajax({
            type: "POST",
            url: '<?= base_url(); ?>dashboard/ajax_timesheet_post',
            data: {engagementId: $("#tEngagementId").val(), date: $("#tDate").val(), hour: $("#tHour").val(), description: $("#tDescription").val()},
            beforeSend: function () {
                // setting a timeout
                $('.loading-image').show();
            },
            success: function (data) {
                $('.loading-image').hide();
                var json = JSON.parse(data);
                if (json.error) {
                    alert(json.error);
                } else {
                    var engagementId = $("#tEngagementId").val();
                    var date = $("#tDate").val();
                    var elm = "ts" + engagementId + "_" + date;
                    $("#" + elm).html(json.value);
                    $("#total" + engagementId).html(json.total);
                }

                $('#tModal').modal('hide');
            }
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="tModal" tabindex="-1" role="dialog" aria-labelledby="tTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tHour" class="form-control-label">Hour:</label>
                        <input type="number" class="form-control" id="tHour">
                    </div>
                    <div class="form-group">
                        <label for="tDescription" class="form-control-label">Description:</label>
                        <textarea class="form-control" id="tDescription"></textarea>
                        <input type="hidden" id="tEngagementId">
                        <input type="hidden" id="tDate">
                    </div>
                    <img class="loading-image img-responsive" style="display:none" src="<?php echo base_url() . 'assets/img/Spinner.gif'; ?>" >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tSave">Save changes</button>
            </div>
        </div>
    </div>
</div>