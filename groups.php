<?php 
include ('config.php');
 
if(isset($_GET['search'])){
    $search = $_GET['search'];
}else{
    $search = "";
}
$_GET['membersCount'] = null;

//counts the number of members
//same query used in viewing group members
 $viewmembers = mysqli_query($conn, "SELECT * FROM tblstudents  a, tblgroupmembers b WHERE a.studentID = b.studentID AND b.groupID='".$_SESSION["groupID"]."'");
  while($rows=mysqli_fetch_assoc($viewmembers)){
     $_GET['membersCount']++;
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
      
       <!--Your Body Here -->

      <div class="col-sm-12 bg-color">
        <div class="col-sm-12 spacer1"></div>
        <div class="col-sm-12 bg-color-white profile-picture group-banner">
            <div class="col-sm-12 spacer1"></div>

            <div class="col-sm-2 group-profile bg-color"></div>
            <div class="col-sm-7"><h2><?php echo $_SESSION["groupname"]; ?></h2></div>
            <div class="col-sm-3 text-right">
                <nav class="navbar">
                 
                    <ul class="nav navbar-nav">
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">members <?php if ($_GET['membersCount'] != 0){echo '(' . $_GET['membersCount'].')'; }?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <!--Shows Member List in list-->
                         <?php 
                            $viewmembers = mysqli_query($conn, "SELECT * FROM tblstudents  a, tblgroupmembers b WHERE a.studentID = b.studentID AND b.groupID='".$_SESSION["groupID"]."'");
                            while($rows=mysqli_fetch_assoc($viewmembers)){?>
                               <li><a href="#" class="remove-padding"><img src=<?php echo '"data:image;base64,'.$rows['profilepicture'].' "'; ?> class="chathead img-circle" /> <b><?php echo$rows["studentname"];?></b></a></li>
                               
                          <?php  }?> 
                       
                        </ul>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="col-sm-12 remove-padding">
          <nav class="navbar navbar-default">
            <div class="container-fluid remove-padding">
              <ul class="nav navbar-nav text-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Financial Analysis</a></li>
                <li><a href="#">Feedback</a></li> 
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <form method="GET">
                    <div class="search-text">
                       <div class="form-group">
                          <input type="text" class="form-control" name="add" placeholder="Search">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                       </div>
                    </div>
                  </form>
                </li>
              </ul>

            </div>
          </nav>
        </div>

        <div class="col-sm-12 remove-padding">
            
            <?php 
            
            // filters list of timeline chats based on groupID
            $timelinepost = mysqli_query($conn, "SELECT * FROM tblgrouptimeline WHERE groupID = '".$_SESSION["groupID"]."' order by id desc");
            while($rows=mysqli_fetch_assoc($timelinepost)){ 
            ?>
            <div class="col-sm-12 bg-color-white pad-sm-top">
              <div class="col-sm-1 square2"></div> 
              <div class="col-sm-11 spacer1"></div>
              <div class="col-sm-11 remove-padding-left"><b><?php echo$rows["poster"];?></b></div>
              <div class="col-sm-11 remove-padding-left" id="notif-date"><?php echo date("M d, Y")." at ".date("G:ia"); ?></div>

              <div class="col-sm-12 spacer1"></div>
              <div class="col-sm-12">
                <div class="col-sm-12 spacer1"></div>
                <?php echo$rows["timelinepost"];?>
              </div>
              <div class="col-sm-12 spacer2"></div>
            </div>
            <?php
            //show list of comments / view the list of comments

                $viewcomments = mysqli_query($conn, "SELECT * FROM tblgroupcomments WHERE postID='".$rows["id"]."'");
                while($commentrow=mysqli_fetch_assoc($viewcomments)){ 
            ?>
            <div class="col-sm-12 comment-font comment-bg pad-sm-top">
              <b><?php echo$commentrow["commentername"];?></b> <?php echo$commentrow["comment"];?>
            </div>    
                    
            <?php } ?>
            <div class="col-sm-12 spacer1 bg-color-white"></div>
            <div class="col-sm-12 remove-padding">
              <form method="POST">
                  <input type="text" class="form-control" name="comment" placeholder="comment" required>
                  <input type="hidden" name="postID" value="<?php echo $rows["id"]?>">
                  <input type="hidden" name="btncomment"> 
              </form>
            </div>
            <div class="col-sm-12 spacer2"></div>
            <?php }?>
        
        </div>

        <div class="col-sm-12 spacer7"></div>

      </div>

    <div class="col-sm-12 spacer50"></div>
    <div class="col-sm-12 spacer50"></div>

      
  </div>

  <?php include('sidebar.php');?>

</div>
<hr class="line">


<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>



</body>
</html>


<?php
  if(isset($_POST["btnpost"]))
  {
  $groupID = $_SESSION["groupID"];
  $studentID = $_SESSION["studentID"];
  $poster = $_SESSION["myname"];
  $timeline = $_POST["post"];
  $groupname = $_SESSION["groupname"];    
  $savepost = sprintf("insert into tblgrouptimeline values('', '$groupID', '$studentID', '$poster', '$timeline' )",
  mysql_real_escape_string($timeline),
  mysql_real_escape_string($poster),
  mysql_real_escape_string($studentID),
  mysql_real_escape_string($groupID)
  );


  mysqli_query($conn, $savepost);
  $savenotif = mysqli_query($conn, "insert into tblnotifications values('', '$groupID', '$poster has posted in your group: $groupname')");
  header('location:group.php');
  }
?>