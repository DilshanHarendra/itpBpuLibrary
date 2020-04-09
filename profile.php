
<?php  
 session_start(); 
if(empty($_SESSION["uuid"])){
	
						 echo "<script>location.href='home.php';</script>";
	  // exit();
}
	require_once('comman/header.php');
require_once('comman/connectDb.php');


?>
<!doctype html>
<html>
<head>

 <script src="js/main.js"></script>
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" href="css/proofile.css">
<link rel="icon" href="images/bpulogo.png">
	<style>
		body{
			background-image: url(images/background4.jpg);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
			



	</style>
	
</head>

<body>
<div class="se-pre-con"></div>
<h1>My Profile</h1>
  <br><br>
<div class="container-fuild" style="padding-right: 20px;padding-left: 20px;" >

	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<div class="card">
		<br>
		<h1>Details</h1>
		<table class="det" >
			
		
				<?php
			
			
			$nuid=$_SESSION['uuid'];
			
				$query="SELECT * FROM `limemdetails` where lId='$nuid' ";
				$result=mysqli_query($con,$query);
				if($data=mysqli_fetch_assoc($result)){
		  echo('<tr><td>Library ID  </td><td>:<span>'.$data['lID'].'</span></td></tr>
				<td>Student ID   </td><td>:<span>'.$data['sID'].'</span></td></tr>
				<td>Name  </td><td>:<span>'.$data['fname'].' '.$data['fullname'].'</span></td></tr>
				<td>NIC   </td><td>:<span>'.$data['nic'].'</span></td></tr>
				<td>Address   </td><td>:<span>'.$data['address'].'</span></td></tr>
				<td>Telephone    </td><td>:<span>'.$data['tele'].'</span></td></tr>
				<td>Email        </td><td>:<span>'.$data['mail'].'</span></td></tr>
			
				');
				}
				
					$query3="SELECT * FROM  borrowed r, book b  where r.BID=b.BID  and  r.LID='$nuid' ";
				$result3=mysqli_query($con,$query3);
		
				if($data3=mysqli_fetch_assoc($result3)){
				
		  echo('<td>Currently Borrow Book  </td><td>:<span>'.$data3['Title'].'</span></td></tr>
				<td>Due Date  </td><td>:<span>'.$data3['DDate'].'</span></td></tr>
				');
				}else{
					 echo('<td>Currently Borrow Book  </td><td>:<span>No Book</span></td></tr>
				<td>Due Date  </td><td>:<span>No</span></td></tr>
				');
				}
			
			
//----------------------------------------------------------------------------------------------			
			$query2="SELECT `searchkey` FROM `librarymemserch` where `memberid`='$nuid' ";
			$result2=mysqli_query($con,$query2);
			if($result2){
				if($data=mysqli_fetch_assoc($result2)){
					
					$keys=explode(" ", $data['searchkey']);
					$book="";
				
					$count=0;
					$key=$keys[$count];
					while($count<12){
						
						$query="SELECT * FROM `bookcatlog` where `skey` LIKE '%$key%'  ";
						$result5=mysqli_query($con,$query);
						
						if(mysqli_num_rows($result5)>0){
							
							while($data5=mysqli_fetch_assoc($result5)){
								$book.=$data5['bid']."/";
							}
						}else{
							//echo("query while");
								if($count==(count($keys)-1) ){
						break;
					}else{
						$count++;
						$key=$keys[$count];
					}
							continue;
						}
						if($count==(count($keys)-1) ){
						break;
					}else{
						$count++;
						$key=$keys[$count];
					}
						//echo($count);
					}

					$books=explode("/",$book);
					try{
						$fre = array_count_values($books);	 
						$freq = array_filter($fre);
					//	print_r($freq);
					arsort($freq); 
					$most = array_keys($freq); 

					}catch(Exception $e){
						
					}
				
				
					
					
				}
			}else{
				echo("query kase");
			}
				
			
			
			
			
			
			
			
			
			
			
			
			
				
				?>
			
		</table>
		
			
			
		</div>
		<br><br>
		
		
		
	</div>
<div class="col-md-1"></div>
	<div class="col-md-4">
		<div class="cpass">
		<h2>Change Password</h2>
			<h4 style="color: red;">
				<?php
			require_once('functions/changepass.php');	
				
				
				?>
				
				
			</h4>
			<br><br>
				<form class="needs-validation" method="post" onSubmit="return cpass()" action="" novalidate>
			<p>Current Password</p>
		
			
			 <div class="form-group">
				<input type="password" class="form-control" required name="opass"   id="opaa" >
				 <div class="valid-feedback">Ok</div>
      <div class="invalid-feedback">Please Enter Current Password.</div>
				</div>
				
				<p>New Password</p>
				<div class="form-group">
				<input type="password" class="form-control" maxlength="20" required name="npass1"  id="npaa1" >
				<div class="valid-feedback">Ok</div>
      <div class="invalid-feedback">
          Please Enter New Password.
        </div>
		</div>
				<p>Re-enter New Password</p>
					<div class="form-group">
				<input type="password" class="form-control" maxlength="20" required name="npass2" id="npaa2" >
				<div class="valid-feedback">Ok</div>
      <div class="invalid-feedback">
          Please Re-Enter New Password.
        </div>
				
					</div>
				<br><br>
				<button id="btn" name="submit" value="submit" >Change</button>
				</form>
				
		
			
			
		</div>
</div></div></div>
<br><br>
		<div class="container-fuild" style="padding: 10px;" >
		<h3>Suggestions</h3><br>
	<div class="row">
	
			
			<br><br>
			<?php   
			if(!empty($most)){
					for($i=0;$i<count($most)-1;$i++){
				$code=$most[$i];
				$query6="SELECT * FROM `bookcatlog` WHERE bid='$code' ";
				$result6=mysqli_query($con,$query6);
				if($result6){
					$data6=mysqli_fetch_assoc($result6);
					echo('<div class="col-md-2"><div class="box2"><div class="ibox">	
				
				<p>Name : '.$data6['title'].'</p>
				<p>Author :'.$data6['author'].' </p>');
				echo('<a href="'.'sendrequest.php?bidd='.$data6['bid'].'" ><button'.' class="'.'rbtn">Reserve</button>
			
			</a><br><br>');
				
			echo('</div></div><br></div>');
							
				}
				if($i==5){
					break;
				}
				
			}
			
			}
		
			
			
			
			?>
			
			
			
		
			
				
			</div>
		</div>
		
	
	
	<br><br><br>
	<h1>Recently Read Books</h1>
<br><br>
<table style="padding-left: 50px; padding-right: 50px; margin-left: 50px; width: 92%;">
  <tr>
    <th>Number</th>
    <th>Book Title</th>
    <th>Date</th>
  </tr>

				<?php
			
			
			$nuid=$_SESSION['uuid'];
				$query="SELECT * FROM  borrowed r, book b  where r.BID=b.BID  and  r.LID='$nuid' order by `r`.`DDate` desc ";
				$result=mysqli_query($con,$query);
	if($result){
		if(mysqli_num_rows($result)>0){
				$count=1;
		while($data=mysqli_fetch_assoc($result)){
		  echo('<tr><td>'.$count.'</td>
		  <td>'.$data['Title'].'</td>
		  <td>'.$data['DDate'].'</td></tr>');
			if($count==10){
				break;
			}
			$count++;
				}
		}
	
	}
				
				
				
				
				?>
</table>








	</div>
	<br><br><br>
	<script>


		
			
			
			
		
		
	function cpass(){
		  var n1pass= document.getElementById('npaa1').value;
		    var n2pass= document.getElementById('npaa2').value;
		if(n1pass!=""&&n2pass!="" ){
				if(n1pass!=n2pass){
		alert("New Password are not same");
					return false;
	 }
		}
	
	}		
	 
		
		
		(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
	
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
		
        form.classList.add('was-validated');
		
				 
        }	
		
      }, false);
    });
  }, false);
})();
		
		
		
		
</script>

	<div style="background-color: black; width: 100%; height: auto;">
		
			<?php  
	require_once('comman/footer.php');

?>
	</div>
	

</body>
</html>
