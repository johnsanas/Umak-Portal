<?php
define("UPLOAD_DIR", "uploads/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    $studentID = $_SESSION["studentID"];
   

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $_SESSION["studentID"].''.$myFile["name"]);

    $originalfilename = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"], UPLOAD_DIR . $name);


    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);

   

  mysqli_query($conn, "INSERT INTO tbluploads VALUES('', '$studentID', '$originalfilename', '$name') ");

}?>
