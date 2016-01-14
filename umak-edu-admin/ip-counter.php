<?php 
$localIP = getHostByName(php_uname('n'));

$search_ip = mysqli_query($conn, "select * from tbl_ip where ipaddress='".$localIP."' ");

if($search_ip->num_rows)
{
	mysqli_query($conn, "update tbl_ip set bandwit=bandwit+1 where ipaddress='".$localIP."'");
}
else
{
	mysqli_query($conn, "insert into tbl_ip values('', '$localIP', '1', 'unblocked')");
}


?>