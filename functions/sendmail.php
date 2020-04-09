<?php

require_once('comman/connectDb.php');

if(empty($_SESSION)){
	
		header('Location: index.php?sign_in') ; 
}
$nuid=$_SESSION['uuid'];


		



	if(!empty($_POST)){
		if($_POST['submit']=="submit"){
			$query="SELECT  * FROM `limemdetails` WHERE `lID`='$nuid'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows( $result)>0){
	$data=mysqli_fetch_assoc($result);

		
			$subject="New Request";
			$header="Request";
			$message=mysqli_real_escape_string($con,$_POST['mess']) ;
			$to=$data['mail'];
	
	

$newRid=uniqid();
	


	$query2="call addLibraryRequset('$newRid','$nuid','$message') ";
	
	$result3=mysqli_query($con,$query2);
	if($result3){
		echo("<h2 style='color:green;'>Requset send Successfully<h2>");
		echo('<a href="functions/createPdf.php?do=request&lid='.$nuid.'&rid='.$newRid.'  &mess='.$message.'" style="font-size:15px;" >Click here for more details</a>');
	 unset($_POST);
	}else{
		echo("Error Try agin later");
	}
	
	
	
	
	
	
	
	/*
	$s=mail($to,$subject,$message,$header);

			if($s){
				$ad="";
					$admin=mail($ad,$subject,$message,$header);
				
				if($admin){
					echo("Requset send Successfully");
				}else{
					echo("Error");
				}
			}else{
				echo("Error");
			}
	*/

	
	
		
		
		
	}
		
	}
}


?>