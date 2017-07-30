<!--<section class="panel">
    <header class="panel-heading">
        <h4><strong>Client LIST</strong></h4>
    </header>
    <div class="panel-body">
        
        <form action="<?= base_url();?>client/import_excel" method="post" role="form-inline"  enctype="multipart/form-data">
            <div class="col-md-9" >
                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group">
                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-inverse btn-file">
                                <span class="fileinput-new">SELECT FILE TO UPLOAD</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" placeholder="select excel file.." class="form-control"  name="file">
                            </span>
                            <a href="#" class="input-group-addon  btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    
                    </div>        
                </div>
            <div class="col-md-3">
                 <div class="form-group">
                     <a target="_blank" href="<?= base_url();?>uploads/sample-employee.xlsx" title="file-text">
                 <span type="button" class="btn btn-theme-inverse"><i class="fa fa-file-text"></i>client.xls </span>
                  </a>
                <button type="submit" class="btn btn-primary">SAVE</button> 
                 </div>
                
            </div>
            
        </form>
    </div>
</section>-->

    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Client</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','create')){ ?>  
                    <li>
                        <a href="<?= base_url('client/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                    </li>
                    <?php } ?>
                    <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','excel')){ ?>
                    <li>
                        <a href="<?= base_url('client/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                    </li>
                     <?php } ?>
                    <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','word')){ ?>
                    <li>
                        <a href="<?= base_url('client/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                    </li>
                     <?php } ?>
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
		<th>Client Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Fax</th>
		<th>Status</th>
		<th>Action</th>            
            </tr>
            
		</thead>
            
		<tbody align="center">
            <?php
            foreach ($client_data as $client)
            {
                if($client->clientStatus == 1){
                    $clientStatusBtn = '<span class="btn btn-success btn-sm">COMPANY</span>';
                } else {
                    $clientStatusBtn = '<span class="btn btn-info btn-sm">INDIVIDUAL</span>';
                }
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><span class="btn btn-default btn-sm"><?php echo $client->clientCode ?></span></td>
                        <td><?php echo $client->clientName ?></td>
			<td><?php echo $client->address ?></td>
			<td><?php echo $client->mainPhone ?></td>
			<td><?php echo $client->mainFax ?></td>
                        <td><?php echo $clientStatusBtn ?></td>
			<td style="text-align:center" width="200px">
                            <span class="tooltip-area">
                                  <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','update')){ ?>  
                                    <a href="<?= base_url() ?>client/update/<?=$client->id;?>" class="btn btn-default btn-sm" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                     <?php } ?>
                                <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','view')){ ?>  
                                    <a href="<?= base_url() ?>client/read/<?=$client->id;?>" class="btn btn-default btn-sm" title="detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                     <?php } ?>
                                      <?php if($this->template->checkRole($this->session->userdata('userlevelId'),'client','delete')){ ?>  
                                    <a href="<?= base_url() ?>client/delete/<?=$client->id;?>"  class="btn btn-default btn-sm" title="Delete">
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
    </body>
</html>