<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-user"></i> User Profile</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li class="active"><i class="fa fa-user"> Profile</i></li>
  </ol>

  <?php
    $session_user=$_SESSION['user_login'];
    $user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$session_user'");
    $user_row=mysqli_fetch_assoc($user_data);
  ?>
<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <td>User ID</td>
        <td><?php echo $user_row['id']; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo ucwords($user_row['name']); ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo $user_row['username']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $user_row['email']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo ucwords($user_row['status']); ?></td>
      </tr>
      <tr>
        <td>Signup Date</td>
        <td><?php echo $user_row['datetime']; ?></td>
      </tr>
    </table>
    <a href="" class="btn btn-outline-warning text-dark btn-sm">Edit Profile</a>
  </div>
  <div class="col-sm-6">
    <a href="">
      <img src="images/<?php echo $user_row['photo']; ?>" class="img-thumbnail" alt="">
    </a>
    <?php
      if(isset($_POST['upload'])){
        $photo=explode('.',$_FILES['photo']['name']);
        $photo=end($photo);
        $photo_name=$session_user.'.'.$photo;
        $upload=mysqli_query($link,"UPDATE `users` SET `photo`='$photo_name' WHERE `username` ='$session_user'");
        if($upload){
          move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
        }
      }
    ?>
    <form class="mt-2" method="post" enctype="multipart/form-data" action="">
      <label for="photo">Profile Picture</label>
      <input type="file" name="photo" required >
      <input type="submit" name="upload" value="Update Photo"class="btn btn-sm btn-success">
    </form>
  </div>
</div>
