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
			  <h2 id="mycloud-title">My Cloud</h2>
        <div class="remove-padding">	 		
          <div class="col-sm-9 remove-padding">
            <button type="button" class="btn btn-primary btn-md" href="#" role="button" data-toggle="modal" data-target="#myModal">Add File</button>
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

        <?php
          if (isset($success)) {
            if (!$success) { 
            echo '
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <b>File not saved !<br>Try uploading file again</b>
            </div>';
            }
          }
        ?>
        <!-- Modal -->
        <div id="myModal" class="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <form  method="post" enctype="multipart/form-data"> 
                <div class="modal-header">
                  <button type="reset" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload to UMak Cloud</h4>
                </div>
                <div class="modal-footer">
                    <input type="file" class="btn btn-primary" name="myFile">
                    <button type="submit" class="btn btn-primary" value="Upload">Upload</button>
                    <?php include('upload.php');?>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-sm-12 spacer2"></div>

        <div class="col-sm-12 remove-padding" id="recent">Recent</div>

        <table class="table table-hover">


          <thead>
            <tr>
              <th>Name</th>
              <th>Date</th>
              <th>Size</th>
            </tr>
          </thead>
          <tbody>
            <!--start of php-->
            <?php 
              

                if(isset($_GET['search'])){

                  $search = $_GET['search'];
                  $myfiles = mysqli_query($conn,"SELECT * FROM tbluploads WHERE studentID LIKE '$studentID' AND originalfilename LIKE ('%$search%')");

                }else{
                  $myfiles = mysqli_query($conn, "SELECT * FROM tbluploads WHERE studentID LIKE '$studentID'"); 
                }
                while($rows=mysqli_fetch_assoc($myfiles)){?><!--end of php-->
                    <?php 
                      $passStudentId = $rows["originalfilename"]; 
                    ?>

                  <tr>
                    <td><?php echo$rows["originalfilename"]; ?></td>
                    <td>12/01/15</td>
                    <td>2mb</td>
                  </tr>
            <?php }?> 

          </tbody>
        </table>
       <?php 
          if (!isset($passStudentId)){
            echo "<h3>No files found</h3>";
          }


        ?>

        



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