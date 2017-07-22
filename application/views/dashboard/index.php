
<div class="container">
    <div class="page-header">
        <h1>Your Work Dashboard</h1>
    </div>
</div>

<div id="exTab1" class="container">
    <ul  class="nav nav-pills">
        <li class="active">
            <a  href="#1a" data-toggle="tab">Todo List</a>
        </li>
        <li>
            <a href="#2a" data-toggle="tab">On Closed</a>
        </li>

    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <div class="row">
                <div class="col-md-11">
                    <table class="table table-bordered" style="margin-bottom: 10px;margin-right: 10px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Periode</th>
                                <th>Client</th>
                                <th>Partner</th>
                                <th>Manager</th>
                                <th>Senior</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $no=1;
                        if ($todolists)
                            foreach ($todolists as $todolist) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $todolist->name;?></td>
                                        <td>PT Perdana Mulia Makmur (TiPhone Mobile Indonesia Tbk Grup)</td>
                                        <td><button type="button" class="btn btn-xs btn-primary btn-transparent">Agung </button></td>
                                        <td><button type="button" class="btn btn-xs btn-success btn-transparent">Agung </button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"></button></td>
                                        <td>2017-09-09 00:00:00</td>
                                        <td>2017-07-22 11:50:40</td>
                                        <td>
                                            <span class="tooltip-area">
                                                <a href="http://128.199.241.0/new-pts/engagement/update/14" class="btn btn-default btn-sm" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                            </span>
                                        </td>
                                    </tr>

                                </tbody>
                            <?php $no++; } ?>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>

        </div>
        <div class="tab-pane" id="2a">
            
            <div class="row">
                <div class="col-md-11">
                    <table class="table table-bordered" style="margin-bottom: 10px;margin-right: 10px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Periode</th>
                                <th>Client</th>
                                <th>Partner</th>
                                <th>Manager</th>
                                <th>Senior</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        $no=1;
                        if ($closeds)
                            foreach ($closeds as $todolist) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $todolist->name;?></td>
                                        <td>PT Perdana Mulia Makmur (TiPhone Mobile Indonesia Tbk Grup)</td>
                                        <td><button type="button" class="btn btn-xs btn-primary btn-transparent">Agung </button></td>
                                        <td><button type="button" class="btn btn-xs btn-success btn-transparent">Agung </button></td>
                                        <td><button type="button" class="btn btn-xs btn-theme btn-transparent"></button></td>
                                        <td>2017-09-09 00:00:00</td>
                                        <td>2017-07-22 11:50:40</td>
                                        <td>
                                            <span class="tooltip-area">
                                                <a href="http://128.199.241.0/new-pts/engagement/update/14" class="btn btn-default btn-sm" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                            </span>
                                        </td>
                                    </tr>

                                </tbody>
                            <?php $no++; } ?>
                    </table>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    </div>
</div>
