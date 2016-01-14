<?php include'header.php'; 

$events = mysqli_query($conn, "select * from tbl_events order by id DESC");
?>

<script>
$(document).ready(function(){
  
    $("#add-event").hide();
  
});
</script>


<script>
$(document).ready(function(){
  $("#add_event").click(function(){
   
    $("#add-event").fadeToggle(500);
  });
});
</script>



<?php #===============MESSAGE======================

if($_SESSION["updatemessage"]!=""){?>
<script>
	 
     $(document).ready(function()
     {
  		 $("#message").fadeOut(5000);
     });
  	 
</script>

<div class="fade-message" id="message">
	<center>
		<p class="fade-message-text">  <?php echo$_SESSION["updatemessage"]." ";?> <span class="glyphicon glyphicon-ok"></p>
	</center>	
</div>

<?php $_SESSION["updatemessage"]=""; }?>



<div class="row">
<div class="col-md-3 col-md-offset-0 side-navigation">
	 <div class="list-group">
			  <a href="admin-panel.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_user"];?></span> Users</a>
			  <a href="announcements.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
			  <a href="events.php" class="list-group-item active"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
			  <a href="groups.php" class="list-group-item "><span class="badge"><?php echo$_SESSION["no_group"];?></span>Groups</a>
			  <a href="#" class="list-group-item">Class</a>
			  <a href="ip.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
		</div>
</div>



<div class="col-md-9 col-md-offset-0 table-navigation">
<div class="form-group">


	<form method="POST">
		<div class="col-md-5 col-md-offset-0">
			 <div class="form-group has-feedback">
			    <input type="text" class="form-control input-lg" placeholder="Search" name="searchtext">
			    <span class="glyphicon glyphicon-search form-control-feedback"></span>
	 		 </div>
		</div>
	</form>

		<div class="col-md-4 col-md-offset-3">
			 <div class="form-group">
			    <a href="#" id="add_event" class="btn btn-primary btn-lg btn-block">Add New Event 
			       <span class="glyphicon glyphicon-film"></span>
			    </a>
	 		 </div>


		</div>

<?php 
if(isset($_POST["searchtext"]))
{
 $events = mysqli_query($conn, "select * from tbl_events where eventname like '%".$_POST["searchtext"]."%' ");	
}

?>
	<br><br>
	<table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Event</th>
        <th><center>Edit</center></th>
        <th><center>Delete</center></th>
       
      </tr>
    </thead>
    <tbody>
    <?php while($rows=mysqli_fetch_assoc($events)){?>
    <tr>
    
    	<td>
    		<?php echo $rows["eventname"];?>
    	</td>

    	 <td>
	      <center>
	        	<form method="POST">
		        	<input type="hidden" name="update" value="<?php echo $rows["id"]; ?>"/>
		        	<button type="button" class="btn btn-success" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-refresh"></span>
		  			</button>
		  		</form>
	        </center>		
			 </td>

	        <td>
	        <center>
	        	<form method="POST">
		        	<input type="hidden" name="delete" value="<?php echo $rows["id"]; ?>"/>
		        	
				     <button type="button" class="btn btn-danger" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-trash"></span>
		  			</button>
	  			 </form>
	  		</center>
			 </td>
  
    </tr>
    <?php }?>
    </tbody>
    </table>

<div class="add-event" id="add-event">
	<br><br>
	<div class="add-event-container">
	<form method="POST">
		<div class="form-group">
		    <input class="form-control input-lg" type="text" placeholder="Enter Event Name" name="event">
		</div>

        	<input type="hidden" name="save"/>
		    <button type="button" class="btn btn-info btn-lg" onclick="this.form.submit()">SAVE 
    			<span class="glyphicon glyphicon-floppy-save"></span>
  			</button>
	  	</form>
	</div>


</div>
</div>

</div>

<?php 
#============================BUTTON UPDATE====================
if(isset($_POST["update"])){
	$_SESSION["saveupdate"]=$_POST["update"];
	$events = mysqli_query($conn, "select * from tbl_events where id='".$_POST["update"]."'");?>
<div class="add-event" id="add-event">
	<br><br>
	<div class="add-event-container">
	<?php while($rows=mysqli_fetch_assoc($events)){?>
	<form method="POST">
		<div class="form-group">
		    <input class="form-control input-lg" type="text" placeholder="Enter Event Name" name="updateevent" value="<?php echo$rows["eventname"];?>">
		</div>

        	<input type="hidden" name="saveupdate"/>
		    <button type="button" class="btn btn-info btn-lg" onclick="this.form.submit()">UPDATE 
    			<span class="glyphicon glyphicon-refresh"></span>
  			</button>
	  	</form>
	  <?php }?>	
	</div>


</div>
<?php }?>

<?php #==========================BUTTON DELETE=====================
if(isset($_POST["delete"])){
	$_SESSION["delete"] = $_POST["delete"];?>

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

<?php } #==================END OF DELETE==========?>



<?php

if(isset($_POST["save"]))
{
	mysqli_query($conn, "insert into tbl_events values('', '".$_POST["event"]."')");
	header('location:events.php');
}

if(isset($_POST["saveupdate"]))
{
	mysqli_query($conn, "update tbl_events set eventname='".$_POST["updateevent"]."' where id='".$_SESSION["saveupdate"]."'");
	$_SESSION["updatemessage"]="Event Successfully updated!";
	header('location:events.php');
}


if(isset($_POST["realdelete"]))
{
	mysqli_query($conn, "delete from tbl_events where id = '".$_SESSION["delete"]."'");
	$_SESSION["updatemessage"]="Event Successfully Deleted!";
	header('location:events.php');
}

?>

