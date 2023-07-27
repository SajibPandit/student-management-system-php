<div class="content" style="min-height:600px;">
  <h1 class="text-primary"><i class="fa fa-users"></i> All Students</h1>
  <ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"> Dashboard</a></li>
    <li class="active ml-3"><i class="fa fa-users"></i> All Students</li>
  </ol>
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped" id="table">
    <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Class</th>
        <th>City</th>
        <th>Contct</th>
        <th>Photo</th>
        <th>Action</th>
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
          <td><?php echo $row['roll']; ?></td>
          <td><?php echo $row['class']; ?></td>
          <td><?php echo ucwords($row['city']); ?></td>
          <td><?php echo $row['pcontact']; ?></td>
          <td><img style="width:100px;" src="student_image/<?php echo $row['photo']; ?>" alt=""></td>
          <td><a href="index.php?page=edit&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a> &nbsp;&nbsp; <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a> </td>
        </tr>


        <?php
      }
       ?>
    </tbody>
  </table>
</div>
