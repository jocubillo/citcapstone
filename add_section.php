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
      ?>

      <input type="text" name="" placeholder="" class="input-block-level" /> <br/>
      <input type="text" name="" placeholder="" class="input-block-level"/> <br/>
      <input type="submit" name="submit" value="Login" class="btn btn-large btn-primary" />
    </form>


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php
if( !$logged_in )
  header("Location: index.php");
  exit();
?>

