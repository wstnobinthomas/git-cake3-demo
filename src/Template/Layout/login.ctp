<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php
  echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
  ?>
<meta charset="utf-8"/>
<title>Admin Panel : Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="MobileOptimized" content="320">
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo $this->request->webroot; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- <link href="<?php echo $this->request->webroot; ?>assets/plugins/uniform/css/uniform.light.css" rel="stylesheet" type="text/css"/> -->
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>assets/plugins/select2/select2_metro.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo $this->request->webroot; ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->request->webroot; ?>css/animate.css" rel="stylesheet" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<style>
.has-error .help-block{
color: #591009 !important;	
}
.alert-danger{
color: #591009 !important;	
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="<?php echo $this->request->webroot; ?>assets/img/logo.png" alt="" alt="logo"/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->

<div class="content">
	<?php echo $this->fetch('content'); ?>
</div>

<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2017 &copy; Admin Panel 
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->request->webroot; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->request->webroot; ?>assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->request->webroot; ?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>