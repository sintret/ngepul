<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta information -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Title-->
        <title>PTS Online |  Axiaconsultant</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?= base_url() ?>assets/ico/favicon.ico">

        <!-- CSS Stylesheet-->
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap/bootstrap-themes.css" />
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />

        <!-- Styleswitch if  you don't chang theme , you can delete -->
        <link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="<?= base_url() ?>assets/css/styleTheme1.css" />
        <link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="<?= base_url() ?>assets/css/styleTheme2.css" />
        <link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="<?= base_url() ?>assets/css/styleTheme3.css" />
        <link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="<?= base_url() ?>assets/css/styleTheme4.css" />


        <!-- Favicons -->
        <!--  
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?= base_url() ?>assets/ico/favicon.ico">
        -->
        <!-- CSS Stylesheet-->
        <!--  
     <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap/bootstrap.min.css" />


     <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
     <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap/bootstrap-themes.css" />
     <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
     <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />

        -->

    </head>
    <div id="wrapper">
        <!--
        /////////////////////////////////////////////////////////////////////////
        //////////     HEADER  CONTENT     ///////////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="header">
            <?= $_header; ?>

        </div>
        <!-- //header-->


        <!--
        /////////////////////////////////////////////////////////////////////////
        //////////     SLIDE LEFT CONTENT     //////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="nav">
            <?= $_slideleft; ?>
            <!-- //nav-scroller-->
        </div>
        <!-- //nav-->


        <!--
        /////////////////////////////////////////////////////////////////////////
        //////////     TOP SEARCH CONTENT     ///////
        //////////////////////////////////////////////////////////////////////
        -->
        <div class="widget-top-search">
            <span class="icon"><a href="#" class="close-header-search"><i class="fa fa-times"></i></a></span>
            <form id="top-search">
                <h2><strong>Quick</strong> Search</h2>
                <div class="input-group">
                    <input  type="text" name="q" placeholder="Find something..." class="form-control" />
                    <span class="input-group-btn">
                        <button class="btn" type="button" title="With Sound"><i class="fa fa-microphone"></i></button>
                        <button class="btn" type="button" title="Visual Keyboard"><i class="fa fa-keyboard-o"></i></button>
                        <button class="btn" type="button" title="Advance Search"><i class="fa fa-th"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <!-- //widget-top-search-->




        <!--
        /////////////////////////////////////////////////////////////////////////
        //////////     MAIN SHOW CONTENT     //////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="main">


            <!--<ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Forms Components</li>
            </ol>-->
            <!-- //breadcrumb-->

            <div id="content">

                <div class="row">

                    <div class="col-lg-12" >
                        <!--
                        //////////////////////////////////////////////////////////////////////
                        //////////    Content Here     //////////
                        //////////////////////////////////////////////////////////////////
                        -->
                        <?= $_content; ?>



                    </div>
                    <!-- //content > row > col-lg-12 -->

                </div>
                <!-- //content > row-->

            </div>
            <!-- //content-->


        </div>
        <!-- //main-->



        <!--
        ///////////////////////////////////////////////////////////////////
        //////////     MODAL MESSAGES     //////////
        ///////////////////////////////////////////////////////////////
        -->
        <div id="md-messages" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
            <div class="modal-header bd-theme-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><i class="fa fa-inbox"></i> Inbox messages</h4>
            </div>
            <!-- //modal-header-->
            <div class="modal-body" style="padding:0">
                <div class="widget-im">
                    <ul>
                        <li>
                            <section  class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <i class="fa fa-paperclip"></i>
                                    </span>
                                    <span>
                                        <i class="fa fa-reply-all"></i>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </span>
                                    <span>
                                        <time datetime="2013-11-16">1 : 52 am</time>
                                    </span>
                                </div>
                                <h4><a href="javascript:void(0)">Edlado Holder</a>
                                </h4>
                                <div class="im-thumbnail"><img alt="" src="assets/img/avatar2.png" /></div>
                                <label></label>
                                <div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <section  class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <i class="fa fa-paperclip"></i>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </span>
                                    <span>
                                        <time datetime="2013-11-16">12 : 00 pm</time>
                                    </span>
                                </div>
                                <h4><a href="javascript:void(0)">Laine Franchi</a>
                                </h4>
                                <div class="im-thumbnail"><i class="glyphicon glyphicon-user"></i></div>
                                <div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <section class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </span>
                                    <span>
                                        <time datetime="2013-11-16">4 : 45 pm</time>
                                    </span>
                                </div>
                                <h4><a href="javascript:void(0)">Cinda Collar</a>
                                </h4>
                                <div class="im-thumbnail"><img alt="" src="assets/img/avatar.png" /></div>
                                <label data-color="theme"></label>
                                <div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-inverse btn-block btn-lg" title="See More"><i class="fa fa-plus"></i></button>
                </div>
                <!-- //widget-im-->
            </div>
            <!-- //modal-body-->
        </div>
        <!-- //modal-->



        <!--
        //////////////////////////////////////////////////////////////////////////
        //////////     MODAL NOTIFICATION     //////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
            <div class="modal-header bd-danger-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><i class="fa fa-bell-o"></i> Notification</h4>
            </div>
            <!-- //modal-header-->
            <div class="modal-body" style="padding:0">
                <div class="widget-im notification">
                    <ul>
                        <li>
                            <section class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <time class="timeago lasted" datetime="2014">when you opened the page</time>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
                                    </span>
                                </div>
                                <h4>Your request approved</h4>
                                <div class="im-thumbnail bg-theme-inverse"><i class="fa fa-check"></i></div>
                                <div class="pre-text">One Button (click to remove this)</div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <section class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <time class="timeago" datetime="2013-11-17T14:24:17Z">timeago</time>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
                                    </span>
                                </div>
                                <h4>Dashboard new design!! you want to see now ? </h4>
                                <div class="im-thumbnail bg-theme"><i class="fa fa-bell-o"></i></div>
                                <div class="pre-text">Two Button (with link and click to close this) Lorem ipsum dolor sit amet, consectetur adipisicing elit, </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse" href="dashboard.html">Go Now.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <section class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <time class="timeago" datetime="2013-11-17T01:24:17Z">timeago</time>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
                                    </span>
                                </div>
                                <h4>Error 404 <small>( File not  found )</small></h4>
                                <div class="im-thumbnail bg-warning"><i class="fa fa-exclamation-triangle"></i></div>
                                <div class="pre-text">Two Button (click to  action and remove) </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="actionNow">Fixed now.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <section class="thumbnail-in">
                                <div class="widget-im-tools tooltip-area pull-right">
                                    <span>
                                        <time class="timeago" datetime="2013-09-17T09:24:17Z">timeago</time>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
                                    </span>
                                </div>
                                <h4>Upgrade Premium ?</h4>
                                <div class="im-thumbnail bg-inverse">
                                    <i class="fa fa-cogs"></i></div>
                                <div class="pre-text"> Three button (test action) </div>
                            </section>
                            <div class="im-confirm-group">
                                <div class=" btn-group btn-group-justified">
                                    <a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="actionNow">Now.</a>
                                    <a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
                                    <a class="btn btn-danger im-confirm" href="javascript:void(0)" data-confirm="yes">Delete.</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- //widget-im-->
            </div>
            <!-- //modal-body-->
        </div>
        <!-- //modal-->



        <!--
        //////////////////////////////////////////////////////////////
        //////////     LEFT NAV MENU     //////////
        ///////////////////////////////////////////////////////////
        -->
        <nav id="menu">
            <?= $_leftnav; ?>
        </nav>
        <!-- //nav left menu-->


        <!--
/////////////////////////////////////////////////////////////////
//////////     RIGHT NAV MENU     //////////
/////////////////////////////////////////////////////////////
        -->
        <!-- //nav right menu-->
        <?= $_rightnav; ?>	
        <!-- //nav right menu-->


    </div>
    <!-- //wrapper-->


<!--    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.js"></script>-->

    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Modernizr Library For HTML5 And CSS3 -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/mmenu/jquery.mmenu.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/styleswitch.js"></script>
    <!-- Library 10+ Form plugins-->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/form/form.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
    <!-- Datetime plugins -->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/datetime/datetime.js"></script>
    <!-- Library Chart-->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/chart/chart.js"></script>
    <!-- Library  5+ plugins for bootstrap -->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/pluginsForBS/pluginsForBS.js"></script>
    <!-- Library 10+ miscellaneous plugins -->
    <script type="text/javascript" src="<?= base_url() ?>assets/plugins/miscellaneous/miscellaneous.js"></script>
    <!-- Library Themes Customize-->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/caplet.custom.js"></script>
    <script type="text/javascript">
        // Call CkEditor
        CKEDITOR.replace('editorCk', {
            startupFocus: false,
            uiColor: '#FFFFFF'
        });</script>
    <script>
        //$(function() {
        //  $("input#taginput").tagsinput();
        $('input#taginputs').tagsinput();
        //});
    </script>


    <!-- Jquery Library -->


    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.number.min.js"></script>
    <script type="text/javascript" >$("input.number").number(true, 0, ",", ".");</script>

    <script type="text/javascript">




        $('select[id="showhide"]').change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();
        });</script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
    <script>
        var sessionId = $("#sess_id").html();
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDQ67Z29vxn45Jm06fG-ci0Xhxg9RQuBWY",
            authDomain: "ptsonline-213b4.firebaseapp.com",
            databaseURL: "https://ptsonline-213b4.firebaseio.com",
            projectId: "ptsonline-213b4",
            storageBucket: "ptsonline-213b4.appspot.com",
            messagingSenderId: "315687782259"
        };
        if (sessionId) {
            firebase.initializeApp(config);
            var databaseFirebase = firebase.database();
            var notificationPath = "notification/" + sessionId;
            var notificationRef = databaseFirebase.ref(notificationPath);
            notificationRef.on('child_removed', function (data) {
                var url = data.val().url || "<?= base_url(); ?>dashboard";
                notifyMe(data.val().title, data.val().message, url);
            });
            document.addEventListener('DOMContentLoaded', function () {
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
        }
        function notifyMe(title, message, url) {
            if (!Notification) {
                alert('Notifikasi Desktop tidak tersedia di browser kamu! Coba browser yang lain.');
                return;
            }

            if (Notification.permission !== "granted")
                Notification.requestPermission();
            else {
                var notification = new Notification(title, {
                    icon: '<?= base_url(); ?>/assets/img/icon-notifikasi.png',
                    body: message
                });
                notification.onclick = function () {
                    //window.open(url);
                    window.open(url);
                };
            }
        }
    </script>
</body>
</html>