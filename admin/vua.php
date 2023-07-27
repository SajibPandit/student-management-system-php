<?php
  require_once 'dbcon.php';
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
    if(count($input_error) == 0){
      $email_check = mysqli_query($link ,"SELECT * FROM `users` WHERE `email` ='$email';");
      print_r($email_check);
    }
  }
?>
