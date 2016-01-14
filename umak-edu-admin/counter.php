<?php


$usersctr = mysqli_query($conn, "select * from tblstudents");
$_SESSION["no_user"]=0; 
while($rows=mysqli_fetch_assoc($usersctr)){$_SESSION["no_user"]++;}

$announcectr = mysqli_query($conn, "select * from tbl_announcements");
$_SESSION["no_announcement"]=0; 
while($rows=mysqli_fetch_assoc($announcectr)){$_SESSION["no_announcement"]++;}

$eventctr = mysqli_query($conn, "select * from tbl_events");
$_SESSION["no_event"]=0; 
while($rows=mysqli_fetch_assoc($eventctr)){$_SESSION["no_event"]++;}

$groupctr = mysqli_query($conn, "select * from tblgroups");
$_SESSION["no_group"]=0; 
while($rows=mysqli_fetch_assoc($groupctr)){$_SESSION["no_group"]++;}

$ipctr = mysqli_query($conn, "select * from tbl_ip");
$_SESSION["no_ip"]=0; 
while($rows=mysqli_fetch_assoc($ipctr)){$_SESSION["no_ip"]++;}
?>