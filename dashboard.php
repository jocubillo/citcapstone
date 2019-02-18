<?php
session_start();

$logged_in = false;
if( isset($_SESSION['loggedin']) ){
	$logged_in = true;
}
$is_admin = false;
if( $_SESSION['role'] == 'admin' ){
	$is_admin = true;
}


require("conn.php");
require("libs/sections.php");


$sections = get_sections($conn);
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

	<?php include('header.php');?>

	<h2>Dashboard</h2>

	<div class="tabbable"> <!-- Only required for left/right tabs -->
		<ul class="nav nav-tabs">
			<?php 
				if( !empty($sections) ){
					foreach($sections as $section){
						echo '<li class=""><a href="#tab'.$section['id'].'" data-toggle="tab">'.$section['year'].' - '.$section['name'].'</a></li>';
					}
				}
			?>
		</ul>
		<div class="tab-content">
			<?php 
				if( !empty($sections) ){
					foreach( $sections as $section ){
						echo '<div class="tab-pane " id="tab'.$section['id'].'">';
						echo 	'<p>'.$section['year'].' - '.$section['name'].' is handled by '.$section['adviser'].'</p>';
						echo '</div>';
					}
					
				}
			?>
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

