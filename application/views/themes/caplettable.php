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
        
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/jquery.dataTables.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/buttons.dataTables.min.css') ?>"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/datatables/fixedColumns.dataTables.min.css') ?>" />
        
    </head>
    <body>
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
            <?= $_modal_message; ?>
        </div>
        <!-- //modal-->



        <!--
        //////////////////////////////////////////////////////////////////////////
        //////////     MODAL NOTIFICATION     //////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
            <?= $_modal_notification; ?>
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
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.js"></script>
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
    
        <script src="<?php echo base_url('assets/datatables/2018/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/dataTables.fixedColumns.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/buttons.flash.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/2018/buttons.print.min.js') ?>"></script>
        
        <script type="text/javascript">
            
            $(document).ready(function() {
                $('#mytable').DataTable( {
                    "scrollY": 600,
                    "paging": false,
                     "bInfo" : false,
                    "scrollX": true,
                    scrollCollapse: true,
                    fixedColumns:   {
                        leftColumns: 1,
                        rightColumns: 1
                    },
                    dom: 'Bfrtip',
                    "columnDefs": [
                                    { "visible": false, "targets": 0 }
                                  ],
                    buttons: [
                         'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
    
         <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/datepicker.css" />
        <script>
            $(document).ready(function () {
                var date_input = $('input[id="date"]'); //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                })
            })
        </script>
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