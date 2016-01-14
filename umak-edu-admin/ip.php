<?php include'header.php'; 
	
	$ip = mysqli_query($conn, "select * from tbl_ip where status='".$_SESSION["btnblocked"]."' order by bandwit desc");

?>

<div class="row">
	<div class="col-md-3 col-md-offset-0 side-navigation" >
		  <div class="list-group">
			  <a href="admin-panel.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_user"];?></span> Users</a>
			  <a href="announcements.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
			  <a href="events.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
			  <a href="groups.php" class="list-group-item "><span class="badge"><?php echo$_SESSION["no_group"];?></span>Groups</a>
			  <a href="#" class="list-group-item">Class</a>
			  <a href="ip.php" class="list-group-item active"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
		</div>
	</div>


<div class="col-md-9 col-md-offset-0 table-navigation"  >
	<div class="form-group">
			<form method="get">
				<div class="col-md-5 col-md-offset-0">
					 <div class="has-feedback">
					    <input type="text" class="form-control input-lg" placeholder="Search">
					    <span class="glyphicon glyphicon-search form-control-feedback"></span>
			 		 </div>
				</div>
			</form>

			<div class="col-md-3">
			<form method="post">
			<?php if($_SESSION['btnblocked']=="unblocked"){?>					 
					    <button name="blocked" type="submit" class="btn btn-danger btn-lg btn-block">Go to Blocked
					    <span class="glyphicon glyphicon-ban-circle"></span>
					    </button>
			<?php } else if($_SESSION['btnblocked']=="blocked"){?>
						<button name="unblocked" type="submit" class="btn btn-success btn-lg btn-block">Go to Unblocked
					    <span class="glyphicon glyphicon-ok-circle"></span>
					    </button>
			<?php }?>			    
			</form>					    
			</div>

			<div class="col-md-3">
			<form method="post">
			<?php if($_SESSION['btnblocked']=="unblocked"){?>					 
					    <button name="clear_unblocked" type="submit" class="btn btn-info btn-lg btn-block">Clear Unblocked IP
					    <span class="glyphicon glyphicon-tasks"></span>
					    </button>
			<?php } else if($_SESSION['btnblocked']=="blocked"){?>
						<button name="clear_blocked" type="submit" class="btn btn-info btn-lg btn-block">Clear blocked IP
					    <span class="glyphicon glyphicon-tasks"></span>
					    </button>
			<?php }?>	

					    
			</form>					    
			</div>
	</div>	
	<div class="marginer-top"></div>
	<table class="table table-hover table-bordered table-striped" id="firstload">
    <thead>
      <tr>
        <th>IP ADDRESS</th>
        <th>Bandwit</th>
        <th><center>Block</center></th>
        
      </tr>
    </thead>
    <tbody>
    <?php while($rows=mysqli_fetch_assoc($ip)){?>
    <tr>
    	<td>
    		<?php echo $rows["ipaddress"];?>
    	</td>
    	<td>
    		<?php echo $rows["bandwit"];?>
    	</td>

    	 <td>
    	 <center>
	        	<form method="POST">
	        		<input type="hidden" name="ip_id" value="<?php echo $rows["id"]; ?>"/>
	        		<?php if($_SESSION['btnblocked']=="unblocked"){?>					 
					    <button name="action_blocked" type="submit" class="btn btn-danger btn-lg">
					    <span class="glyphicon glyphicon-ban-circle"></span>
					    </button>
					<?php } else if($_SESSION['btnblocked']=="blocked"){?>
						<button name="action_unblocked" type="submit" class="btn btn-success btn-lg">
					    <span class="glyphicon glyphicon-ok-circle"></span>
					    </button>
					<?php }?>

		        	
	  			 </form>
	  	</center>
		</td>

    </tr>
    <?php }?>
    </tbody>
    </table>
</div>



</div>

<?php

if(isset($_POST["blocked"]))
{
	$_SESSION["btnblocked"]="blocked";

	header('location:ip.php');
}
if(isset($_POST["unblocked"]))
{
	$_SESSION["btnblocked"]="unblocked";

	header('location:ip.php');
}	

if(isset($_POST["action_blocked"]))
{
	mysqli_query($conn,"update tbl_ip set status='blocked' where id = '".$_POST["ip_id"]."'");
	header('location:ip.php');
}

if(isset($_POST["action_unblocked"]))
{
	mysqli_query($conn,"update tbl_ip set status='unblocked' where id = '".$_POST["ip_id"]."'");
	header('location:ip.php');
}

if(isset($_POST["clear_blocked"]))
{
	mysqli_query($conn,"delete from tbl_ip where status='blocked'");
	header('location:ip.php');
}

if(isset($_POST["clear_unblocked"]))
{
	mysqli_query($conn,"delete from tbl_ip where status='unblocked'");
	header('location:ip.php');
}
?>