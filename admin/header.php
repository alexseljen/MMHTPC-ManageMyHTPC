<?php ob_start(); ?>
<?php if (!isset($_SESSION)) session_start(); ?>
<?php include_once(dirname(dirname(__FILE__)) . '/classes/translate.class.php'); ?>
<?php include_once(dirname(__FILE__) . '/classes/functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Manage My HTPC</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Manage My HTPC">
		<meta name="author" content="Cause FX">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/jigowatt.css" rel="stylesheet">
		<link href="assets/css/datepicker.css" rel="stylesheet">
		<link href="assets/js/select2/select2.css" rel="stylesheet">
		<link href="assets/css/prettify.css" rel="stylesheet">

		<link rel="shortcut icon" href="//causefx/favicon.ico">

		<!-- Added library to header in order to load reports -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>

	<body>

<!-- Navigation
================================================== -->

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Manage My HTPC Admin</a>
	    </div>



	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav" id="findme">
						<li><a href="index.php"><?php _e('Control Panel'); ?></a></li>
						<li><a href="settings.php"><?php _e('Settings'); ?></a></li>
						<li><a href="../profile.php"><?php _e('My Account'); ?></a></li>
					</ul>
		<?php if(isset($_SESSION['jigowatt']['username'])) { ?>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop"><?php echo $_SESSION['jigowatt']['gravatar']; ?> <a href="#"><?php echo $_SESSION['jigowatt']['username']; ?></a><b class="caret"></b></p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['jigowatt']['user_level'])) { ?>
					<li><a href="index.php"><i class="glyphicon glyphicon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="settings.php"><i class="glyphicon glyphicon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="../profile.php"><i class="glyphicon glyphicon-user"></i> <?php _e('My Account'); ?></a></li>
					<li class="divider"></li>
					<li><a href="../logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="../login.php" class="signup-link"><em><?php _e('Have an account?'); ?></em> <strong><?php _e('Sign in!'); ?></strong></a></li>
		</ul>
		<?php } ?>
   </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

<!-- Main content
================================================== -->
		<div class="container">
			<div class="row">

				<div class="col-md-12">

					<ol class="breadcrumb">
						<li><a href="<?php echo strstr($_SERVER['SCRIPT_NAME'], 'settings') !== false ? 'settings.php' : 'index.php' ?>"><?php _e(strstr($_SERVER['SCRIPT_NAME'], 'settings') !== false ? 'Settings' : 'Control Panel'); ?></a></li>
						<?php if (strstr($_SERVER['SCRIPT_NAME'], 'users.php') !== false): ?>
							<li><a href="index.php#/user-control"><?php _e('Users'); ?></a></li>
							<li class="active"><?php echo !empty($_GET['uid']) ? $_GET['uid'] : -1; ?></li>
						<?php endif ?>
						<?php if (strstr($_SERVER['SCRIPT_NAME'], 'levels.php') !== false): ?>
							<li><a href="index.php#/level-control"><?php _e('Levels'); ?></a></li>
							<li class="active"><?php echo !empty($_GET['lid']) ? $_GET['lid'] : -1; ?></li>
						<?php endif ?>
					</ol>