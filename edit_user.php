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
require("libs/users.php");

$error = false;
$error_msg = '';
$success = false;
$success_msg = '';
$user = get_user($conn,$_GET['id']);

if( !$user ){
  echo 'Error : Database error. Return to dashboard';
  exit();
}



if( isset($_POST['submit']) ){
  //validate form
  //all fields are required
  $username = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING); 
  $email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL); 
  $password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING); 
  $role = filter_var($_POST['user_role'], FILTER_SANITIZE_STRING); 

  $data = array(
    'username' => $username,
    'email' => $email,
    'password' => md5($password),
    'role' => $role,
    'id' => $_POST['user_id']
  );

  $return = update_user($conn,$data);
  if( $return ){
    $success = true;
    $success_msg = 'User successfully updated.';
  }else{
    $error = true;
    $error_msg = 'Unable to update user. Please try again.';
  }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Edit User | CIT Capstone Project</title>
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
      <h2 class="form-signin-heading">Edit User</h2>

      <?php 
        if( $error ){
          echo '<div class="alert alert-danger">'.$error_msg.'</div><br/>';
        }
        if( $success ){
          echo '<div class="alert alert-success">'.$success_msg.'</div><br/>';
        }
      ?>

      <input type="text" name="user_name" required placeholder="Username" class="input-block-level" value="<?php echo $user['username'];?>"/> <br/>
      <input type="text" name="user_email" required placeholder="Email" class="input-block-level" value="<?php echo $user['email'];?>"/> <br/>
      <input type="password" name="user_password" required placeholder="Password" class="input-block-level" value="<?php echo $user['password'];?>"/> <br/>
      <input type="text" name="user_role" required placeholder="Role" class="input-block-level" value="<?php echo $user['role'];?>"/> <br/>
      <input type="hidden" name="user_id" value="<?php echo $user['id'];?>"/>
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

