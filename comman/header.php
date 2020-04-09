
<!doctype html>
<html>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="icon" href="images/icon.jpg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <script src="js/main.js"></script>
<style>
	li{
		padding-left: 50px;
		
	}
	.nav-link{
		font-size: 25px;
		font-weight: 400;
		
		
	}
	.nav-link:hover{
		color: #0D18E5 !important;
		text-decoration: underline;
		
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
	.imglogo{
		width: 100px;
		height: 100px;
	}
	
	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light  " style="background-color: transparent;">
  <a class="navbar-brand" href="#"><img class="imglogo" src="images/bpulogo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
            <?php 
	if(empty($_SESSION["uuid"]) ){
		echo('<li class="'.'nav-item active">'.'<a class="'.'nav-link"'.' href="'.'index.php">Home<span class="'.'sr-only">(current)</span></a>
      </li>');
	}
	//	header('Location: profile.php?sign_in') ; 
 ?>
       <li class="nav-item active">
        <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="BookList.php">Books<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Request.php">Request<span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION)){
	if(!empty($_SESSION["uuid"]) ){
		echo('<li class="'.'nav-item active">'.'<a class="'.'nav-link"'.' href="'.'logout.php">Logout<span class="'.'sr-only">(current)</span></a>
      </li>');
	}
	//	header('Location: profile.php?sign_in') ; 
} ?>
      
      

      </li>
     
    </ul>
    
  </div>
</nav>
</body>
</html>