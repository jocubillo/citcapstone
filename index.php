<?php
require("conn.php");

//process form submission
if( isset($_POST['submit']) ){

	//always sanitize input from users
	$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING); 
	$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

	//query database
	$sql = "SELECT * FROM users WHERE username = '$uname' AND password=md5('$pass') LIMIT 1"; //md5() encrypt the password for security
	$result = mysqli_query($conn,$sql);

	if( $result ){
		if( mysqli_num_rows($result) > 0 ){
			$user_data = mysqli_fetch_assoc($result);

			session_start();
			$_SESSION['loggedin'] = 1;
			$_SESSION['user_id'] = $user_data['id'];
			$_SESSION['user_name'] = $user_data['username'];
			$_SESSION['user_email'] = $user_data['email'];
      $_SESSION['role'] = $user_data['role'];

			header("Location: dashboard.php");
			exit(); //always do exit() when redirecting to another page
		}else{
			$error = true;
			$error_msg = 'User does not exist. Try again.';
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | CIT Capstone Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

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
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

	<div class="container">

		<form action="" method="POST" class="form-signin" >
			<h2 class="form-signin-heading">CIT-U Capstone</h2>

			<?php 
				if( $error ){
					echo '<div class="alert alert-danger">'.$error_msg.'</div><br/>';
				}
			?>

			<input type="text" name="uname" placeholder="Username" class="input-block-level" /> <br/>
			<input type="password" name="pass" placeholder="Password" class="input-block-level"/> <br/>
			<input type="submit" name="submit" value="Login" class="btn btn-large btn-primary" />
		</form>

	</div> <!-- /container -->


</body>
</html>