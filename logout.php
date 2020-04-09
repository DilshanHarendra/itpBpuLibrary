<?php session_start(); ?>
<?php 
if(!isset($_SESSION["uuid"])){
		 echo "<script>location.href='home.php';</script>";
}




$_SESSION = array();
unset($_SESSION['login']);
if (isset($_COOKIE[session_name()])) {

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
		//header('Location: index.php?sign_in') ; 
		 header('Refresh: 2; URL = home.php');
	}

	}

 ?>