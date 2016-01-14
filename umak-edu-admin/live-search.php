
<?php 
include 'config.php';
 if(isset($_GET['q']))
	{
	
	$q = $_GET['q'];

	$viewusers = mysqli_query($conn, "select * from tblstudents where studentID like '%".$q."%' 
    										or studentname  like '%".$q."%' or college like '%".$q."%'
    										or position like '%".$q."%'");
	
    ?>

	<table class="table table-hover table-bordered table-striped" id="firstload2">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Position</th>
        <th>College</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

	<?php while($rows=mysqli_fetch_assoc($viewusers)){?>
    
	      <tr>
	        <td><?php echo $rows["studentID"]; ?></td>
	        <td><?php echo $rows["studentname"]; ?></td>
	        <td><?php echo $rows["position"]; ?></td>
	        <td><?php echo $rows["college"]; ?></td>
	        <td><?php echo $rows["password"]; ?></td>
	        <td>

	        	<form method="POST">
		        	<input type="hidden" name="update" value="<?php echo $rows["studentID"]; ?>"/>
		        	<button type="button" class="btn btn-success" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-refresh"></span>
		  			</button>
		  		</form>
	        		
			 </td>

	        <td>
	        	<form method="POST">
		        	<input type="hidden" name="delete" value="<?php echo $rows["studentID"]; ?>"/>
		        	
				     <button type="button" class="btn btn-danger" onclick="this.form.submit()">
		    		<span class="glyphicon glyphicon-trash"></span>
		  			</button>
	  			 </form>
			 </td>
	      </tr>
     
    <?php }
    if(!$viewusers->num_rows)
	{
		echo"<tr><td colspan='7'><center><h1>NO RESULTS FOUND</h1></center></td></tr>";
	}

    	?>
 	</tbody>
  </table>


	<?php }?>
