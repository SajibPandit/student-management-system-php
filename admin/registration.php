<?php
  require_once 'dbcon.php';
  session_start();
  if(isset($_POST['registration'])){
    $name =$_POST['name'];
    $email =$_POST['email'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $c_password =$_POST['c_password'];
    $photo=explode('.',$_FILES['photo']['name']);
    $photo=end($photo);
    $photo_name=$username.'.'.$photo;
    $input_error=array();
    if (empty($name)) {
      $input_error['name']="The Name Field is Required";
    }
    if (empty($email)) {
      $input_error['email']="The Email Field is Required";
    }
    if (empty($username)) {
      $input_error['username']="The Username Field is Required";
    }
    if (empty($password)) {
      $input_error['password']="The Password Field is Required";
    }
    if (empty($c_password)) {
      $input_error['c_password']="The Confirm Password Field is Required";
    }
    if(count($input_error) ==0){
      $email_check=mysqli_query($link,"SELECT * FROM `users` WHERE `email` ='$email';");
      if(mysqli_num_rows($email_check) == 0){
        if (strlen($username)>7) {
          $username_check=mysqli_query($link,"SELECT * FROM `users` WHERE `username` ='$username';");
          if(mysqli_num_rows($username_check) == 0){
            if(strlen($password) > 7){
              if($password == $c_password){
                $password=md5($password);
                $query="INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','Inactive')";
                $reasult=mysqli_query($link,$query);
                if($reasult){
                  $_SESSION['data_insert_success']="Data Inserted Successfully";
                  move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                  header('location: registration.php');
                }
                else{
                  $_SESSION['data_insert_error']="Data Not Inserted";
                }
              }else {
                $c_password_error="Confirm Password did Not Match";
              }
            }else{
              $password_error_l="Password Must be More Than 7 Characters";
            }
          }else {
            $username_error="The Username You Have Entered is Already Exist";
          }
        }else {
          $username_error_l="Username Must be More than 7 Characters";
        }
      }else {
        $email_error="The Email You Have Entered is Already Exist";
      }
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <title>User Registration Form</title>
  </head>
  <body>
    <div class="container">
      <h1>User Registration Form</h1>
      <?php if(isset(  $_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'. $_SESSION['data_insert_success'].'</div>';} ?>
      <?php if(isset(  $_SESSION['data_insert_error'])){echo '<div class="alert alert-danger">'. $_SESSION['data_insert_error'].'</div>';} ?>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
              <label for="name" class="control-label col-sm-1">Name</label>
              <div class="col-sm-4">
                <input class="form-control" type="text" id="name" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="Enter Your Name">
              </div>
              <label class="error"><?php if (isset($input_error['name'])) { echo $input_error['name'];} ?></label>
            </div>
            <div class="form-group">
              <label for="email" class="control-label col-sm-1">Email</label>
              <div class="col-sm-4">
                <input class="form-control" type="email" id="email" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="Enter Your Email">
              </div>
              <label class="error"><?php if (isset($input_error['email'])) { echo $input_error['email'];} ?></label>
              <label class="error"><?php if (isset($email_error)) { echo $email_error;} ?></label>
            </div>
            <div class="form-group">
              <label for="username" class="control-label col-sm-1">Username</label>
              <div class="col-sm-4">
                <input class="form-control" type="text" id="username" name="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="Enter Your Username">
              </div>
              <label class="error"><?php if (isset($input_error['username'])) { echo $input_error['username'];} ?></label>
              <label class="error"><?php if (isset($username_error_l)) { echo $username_error_l;} ?></label>
              <label class="error"><?php if (isset($username_error)) { echo $username_error;} ?></label>
            </div>
            <div class="form-group">
              <label for="password" class="control-label col-sm-1">Password</label>
              <div class="col-sm-4">
                <input class="form-control" type="password" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" placeholder="Enter Your Password">
              </div>
              <label class="error"><?php if (isset($input_error['password'])) { echo $input_error['password'];} ?></label>
              <label class="error"><?php if (isset($password_error_l)) { echo $password_error_l;} ?></label>
            </div>
            <div class="form-group">
              <label for="c_password" class="control-label col-sm-1">Confirm Password</label>
              <div class="col-sm-4">
                <input class="form-control" type="password" id="c_password" name="c_password" value="<?php if(isset($c_password)){echo $c_password;} ?>" placeholder="Enter Your Confirm Password">
              </div>
              <label class="error"><?php if (isset($input_error['c_password'])) { echo $input_error['c_password'];} ?></label>
              <label class="error"><?php if (isset($c_password_error)) { echo $c_password_error;} ?></label>
            </div>
            <div class="form-group">
              <label for="file" class="control-label col-sm-1">File</label>
              <div class="col-sm-4">
                <input type="file" id="file" name="photo">
              </div>
            </div>
            <div class="col-sm-4 text-center">
              <input type="submit" name="registration" value="Registration" class="btn btn-success">
            </div>
          </form>
        </div>
        <br>
        <br>
        <p class="text-center">If you hav an account?Then please <a href="login.php">Login</a></p>
      </div>
      <footer>
        <p class="text-center">Copyright &copy;<?= date('Y') ?> All Rights Are Reserved</p>
      </footer>
    </div>
    <scrpit src="../js/jquery.min.css"></scrpit>
  </body>
</html>
