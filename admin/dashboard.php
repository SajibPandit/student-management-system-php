<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
  <ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
  </ol>
  <?php
    $count_student=mysqli_query($link,"SELECT * FROM `student_info`");
    $total_student=mysqli_num_rows($count_student);

    $count_user=mysqli_query($link,"SELECT * FROM `users`");
    $total_user=mysqli_num_rows($count_user);
  ?>

  <div class="row">
    <div class="col-sm-4">
      <a href="index.php?page=all-students">
        <div class="panel panel-primary">
          <div class="panel-heading list-group-item active">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 ml-auto">
                <div class="display-4"><?php echo $total_student;?></div>
                <div class="">All Students</div>
              </div>
            </div>
          </div>
          <div class="panel-footer bordered">
            <span class="pull-left">All Students</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-sm-4">
      <a href="">
        <div class="panel panel-primary">
          <div class="panel-heading list-group-item active">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 ml-auto">
                <div class="display-4"><?php echo $total_user;?></div>
                <div class="">All Users</div>
              </div>
            </div>
          </div>
          <div class="panel-footer bordered">
            <span class="pull-left">All Students</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
          </div>
        </div>
      </a>
    </div>
  </div>
  <hr>
  <h3>New Students</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="table">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Roll</th>
          <th>City</th>
          <th>Contct</th>
          <th>Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db_info=  mysqli_query($link,"SELECT * FROM `student_info` ");
        while ($row=mysqli_fetch_assoc($db_info)) {
          ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo ucwords($row['city']); ?></td>
            <td><?php echo $row['pcontact']; ?></td>
            <td><img style="width:100px;" src="student_image/<?php echo $row['photo']; ?>"></td>
          </tr>


          <?php
        }
         ?>
      </tbody>
    </table>
  </div>
</div>
