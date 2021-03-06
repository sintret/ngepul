<div id="nav-title">
    <h3><strong>Hi</strong>,  <?= $this->session->userdata('username'); ?> </h3>
</div>
<!-- //nav-title-->
<div id="nav-scroll">
    <div class="avatar-slide">
<?php
  $emptyPath =  base_url().'assets/uploads/employee/empty.png';
  $profileImagePath = base_url().'assets/uploads/employee/'.$this->session->userdata('avatar');
 if (file_exists($profileImagePath)) {
     $picturePath = $profileImagePath;
 } else {
     $picturePath = $emptyPath;
 }
?>
        <span class="easy-chart avatar-chart" data-color="theme-inverse" data-percent="100" data-track-color="rgba(255,255,255,0.1)" data-line-width="5" data-size="118">
            <span class="percent"></span>
            <img alt="" src="<?= $picturePath; ?>" class="circle">
        </span>
        <!-- //avatar-chart-->

        <div class="avatar-detail">
            <p><button class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i> Edit Profile</button></p>
            <p><a href="#">@  <?= $this->session->userdata('username'); ?> </a></p>
<!--            <span>12,110 Sales</span>
            <span>106 Follower</span>-->
        </div>
        <!-- //avatar-detail-->

        <div class="avatar-link btn-group btn-group-justified">
            <a class="btn" href="#"  title="profile"><i class="fa fa-briefcase"></i></a>
            <a class="btn"  href="#md-notification" title="Notification">
                <i class="fa fa-bell-o"></i><em class="green"></em>
            </a>
            <a class="btn" href="#md-messages"  title="Messages">
                <i class="fa fa-envelope-o"></i><em class="active"></em>
            </a>
            <a class="btn" href="#" title="themes"><i class="fa fa-book"></i></a>
         </div>
        <!-- //avatar-link-->

    </div>
    <!-- //avatar-slide-->

<!--
    <div class="widget-collapse dark">
        <header>
            <a data-toggle="collapse" href="#collapseSummary"><i class="collapse-caret fa fa-angle-up"></i> Summary Order </a>
        </header>
       <section class="collapse in" id="collapseSummary">
            <div class="collapse-boby" style="padding:0">

                <div class="widget-mini-chart align-xs-left">
                    <div class="pull-right" >
                        <div class="sparkline mini-chart" data-type="bar" data-color="theme" data-bar-width="10" data-height="35">2,3,4,5,7,4,5</div>
                    </div>
                    <p>This week's balance</p>
                    <h4>$12,788</h4>
                </div>

                <div class="widget-mini-chart align-xs-right">
                    <div class="pull-left">
                        <div class="sparkline mini-chart" data-type="bar" data-color="warning" data-bar-width="10" data-height="45">2,3,7,5,4,6,6,3</div>
                    </div>
                    <p>This week sales</p>
                    <h4>1,325 item</h4>
                </div>

            </div>

        </section>
         //collapse
    </div>-->
    <!-- //widget-collapse-->



    <div class="widget-collapse dark">
        <header>
            <a href="<?= base_url() ?>personal/my_task"> My Engagement Task </a>
        </header>
        
        <header>
            <a href="<?= base_url() ?>timesheet/mytimesheet"> My Timesheet </a>
        </header>
        <header>
            <a href="<?= base_url() ?>personal/myreimbursement"> My Reimbursement List</a>
        </header>
        <header>
            <a href="<?= base_url() ?>notification"> Message And Notification</a>
        </header>
        <header>
            <a href="<?= base_url() ?>personal/change_password"> Change Password</a>
        </header>
        <header>
            <a href="<?= base_url() ?>site/logout"> Sign Out</a>
        </header>
        
         
    </div>
    <!-- //widget-collapse-->



<!--    <div class="widget-collapse dark">
        <header>
            <a data-toggle="collapse" href="#collapseSetting"><i class="collapse-caret fa fa-angle-up"></i> Setting Option </a>
        </header>
        <section class="collapse in" id="collapseSetting">
            <div class="collapse-boby" style="padding:0">

                <ul class="widget-slide-setting">
                    <li>
                        <div class="ios-switch theme pull-right">
                            <div class="switch"><input type="checkbox" name="option"></div>
                        </div>
                        <label>Switch <span>OFF</span></label>
                        <small>Lorem ipsum dolor sit amet</small>
                    </li>
                    <li>
                        <div class="ios-switch theme-inverse pull-right">
                            <div class="switch"><input type="checkbox" name="option_1" checked></div>
                        </div>
                        <label>Switch <span>ON</span></label>
                        <small>Lorem ipsum dolor sit amet</small>
                    </li>
                </ul>
                 //widget-slide-setting

            </div>
             //collapse-boby

        </section>
         //collapse
    </div>-->
    <!-- //widget-collapse-->


</div>
<!-- //nav-scroller-->