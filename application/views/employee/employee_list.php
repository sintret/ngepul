<style>
    div.container {
        width: 80%;
    }
</style>


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4><strong>Employee List</strong></h4>
            </header>
            <div class="panel-tools fully" align="right" data-toolscolor="#6CC3A0">
                <ul class="tooltip-area">
                    <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'create')) { ?>  
                        <li>
                            <a href="<?= site_url('employee/create'); ?>" class="btn btn-success" title="create new data"><i class="fa fa-plus-square"></i></a>
                        </li>
                    <?php } ?>
                    <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'excel')) { ?>  
                        <li>
                            <a href="<?= site_url('employee/excel'); ?>" class="btn btn-theme-inverse" title="download excel"><i class="fa fa-print"></i></a>
                        </li>
                    <?php } ?>
                    <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'word')) { ?>  
                        <li>
                            <a href="<?= site_url('employee/word'); ?>" class="btn btn-warning" title="download word"><i class="fa fa-file-text"></i></a>
                        </li>
                    <?php } ?>
                    <li></li>
                    <li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
            <div class="panel-body">    




                 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover text-center" data-provide="data-table" id="toggle-column">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>code</th>
                            <th>fullname</th>
                            <th>Handphone</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Sex</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        foreach ($employee_data as $employee) {
                            $sex = $employee->sex;
                            if ($sex == 1) {
                                $gender = '<span class="label label-success">Man</span>';
                            } else {
                                $gender = '<span class="label label-warning">Women</span>';
                            }
                            ?>
                            <tr class="gradeA">
                                <td><?php echo ++$start ?></td>
                                <td><?= $employee->employee_code ?></td>
                                <td><?= $employee->firstName . ' ' . $employee->lastName ?></td>
                                <td><?= $employee->handphone ?></td>
                                <td><span class="<?= $employee->employeeStatusColors ?>"><?= $employee->employeeStatus ?></span></td>
                                <td><?= $employee->positionName; ?></td>
                                <td><?= $gender ?></td>
                                <td style="text-align:center">
                                    <span class="tooltip-area">
                                        <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'update')) { ?>   
                                            <a href="<?= base_url() ?>employee/update/<?= $employee->id; ?>" class="btn btn-default btn-sm" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'read')) { ?>  
                                            <a href="<?= base_url() ?>employee/read/<?= $employee->id; ?>" class="btn btn-default btn-sm" title="detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ($this->template->checkRole($this->session->userdata('userlevelId'), 'employee', 'delete')) { ?>  
                                            <a href="<?= base_url() ?>employee/delete/<?= $employee->id; ?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-default btn-sm" title="Delete">
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


                <table class="table table-bordered"  id="mytable">

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
    </div>
</div>

