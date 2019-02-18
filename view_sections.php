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
  <title>Admin - View Sections | CIT Capstone Project</title>
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

  <h2>View Section</h2>
  <div class="container">
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Year</th>
          <th scope="col">Adviser</th>
          <th scope="col">Room Number</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if( !empty($sections) ){
            foreach ($sections as $section) {
              echo '<tr>';
              echo    '<td>'.$section['id'].'</td>';
              echo    '<td>'.$section['name'].'</td>';
              echo    '<td>'.$section['year'].'</td>';
              echo    '<td>'.$section['adviser'].'</td>';
              echo    '<td>'.$section['room_number'].'</td>';
              echo    '<td><a href="edit_section.php?id='.$section['id'].'">edit</a> | <a href="delete_section.php?id='.$section['id'].'">delete</a></td>';
              echo '</tr>';
            }
          }
        ?>
      </tbody>
    </table>

  </div>


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

