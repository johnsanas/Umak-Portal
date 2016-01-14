<?php include'header.php';?>

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

<div class="new-annoucement-container">

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label for="announ">Announcement Title:</label>
  		<input type="text" class="form-control" id="announ" name="title">
	</div>
		<br>
	 <div class="form-group">
 		<label for="desc">Announcement Description:</label>
  		<textarea class="form-control" rows="5" id="desc" name="description"></textarea>
	</div>

	
	 <div class="form-group">				
		<input type="file" name="image" class="btn btn-default btn-block"  />
		
	</div>			

	<div class="form-group">
		<input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="SAVE">
		
	</div>

</form>
</div>


<?php
if(isset($_POST["save"]))
{

		   if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                	$title= $_POST["title"];
                	$desc= $_POST["description"];
                	$date =  date('M d, Y')." at ".date('G:ia');
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                   
				    $con=mysql_connect("localhost","root","");
				    mysql_select_db("dbwebapp",$con);
				    $qry="insert into tbl_announcements values ('', '$title', '$desc','$date','$image')";
				    $result=mysql_query($qry,$con);
				   
                }
                echo"<script>alert('save');</script>";
 
}
?>