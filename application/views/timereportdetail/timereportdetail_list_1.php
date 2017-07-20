
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Timereportdetail</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <li>
                        <a href="<?= site_url('timereportdetail/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('timereportdetail/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                    <li>
                        <a href="<?= site_url('timereportdetail/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
        <div class="panel-body">    
        <table class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
		<th>Code</th>
		<th>EmployeeId</th>
		<th>PeriodeDate</th>
		<th>EngagementId</th>
		<th>ApprovalBy</th>
		<th>ApprovalStatus</th>
		<th>Description</th>
		<th>DateWork1</th>
		<th>DateWork2</th>
		<th>DateWork3</th>
		<th>DateWork4</th>
		<th>DateWork5</th>
		<th>DateWork6</th>
		<th>DateWork7</th>
		<th>DateWork8</th>
		<th>DateWork9</th>
		<th>DateWork10</th>
		<th>DateWork11</th>
		<th>DateWork12</th>
		<th>DateWork13</th>
		<th>DateWork14</th>
		<th>DateWork15</th>
		<th>DateWork16</th>
		<th>DateWork17</th>
		<th>DateWork18</th>
		<th>DateWork19</th>
		<th>DateWork20</th>
		<th>DateWork21</th>
		<th>DateWork22</th>
		<th>DateWork23</th>
		<th>DateWork24</th>
		<th>DateWork25</th>
		<th>DateWork26</th>
		<th>DateWork27</th>
		<th>DateWork28</th>
		<th>DateWork29</th>
		<th>DateWork30</th>
		<th>DateWork31</th>
		<th>Version</th>
		<th>Action</th>
            
		</tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($timereportdetail_data as $timereportdetail)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $timereportdetail->Code ?></td>
			<td><?php echo $timereportdetail->employeeId ?></td>
			<td><?php echo $timereportdetail->periodeDate ?></td>
			<td><?php echo $timereportdetail->engagementId ?></td>
			<td><?php echo $timereportdetail->approvalBy ?></td>
			<td><?php echo $timereportdetail->approvalStatus ?></td>
			<td><?php echo $timereportdetail->description ?></td>
			<td><?php echo $timereportdetail->dateWork1 ?></td>
			<td><?php echo $timereportdetail->dateWork2 ?></td>
			<td><?php echo $timereportdetail->dateWork3 ?></td>
			<td><?php echo $timereportdetail->dateWork4 ?></td>
			<td><?php echo $timereportdetail->dateWork5 ?></td>
			<td><?php echo $timereportdetail->dateWork6 ?></td>
			<td><?php echo $timereportdetail->dateWork7 ?></td>
			<td><?php echo $timereportdetail->dateWork8 ?></td>
			<td><?php echo $timereportdetail->dateWork9 ?></td>
			<td><?php echo $timereportdetail->dateWork10 ?></td>
			<td><?php echo $timereportdetail->dateWork11 ?></td>
			<td><?php echo $timereportdetail->dateWork12 ?></td>
			<td><?php echo $timereportdetail->dateWork13 ?></td>
			<td><?php echo $timereportdetail->dateWork14 ?></td>
			<td><?php echo $timereportdetail->dateWork15 ?></td>
			<td><?php echo $timereportdetail->dateWork16 ?></td>
			<td><?php echo $timereportdetail->dateWork17 ?></td>
			<td><?php echo $timereportdetail->dateWork18 ?></td>
			<td><?php echo $timereportdetail->dateWork19 ?></td>
			<td><?php echo $timereportdetail->dateWork20 ?></td>
			<td><?php echo $timereportdetail->dateWork21 ?></td>
			<td><?php echo $timereportdetail->DateWork22 ?></td>
			<td><?php echo $timereportdetail->dateWork23 ?></td>
			<td><?php echo $timereportdetail->dateWork24 ?></td>
			<td><?php echo $timereportdetail->dateWork25 ?></td>
			<td><?php echo $timereportdetail->dateWork26 ?></td>
			<td><?php echo $timereportdetail->dateWork27 ?></td>
			<td><?php echo $timereportdetail->dateWork28 ?></td>
			<td><?php echo $timereportdetail->dateWork29 ?></td>
			<td><?php echo $timereportdetail->dateWork30 ?></td>
			<td><?php echo $timereportdetail->dateWork31 ?></td>
			<td><?php echo $timereportdetail->version ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('timereportdetail/read/'.$timereportdetail->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('timereportdetail/update/'.$timereportdetail->id),'edit'); 
				echo ' | '; 
				echo anchor(site_url('timereportdetail/delete/'.$timereportdetail->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
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