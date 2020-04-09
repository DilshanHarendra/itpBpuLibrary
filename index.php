<?php  

 session_start(); 

require_once('comman/connectDb.php');
	require_once('comman/header.php');
?>
	
		
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BPU Library | Home</title>
<link rel="icon" href="images/bpulogo.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:200');
	.main{
		background-image: url(images/nhomebrh.jpg);
		background-position: top;
		background-size: cover;
		z-index: -50;
		width: 100%;
		height: 100vh;
	}
	
		
		

	@media screen and (max-width: 1172px) {

	
  .main{
		background-image: url(images/nhomebrv.jpg);
		background-position: center;
		background-size: cover;
		z-index: -50;
		width: 100%;
		height: 100%;
	  padding-bottom: 50px;
	}
	}
	
	
	.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/Preloader_11.gif) center no-repeat #fff;
}
	</style>
	<link rel="stylesheet" href="css/home.css">
	 <script src="js/main.js"></script>
	 <script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
</head>

<body>
<div class="se-pre-con"></div>
<div class="container-fuild" >

<div class="main">
	

	<div class="row">
	
	<div class="col-md-5">
	<div class="topic" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000">
	<h1>ශ්‍රී ලංකා බෞද්ධ හා පාලි විශ්ව විද්‍යාලය</h1>
		<p>Online Library</p>
			</div>
			</div>
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<div class="form" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
		<p style="color: red;">
		<?php  

require_once('functions/Login.php');

?></p>
		
		
		
		<h1 class="st">Login</h1><br><br>
			<form action="" class="needs-validation" method="post" novalidate>
			<h4>Username</h4>
			 <div class="form-group">
				<input type="text" name="username" class="form-control forminput"  placeholder="Enter Username" required>
				<div class="valid-feedback">
        Ok!
      </div>
       <div class="invalid-feedback">
          Please Enter Username.
        </div>
         </div>
				<br><br>
				<h4>Password</h4>
				 <div class="form-group">
				<input type="password" name="pass" class="form-control forminput"  placeholder="Enter Password" required>
				
				<div class="valid-feedback" >
        Ok!
      </div>
       <div class="invalid-feedback">
          Please Enter Password.
        </div>
         </div>
				<br><br>
				<input class="btn" type="submit" name="submit" value="submit">
				
				
				
			</form>
		</div>
		
		
		
	</div>
	<div class="col-md-1">
	<div class="socialm" data-aos="fade-down" data-aos-delay="100" data-aos-duration="1500">
	<ul>
		<li><a href=""><i  style="font-size:30px;"class="fa fa-youtube"></i></a></li>
		<li><a href=""><i  style="font-size:30px;"class="fa fa-twitter"></i></a> </li>
		<li><a href=""><i  style="font-size:30px;"class="fa fa-facebook"></i></a> </li>
		<li> <a href=""><i style="font-size:30px;"  class="fa fa-instagram"></i></a></li>
		<li><a href=""><i  style="font-size:30px;" class="fa fa-linkedin"></i></a> </li>
	
		  
      
     
    
	</ul>
	</div>
	</div>
	</div>
	
	</div>
</div>

<br><br>
<div class="container-fuild" style="height:100vh"  >
<h1 class="topic2" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">LIBRARY</h1>

<hr style="border: 2px solid black;width: 75%;">
<br>
<div class="row" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
<div class="col-md-4">

<div class="box">
<i  style="font-size:100px; color: #FC8D00;"class="fa fa-user "></i>
<br><br>
<h1><span class="counter text-center"> 1000 </span><span>+</span></h1>
	<h4 >Students</h4>
</div>
</div>
<div class="col-md-4">
<div class="box">
	<i  style="font-size:100px; color: #FC8D00;"class="fa fa-book "></i>
	<br><br>
	<h1><span class="counter text-center"> 5000 </span><span>+</span></h1>
	<h4 >Books</h4>
</div>	
</div>	
<div class="col-md-4">
<div class="box">
<i  style="font-size:100px; color: #FC8D00;"class="fa fa-user "></i>
<br><br>
	<h1><span class="counter text-center"> 800 </span><span>+</span></h1>
	<h4 >Library Members</h4>
</div>
</div>
</div>
<br> <br>

<?php  
	require_once('comman/footer.php');

?>
</div>





<script>
	jQuery(document).ready(function(){
	$('.counter').counterUp({
    delay: 5,
    time: 1500	
	});
	
});
	
	
	</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script type="text/javascript">
	$(document).scroll(function(){
		$('.navbar').toggleClass('scrolled',$(this).scrollTop()>$('.navbar').height());
	});
	
	
	</script>
	
<script>
	var logid="<?php echo($_SESSION['uuid']); ?>";
	if(logid!=""){
		location.href='profile.php';
		//document.getElementById("p").innerHTML=logid;
	}

	</script>
</body>
</html>
