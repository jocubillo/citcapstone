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

$error = false;
$error_msg = '';
$success = false;
$success_msg = '';

if( isset($_POST['submit']) ){
  //validate form
  //all fields are required
  $name = filter_var($_POST['section_name'], FILTER_SANITIZE_STRING); 
  $year = filter_var($_POST['section_year'], FILTER_SANITIZE_STRING); 
  $adviser = filter_var($_POST['section_adviser'], FILTER_SANITIZE_STRING); 
  $room = filter_var($_POST['section_room'], FILTER_SANITIZE_STRING); 

  $data = array(
    'name' => $name,
    'year' => $year,
    'adviser' => $adviser,
    'room' => $room
  );

  $return = add_section($conn,$data);
  if( $return ){
    $success = true;
    $success_msg = 'Section successfully added.';
  }else{
    $error = true;
    $error_msg = 'Unable to create section. Please try again.';
  }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Create Section | CIT Capstone Project</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
     

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>
<body class="d-flex flex-column h-100">

  <?php include('header.php');?>


  <form action="" method="POST" class="form-signin" >
      <h2 class="form-signin-heading">Create/Add Section</h2>

      <?php 
        if( $error ){
          echo '<div class="alert alert-danger">'.$error_msg.'</div><br/>';
        }
        if( $success ){
          echo '<div class="alert alert-success">'.$success_msg.'</div><br/>';
        }
      ?>

      <input type="text" name="section_name" required placeholder="Name" class="input-block-level" /> <br/>
      <input type="text" name="section_year" required placeholder="Year" class="input-block-level"/> <br/>
      <input type="text" name="section_adviser" required placeholder="Adviser" class="input-block-level"/> <br/>
      <input type="text" name="section_room" required placeholder="Room Number" class="input-block-level"/> <br/>
      <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary" />
    </form>


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php
if( !$is_admin ){
  header("Location: dashboard.php");
  exit();
}
if( !$logged_in )
  header("Location: index.php");
  exit();
?>

