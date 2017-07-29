
<section class="panel" style="background-color: whitesmoke">
        <div class="panel-heading btn-inverse">
          <h4>
           <h4><strong>ENGAGEMENT REPORT</strong> </h4>
          </h4>
        </div>
		<?= $this->session->flashdata('eroor_set');?>
		
		<div align="center">
		<?= $this->session->flashdata('eroor_set');?>
        
        
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <form class="navbar-form " role="search" action="" >
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

</section>
