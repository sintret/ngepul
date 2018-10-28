
<div class="logo-area clearfix">
    <a href="#" class="logo"></a>
</div>
<!-- //logo-area-->
<?php
  $emptyPath =  base_url().'assets/uploads/employee/empty.png';
  $profileImagePath = base_url().'assets/uploads/employee/'.$this->session->userdata('avatar');
 if (file_exists($profileImagePath)) {
     $picturePath = $profileImagePath;
 } else {
     $picturePath = $emptyPath;
 }
?>
<div class="tools-bar">
    <ul class="nav navbar-nav nav-main-xs">
        <li><a href="#menu" class="icon-toolsbar"><i class="fa fa-bars"></i></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right tooltip-area">
        <li><a href="#menu-right" data-toggle="tooltip" title="Right Menu" data-container="body" data-placement="left"><i class="fa fa-align-right"></i></a></li>
<!--        <li class="hidden-xs hidden-sm"><a href="#" class="h-seperate">Help</a></li>-->
        <li><button class="btn btn-circle btn-header-search" ><i class="fa fa-search"></i></button></li>
        <li><a href="#" class="nav-collapse avatar-header">
                <img alt="" src="<?= $picturePath;?>"  class="circle">
<!--                <span class="badge">3</span>-->
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                <em><strong>Hi</strong>, <?= $this->session->userdata('username'); ?>  </em> <i class="dropdown-icon fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right icon-right arrow">
                    <li><a href="<?= base_url();?>notification"><i class="fa fa-globe"></i> My notification </a></li>
                    
                    <li><a href="<?= base_url();?>personal/my_task"><i class="fa fa-file"></i> My Task </a></li>
                   <!-- <li><a href="<?= base_url();?>profile"><i class="fa fa-user"></i>My Profile</a></li>-->
                    <li><a href="<?= base_url();?>personal/change_password"><i class="fa fa-cog"></i> Change Password </a></li>
                    <!--<li><a href="#"><i class="fa fa-bookmark"></i> Bookmarks</a></li>
                    <li><a href="#"><i class="fa fa-money"></i> Make a Deposit</a></li>-->
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>site/logout"><i class="fa fa-sign-out"></i> Signout </a></li>
                </ul>
            <!-- //dropdown-menu-->
        </li>
        <li class="visible-lg">
            <a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
                <i class="fa fa-expand"></i>
            </a>
        </li>
    </ul>
</div>
<!-- //tools-bar-->