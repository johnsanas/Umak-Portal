<?php include'header.php';

	$groups=mysqli_query($conn, "select * from tblgroups");

 ?>


<div class="row">
	<div class="col-md-3 col-md-offset-0 side-navigation" >
		 <div class="list-group">
			  <a href="admin-panel.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_user"];?></span> Users</a>
			  <a href="announcements.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_announcement"];?></span> Announcements</a>
			  <a href="events.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_event"];?></span>Events</a>
			  <a href="groups.php" class="list-group-item active"><span class="badge"><?php echo$_SESSION["no_group"];?></span>Groups</a>
			  <a href="#" class="list-group-item">Class</a>
			  <a href="ip.php" class="list-group-item"><span class="badge"><?php echo$_SESSION["no_ip"];?></span>IP Address</a>
		</div>
	</div>

	<div class="col-md-9 col-md-offset-0 table-navigation">

		<div class="form-group">
		<form method="get">
			<div class="col-md-5 col-md-offset-0">
				 <div class="has-info has-feedback">
				    <input type="text" class="form-control input-lg" placeholder="Search">
				    <span class="glyphicon glyphicon-search form-control-feedback"></span>
		 		 </div>
			</div>
		</form>

	
		</div>

	<div class="marginer-top">
		<table class="table table-hover table-bordered table-striped">
		    <thead>
		      <tr>
		        <th>Group ID</th>
		        <th>Group Name</th>
		        <th>Members</th>
		        <th><center>View</center></th>
		        <th><center>Delete</center></th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while($rows=mysqli_fetch_assoc($groups)){?>
		    	<tr>
		    		<td>
		    			<?php echo $rows["groupID"];?>
		    		</td>

		    		<td>
		    			<?php echo $rows["groupname"];?>
		    		</td>

		    		<td>
		    			<?php
		    				$members = mysqli_query($conn, "select * from tblgroupmembers where groupID = '".$rows["groupID"]."'");
		    				$member_ctr=0;
		    				while($sql=mysqli_fetch_assoc($members)){$member_ctr++;}

		    				echo $member_ctr;
		    			?>
		    		</td>

		    		<td>
		    		<center>	
		        	<form method="POST">
			        	<input type="hidden" name="update" value="<?php echo $rows["studentID"]; ?>"/>
			        	<button type="button" class="btn btn-info" onclick="this.form.submit()">
			    		<span class="glyphicon glyphicon-file"></span>
			  			</button>
			  		</form>
		        	</center>	
				 </td>

		        <td>
		        <center>
		        	<form method="POST">
			        	<input type="hidden" name="delete" value="<?php echo $rows["studentID"]; ?>"/>
			        	
					     <button type="button" class="btn btn-danger" onclick="this.form.submit()">
			    		<span class="glyphicon glyphicon-trash"></span>
			  			</button>
		  			 </form>
				 </td>
				 </center>

		    	</tr>

		    <?php }?>
		    </tbody>
	    </table>
    </div>
	</div>
</div>