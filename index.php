<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Student Management System</title>
</head>
<body>
  <div class="container">
    <br>
    <div class="text-right">
      <a href="admin/login.php"class="btn btn-primary">Login</a>
    </div>
    <br>
    <br>
    <h2 class="text-center">Welcome to Students Management System</h2>
    <br>
    <div class="row">
      <div class="col-sm-4 offset-sm-4">
        <form class="text-center" action="" method="post">
          <table class="table table-bordered">
            <tr>
              <td colspan="2"><label>Student Information</label></td>
            </tr>
            <tr>
              <td><label for="choose">Choose Class</label></td>
              <td>
                <select  class="form-control" id="choose" name="choose">
                  <option value="">Select</option>
                  <option value="1st">1st</option>
                  <option value="2nd">2nd</option>
                  <option value="3rd">3rd</option>
                  <option value="4th">4th</option>
                  <option value="5th">5th</option>
              </select>
            </td>
            </tr>

            <tr>
              <td><label for="roll">Roll</label></td>
              <td><input class="form-control" type="text" pattern="[0-9]{6}" placeholder="Roll" name="roll"></td>
            </tr>

            <tr>
              <td colspan="2"><input class="form-control" class="btn btn-default" type="submit" value="Show Info" name="show_info"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>

    <?php
    require_once 'admin/dbcon.php';
    if(isset($_POST['show_info'])){
      $choose=$_POST['choose'];
      $roll=$_POST['roll'];

      $reasult=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class` ='$choose' AND `roll` ='$roll'");
      if(mysqli_num_rows($reasult)==1){
        $row=mysqli_fetch_assoc($reasult);
        ?>
        <div class="row">
          <div class="col-sm-8 mx-auto">
            <table class="table table-bordered">
              <tr>
                <td rowspan="4">
                  <img src="admin/student_image/<?php echo $row['photo']; ?>" class="img-fluid img-bordered" style="width:200px;" alt="">
                </td>
                <td>Name</td>
                <td><?php echo ucwords($row['name']); ?></td>
              </tr>
              <tr>
                <td>Roll</td>
                <td><?php echo $row['roll']; ?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?php echo $row['class']; ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?php echo ucwords($row['city']); ?></td>
              </tr>
            </table>
          </div>
          <?php
      }else {
        ?>
        <script type="text/javascript">
          alert('Data Not Found');
        </script>
        <?php
      }
    }
    ?>
    </div>
  </div>
  <scrpit src="js/jquery.min.css"></scrpit>
</body>
</html>
