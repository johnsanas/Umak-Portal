
<?php
 
	 
	 													// outputs the number of downloads
	$file = $_POST['namedownload'];  				//for the “file” to be included in the function

		if( $file == "" ) 					//if there is no file or file not found or
											//NULL then it executes the next lines of codes. 
			{
			echo "<html><title>No file has been found</title></body></html>"; 
											//outputs this line of code						
			exit;    						//terminates execution of the code in the program
			} elseif ( ! file_exists( $file ) )      // if the filename chosen exists then 
											//		this code will execute the next lines of codes
			{
			echo "<html><title>please choose a file to Download</title><body>";
			exit;  	 						//terminates execution of the code in the program
			};

			header("Content-Type: application/force-download"); // this code identifies the type
											// of media the user chooses, if he choose the 
											//audio format then it identifies according to 
											//the .mp3 format.
			header("Content-Disposition: attachment; filename=\"".basename($file)."\";" );  
									//this line of code suggests the filename that we want to saved.
			readfile("$file");	// this line of code does the reading and interpreting 
								//of file so that it will be viewed in the web browser
			exit();				//terminates execution of the code in the program
			

?>




