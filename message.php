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
			  <h2 id="mycloud-title">Messaging</h2>
        <div class="remove-padding">	 		
          <div class="col-sm-8 bg-color-white remove-padding">
            <!--Full converstion-->
             <?php
              //auto selects showing of full convsersation/convo
              if (empty($_POST['secondID'])){
                $auto_query = mysqli_query($conn, "SELECT * FROM tblmessages  WHERE (studentID1='$studentID') order by DateTime desc limit 1");
                while($autoselected=mysqli_fetch_assoc($auto_query)){
                    $_POST['secondID']  = $autoselected['studentID2'];
                    $_SESSION["viewtextarea"]='true';
                    $_SESSION["secondID"]=$_POST["secondID"];
                }
             
             
              }

              //selects full conversation/convo
              if(isset($_POST["btnnewmsg"]))
              {   $_SESSION["viewtextarea"]='true';
                  $_SESSION["secondID"]=$_POST["secondID"];
                  $_SESSION["secondname"]=$_POST["btnnewmsg"];
               
              }

                  $pm = mysqli_query($conn, "SELECT * FROM tblmessages a, tblstudents b WHERE ((a.studentID1='$studentID') and a.studentID2 = '".$_SESSION["secondID"]."')" . " AND a.sender = concat(b.lastname,' ',b.firstname) order by a.DateTime");

              while($rows=mysqli_fetch_assoc($pm)){
              ?>
                <div class="col-sm-12 spacer1 remove-padding"></div>
                <div class="col-sm-8">
                    <img src=<?php echo '"data:image;base64,'.$rows['profilepicture'].' "'; ?> class="chathead img-circle" />
                    <b><?php echo $rows["sender"]; ?></b>
                </div>  
                <div class="col-sm-4 datetime-font remove-left text-right">
                    <?php echo $rows["DateTime"]; ?>
                </div>
                <div class="col-sm-12 remove-padding"></div>
                <div class="col-sm-12">
                    <?php echo $rows["message"];?>
                </div>
                                  
              <?php } //end of while PM?>
          </div>
          <div class="col-sm-4 remove-padding-right">
            <div class="bg-color-white">

                <!--show list of chatheads-->
                <div class="list-group">
                 <?php 
                      $viewmessages = mysqli_query($conn, "SELECT studentname, studentID2, profilepicture from tblstudents a, tblmessages b where a.studentID = b.studentID2 and b.studentID1 = '".$_SESSION["studentID"]."' group by studentname order by studentname asc; ");
                      
                      while($rows=mysqli_fetch_assoc($viewmessages)){
                        
                  ?>

                  <form method="POST">
                       <input  type="hidden" name="secondID" value="<?php echo $rows["studentID2"]?>">
                      
                       <button <?php if($_POST['secondID']==$rows['studentID2']){echo "class='selected-chat msgto list-group-item remove-padding'";} else {echo "class='msgto list-group-item'"; }?> name="btnnewmsg">
                          <img src=<?php echo '"data:image;base64,'.$rows['profilepicture'].' "'; ?> class="chathead img-circle" />
                          <?php echo $rows["studentname"] ;?>
                        </button>
                  </form>
                
                 <?php }?>
                

                </div>
            </div>
          </div>

          <div class="col-sm-12 spacer2"></div>
          <!--textarea-->
          <div class="col-sm-12 remove-padding form-group">
            <?php if($_SESSION["viewtextarea"]=='true'){?>
            <form method="POST">

                <div class="col-sm-8 remove-padding">
                    <textarea type="text" class="form-control msg" name="newsms" rows="3" id="comment"></textarea>
                    <div class="col-sm-12 spacer1"></div> 
                    <button class="reply" name="btnsend">Send</button>
                </div>
            </form>     

            <?php }?>
          </div>
        </div>    

        <div class="col-sm-12 spacer2"></div>
        <div class="col-sm-12 spacer1"></div>
    

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

if(isset($_POST["btnsend"]))
{
    $id1 = $_SESSION["studentID"];
    $id2 = $_SESSION["secondID"];

    $sender = $_SESSION["myname"];
    $msg = $_POST["newsms"];
    $save = mysqli_query($conn, "INSERT INTO tblmessages VALUES('', '$id1', '$id2', '$sender', '$msg' , now())");
    $save2 = mysqli_query($conn, "INSERT INTO tblmessages VALUES('', '$id2', '$id1', '$sender', '$msg' , now())");
    //sadyang double po ang pagsave, for message purposes, wag mag alala

    header('location:message.php');
}

?>