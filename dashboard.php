<?php
session_start();

$logged_in = false;
if( isset($_SESSION['loggedin']) ){
	$logged_in = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard | CIT Capstone Project</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<div class="container">

				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<!-- Be sure to leave the brand out there if you want it shown -->
				<a class="brand" href="dashboard.php">CIT-U Capstone</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="dashboard.php">Dashboard</a></li>
                      <li><a href="logout.php">Logout</a></li>
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="nav-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>-->
                    </ul>
                    <ul class="nav pull-right">
                    	<li><a href="#">Welcome <?php echo ucfirst($_SESSION['user_name']);?></a></li>
                    </ul>
                  </div>

			</div>
		</div>
	</div>

	<div class="tabbable"> <!-- Only required for left/right tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
			<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
			<li><a href="#tab3" data-toggle="tab">Section 3</a></li>
			<li><a href="#tab4" data-toggle="tab">Section 4</a></li>
			<li><a href="#tab5" data-toggle="tab">Section 5</a></li>
			<li><a href="#tab6" data-toggle="tab">Section 6</a></li>
			<li><a href="#tab7" data-toggle="tab">Section 7</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<p>I'm in Section 1.</p>
			</div>
			<div class="tab-pane" id="tab2">
				<p>Howdy, I'm in Section 2.</p>
			</div>
			<div class="tab-pane" id="tab3">
				<p>Howdy, I'm in Section 3.</p>
			</div>
			<div class="tab-pane" id="tab4">
				<p>Howdy, I'm in Section 4.</p>
			</div>
			<div class="tab-pane" id="tab5">
				<p>Howdy, I'm in Section 5.</p>
			</div>
			<div class="tab-pane" id="tab6">
				<p>Howdy, I'm in Section 6.</p>
			</div>
			<div class="tab-pane" id="tab7">
				<p>Howdy, I'm in Section 7.</p>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php
if( !$logged_in )
	header("Location: index.php");
	exit();
?>

