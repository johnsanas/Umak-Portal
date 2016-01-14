
<?php 
  
  if(isset($_GET['page'])){
      $page = $_GET['page'];
  }else{
    $page = "";
  }

?>

<nav class="navbar navbar-default navbar-fixed-top" id="navbar-custom">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php?page=home" id="logo"></a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<!-- 
        <li><a href="#">Home</a></li>
        -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
    

        <li><a href="#" data-toggle="popover" data-placement="bottom" data-html='true' data-content='<form action="search.php?" method="get"><input name="search" class="form-control" id="navbar-search" type="text" placeholder="people,group etc"/></form>' ><span class="glyphicon glyphicon-search"></span> Search</a></li>
        <li <?php if($page=="home"){echo "class='active'";}?>><a href="index.php?page=home">News</a></li>
        <li <?php if($page=="mycloud"){echo "class='active'";} ?> <?php echo 'style="' . $_SESSION['hide'] . '"'; ?>><a href="mycloud.php?page=mycloud">My Cloud</a></li> 
        <li <?php if($page=="messages"){echo "class='active'";}?>  <?php echo 'style="' . $_SESSION['hide'] . '"'; ?>><a href="message.php?page=messages">Messages</a></li> 
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Academics<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">HSU</a></li>
            <li><a href="#">College of Computer Science</a></li>
            <li><a href="#">College of Arts and Science</a></li>
            <li><a href="#">College of Business Administration</a></li>
            <li><a href="#">College of Arts and Science</a></li>
            
            
          </ul>
        </li>
        <li><a href="#">Admission</a></li>
        <li><a href="#">About</a></li>
         <li class="dropdown" style="<?php echo $_SESSION['hide']; ?>">


     	<?php 

			//sets the data from the user (e.g name, id number, position)
			$query = "SELECT * FROM tblstudents WHERE studentID = '$studentID' LIMIT 1";
			$result = mysqli_query($conn,$query);

			$currentUser = mysqli_fetch_assoc($result);

			?>
			<!--sets the first name of user-->
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo "Hi, " . $currentUser['Firstname'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>