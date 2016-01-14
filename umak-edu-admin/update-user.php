<?php include'header.php';

$updateinfo = mysqli_query($conn, "select * from tblstudents where studentID = '".$_SESSION["updateID"]."'");

?>

<div class="col-md-3 col-md-offset-0 side-navigation">
	 <div class="list-group">
		  <a href="admin-panel.php" class="list-group-item  active"><span class="badge"><?php echo$_SESSION["no_user"];?></span>Users</a>
		  <a href="announcements.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
		  <a href="events.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
		  <a href="#" class="list-group-item">Groups</a>
		  <a href="#" class="list-group-item">Class</a>
		  <a href="ip.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
	</div>
</div>

<div class="new-user-container">
<?php while($rows=mysqli_fetch_assoc($updateinfo)){?>
<form method="POST">
 
  <div class="form-group">
    <label for="idno">ID NUMBER</label>
    <input class="form-control input-lg" type="text" id="idno" placeholder="ID Number" name="userID" value="<?php echo $rows["studentID"]; ?>">
  </div>

  <div class="form-group">
  <label for="name">FULL NAME</label>
    <input id="name" class="form-control input-lg" type="text" placeholder="Full Name" name="fullname" value="<?php echo $rows["studentname"]; ?>">
  </div>

  <div class="form-group">
  <label for="position">POSITION</label>
  <select id="position" class="form-control input-lg" name="position">
    <option value="<?php echo $rows["position"]; ?>"><?php echo $rows["position"]; ?></option>
    <option value="Position">Position</option>
    <option value="Student">Student</option>
    <option value="Professor">Professor</option>
    <option value="Administrator">Administrator</option>
  </select>
  </div>

  <div class="form-group">
  <label for="college">COLLEGE</label>
    <input id="college" class="form-control input-lg" type="text" placeholder="College" name="college" value="<?php echo $rows["college"]; ?>">
  </div>

  <div class="form-group">
  <label for="pass">PASSWORD</label>
    <input id="pass" class="form-control input-lg" type="text" placeholder="Password" name="password" value="<?php echo $rows["password"]; ?>">
  </div>

  <div class="form-group">
  <input type="hidden" name="update" />
  	<button type="button" class="btn btn-primary btn-block btn-lg" onclick="this.form.submit()">UPDATE 
  			<span class="glyphicon glyphicon-refresh"></span>
	</button>
  </div>

 </form>
<?php } ?>
</div>






<?php
if(isset($_POST["update"]))
{

  $userID = $_POST["userID"];
  
  $fullname = $_POST["fullname"];
  $position = $_POST["position"];
  $college = $_POST["college"];
  $password = $_POST["password"];

  mysqli_query($conn, "update tblstudents set studentID='$userID', studentname = '$fullname', position='$position', college='$college', password='$password' where  studentID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblprofilepictures set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblonline set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblstudentinfo set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");

  mysqli_query($conn, "update tblgroupcomments set commenterID='$userID' where commenterID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblgroupmembers set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblgrouptimeline set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tbluploads set studentID='$userID' where  studentID='".$_SESSION["updateID"]."'");

  mysqli_query($conn, "update tblmessages set studentID1='$userID' where studentID1='".$_SESSION["updateID"]."'");
  mysqli_query($conn, "update tblmessages set studentID2='$userID' where studentID2='".$_SESSION["updateID"]."'");


  $_SESSION["updatemessage"]="User's Information Successfully Updated!";
  header('location:admin-panel.php');
}


?>

