
<section class="panel" style="background-color: whitesmoke">
    <header class="panel-heading btn-inverse">
        <h4><strong>ENGAGEMENT REPORT</strong> </h4>
    </header>
    <div class="panel-body">
        <?= $this->session->flashdata('eroor_set');?>
        
        
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <form class="navbar-form " role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="engagement ">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="startDate" id="date" placeholder="date">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="endDate" id="date" placeholder="date">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> SEARCH</button>
                </form>
            </div>
        </center>
        </div>

		  <div class="widget">
            <div class="widget-content padding">							
                <div class="table-responsive">
				<table data-sortable class="table table-bordered table-hover table-striped">
                        <tr> 
                                    <td colspan="38">
                                        <div align="center">
                                            <h3><b>JADWAL PATROLI RUTIN</b></h3>
                                            <label><b>SEKSI DPK KEC. PALMERAH</b></label>
                                        </div>
                                    </td>
                        </tr>
                        <tr>
                            <td width="85" height="40"  colspan="38">
                                Nama : <b>test</b><br>
                                NIP: <b>test</b>
                            </td>
                          </tr>
                        <tr> 
                            <td colspan="38"><div align="center">JULY 2016 </div></td>
                        </tr>
						
						<tr>
                            <td colspan="4" align="center"><b>Engagement</b></td>
                            <?php
                                for ($x = 1; $x <= 31; $x++) 
                                {
                            ?>
                            <td width="25">
                                <div align="center"><b><?= $x;?><b></div>
                            <?php
                                }
                            ?>
                            </td>
                        </tr>
						<tbody align="center">
						<?php
                                for ($down = 1; $down <= 20; $down++) 
                                {
                            ?>
                            <tr>
                                <td  colspan="4">engagement name</td>
								<?php
                                for ($x = 1; $x <= 31; $x++) 
                                {
								?>
                                    <td>0</td>
                                <?php }?>
							</tr>
						<?php }?>
						</tbody>
                        <tr><td  colspan="30" style="background-color: whitesmoke; color: white;"><div align="center"></div></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background-color: darkslategrey; color: white;"><div align="center"><b>WEEKEND</b></div></td>
                            <td colspan="6" style="background-color: orangered; color: white;"><div align="center"><b>ALL TEAM</b></div></td>
                            <td  colspan="31" style="background-color: darkgray; color: white;"><div align="center"><b>KETERANGAN  WARNA</b></div></td>
                        </tr>
                    </table>
				</div>
			</div>
			</div>
			
       
</section>

