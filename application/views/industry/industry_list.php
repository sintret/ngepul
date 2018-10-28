
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Industry</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= base_url('industry/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= base_url('industry/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= base_url('industry/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
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
		<th>Industry Name</th>
		<th>Industry Description</th>
		<th>Update Date</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($industry_data as $industry)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
<!--                        <td><span class=""><?php echo $industry->company_name ?></span></td>-->
                        <td><?php echo $industry->industryName ?></td>
			<td><?php echo $industry->industryDescription ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo date('d M, Y H:i:s', strtotime ($industry->updateDate) ) ?></span></td>
			<td style="text-align:center" width="200px">
                              <span class="tooltip-area">
                                            <a href="<?= base_url('industry/update/' . $industry->id) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('industry/read/' . $industry->id) ?>" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('industry/delete/' . $industry->id) ?>page/<?=$start;?>"  onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                                            </a>
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