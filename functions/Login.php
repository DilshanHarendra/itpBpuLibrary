<?php 


if(!empty($_POST) ){
	if($_POST['submit']=="submit"){

	
		$uname=mysqli_real_escape_string($con,$_POST['username']);
		$pasword=mysqli_real_escape_string($con,$_POST['pass']);
		$hashpass=sha1($pasword);
		
		
$query="SELECT `pass`, `Nic` FROM `libraryonlinelogin` WHERE `lId`='$uname' ";
		
		$result=mysqli_query($con,$query);
		if($result){
					if($data=mysqli_fetch_assoc($result)){
		
			if($data['pass']==$hashpass){
				
				$_SESSION["uuid"]=$uname;
				 echo "<script>location.href='profile.php';</script>";
			//	header('location:profile.php');
				
			}else if($data['pass']=="novalue") {
				if($data['Nic']==$pasword){
					
					$_SESSION["uuid"]=$uname;
				 echo "<script>location.href='profile.php';</script>";
					//header('location:profile.php');
					}
				}else{
						echo("Incorrect Password");
				}
			
			
		}else{
			echo("Incorrect Username");
		}
		}else{
			echo("Query awul");
		}

		
		
		
		
		
		
}
	
	
}
function getUserIpAddr(){
  /*  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;*/
}


?>