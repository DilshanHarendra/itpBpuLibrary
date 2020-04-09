<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Send Reservation</title>
<link rel="icon" href="images/bpulogo.png">
<style>
	button{
		width: 200px;
		height: 50px;
		background-color: rgba(237,33,103,0.66);
		color: white;
		border-radius: 25px;
		font-size: 20px;
	}
	button:hover{
		background-color: rgba(149,30,240,1.00);
	}
	
	</style>

</head>

<body>
<center>
	<h1>Reserve Book</h1>
</center><br><br><br>
<center>
	<h1>
<?php
session_start();
require_once('comman/connectDb.php');

if(empty($_SESSION["uuid"])){
	
						 echo "<script>location.href='home.php';</script>";
	   exit();
}
if(empty($_GET['bidd'])){
	header('Location: index.php?sign_in') ; 
}
$bid=mysqli_real_escape_string($con,trim($_GET['bidd']));
$nuid=mysqli_real_escape_string($con,$_SESSION["uuid"]);

//echo($bid);
	//	echo($nuid);
$to="admin@gmail.com";
	
			$query="SELECT  * FROM `limemdetails` WHERE `lID`='$nuid'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){

	$query2="SELECT * FROM `book` WHERE  `BID`='$bid'";
	$result2=mysqli_query($con,$query2);
	if(mysqli_num_rows($result2)>0){
	//	echo("first if");
		$bdata=mysqli_fetch_assoc($result2);
		$dd=mysqli_fetch_assoc($result);
	
		$query3="call reserveBook ('$nuid','$bid')";
		$result3=mysqli_query($con,$query3);
		if($result3){
			//echo("second if");
			if($bdata['Avilability']==1){
				$a="Available";
			}else{
				$a="Not Available";
			}
				$subject="New Reservation";
			$header="Reserve Book";
			$message='Library member '.$nuid.' has send request to reserve a book. Book details :'.
				'Book ID : '.$bdata['BID'].
				'Book Name : '.$bdata['Title'].
				'Book Author : '.$bdata['Author'].
				'Book Catogory : '.$bdata['Catagory'].
				'Book Availability : '.$a;
			$to=$dd['mail'];
		//	$s=mail($to,$subject,$message,$header);
			$s=true;
			if($s){
				$ad="";
				//	$admin=mail($ad,$subject,$message,$header);
				$admin=true;
				if($admin){
					echo("Requset send Successfully");
				}else{
					echo("Error");
				}
			}else{
				echo("Error");
			}
		}
	}
	
	
	


		
		
	}else{
	//echo("Query waradi");
}
	



?>
</h1>
</center>
<br><br><br><br><br><br><br><br>


<center><a href="profile.php"><button>Go To Profile</button></a></center>


</body>
</html>