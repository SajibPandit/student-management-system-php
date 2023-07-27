<?php
  session_start();
  require_once 'dbcon.php';
  if(!isset($_SESSION['user_login'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <script src="../js/jquery-3.5.1.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function() {
      $('#table').DataTable();
    });
  </script>
</head>
<body>
  <nav class="navbar bg-light navbar-light navbar-expand-sm">
      <a class="navbar-brand" href="#icon">Navbar</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="icon">
      <ul class="navbar-nav ml-auto" >
        <li class="nav-item mr-5">
          <a class="nav-link" href="logout.php"><i class="fa fa-smile-o mr-1" aria-hidden="true"></i>Welcome : Sajib Pandit</a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="registration.php"><i class="fa fa-user-plus mr-1"></i>Add User</a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user mr-1"></i>profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa fa-power-off mr-1"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
          <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
          <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"></i> All Students</a>
          <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
        </div>
      </div>
      <div class="col-sm-9">
        <?php

        if(isset($_GET['page'])){
          $page = $_GET["page"].'.php';
         if(file_exists($page)){
           require_once $page;
         }else{
           require_once '404.php';
         }
       }else {
         require_once 'dashboard.php';
       }
         ?>
      </div>
    </div>
  </div>
  <footer>
    <p class="text-center bg-primary text-light py-3 m-0">Copyright &copy;<?php echo date('Y'); ?> Student Management System.All Rights Are Reserved</p>
  </footer>

</body>
</html>
