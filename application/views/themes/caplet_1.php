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
<!--<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="<?= base_url() ?>assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="<?= base_url() ?>assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="<?= base_url() ?>assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="<?= base_url() ?>assets/css/styleTheme4.css" />-->

</head>
<!--<body class="leftMenu nav-collapse in">-->
<body class="leftMenu nav-collapse">
<div id="wrapper">
		<?= $_header;?>
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     SLIDE LEFT PROFILE CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="nav">
			<?= $_slideleft;?>
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
		
				<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="#">Library</a></li>
						<li class="active">Data</li>
				</ol>
				<!-- //breadcrumb-->
				
				<div id="content">
				
						<?= $_content; ?>
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
				<?= $_modal_message;?>
		</div>
		<!-- //modal-->
		
		
		
		<!--
		//////////////////////////////////////////////////////////////////////////
		//////////     MODAL NOTIFICATION     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
				<?= $_modal_notification;?>
		</div>
		<!-- //modal-->
		
		
		
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu"  data-search="close">
				<?= $_leftnav;?>
		</nav>
		<!-- //nav left menu-->
		
		
		
		<!--
		/////////////////////////////////////////////////////////////////
		//////////     RIGHT NAV MENU     //////////
		/////////////////////////////////////////////////////////////
		-->
		<nav id="menu-right">
			<?= $_rightnav;?>	
		</nav>
		<!-- //nav right menu-->
		
		
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
<script type="text/javascript" src="assets/plugins/datable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datable/dataTables.bootstrap.js"></script>
<script type="text/javascript">

	function fnShowHide( iCol , table){
	    var oTable = $(table).dataTable(); 
	    var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
	    oTable.fnSetColumnVis( iCol, bVis ? false : true );
	}

	$(function() {
		
		//////////     DATA TABLE  COLUMN TOGGLE    //////////
		$('[data-table="table-toggle-column"]').each(function(i) {
				var data=$(this).data(), 
				table=$(this).data("table-target"), 
				dropdown=$(this).parent().find(".dropdown-menu"),
				col=new Array;
				$(table).find("thead th").each(function(i) {
				 		$("<li><a  class='toggle-column' href='javascript:void(0)' onclick=fnShowHide("+i+",'"+table+"') ><i class='fa fa-check'></i> "+$(this).text()+"</a></li>").appendTo(dropdown);
				});
		});

		//////////     COLUMN  TOGGLE     //////////
		 $("a.toggle-column").on('click',function(){
				$(this).toggleClass( "toggle-column-hide" );  				
				$(this).find('.fa').toggleClass( "fa-times" );  			
		});

		// Call dataTable in this page only
		$('#table-example').dataTable();
		$('table[data-provide="data-table"]').dataTable();
	});
</script>
</body>
</html>