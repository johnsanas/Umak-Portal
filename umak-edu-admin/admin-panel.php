<?php include'header.php';


	  $viewusers = mysqli_query($conn, "select * from tblstudents");
	  $_SESSION['btnblocked']="unblocked";



	  include'admin-panel-script.php';

?>



<div class="row" id="fullhide">
	<div class="col-md-3 col-md-offset-0 side-navigation" >
		  <div class="list-group">
			  <a href="admin-panel.php" class="list-group-item active"><span class="badge"><?php echo$_SESSION["no_user"];?></span> Users</a>
			  <a href="announcements.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
			  <a href="events.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
			  <a href="groups.php" class="list-group-item "><span class="badge"><?php echo$_SESSION["no_group"];?></span>Groups</a>
			  <a href="#" class="list-group-item">Class</a>
			  <a href="ip.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
		</div>
	</div>




<div class="col-md-9 col-md-offset-0 table-navigation"  >
<div class="form-group">
		<form method="get">
			<div class="col-md-5 col-md-offset-0">
				 <div class="has-feedback">
				    <input type="text" class="form-control input-lg" placeholder="Search" name="users" onkeyup="showUser(this.value)">
				   
		 		 </div>
			</div>
		</form>

			<div class="col-md-4 col-md-offset-3">
				 
				    <a href="#" id="btnadduser" class="btn btn-primary btn-lg btn-block">Add New User
				    <span class="glyphicon glyphicon-user"></span>
				    </a>
			</div>
</div>
	<br><br><br>
	
	<!--LIVE SEARCH OUTPUT-->
	<div id="txtHint"> </div>
	<!--LIVE SEARCH OUTPUT-->


	<table class="table table-hover table-bordered table-striped" id="firstload">
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
    <?php 


  
    while($rows=mysqli_fetch_assoc($viewusers)){?>
    
	      <tr>
	        <td><?php echo $rows["studentID"]; ?></td>
	        <td><?php echo $rows["studentname"]; ?></td>
	        <td><?php echo $rows["position"]; ?></td>
	        <td><?php echo $rows["college"]; ?></td>
	        <td><?php echo $rows["password"]; ?></td>
	        <td>

	        	<form method="POST">
		        	<input type="hidden" name="update" value="<?php echo $rows["studentID"]; ?>"/>
		        	<button type="button" class="btn btn-success" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-refresh"></span>
		  			</button>
		  		</form>
	        		
			 </td>

	        <td>
	        	<form method="POST">
		        	<input type="hidden" name="delete" value="<?php echo $rows["studentID"]; ?>"/>
		        	
				     <button type="button" class="btn btn-danger" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-trash"></span>
		  			</button>
	  			 </form>
			 </td>
	      </tr>
     
    <?php }?>
    </tbody>
  </table>
  
</div>

</div>













<?php
if(isset($_POST["update"]))
{
	$_SESSION["updateID"]=$_POST["update"];
	header('location:update-user.php');
}


else if(isset($_POST["delete"])){
	$_SESSION["delete"] = $_POST["delete"];

	?>


	

<div class="confirm-message" id="confirm-message">
	<center>
		<p class="fade-message-text">Are you sure you want to delete?</p>
		<div class="col-md-4 col-md-offset-4 form-group">
		<table>
			<tr>
				<td class="col-md-1 ">
					<form method="post">
						<button type="submit" class="btn btn-success btn-lg btn-block" name="realdelete">	YES	<span class="glyphicon glyphicon-ok"></span></button>
					</form>
				</td>

				<td class="col-md-1">
					<form method="post">		
						<button type="submit" class="btn btn-primary btn-lg btn-block" id="hidedelete" name="realcancel">  NO	<span class="glyphicon glyphicon-remove"></span></button>
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




<?php } #==========END OF ISSET DELETE=============?>




<div class="add-user" id="add-user">
		
	<div class="add-user-container">
	<form method="POST" enctype="multipart/form-data">
	 
	 <div class="form-group">				
		<input type="file" name="image" class="btn btn-default btn-block"  />
	</div>	

	  <div class="form-group">
	    <input class="form-control input-lg" type="text" placeholder="ID Number" name="ID">
	  </div>

	  <div class="form-group">
	    <input class="form-control input-lg" type="text" placeholder="First Name" name="fname">
	  </div>

	  <div class="form-group">
	    <input class="form-control input-lg" type="text" placeholder="Last Name" name="lname">
	  </div>

	  <div class="form-group">
	    <input class="form-control input-lg" type="text" placeholder="Middle Name" name="mname">
	  </div>

	  <div class="form-group">
	    <select class="form-control input-lg" name="position">
	    <option class="dropdown-menu" value="Position">Position</option>
	    <option value="Student">Student</option>
	    <option value="Professor">Professor</option>
	    <option value="Administrator">Administrator</option>
	  </select>
	  </div>

	  <div class="form-group">
	    <input class="form-control input-lg" type="text" placeholder="College" name="college">
	  </div>

	  <div class="form-group">
	 
	  	<button type="submit" name="save"  class="btn btn-primary btn-block btn-lg" onclick="this.form.submit()">SAVE 
	  			<span class="glyphicon glyphicon-floppy-save"></span>
		</button>
	  </div>

	 </form>

	</div>
</div>



<?php 
	 if(isset($_POST["realdelete"]))
	 {
		mysqli_query($conn, "delete from tblstudents where studentID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tblprofilepictures where studentID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tblonline where studentID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tblstudentinfo where studentID='".$_SESSION["delete"]."'");

		mysqli_query($conn, "delete from tblgroupcomments where commenterID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tblgroupmembers where studentID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tblgrouptimeline where studentID='".$_SESSION["delete"]."'");
		mysqli_query($conn, "delete from tbluploads where studentID='".$_SESSION["delete"]."'");

		
		header('location:admin-panel.php');

	}
	else if(isset($_POST["realcancel"]))
	{
		header('location:admin-panel.php');
	}	


  #===========NEW USER==================

	
$alphabet = 'BCDEFGHIJKLMNOPQRSTUVWXYZ123456789076543321';
$pass = array(); 
$alphaLength = strlen($alphabet) - 1; 
for ($i = 0; $i < 6; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
$password = implode($pass); 






if(isset($_POST["save"])){



$studentID = $_POST["ID"];
$fname= $_POST["fname"];
$lname= $_POST["lname"];
$mname= $_POST["mname"];
$fullname = $lname." ".$fname." ".$mname;
$position= $_POST["position"];
$college= $_POST["college"];


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
        	$image= addslashes($_FILES['image']['tmp_name']);
            $image= file_get_contents($image);
            $image= base64_encode($image);
        	
			mysqli_query($conn, "insert into tblstudents values('', '$studentID', '$fname', '$lname', '$mname','$fullname', '$position', '$college', '$password','$image')");
			mysqli_query($conn, "insert into tblprofilepictures values('', '$studentID', '')");
			mysqli_query($conn, "insert into tblonline values('', '$studentID', 'offline')");
			mysqli_query($conn, "insert into tblstudentinfo values('', '$studentID', '', '', '', '', '', '', '', '')");
			$_SESSION["updatemessage"]="New User Successfully Added!";


        }

header('location:admin-panel.php');

}


?>
 
