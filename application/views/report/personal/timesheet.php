
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
                                    <option value="<?= $employee->id; ?>" <?php if($employeeId == $employee->id){ echo "selected"; } else {}?>>
                                    <?= $employee->firstName . ' ' . $employee->lastName; ?>
                                    </option>
                                <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="varchar">Report Type</label>
                    <select name="typeId" class="form-control" >
                        <option value="1" <?php if($reportTypeId == 1){ echo "selected"; } else {}?>>Timesheet</option>
                        <option value="2" <?php if($reportTypeId == 2){ echo "selected"; } else {}?>>Reimbursement</option>
                        <option value="3" <?php if($reportTypeId == 3){ echo "selected"; } else {}?>>Non Charge</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="varchar">Start Date</label>
                    <input type="text" class="form-control" name="startDate" id="date" value="<?= date('d/m/Y',strtotime($startDate) );?>"  />
                </div>
                <div class="col-sm-3">
                    <label for="varchar">End Date</label>
                    <input type="text" class="form-control" name="endDate" id="date" value="<?= date('d/m/Y',strtotime($endDate) );?>"  />
                </div>
            </div>
            <hr/>
            <center>    
                <a href="<?php echo site_url('report') ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">SEARCH</button> 
            </center>
        </form>

    </div>
    
     <div class="panel-body">
        <header class="panel-heading btn-success">
        <h4><strong>TIMESHEET REPORT RESULT</strong> </h4>
        </header>
     </div>
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong><?= $employeeName->firstName.' '.$employeeName->lastName;?></strong></h4>
            </header>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
         <th>No</th>
		<th>Engagement</th>
		<th>Employee</th>
		<th>Date</th>
		<th>Hour</th>
		<th>Description</th>
		<th>Update Date</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            if(empty($results)){
                echo "no record found..";
            } else {
            $no=1;
            foreach ($results as $timesheet)
            {
                ?>
                <tr>
			<td width="80px"><?= $no; ?></td>
			<td><spab class="btn btn-default btn-sm"><?php echo $timesheet->engagementName ?></span></td>
			<td><?php echo $timesheet->fullname ?></td>
			<td><?php echo date('d M, Y',strtotime($timesheet->date)) ?></td>
			<td  style="background-color:whitesmoke;"><b><?php echo $timesheet->hour ?></b></td>
			<td><?php echo $timesheet->description ?></td>
			<td><?php echo date("d M, Y |<b> H:i:s</b>",strtotime($timesheet->updateDate )) ?></td>
			
		</tr>
                <?php
                $no++;
            }
            }
            ?>
            </tbody>
        </table>
        </div>
</section>

    </div>
    </div>