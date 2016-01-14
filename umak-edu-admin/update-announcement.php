<?php include'header.php';

$update = mysqli_query($conn, "select * from tbl_announcements where ID = '".$_SESSION["updateAnnounce"]."'"); 

?>

<div class="col-md-3 col-md-offset-0 side-navigation">
	  <div class="list-group">
			  <a href="admin-panel.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_user"];?></span> Users</a>
			  <a href="announcements.php" class="list-group-item active"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
			  <a href="events.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
			  <a href="groups.php" class="list-group-item "><span class="badge"><?php echo$_SESSION["no_group"];?></span>Groups</a>
			  <a href="#" class="list-group-item">Class</a>
			  <a href="ip.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
		</div>
</div>

<div class="col-md-9 col-md-offset-0 marginer-top">
<div class="new-annoucement-container">

<?php while($rows=mysqli_fetch_assoc($update)){?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label for="announ">Announcement Title:</label>
  		<input type="text" class="form-control" id="announ" name="title" value="<?php echo$rows["title"]; ?>">
	</div>
		<br>
	 <div class="form-group">
 		<label for="desc">Announcement Description:</label >
  		<textarea class="form-control" rows="5" id="desc" name="description"><?php echo$rows["description"]; ?>
  		</textarea>
	</div>

	 <div class="form-group">
		<?php echo '<img height="80%" width="100%" src="data:image;base64,'.$rows["announcementImage"].' "   			 style="border-radius:5px">';?>
	</div>
	
	 <div class="form-group">
	 					
		<input type="file" name="image"  class="btn btn-default btn-block"  />
		
	</div>			

	<div class="form-group">
	<input type="hidden" name="update">
		<button type="button" class="btn btn-primary btn-block btn-lg" onclick="this.form.submit()">UPDATE 
  			<span class="glyphicon glyphicon-refresh"></span>
		</button>
	</div>

<?php  }?>
</form>
</div>
</div>


<?php
if(isset($_POST["update"]))
{
	$title= $_POST["title"];
	$desc= $_POST["description"];
	$date =  date('M d, Y')." at ".date('G:ia');

   if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
        {
            	mysqli_query($conn, "update tbl_announcements set ID ='".$_SESSION["lastID"]."',  title = '$title', description = '$desc', date='$date' where ID = '".$_SESSION["updateAnnounce"]."' ");
        }
        else
        {
        	
        	date_default_timezone_set("Japan");

        	
            $image= addslashes($_FILES['image']['tmp_name']);
            $image= file_get_contents($image);
            $image= base64_encode($image);

          
			mysqli_query($conn, "update tbl_announcements set ID ='".$_SESSION["lastID"]."', title = '$title', description = '$desc', date = '$date', announcementImage='$image' where ID = '".$_SESSION["updateAnnounce"]."' ");

          
		   
        }
       
 	$_SESSION["updatemessage"]="Announcement Successfully Updated!";
 	header('location:announcements.php');
}
?>