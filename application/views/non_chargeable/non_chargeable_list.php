
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Non Chargeable</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','create')){ ?>  
                    <li>
                        <a href="<?= base_url('non_chargeable/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','excel')){ ?>  
                    <li>
                        <a href="<?= base_url('non_chargeable/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                     <?php } ?>
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','word')){ ?>  
                    <li>
                        <a href="<?= base_url('non_chargeable/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
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
		<th>Periode</th>
		<th>Employee</th>
		<th>Leave</th>
		<th>Description</th>
		<th>Date</th>
		<th>Hour</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody>
            <?php
            $no=1;
            foreach ($non_chargeable_data as $non_chargeable)
            {
                ?>
                <tr>
			<td><?php echo $no ?></td>
			<td><?php echo $non_chargeable->periode ?></td>
			<td><?php echo $non_chargeable->fullname ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $non_chargeable->leaveName ?></span></td>
			<td><?php echo $non_chargeable->nonChargeDesc ?></td>
			<td><?php echo $non_chargeable->date ?></td>
			<td style="background-color:whitesmoke"><?php echo $non_chargeable->hour ?></td>
			<td >
                <span class="tooltip-area">
                     <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','update')){ ?> 
                    <a href="<?= base_url('non_chargeable/update/' . $non_chargeable->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                      </a>
                     <?php } ?> 
                    <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','read')){ ?> 
                     <a href="<?= base_url('non_chargeable/read/' . $non_chargeable->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                     </a>
                     <?php } ?>
                      <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'non_chargeable','delete')){ ?> 
                     <a href="<?= base_url('non_chargeable/delete/' . $non_chargeable->id) ?>/page/<?=$start;?>"  onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                      </a>
                      <?php } ?>
                </span>
			</td>
		</tr>
                <?php
                $no++;
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