<?php include'header.php';?>

<script>
	 
     $(document).ready(function()
     {

  		 $("#message").fadeOut(5000);
     });
  	 
</script>

<?php if(isset($_POST["save"])){?>

<div class="fade-message" id="message">
	<center>
		<p class="fade-message-text"> New Announcement Successfully Added!<span class="glyphicon glyphicon-ok"></p>
	</center>	
</div>

<?php }?>

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

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label for="announ">Announcement Title:</label>
  		<input type="text" class="form-control" id="announ" name="title">
	</div>
		<br>
	 <div class="form-group">
 		<label for="desc">Announcement Description:</label >
  		<textarea class="form-control" rows="5" id="desc" name="description"></textarea>
	</div>

	
	 <div class="form-group">				
		<input type="file" name="image" class="btn btn-default btn-block"  />
		
	</div>			

	<div class="form-group">
	<input type="hidden" name="save">
		<button type="button" class="btn btn-primary btn-block btn-lg" onclick="this.form.submit()">SAVE 
  			<span class="glyphicon glyphicon-floppy-save"></span>
		</button>
	</div>

</form>
</div>
</div>

<?php
if(isset($_POST["save"]))
{

   if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
        {
            echo '
			<div class="fade-message-fail" id="message">
				<center>
					<p class="fade-message-text"> Please Choose an Image! <span class="glyphicon glyphicon-remove"></p>
				</center>	
			</div>
			';
        }
        else
        {
        	date_default_timezone_set("Japan");

        	$title= $_POST["title"];
        	$desc= $_POST["description"];
        	$date =  date('M d, Y')." at ".date('G:ia');
            $image= addslashes($_FILES['image']['tmp_name']);
            $image= file_get_contents($image);
            $image= base64_encode($image);
           
		    
		    mysqli_query($conn, "insert into tbl_announcements values ('', '$title', '$desc','$date','$image')");
		   
		   
        }
       

}
?>