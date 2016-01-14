<?php include'header.php';
$viewusers = mysqli_query($conn, "select * from tblstudents");
?>



<div class="side-navigation">
	 <div class="list-group">
		  <a href="admin-panel.php" class="list-group-item active">Users</a>
		  <a href="announcements.php" class="list-group-item">Announcements</a>
		  <a href="#" class="list-group-item">Events</a>
		  <a href="#" class="list-group-item">Groups</a>
		  <a href="#" class="list-group-item">Class</a>
		  <a href="#" class="list-group-item">IP Address</a>
	</div>
</div>




<div class="user-table">

	<form method="POST">
		<div class="search-text">
			 <div class="form-group has-success has-feedback">
			    <input type="text" class="form-control" placeholder="ID Number | Name">
			    <span class="glyphicon glyphicon-search form-control-feedback"></span>
	 		 </div>
		</div>
	</form>

		<div class="add-btn">
			 <div class="form-group">
			    <a class="btn btn-primary btn-lg btn-block">Add New User
			    <span class="glyphicon glyphicon-user"></span>
			    </a>
	 		 </div>


		</div>
	<br><br>
	<table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Position</th>
        <th>College</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php while($rows=mysqli_fetch_assoc($viewusers)){?>
      <tr>
        <td><?php echo $rows["studentID"]; ?></td>
        <td><?php echo $rows["studentname"]; ?></td>
        <td><?php echo $rows["position"]; ?></td>
        <td><?php echo $rows["college"]; ?></td>
        <td><?php echo $rows["password"]; ?></td>
        <td>

        		<div class="form-group">
				    <a class="btn btn-success">
				    <span class="glyphicon glyphicon-refresh"></span>
				    </a>
		 		 </div>
		 </td>

        <td>
	        <div class="form-group">
				    <a class="btn btn-danger">
				    <span class="glyphicon glyphicon-trash"></span>
				    </a>
		 		 </div>
		 	</td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>

