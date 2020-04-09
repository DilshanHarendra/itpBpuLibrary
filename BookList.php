<?php  
 session_start(); 
require_once('comman/connectDb.php');
	require_once('comman/header.php');
	
if(empty($_SESSION["uuid"])){
	
						 echo "<script>location.href='home.php';</script>";
	  // exit();
}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BookList</title>
<link rel="icon" href="images/bpulogo.png">
<link rel="stylesheet" href="css/booklist.css">
<style>

	
	
	</style>
</head>

<body >
<div class="se-pre-con"></div>
<h1>Catlog</h1>
<div class="container-fuild" style="padding: 25px;">
<div class="row">
	<div class="col-md-2">
<p class="tag">Online Library</p>


<?php 
		$valu="";
			
		if(!empty($_POST)){
			if($_POST['submit']=="submit"&& ($_POST['inputs']!="") ){
				$ser=mysqli_real_escape_string($con,$_POST['inputs']);
			$valu=$ser;
				$nuid=trim($_SESSION['uuid']);
				
				$query4="SELECT * FROM `librarymemserch` WHERE `memberid` ='$nuid' ";
				$result2=mysqli_query($con,$query4);
			
					if(mysqli_num_rows($result2)>0){
						$data=mysqli_fetch_assoc($result2);
					//	echo("update block");
					$newkey=$data['searchkey'];
					$aluthkey=metaphone($_POST['inputs'])." ";
						
						
						if(strstr($newkey,$aluthkey)==""){
							if(str_word_count($newkey)<=10){
								$qvalue= substr_replace($newkey, $aluthkey, 1, 0);
								$query2="CALL libmemberserch ('$nuid','$qvalue')";
								$result2=mysqli_query($con,$query2);
							}else{
								$newvar=explode(" ",$newkey);
								
								unset($newvar[count($newvar)-1]);
								$qvalue= substr_replace($newkey, $aluthkey, 1, 0);
								$query2="CALL libmemberserch ('$nuid','$qvalue')";
								$result2=mysqli_query($con,$query2);
							}
						
						}
					
				}else{
					//	echo("input block");
						
					$storekey=metaphone($ser);
					$query="INSERT INTO `librarymemserch`(`memberid`, `searchkey`) VALUES ('$nuid' ,'$storekey')";
					$result=mysqli_query($con,$query);
				
				}
			
				
				
				
				
				
			}
		}
		
		
		?>	


</div>
	<div class="col-md-7">
<form action="" method="post" >
  <div class="autocomplete">
	<input class="search" id="sInput"  type="text" name="inputs" value="<?php echo($valu); ?>">
	<button class="sbutton" id="submit" name="submit" value="submit"><i class="fa fa-search"   ></i></button>
	</div>
	
</form>








</div>
	</div>
	</div>
<hr>

<br>
<div id="dm">
	<p style="padding-left: 50px;
	color: #2C2AF1;" >Do you mean</p>
</div>
<table id="p">

 
 
  
  
  <?php  require_once('functions/ShowBookList.php');

		
?>
 </table>
<?php //require_once('functions/search.php');            ?>	
  

   
 



<?php  
	require_once('comman/header.php');

?>
<script>
	<?php if(empty($valu)){
	echo( "$('#dm').hide();");
}
	
	
	; ?>
	 
		
	
					$('#sInput').keyup(function () {
	var skey=$('#sInput').val();
		$.post('functions/search.php',{unkey:skey},function(data){
		
		
				$('#p').html(data);
			$('#dm').show();
		
		});
	});
		
		

	

	

	
	
function autocomplete(inp, arr) {
 
  var currentFocus;
 
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
    
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
     
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
  
      this.parentNode.appendChild(a);
    
      for (i = 0; i < arr.length; i++) {
      
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
       
          b = document.createElement("DIV");
      
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
         
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
       
          b.addEventListener("click", function(e) {
           
              inp.value = this.getElementsByTagName("input")[0].value;
       
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = sug;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>












</body>
</html>
