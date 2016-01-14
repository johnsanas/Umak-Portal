<?php include'header.php';

$view_announcements = mysqli_query($conn, "select * from tbl_announcements order by ID desc");?>



<?php if($_SESSION["updatemessage"]!=""){?>
<script>
     $(document).ready(function()
     {

  		 $("#message").fadeOut(5000);
     });
  	 
</script>

<div class="fade-message" id="message">
	<center>
		<p class="fade-message-text"> <?php echo$_SESSION["updatemessage"]." ";?><span class="glyphicon glyphicon-refresh"></p>
	</center>	
</div>

<?php $_SESSION["updatemessage"]=""; }?>



<div class="row">
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



<div class="col-md-9 col-md-offset-0 table-navigation">
<div class="announcement-container">

	<div class="form-group">
		<a href="new-announcements.php"  class="btn btn-success btn-lg btn-block"> NEW ANNOUNCEMENT  <span class="glyphicon glyphicon-time"></a>
	</div>
	<?php $ctr=0; while($rows=mysqli_fetch_assoc($view_announcements)){?>
	<div class="annoucement-details">

		<div class="annoucement-details-container">
			<div class="jumbotron announcement-text">
				<h1><?php echo$rows["title"]; ?></h1>

				<p><?php echo$rows["date"]; ?></p>
				<p><?php echo$rows["description"]; ?></p>
				<center>
					<?php echo '<img height="80%" width="100%" src="data:image;base64,'.$rows["announcementImage"].' " style="border-radius:5px">';?>
				</center>

				<br>
				<form method="POST">
		        	<input type="hidden" name="update" value="<?php echo$rows["ID"]; ?>" />
		        	<button type="button" class="btn btn-primary btn-block" onclick="this.form.submit()">UPDATE
		    		<span class="glyphicon glyphicon-refresh"></span>
		  			</button>
		  		</form>

		  		<form method="POST">
		        	<input type="hidden" name="delete" value="<?php echo$rows["ID"]; ?>" />
		        	
				     <button type="button" class="btn btn-danger btn-block" onclick="this.form.submit()">DELETE
		    		<span class="glyphicon glyphicon-trash"></span>
		  			</button>
	  			 </form>
			</div>

			
		</div>
		
	</div>

<?php if($ctr==0){$_SESSION["lastID"]=$rows["ID"]+1;} $ctr++; } ?>
</div>
</div>

<?php

if(isset($_POST["update"]))
{
	$_SESSION["updateAnnounce"]=$_POST["update"];
	header('location:update-announcement.php');
}
if(isset($_POST["delete"]))
{
	$_SESSION["delete"]=$_POST["delete"];
?>


<div class="confirm-message" id="confirm-message">
	<center>
		<p class="fade-message-text">Are you sure you want to delete?</p>
		<div class="form-group">
		<table>
			<tr>
				<td>
					<form method="post">
						<input type="hidden" name="realdelete">
						<button type="button" class="btn btn-success" onclick="this.form.submit()">	YES	</button>
					</form>
				</td>

				<td>

					<form method="post">
						<input type="hidden" name="realcancel">
						<button type="button" class="btn btn-primary" id="hidedelete" onclick="this.form.submit()">  NO	</button>
					</form>
				</td>
			</tr>
		</table>		
		</div>
		<br>
	</center>

	
</div>

<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#confirm-message").fadeOut(500);

  });
});
</script>

<?php }

if(isset($_POST["realdelete"]))
{

 	mysqli_query($conn, "delete from tbl_announcements where ID = '".$_SESSION["delete"]."'");
	header('location:announcements.php');

 }



?>