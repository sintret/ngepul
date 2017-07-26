
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
        
       
</section>

