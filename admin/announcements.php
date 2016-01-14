<?php include'header.php';

$view_announcements = mysqli_query($conn, "select * from tbl_announcements order by ID desc");?>

<div class="side-navigation">
	 <div class="list-group">
		  <a href="admin-panel.php" class="list-group-item">Users</a>
		  <a href="announcements.php" class="list-group-item  active">Announcements</a>
		  <a href="#" class="list-group-item">Events</a>
		  <a href="#" class="list-group-item">Groups</a>
		  <a href="#" class="list-group-item">Class</a>
		  <a href="#" class="list-group-item">IP Address</a>
	</div>
</div>






<div class="annoucement-container">
	<div class="form-group">
		<a href="new-announcements.php"  class="btn btn-success btn-lg btn-block">Add New Events</a>
	</div>
<?php while($rows=mysqli_fetch_assoc($view_announcements)){?>
	<div class="annoucement-details">

		<div class="annoucement-details-container">
			<div class="jumbotron">
				<h1><?php echo$rows["title"]; ?></h1>

				<p><?php echo$rows["date"]; ?></p>
				<p><?php echo$rows["description"]; ?></p>
				<center>
					<?php echo '<img height="100%" width="100%" src="data:image;base64,'.$rows["announcementImage"].' ">';?>
				</center>
			</div>
		</div>
		
	</div>
<?php }?>
</div>