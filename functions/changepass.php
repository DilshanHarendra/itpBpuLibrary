
<?php  

$nuid=$_SESSION['uuid'];

if(!empty($_POST)){
	if($_POST['submit']=="submit"){
		
		
		$cpass=mysqli_real_escape_string($con,$_POST['opass']);
		$npass=mysqli_real_escape_string($con,$_POST['npass1']);
	
		$hpass=sha1($cpass);
		$nhpass=sha1($npass);
	
		$query1="SELECT * FROM `libraryonlinelogin` WHERE lId='$nuid'";
		$result=mysqli_query($con,$query1);
		if($result=mysqli_fetch_assoc($result)){
		
			if($result['Nic']==$cpass){
				$addkey= "CALL changepass ('$nuid','$nhpass')";
				echo("Password Change Successfully");
	mysqli_query($con,$addkey);
			}else if($result['pass']==$hpass){
				$addkey= "CALL changepass('$nuid','$nhpass')";
	mysqli_query($con,$addkey);
				echo("Password Change Successfully");
			}else{
				echo("Current Password is Wrong");
				
			}
		}
		
		
		
	}
}














?>