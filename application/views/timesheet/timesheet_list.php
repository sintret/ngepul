
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Timesheet</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','create')){ ?>  
                    <li>
                        <a href="<?= site_url('timesheet/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','excel')){ ?>  
                    <li>
                        <a href="<?= site_url('timesheet/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','word')){ ?>  
                    <li>
                        <a href="<?= site_url('timesheet/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                    <?php } ?>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover tex-center" data-provide="data-table" id="toggle-column">
        <thead>
            <tr>
         <th>No</th>
		<th>Engagement</th>
		<th>Employee</th>
		<th>Date</th>
		<th>Hour</th>
		<th>Description</th>
		<th>UpdateDate</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($timesheet_data as $timesheet)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><spab class="btn btn-default btn-sm"><?php echo $timesheet->engagementName ?></span></td>
			<td><?php echo $timesheet->fullname ?></td>
			<td><?php echo date('d M, Y',strtotime($timesheet->date)) ?></td>
			<td  style="background-color:whitesmoke;"><b><?php echo $timesheet->hour ?></b></td>
			<td><?php echo $timesheet->description ?></td>
			<td><?php echo date("d M, Y |<b> H:i:s</b>",strtotime($timesheet->updateDate )) ?></td>
			<td style="text-align:center" width="200px">
                 <span class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','update')){ ?>
                                            <a href="<?= site_url('timesheet/update/' . $timesheet->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                                            </a>
                                            <?php } ?>
                                            <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','read')){ ?>
                                            <a href="<?= site_url('timesheet/read/' . $timesheet->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                                            </a>
                                            <?php } ?>
                                            <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'timesheet','delete')){ ?>
                                            <a href="<?= site_url('timesheet/delete/' . $timesheet->id) ?>"  onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                                            </a>
                                            <?php } ?>
                                        </span>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>