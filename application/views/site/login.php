<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta information -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Title-->
        <title>PTS |  Online</title>
        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <!-- CSS Stylesheet-->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

        <!-- Styleswitch if  you don't chang theme , you can delete -->
       
    </head>
    <body class="full-lg" style="background-image: url(<?= base_url() ?>assets/img/bg-login1.jpg);">
        <div id="wrapper">

            <div id="loading-top">
                <div id="canvas_loading"></div>
                <span>Checking...</span>
            </div>

            <div id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="account-wall">
                                <section class="align-lg-center">
                                    <div class="site-logo"></div>
                                    <h1 class="login-title"><span>PTS</span>ONLINE <small> Internal   Office Network Version 1.0.1</small></h1>
                                </section>
                                <form  action="<?= base_url().'site/authlog';?>" method="post" class="form-signin">
                                    <section>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input  type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                            <input type="password" class="form-control"  name="password" placeholder="Password">
                                        </div>
                                        <button class="btn btn-lg btn-theme-inverse btn-block" type="submit" id="sign-in">Sign in</button>
                                    </section>
                                    <section class="clearfix">
                                        <div class="iCheck pull-left"  data-color="red">
                                            <input type="checkbox" checked>
                                            <label>Remember</label>
                                        </div>
                                        <a href="#" class="pull-right help">Forget Password? </a>
                                    </section>		
                                    <span class="or" data-text="Or"></span>
                                    <button class="btn btn-lg  btn-inverse btn-block" type="button"> New account </button>
                                </form>
                                <a href="#" class="footer-link">&copy; <?php echo date('Y'); ?> EtnicMediaNusantara &trade; </a>
                            </div>	
                            <!-- //account-wall-->

                        </div>
                        <!-- //col-sm-6 col-md-4 col-md-offset-4-->
                    </div>
                    <!-- //row-->
                </div>
                <!-- //container-->

            </div>
            <!-- //main-->


        </div>
        <!-- //wrapper-->


        <!--
        ////////////////////////////////////////////////////////////////////////
        //////////     JAVASCRIPT  LIBRARY     //////////
        /////////////////////////////////////////////////////////////////////
        -->

        <!-- Jquery Library -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- Modernizr Library For HTML5 And CSS3 -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/modernizr/modernizr.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/plugins/mmenu/jquery.mmenu.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/styleswitch.js"></script>
        <!-- Library 10+ Form plugins-->
        <script type="text/javascript" src="<?= base_url() ?>assets/plugins/form/form.js"></script>
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
            $(function () {
                //Login animation to center 
                function toCenter() {
                    var mainH = $("#main").outerHeight();
                    var accountH = $(".account-wall").outerHeight();
                    var marginT = (mainH - accountH) / 2;
                    if (marginT > 30) {
                        $(".account-wall").css("margin-top", marginT - 15);
                    } else {
                        $(".account-wall").css("margin-top", 30);
                    }
                }
                toCenter();
                var toResize;
                $(window).resize(function (e) {
                    clearTimeout(toResize);
                    toResize = setTimeout(toCenter(), 500);
                });

                //Canvas Loading
                var throbber = new Throbber({size: 32, padding: 17, strokewidth: 2.8, lines: 12, rotationspeed: 0, fps: 15});
                throbber.appendTo(document.getElementById('canvas_loading'));
                throbber.start();

                //Set note alert
                setTimeout(function () {
                    $.notific8('Hi Guest , you can use Username : <strong>demo</strong> and Password: <strong>demo</strong> to  access account.', {sticky: true, horizontalEdge: "top", theme: "inverse", heading: "LOGIN DEMO"})
                }, 1000);


                $("#form-signin").submit(function (event) {
                    event.preventDefault();
                    var main = $("#main");
                    //scroll to top
                    main.animate({
                        scrollTop: 0
                    }, 500);
                    main.addClass("slideDown");

                    // send username and password to php check login
                    $.ajax({
                        url: "<?php echo site_url('site/authlog'); ?>", data: $(this).serialize(), type: "POST", dataType: 'json',
                        success: function (e) {
                            setTimeout(function () {
                                main.removeClass("slideDown")
                            }, !e.status ? 500 : 3000);
                            if (!e.status) {
                                $.notific8('Check Username or Password again !! ', {life: 5000, horizontalEdge: "bottom", theme: "danger", heading: " ERROR :); "});
                                return false;
                            }
                            setTimeout(function () {
                                $("#loading-top span").text("Yes, account is access...")
                            }, 500);
                            setTimeout(function () {
                                $("#loading-top span").text("Redirect to account page...")
                            }, 1500);
                            setTimeout("window.location.href='<?php echo site_url('dashboard'); ?>'", 3100);
                        }
                    });

                });
            });
        </script>
    </body>
</html>