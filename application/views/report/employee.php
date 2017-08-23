
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>PTS EMPLOYEE REPORT</strong> </h4>
    </header>
    <div class="panel-body">
        <?= $this->session->flashdata('eroor_set'); ?>

        <form class="form-horizontal" action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="row">
                 <div class="col-sm-3">
                    <label for="varchar">Employee Name</label>
                    <select name="employeeId" class="selectpicker form-control " data-size="8"  data-live-search="true" id="employeeId" >
                     <?php
                            if ($employees)
                                foreach ($employees as $employee) {
                                    ?>
                                    <option value="<?= $employee->id; ?>" >
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                    </option>
                                <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="varchar">Report Type</label>
                    <select name="typeId" class="form-control" >
                        <option value="1">Timesheet</option>
                        <option value="2">Reimbursement</option>
                        <option value="3">Non Charge</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="varchar">Start Date</label>
                    <input type="text" class="form-control" name="startDate" id="date" placeholder="Start Date"  />
                </div>
                <div class="col-sm-3">
                    <label for="varchar">End Date</label>
                    <input type="text" class="form-control" name="endDate" id="date" placeholder="End Date"  />
                </div>
            </div>
            <hr/>
            <center>    
                <a href="<?php echo site_url('report') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">SEARCH</button> 
            </center>
        </form>

    </div>
</section>

