
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
                                                <a href="http://128.199.241.0/new-pts" class="btn btn-default btn-sm" title="" data-original-title="Edit">
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
            <table class="table table-bordered" id="table-timesheet" style="margin-bottom: 10px;margin-right: 10px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Approval</th>
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
                </tbody>
            </table>

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
                                        <td><?php echo $todolist->startDate . ' until ' . $todolist->endDate; ?></td>
                                        <td><?php echo $todolist->clientName; ?></td>
                                        <td><button type="button" class="btn btn-xs btn-success btn-transparent"><?php echo $todolist->partner; ?> </button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->manager; ?></button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $todolist->senior; ?></button></td>
                                        <td><?php echo rupiah($todolist->billingRate); ?></td>
                                        <td>
                                            <span class="tooltip-area">
                                                <a href="http://128.199.241.0/new-pts" class="btn btn-default btn-sm" title="" data-original-title="Edit">
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

        var index = 1;

        if ($("#option2").is(":checked")) {
            index = 2;
            var head = '<tr><th>#</th><th>Project Name</th><th>Description</th><th>Approval</th>';
            for (i = 16; i <= l; i++) {
                head += '<th>' + i + '</th>';
            }
            head += '<th>Total</th></tr>';
            $("#table-timesheet thead").html(head);
        }
        var index = $("#tsYear").find("option:selected").val();
        timesheets(iMonth, iYear, index);
    });
</script>