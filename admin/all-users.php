<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-users"></i> All Users</h1>
  <ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"> Dashboard</a></li>
    <li class="active ml-3"><i class="fa fa-users"></i> All Users</li>
  </ol>
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped" id="table">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Photo</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $db_info=  mysqli_query($link,"SELECT * FROM `users` ");
      while ($row=mysqli_fetch_assoc($db_info)) {
        ?>

        <tr>
          <td><?php echo ucwords($row['name']); ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><img style="width:100px;" src="images/<?php echo $row['photo']; ?>" alt=""></td>
        </tr>


        <?php
      }
       ?>
    </tbody>
  </table>
</div>
