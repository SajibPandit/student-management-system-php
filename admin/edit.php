<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Studet Update</small></h1>
  <ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users"></i> All Studets </a></li>
    <li class="active ml-3"><i class="fa fa-user-plus"></i>Update Studet</li>
  </ol>
  <?php
    require_once 'dbcon.php';
    $id=base64_decode($_GET['id']);
    $db_data= mysqli_query($link,"SELECT * FROM `student_info` WHERE `id` ='$id'");
    $db_row=mysqli_fetch_assoc($db_data);

    if(isset($_POST['update_student'])){
    $name= $_POST['name'];
    $roll= $_POST['roll'];
    $city= $_POST['city'];
    $pcontact= $_POST['pcontact'];
    $class= $_POST['class'];


    $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class' ,`city`='$city',`pcontact`='$pcontact' WHERE `id` ='$id'";
    $reasult = mysqli_query($link,$query);
    if($reasult){
      header('location: index.php?page=all-students');
    }
    }
  ?>
      <div class="col-md-6">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <lebel for="name">Studet Name</lebel>
            <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" value="<?php echo $db_row['name']; ?>" required>
          </div>
          <div class="form-group">
            <lebel for="roll">Student Roll</lebel>
            <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" value="<?php echo $db_row['roll']; ?>" required>
          </div>
          <div class="form-group">
            <lebel for="city">City</lebel>
            <input type="text" name="city" placeholder="City" id="city" class="form-control" value="<?php echo $db_row['city']; ?>" required>
          </div>
          <div class="form-group">
            <lebel for="pcontact">Parent Contact</lebel>
            <input type="text" name="pcontact" placeholder="01********" id="pcontact" class="form-control" pattern="01[0-9]{9}" value="<?php echo $db_row['pcontact']; ?>" required>
          </div>
          <div class="form-group">
            <lebel for="class">Class</lebel>
            <select name="class" id="class" class="form-control" required>
            <option value="">Select</option>
            <option <?php echo $db_row['class']=='1st'?'selected':''; ?> value="1st">1st</option>
            <option <?php echo $db_row['class']=='2nd'?'selected':''; ?> value="2nd">2nd</option>
            <option <?php echo $db_row['class']=='3rd'?'selected':''; ?> value="3rd">3rd</option>
            <option <?php echo $db_row['class']=='4th'?'selected':''; ?> value="4th">4th</option>
            <option <?php echo $db_row['class']=='5th'?'selected':''; ?> value="5th">5th</option>
            </select>
          </div>
          <div class="form-group text-center">
            <input type="submit" name="update_student" value="Update Student" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
