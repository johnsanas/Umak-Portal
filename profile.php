<?php 
include ('config.php');

if(!isset($_SESSION['studentID'])){
 header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>University of Makati</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <link href="css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="js/ninja-slider.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css" >
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

<?php include('navigation.php');?>
  
<div class="col-sm-12 spacer8"></div> 
<div class="container">
   <div class="row">
    <div class="col-sm-8">
        
      <div class="col-sm-12 bg-color" id="mycloud">
        <h2 id="mycloud-title">Profile <button type="button" class="btn btn-primary btn-md" href="#" role="button" data-toggle="modal" data-target="#myModal">Change Password</button></h2>
        <div class="remove-padding">      
          <div class="col-sm-9 remove-padding">
      
          </div>
          <div class="col-sm-3 remove-padding">
            <form method="GET">
              <div class="search-text">
                 <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                 </div>

              </div>
            </form>
          </div>
        </div>    

        <!-- Modal -->
        <div id="myModal" class="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <form  method="post" enctype="multipart/form-data"> 
                <div class="modal-header">
                  <button type="reset" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <div class="col-sm-4"><label>Current Password</label></div>
                        <div class="col-sm-8"><input type="password" name="oldpass" class="inputs form-control" required></div>
                        
                        <div class="col-sm-4"><label>New Password</label></div>
                        <div class="col-sm-8"><input type="password"name="newpass" class="inputs form-control" required></div>
                        
                        <div class="col-sm-4"><label>Re-enter Password</label></div>
                        <div class="col-sm-8"><input type="password" name="repass" class="inputs form-control"required></div>

                        <div class="col-sm-12 spacer2"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8"><input type="submit" name="changepass" class="btn btn-default" value="Change"></div>
                    <form>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-sm-12 spacer2"></div>

       <!--Your Body Here -->

        <?php 
                $profile_query = mysqli_query($conn, "SELECT studentname,a.studentID,a.college,program,address,gender,birthday,email,mobile from tblstudents a, tblstudentinfo b where a.studentID = '$studentID' AND b.studentID = '$studentID' limit 1; ");
                    
                $profile=mysqli_fetch_assoc($profile_query);

        ?>

       <div class="col-sm-3"><b>College</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['college']); ?></div>
       
       <div class="col-sm-3"><b>Program/Major</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['program']); ?></div>
       
       <div class="col-sm-3"><b>Name</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['studentname']); ?></div>
     
       <div class="col-sm-3"><b>Address</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['address']); ?></div>

       <div class="col-sm-3"><b>Contact No.</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['mobile']); ?></div>
             
       <div class="col-sm-3"><b>Student Number</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['studentID']); ?></div>
       
       <div class="col-sm-3"><b>Gender</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['gender']); ?></div>

       <div class="col-sm-3"><b>Date of Birth</b></div>
       <div class="col-sm-9"><?php  echo strtoupper($profile['birthday']); ?></div>
 

        <div class="col-sm-12 spacer1"></div>
    
        <div class="col-sm-12"><a href="#"><u>Update Info</a></div>
        <div class="col-sm-12 spacer2"></div>
      </div>

    <div class="col-sm-12 spacer50"></div>
    <div class="col-sm-12 spacer50"></div>

      
  </div>

  <?php include('sidebar.php');?>

</div>
<hr class="line">


</body>
</html>

 <?php 
    if(isset($_POST["changepass"]))
    {
        $pass = $_POST["repass"];
        $studentID = $_SESSION["studentID"];

        $checkcurrent = mysqli_query($conn, "SELECT * FROM tblstudents WHERE password='".$_POST["oldpass"]."' and studentID = '".$_SESSION["studentID"]."'");

        if($checkcurrent->num_rows)
        {
            if($_POST["newpass"]==$_POST["repass"])
            {
                echo"<script>alert('Password Successfully Change');</script>";
                mysqli_query($conn, "UPDATE tblstudents SET password='$pass' WHERE studentID = '$studentID'");
            }
            else
            {echo"<script>alert('new password not matched');</script>";}
        }
        else
        {
            echo"<script>alert('Old password not matched');</script>";
        }
    } 


    if(isset($_POST["updateinfobtn"]))
        {
        echo"<script>alert('Info Suuccessfully Updates');</script>";
        $year = $_POST["year"];
        $program = $_POST["program"];
        $gender = $_POST["gender"];
        $bio = $_POST["bio"];
        $birthday = $_POST["birthday"];
        $hobby= $_POST["hobby"];
        $email  = $_POST["email"];
        $mobile = $_POST["mobile"];
        $studentID = $_SESSION["studentID"];
        mysqli_query($conn, "UPDATE tblstudentinfo SET year='$year', program='$program', gender='$gender', bio='$bio',
                    birthday='$birthday', hobby='$hobby', email='$email', mobile='$mobile' WHERE studentID ='$studentID' ");

    }
    ?>

