<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-user-plus"></i> Student Add <small>Add New Studet </small></h1>
  <ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"> Dashboard</a></li>
    <li class="active ml-3"><i class="fa fa-user-plus"></i> Add Student</li>
  </ol>

  <?php
  if(isset($_POST['submit'])){
  $name= $_POST['name'];
  $roll= $_POST['roll'];
  $city= $_POST['city'];
  $pcontact= $_POST['pcontact'];
  $class= $_POST['class'];
  $picture = explode('.',$_FILES['picture']['name']);
  $picture_ex=end($picture);
  $picture_name=$roll.'.'.$picture_ex;

  $query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";
  $reasult = mysqli_query($link,$query);
  if($reasult){
    $success="Data Insert Success";
    move_uploaded_file($_FILES['picture']['tmp_name'],'student_image/'.$picture_name);
  }else{
    $error="Data Not Inserted";
  }
  }
  ?>

  <div class="row">
    <div class="col-sm-6 m-a">
      <?php
        if(isset($success)){
          echo '<div class="alert alert-success">'.$success.'</div>' ;
        }
        if(isset($error)){
          echo '<div class="alert alert-warning">'.$error.'</div>' ;
        }
      ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <lebel for="name">Studet Name</lebel>
          <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <lebel for="roll">Student Roll</lebel>
          <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" required>
        </div>
        <div class="form-group">
          <lebel for="city">City</lebel>
          <input type="text" name="city" placeholder="City" id="city" class="form-control" required>
        </div>
        <div class="form-group">
          <lebel for="pcontact">Parent Contact</lebel>
          <input type="text" name="pcontact" placeholder="01********" id="pcontact" class="form-control" pattern="01[0-9]{9}" required>
        </div>
        <div class="form-group">
          <lebel for="class">Class</lebel>
          <select name="class" id="class" class="form-control" required>
          <option value="">Select</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
          </select>
        </div>
        <div class="form-group">
          <lebel for="picture">Picture</lebel>
          <input type="file" name="picture" id="picture" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" name="submit" value="Add Student" class="btn btn-info">
        </div>
      </form>
    </div>
  </div>

</div>
