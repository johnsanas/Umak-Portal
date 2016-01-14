<?php 
include ('config.php');


if(isset($_GET['announcement'])){
  $announcement = $_GET['announcement'];
}

$query = "SELECT * FROM tbl_announcements where ID = $announcement limit 1";
$result = mysqli_query($conn,$query);

$articles = mysqli_fetch_assoc($result);


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
        <h2 id="mycloud-title"><?php  echo $articles['title']; ?></h2>
        <div>Posted: <?php  echo $articles['date']; ?></div>
        <div class="col-sm-12 spacer2"></div>

       <!--Your Body Here -->
       <div class="col-sm-12">
          <?php echo '<img class="img-responsive" src="data:image;base64,'.$articles["announcementImage"].' ">';?>
       </div>

        <div class="col-sm-12"><?php  echo $articles['description']; ?></div>

    
      </div>

    <div class="col-sm-12 spacer50"></div>
    <div class="col-sm-12 spacer50"></div>

      
  </div>

  <?php include('sidebar.php');?>

</div>
<hr class="line">


</body>
</html>
