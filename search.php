<?php 
include ('config.php');
 
if (empty($_SESSION['studentID'])){ // if there is no log in user hides feautures only for log in
  $_SESSION['studentID'] = null;
  $_SESSION['hide'] = "display:none;";
  $_SESSION['firstname'] = "";
}else {               // shows the feature for log in
   $_SESSION['display'] = "display:none;";
     $_SESSION['hide'] = "";
     $studentID = $_SESSION['studentID'];
}

if(isset($_GET['search'])){
    $search = $_GET['search'];
}else{
    $search = "";
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
        <h2 id="mycloud-title">Search <?php echo  '"'.$search.'"'; ?></h2>
        <div class="col-sm-12 spacer2"></div>

       <!--Your Body Here -->

        <?php 
          //search user/account/profile
          $profile_query = mysqli_query($conn, "SELECT studentname,a.studentID,b.college,program,address,gender,birthday,email,mobile,profilepicture from tblstudents a, tblstudentinfo b where studentname like ('%$search%') AND (a.studentID = b.studentID); ");
          
          /*$profile=mysqli_fetch_assoc($profile_query);*/
          while($profile=mysqli_fetch_assoc($profile_query)){?>
          <div class="col-sm-12 remove-padding" style="<?php echo $_SESSION['hide']; ?>"> <!--just a container-->
            <div class="col-sm-1 remove-padding"><?php echo '<img class="chathead" src="data:image;base64,'.$profile["profilepicture"].' ">';?></div>
            <div class="col-sm-11 remove-padding-left font-search">
              <b><?php   echo strtoupper($profile['studentname']); ?></b><br>
              <div class="font-search-small remove-padding"><?php  echo $profile['address']; ?></div>
              <div class="font-search-small remove-padding"><?php  echo strtoupper($profile['program']); ?></div>
              <div class="font-search-small remove-padding"><?php  echo $profile['college']; ?></div>
              <div class="col-sm-12 spacer1"></div>
              <div>
                <form method="POST">
                  <input  type="hidden" name="secondID" value="<?php $secondID = $profile["studentID"]; echo $profile["studentID"]?>">
                  <button class="btn btn-default btn-sm" name="btnAddFriend" <?php friendRequest($secondID);echo $disable; if($status == "Contact Request"){echo " Style='display:none;'"; } ?>>
                    <?php friendRequest($secondID); echo $status;//calls friendRequest function ?>
                  </button>
                </form> 
                <form method="POST">
                  <input  type="hidden" name="secondID" value="<?php $secondID = $profile["studentID"]; echo $profile["studentID"]?>">  
                  <button class="btn btn-default btn-sm" name="btnAcceptFriend" style="<?php friendRequest($secondID); if($status != "Contact Request"){echo "display:none;"; }else{echo "display:;";}; ?>">
                   Accept Contact Request
                  </button>
                </form>

              </div>
              <div class="col-sm-12 spacer1"></div>
            </div>
          </div>
      <?php }?>
        <?php 
          $search_query = mysqli_query($conn, "SELECT * from tbl_announcements where title like ('%$search%'); ");

          while($searchannouncement=mysqli_fetch_assoc($search_query)){
              //limits the preview text on announcement preview 
              $countString = strlen($searchannouncement['description']);
              $limitString = $countString * 0.3; // 0.5 determines how long the text of preview
          ?>
              
          <div class="col-sm-1 remove-padding"></div>
          <div class="col-sm-11 " id="mycloud-title"></div>

          <div class="col-sm-12 spacer1"></div>
          <div class="col-sm-1 remove-padding"></div>
          <div class="col-sm-11 remove-padding-left font-search">
            <b><a href="announcement.php?announcement=<?php echo $searchannouncement["ID"]; ?>"><?php  echo $searchannouncement['title']; ?></a></b><br>
            <div class="font-search-small remove-padding"><?php  echo substr($searchannouncement['description'],0 , $limitString); ?></div>
            <div class="col-sm-12 spacer1"></div>
          </div>
      <?php }?>
        
        
        <div class="col-sm-12 spacer7"></div>

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
  //add contact
  if(isset($_POST["btnAddFriend"]))
  {
   global $search;
    
    $requestedTo = $_POST["secondID"];
    $addedBy = $studentID;
    $status = "pending";  

    $addRequest_query = "INSERT INTO tblfriends VALUES('', '$addedBy', '$requestedTo', '$status')";

    //mysqli_query error debugging
    if (mysqli_query($conn, $addRequest_query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $addRequest_query . "<br>" . mysqli_error($conn);
    }

    $search = $_GET['search'];
    $location='Location:' .'search.php?search=' . $_GET['search'];
    echo $search;
    header($location);
 
  } 

  //accept contact request
  if(isset($_POST["btnAcceptFriend"]))
  {
    global $search;
   
    $addedBy = $_POST["secondID"];
    $status = "friend";  

    $addRequest_query = "UPDATE tblfriends SET status = '$status' WHERE requestedTo = '$studentID' AND addedby = '$addedBy' ";

    //mysqli_query error debugging
    if (mysqli_query($conn, $addRequest_query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $addRequest_query . "<br>" . mysqli_error($conn);
    }

    $search = $_GET['search'];
    $location='Location:' .'search.php?search=' . $_GET['search'];
    echo $search;
    header($location);
 
  }


  function friendRequest($studentID2){
    global $studentID, $conn,$disable,$status;

    $friendRequest_query = "SELECT * FROM tblfriends WHERE (addedBy = '$studentID' AND requestedTo = '$studentID2') or (addedBy = '$studentID2' AND requestedTo = '$studentID')";

    $result = mysqli_query($conn,$friendRequest_query);
    $friendRequest = mysqli_fetch_assoc($result);

    if($friendRequest['addedBy'] != $studentID){
      if($friendRequest['status'] == 'friend'){
        $status = "<i class='glyphicon glyphicon-ok'></i> Added to Contact"; // if already added to contact
        $disable = 'disabled';
      }
      else if ($friendRequest['status'] == 'pending'){
        $status = "Contact Request"; // if already sent a contact request
        $disable = 'disabled';
      }
      else {
        $status =  "Add Contact"; // if not yet added to contact
        $disable = '';
      }
    }else{
      if($friendRequest['status'] == 'friend'){
        $status = "<i class='glyphicon glyphicon-ok'></i> Added to Contact"; // if already added to contact
        $disable = 'disabled';
      }
      else if ($friendRequest['status'] == 'pending'){
        $status = "Pending to Add Contact"; // if already sent a contact request
        $disable = 'disabled';
      }
      else {
        $status =  "Add Contact"; // if not yet added to contact
        $disable = '';
      }

    }

  }


?>
