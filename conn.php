<?php 

$db_user = '';
$db_pass = '';
$db_name = 'test';
$host = '';
$error = false;
$error_msg = '';

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if( mysqli_connect_error() ){
	die(' Error Connecting to database ' . mysqli_connect_errno() . ' - ' . mysqli_connect_error() );
}else{
	//echo 'ok';
}



?>