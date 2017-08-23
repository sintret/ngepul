
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
</section>

