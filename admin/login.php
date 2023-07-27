<?php
  require_once'dbcon.php';
  session_start();

  if(isset($_SESSION['user_login'])){
    header('location:index.php');
  }

  if(isset($_POST['login'])){
    $username=$_POST['name'];
    $password=$_POST['password'];
    $username_check=mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username'");
    if(mysqli_num_rows($username_check) >0){
      $row = mysqli_fetch_assoc($username_check);
      if ($row['password'] == md5($password)) {
        if($row['status']=='Active'){
          $_SESSION['user_login']=$username;
          header('location:index.php');
        }else {
          $status_inactive="Your Status is Inactive";
        }
      }
      else{
        $wrong_password =" This Password is Wrong";
      }
    }else {
      $username_error="This Username Doesn't Exist";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <title>Student Management System</title>
  </head>
  <body>
    <div class="container animated shake">
      <br>
      <h1 class="text-center">Student Management System</h1>
      <br>
      <br>
      <br>
      <div class="row justify-content-center">
        <div class="col-sm-4">
          <h2 class="text-center">Admin Login</h2>
          <br>
          <form method="POST">
            <div>
              <input type="text" placeholder="Username" name="name" class="form-control" value="<?php if(isset($username)) echo $username; ?>" required>
            </div>
            <div>
              <input type="password" placeholder="Password" name="password" class="form-control mt-3" value="<?php if(isset($password)) echo  $password; ?>" required>
            </div>
            <div class="text-center">
              <input type="submit" name="login" class="btn btn-outline-dark mt-4 px-5" value="Login">
            </div>
          </form>
        </div>
      </div>
      <br>
      <?php if(isset($username_error)) {echo '<div class="alert alert-danger text-center .col-sm-4 .offset-sm-4">'.$username_error.'</div>'; } ?>
      <?php if(isset($wrong_password)) {echo '<div class="alert alert-danger text-center .col-sm-4 .offset-sm-4">'.$wrong_password.'</div>'; } ?>
      <?php if(isset($status_inactive)) {echo '<div class="alert alert-danger text-center .col-sm-4 .offset-sm-4">'.$status_inactive.'</div>'; } ?>
    </div>
    <scrpit src="../js/jquery.min.css"></scrpit>
  </body>
</html>
