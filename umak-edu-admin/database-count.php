<?php

$restart_announce = mysqli_query($conn, "select * from tbl_announcements");

$ctr=0;
 while($rows=mysqli_fetch_assoc($restart_announce))
 {
 	
 	mysqli_query($conn, "update tbl_announcements set ID='$ctr' where ID = '".$rows["ID"]."'");
 	$ctr++;
 }


$restart_student = mysqli_query($conn, "select * from tblstudents");
$ctr=0;
 while($rows=mysqli_fetch_assoc($restart_student))
 {
 	
 	mysqli_query($conn, "update tblstudents set id='$ctr' where id = '".$rows["id"]."'");
 	$ctr++;
 }



$restart_studentinfo = mysqli_query($conn, "select * from tblstudentinfo");
$ctr=0;
 while($rows=mysqli_fetch_assoc($restart_studentinfo))
 {
 	
 	mysqli_query($conn, "update tblstudentinfo set id='$ctr' where id = '".$rows["id"]."'");
 	$ctr++;
 }


$restart_profilepictures = mysqli_query($conn, "select * from tblprofilepictures");
$ctr=0;
 while($rows=mysqli_fetch_assoc($restart_profilepictures))
 {
 	
 	mysqli_query($conn, "update tblprofilepictures set id='$ctr' where id = '".$rows["id"]."'");
 	$ctr++;
 }


?>