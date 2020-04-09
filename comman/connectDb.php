<?php
$dbname="unisystem";
$server="localhost";
$user="root";
$pass="";
$con=mysqli_connect($server,$user,$pass,$dbname);
if(mysqli_connect_errno()){
	die('Connection Error'.mysqli_connect_errno() );
}else{
	//echo("Connect");
	//echo( sha1("dila"));
}


?>