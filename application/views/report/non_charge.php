
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>PTS GENERAL REPORT</strong> </h4>
    </header>
    <div class="panel-body">
        <?= $this->session->flashdata('eroor_set'); ?>

        <form class="form-horizontal" action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-4">
                    <label for="varchar">Report Type</label>
                    <select name="type" class="form-control" >
                        <option value="1">Engagement</option>
                        <option value="2">Employee</option>
                        <option value="3">Reimbursement</option>
                        <option value="4">Non Chargeable</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="varchar">Start Date</label>
                    <input type="text" class="form-control" name="startDate" id="date" placeholder="Start Date"  />
                </div>
                <div class="col-sm-4">
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
    
     <div class="panel-body">
        <header class="panel-heading btn-inverse">
        <h4><strong>REIMBURSEMENT REPORT</strong> </h4>
        </header>
     </div>
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Non Chargeable</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                
            </div>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
		<th>Periode</th>
		<th>Employee</th>
		<th>Leave</th>
		<th>Description</th>
		<th>Date</th>
		<th>Hour</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            $no=1;
            foreach ($results as $non_chargeable)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $no; ?></td>
			<td><?php echo $non_chargeable->periode ?></td>
			<td><?php echo $non_chargeable->fullname ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $non_chargeable->leaveName ?></span></td>
			<td><?php echo $non_chargeable->nonChargeDesc ?></td>
			<td><?php echo $non_chargeable->date ?></td>
			<td style="background-color:whitesmoke"><?php echo $non_chargeable->hour ?></td>
		</tr>
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
        </div>
</section>

