<?php $user = $this->request->session()->read('Auth.User');?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
Version: 1.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>

		<meta charset="utf-8"/>
		<title>
			<?php echo 'Admin Panel' ?> : <?php echo $title_for_layout; ?>
		</title>
		<?php echo $this->Html->meta('favicon.ico','img/favicon.ico'); ?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<meta name="MobileOptimized" content="320">

		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript">
		</script>
		<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery.blockui.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery.cokie.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/jquery.validate.custom.rules.js" type="text/javascript">
		</script>
		<!--VALIDATION-->
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-validation/dist/jquery.validate.min.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-validation/dist/additional-methods.min.js">
		</script>
		<!--VALIDATION-->
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery.bootstrap-growl.min.js">
		</script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="<?php echo $this->request->webroot;?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->

		<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
		<link href="<?php echo $this->request->webroot;?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>

		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-timepicker/compiled/timepicker.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>

		<link href="<?php echo $this->request->webroot;?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
		<!-- END PAGE LEVEL PLUGIN STYLES -->
		<!-- BEGIN THEME STYLES -->
		<link href="<?php echo $this->request->webroot;?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $this->request->webroot;?>assets/plugins/select2/select2_metro.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->request->webroot;?>assets/plugins/data-tables/DT_bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo $this->request->webroot;?>assets/plugins/fancybox/source/jquery.fancybox.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>assets/plugins/jquery-multi-select/css/multi-select.css"/>
		<link href="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot;?>assets/css/pages/news.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->request->webroot; ?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="favicon.ico"/>
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="page-header-fixed">
		<!-- BEGIN HEADER -->
		<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="header-inner">
				<!-- BEGIN LOGO -->
				<a class="navbar-brand" href="<?php echo $this->request->webroot; ?>adminmodule"  >
					<img src="<?php echo $this->request->webroot; ?>assets/img/logo-small.png" alt="logo" class="img-responsive" />

				</a>
				<!-- <div class="sidebar-toggler hidden-phone">
				</div> -->
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<img src="<?php echo $this->request->webroot;?>assets/img/menu-toggler.png" alt=""/>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav navbar-nav pull-right">

					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img alt="" width="29" height="29" src="<?php echo $this->request->webroot; ?>assets/img/avatar.png"/>
							<span class="username">
								&nbsp;
								<?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?>
							</span>
							<i class="fa fa-angle-down">
							</i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo $this->request->webroot; ?>adminmodule/users/profile">
									<i class="fa fa-user">
									</i>&nbsp;My Profile
								</a>
							</li>
							<li>
								<a href="<?php echo $this->request->webroot; ?>adminmodule/users/logout">
									<i class="fa fa-key">
									</i>&nbsp;Logout
								</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<!--    <ul class="page-sidebar-menu">
					<li class="sidebar-toggler-wrapper">

					<div class="sidebar-toggler hidden-phone">
					</div>

					</li> -->

					<?php
					echo $this->element('admin-sidebarleft');

					?>
					</ul>
					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!-- BEGIN DASHBOARD STATS -->
					<?php echo $this->fetch('content'); ?>
					<div class="clearfix">
					</div>
					<!-- END CONTENT -->
				</div>
			</div>
		</div>
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="footer">
			<div class="footer-inner">
				2017 &copy; Admin Panel
			</div>
			<div class="footer-tools">
				<span class="go-top">
					<i class="fa fa-angle-up">
					</i>
				</span>
			</div>
		</div>
		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->

		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="<?php echo $this->request->webroot;?>assets/plugins/flot/jquery.flot.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/flot/jquery.flot.resize.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery.pulsate.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript">
		</script>
		<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
		<script src="<?php echo $this->request->webroot;?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript">
		</script>

		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery.sparkline.min.js" type="text/javascript">
		</script>

		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/clockface/js/clockface.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/moment.min.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-multi-select/js/jquery.multi-select.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-multi-select/js/jquery.quicksearch.js">
		</script>

		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/select2/select2.min.js">
		</script>
		<!-- END PAGE LEVEL PLUGINS -->

		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery.pulsate.min.js" >
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript">
		</script>

		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-multi-select/js/jquery.multi-select.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-multi-select/js/jquery.quicksearch.js">
		</script>

		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/clockface/js/clockface.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/moment.min.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/fancybox/source/jquery.fancybox.pack.js">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/app.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/jquery.validate.custom.rules.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/index.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/tasks.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootbox/bootbox.min.js" type="text/javascript">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-mixitup/jquery.mixitup.min.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/fancybox/source/jquery.fancybox.pack.js">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/portfolio.js">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js">
		</script>
		<script type="text/javascript" src="<?php echo $this->request->webroot;?>assets/plugins/jquery.input-ip-address-control-1.0.min.js">
		</script>

		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="<?php echo $this->request->webroot;?>assets/scripts/app.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/form-components.js">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/scripts/ui-extended-modals.js">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot;?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript">
		</script>
		<script src="<?php echo $this->request->webroot; ?>assets/plugins/dropzone/dropzone.js">
		</script>
		<script src="<?php echo $this->request->webroot; ?>assets/scripts/form-dropzone.js">
		</script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
			jQuery(document).ready(function()
				{
					App.init(); // initlayout and core plugins
					Index.init();
					FormComponents.init();
				});
		</script>
		</div>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>