

<?php
session_start(); 
if(empty($_SESSION["uuid"])){
	
					//	 echo "<script>location.href='home.php';</script>";
	//  exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Request</title>
<link rel="icon" href="images/bpulogo.png">
<style>
	footer{
		text-align: left;
		background-color: transparent !important;
		width: 100%;
		height: 200px;
		color: white;
		font-size: 20px;
		padding-top: 25px;
		position: absolute;
		margin-bottom: 0px;
		
	}
	element.style {
		text-align: left;
		}
	body{
		background-image: url(images/request.jpg);
		background-size:cover;
		background-position: center;
		background-repeat: no-repeat;
		height: 100%;
	}
	h1{
		text-align: center;
		letter-spacing: 2px;
		color: white;
		
	}	
	.note{
		text-align: center;
		color: red;
	}
	.form{
		width: 80%;
		height: auto;
		border: 1px solid black;
		border-radius: 30px;
		align-items: center;
		padding: 20px;
		background-color: white;
	}
	.form h2{
		text-align: center;
		color: #0F0E7A;		}
	.forminput {
		width: 100%;
		padding-left: 5px;
		padding-right: 5px;
		
		
			}
	.forminput:disabled {
	background-color: white;
		outline: none;
		border: 1px solid rgba(3,3,3,0.1);
		
		
			}
	.txt{
		padding: 20px;
		font-size: 3rem;
		letter-spacing: 2px;
		text-align: justify;
		color: #2b519a;
		
	}
	.ig{
		border-radius: 30px;
		width: 100%;
		background-image: url(images/download-1.png);
		background-position: center;
		background-size: cover;
		background-repeat: no-repeat;
		background-image-blur:0.5;
		
 
}
		
	}
	
	button:hover{
		background-color: #E01F3D;
		color: white;
		
	}
	
	
	.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link{
		color: white !important;
	}
	
	.navbar-light .navbar-brand {
		color: white !important;
	}
	 ul li{
		
		overflow: hidden;
		 float: left;
	}
	i{
		margin-top: 50px;
		color: #2b519a;
	
	}
	i:hover{
		color: #F01C51;
	
	}
	
	@media screen and (max-width: 1172px) {
		.form{
		width: 100%;
		
	}
		.txt{
		padding: 20px;
		font-size: 3rem;
		letter-spacing: 2px;
		text-align: justify;
		color: #F00909;
		
	}
			footer{
		text-align: center;
		background-color: black !important;
	
		
	}
			i{
		color: #F00909;
	
	}
	i:hover{
		color: #FC01EB;
	
	}
		 ul {
		margin-left: 10px;
	}
	}
	</style>
		 <script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
</head>

<body>
<div class="se-pre-con"></div>
<?php  
	require_once('comman/header.php');
 

	?>
<h1 style="color: white;" >REQUEST</h1>


<div class="container-fuild" style="padding-right: 20px;padding-left: 20px;" >

<br><br>

	<div class="row">
	<div class="col-md-2"></div>
	
	<div class="col-md-4">

	


	<div class="form" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1000" >
		<p class="note">

	 	<?php  
//	require_once('functions/sendmail.php');
 

	?>
	  
	    </p>
	<h2>Library ID</h2>
	<form action="" class="needs-validation" method="post" novalidate>
		<input type="text" class="forminput" name="idd" disabled value="<?php //echo($_SESSION["uuid"]); ?>">
		
		<br>
		<h2>Message</h2>
		<textarea id="" cols="30" rows="10" class="form-control" class="forminput" placeholder="...Your message..." name="mess" required  ></textarea>
		 <div class="valid-feedback">
        Ok
      </div>
      <div class="invalid-feedback">
          Please Enter Your Message.
        </div>
		<br><br>
		<button class="forminput" id="bt" style="background-color: #2A2962 ;
		color: white;
		padding: 5px;  "  name="submit" value="submit" >Submit</button>
		</form>
	</div>
	
	
	
	
	
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<p class="txt" data-aos="fade-left" data-aos-delay="150" data-aos-duration="1000">
			Your Request Directle Send To the Librarian

		</p>
					<ul>
		<li><a href=""><i  style="font-size:40px;"class="fa fa-youtube"></i></a></li>
		<li><a href=""><i  style="font-size:40px;"class="fa fa-twitter"></i></a> </li>
		<li><a href=""><i  style="font-size:40px;"class="fa fa-facebook"></i></a> </li>
		<li> <a href=""><i style="font-size:40px;"  class="fa fa-instagram"></i></a></li>
		<li><a href=""><i  style="font-size:40px;" class="fa fa-linkedin"></i></a> </li>
		
		  
      
     
    
	</ul>
	</div>
	<div class="col-md-2"></div>
		</div>
		</div>
		</div>
		<br><br>
			<div class="container-fuild" >



	<div class="row">
	<div class="col-md-4">
				<?php  
	require_once('comman/footer.php');

?>
	</div>
	</div>
	</div>
		<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
		

</body>
</html>