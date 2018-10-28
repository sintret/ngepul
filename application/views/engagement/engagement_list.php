
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Engagement</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','create')){ ?>  
                    <li>
                        <a href="<?= site_url('engagement/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','excel')){ ?>  
                    <li>
                        <a href="<?= site_url('engagement/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','word')){ ?>  
                    <li>
                        <a href="<?= site_url('engagement/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                    <?php } ?>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table id="mytable" class="stripe table-bordered order-column text-center" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
		<th>Code</th>
		<th>ClientId</th>
		<th>Partner</th>
		<th>Manager</th>
		<th>Senior</th>
		<th>Date</th>
		<th>UpdateDate</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            if($engagement_data)
            foreach ($engagement_data as $engagement)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $engagement->code ?></td>
			<td><?php echo $engagement->clientName ?></td>
			<td><button type="button" class="btn btn-xs btn-primary btn-transparent"><?= $engagement->partner ?></button></td>
			<td><button type="button" class="btn btn-xs btn-success btn-transparent"><?= $engagement->manager ?></button></td>
			<td><button type="button" class="btn btn-xs btn-theme btn-transparent"><?php echo $engagement->senior ?></button></td>
			<td><?php echo $engagement->engagementDate ?></td>
			<td><?php echo $engagement->updateDate ?></td>
			<td style="text-align:center" width="200px">
                            <span class="tooltip-area">
                                 <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','update')){ ?>  
                                    <a href="<?= base_url() ?>engagement/update/<?=$engagement->id;?>" class="btn btn-default btn-sm" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php } ?>
                                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','view')){ ?>  
                                    <a href="<?= base_url() ?>engagement/read/<?=$engagement->id;?>" class="btn btn-default btn-sm" title="detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <?php } ?>
                                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'engagement','delete')){ ?>  
                                    <a href="<?= base_url() ?>engagement/delete/<?=$engagement->id;?>/page/<?=$start;?>" onclick="javasciprt: return confirm('Are You Sure ?')"  class="btn btn-default btn-sm" title="Delete">
                                        <i class="fa fa-trash-o"></i>
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
   