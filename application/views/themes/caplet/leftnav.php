<?php
//echo "<pre>"; print_r($qpositionGroup);
$segmentPage = $this->uri->segment(1);
$segmentPage2 = $this->uri->segment(2);
?>

<ul>

    <li <?php if($segmentPage == 'dashboard'){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>dashboard"><i class="icon  fa fa-th"></i> DASHBOARD </a></li>
    <li <?php if($segmentPage == 'entity'){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>entity"><i class="icon  fa fa-building-o"></i> ENTITY </a></li>
<!--    <li <?php if($segmentPage == 'client'){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>client"><i class="icon  fa fa-th"></i> CLIENT </a></li>-->
    <li <?php if($segmentPage == 'client' || $segmentPage == 'sector'|| $segmentPage == 'industry'|| $segmentPage == 'bpkm' ||$segmentPage == 'closing_periode'  ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon  fa fa-th"></i><b>CLIENT LIST</b>  </span>
                <ul>
                    <li class="Label label-lg"><b>CLIENT PARAMETER</b></li>
                    <li <?php if($segmentPage == 'client' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>client"><i class="icon  fa fa-th" aria-hidden="true"></i> CLIENT </a></li> 
                    <li <?php if($segmentPage == 'industry' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>industry"><i class="icon  fa fa-th" aria-hidden="true"></i> INDUSTRY</a></li>   
                    <li <?php if($segmentPage == 'sector' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>sector"><i class="icon  fa fa-th" aria-hidden="true"></i> SECTOR</a></li>   
                    <li <?php if($segmentPage == 'bpkm' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>bpkm"><i class="icon  fa fa-th" aria-hidden="true"></i> BPKM</a></li>
                    <li <?php if($segmentPage == 'closing_periode' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>closing_periode"><i class="icon  fa fa-th" aria-hidden="true"></i> CLOSING PERIODE</a></li>   
                </ul>
    </li> 
    <li <?php if($segmentPage == 'engagement' ||$segmentPage == 'timereportdetail'||$segmentPage == 'expensereimbursementdetail'  ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon glyphicon glyphicon-screenshot"></i> PTS</span>
        <ul>
            <li class="Label label-lg">PROJECT TRACKING SYSTEM</li>
<!--            <li><a href="<?= base_url() ?>client"><i class="icon  fa fa-th"></i> Client </a></li>    -->
            <li <?php if($segmentPage == 'engagement' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>engagement"><i class="icon  fa fa-th"></i> ENGAGEMENT </a></li>
            <li <?php if($segmentPage == 'timereportdetail' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>timereportdetail"><i class="icon  fa fa-th"></i> TIME REPORT </a></li>
            <li <?php if($segmentPage == 'expensereimbursementdetail' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>expensereimbursementdetail"><i class="icon  fa fa-th"></i> EXPENSE REIMBURSEMENT</a></li>

        </ul>
    </li>
    <li <?php if($segmentPage == 'employee' || $segmentPage == 'position' || $segmentPage == 'position_group'|| $segmentPage == 'degree'|| $segmentPage == 'department'|| $segmentPage == 'employee_status'|| $segmentPage == 'religion'){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon fa fa-group"></i> EMPLOYEE</span>
        <ul>
            <li class="Label label-lg">EMPLOYEE PARAMETER</li>
            <li <?php if($segmentPage == 'employee' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>employee"><i class="icon  fa fa-th"></i> EMPLOYEE LIST </a></li>    
            <li <?php if($segmentPage == 'position' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>position"><i class="icon  fa fa-th"></i> POSITION </a></li>  
            <li <?php if($segmentPage == 'position_group' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>position_group"><i class="icon  fa fa-th"></i> POSITION GROUP</a></li>
            <li <?php if($segmentPage == 'degree' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>degree"><i class="icon  fa fa-th" aria-hidden="true"></i> DEGREE</a></li>
            <li <?php if($segmentPage == 'department' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>department"><i class="icon  fa fa-th" aria-hidden="true"></i> DEPARTMENT</a></li>
            <li <?php if($segmentPage == 'employee_status' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>employee_status"><i class="icon  fa fa-th" aria-hidden="true"></i> EMPLOYEE STATUS</a></li>
            <li <?php if($segmentPage == 'religion' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>religion"><i class="icon  fa fa-th" aria-hidden="true"></i> RELIGION</a></li>

        </ul>
    </li>
    
    <li <?php if($segmentPage == 'servicetitle' || $segmentPage == 'service' ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon fa fa-cogs"></i><b>SERVICE</b>  </span>
                <ul>
                    <li class="Label label-lg"><b>SERVICE PARAMETER</b></li>
                    <li <?php if($segmentPage == 'servicetitle' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>servicetitle"><i class="icon  fa fa-th" aria-hidden="true"></i> MAIN SERVICE</a></li> 
                    <li <?php if($segmentPage == 'service' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>service"><i class="icon  fa fa-th" aria-hidden="true"></i> SERVICE AREA</a></li>   
                </ul>
    </li>
    <li <?php if($segmentPage == 'bank' ||  $segmentPage == 'country'  || $segmentPage == 'city'  || $segmentPage == 'province' || $segmentPage == 'leave'  ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon fa fa-globe"></i> GLOBAL SETTING </span>
                <ul>
                    <li class="Label label-lg"><b>SERVICE PARAMETER</b></li>
                    <li <?php if($segmentPage == 'bank' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>bank"> <i class="icon  fa fa-th" aria-hidden="true"></i> BANK</a></li>
                    <li <?php if($segmentPage == 'country' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>country"><i class="icon  fa fa-th" aria-hidden="true"></i> COUNTRY</a></li>
                    <li <?php if($segmentPage == 'city' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>city"><i class="icon  fa fa-th" aria-hidden="true"></i> CITY</a></li>
                    <li <?php if($segmentPage == 'province' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>province"><i class="icon  fa fa-th" aria-hidden="true"></i> PROVINCE</a></li>
                    <li <?php if($segmentPage == 'leave' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>leave"><i class="icon  fa fa-th" aria-hidden="true"></i> LEAVE SETTING</a></li>
                </ul>
    </li>
    <li <?php if($segmentPage == 'userslist' ||$segmentPage == 'access' || $segmentPage == 'userlevel' ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon glyphicon glyphicon-user"></i> USER LIST</span>
        <ul>
            <li class="Label label-lg">USER LOGIN PARAMETER</li>
            <li <?php if($segmentPage == 'userslist' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>userslist"><i class="icon  fa fa-th"></i> USER LIST </a></li>    
            <li <?php if($segmentPage == 'userlevel' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>userlevel"><i class="icon  fa fa-th"></i> USER LEVEL </a></li>
            <li <?php if($segmentPage == 'access' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>access"><i class="icon  fa fa-th"></i> ACCESS ROLE </a></li>

        </ul>
    </li>
    
    <li <?php if($segmentPage == 'personal' ||$segmentPage == 'notification' || $segmentPage == 'profile' ){ ?>class="activelink"<?php } else { }?>>
        <span><i class="icon glyphicon glyphicon-user"></i> My Account</span>
        <ul>
            <li class="Label label-lg">PERSONAL INFORMATION</li>
            <li <?php if($segmentPage == 'notification' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>notification"><i class="icon  fa fa-globe"></i> My Notification </a></li>    
            <li <?php if($segmentPage == 'personal' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>personal/change_password"><i class="icon  fa fa-th"></i> Change Password</a></li>
            <li <?php if($segmentPage == 'profile' ){ ?>class="activelink"<?php } else { }?>><a href="<?= base_url() ?>profile"><i class="icon  fa fa-th"></i> My Profile</a></li>

        </ul>
    </li>
<!--    <li><a href="<?= base_url() ?>filemanager"><i class="icon  fa fa-th"></i> File Manager </a></li>
    <li><a href="<?= base_url() ?>profile"><i class="icon  fa fa-th"></i> Profile </a></li>-->
  
</ul>