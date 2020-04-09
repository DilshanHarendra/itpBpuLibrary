<?php 
require_once('comman/connectDb.php');

if(!empty($_POST)){
	if($_POST['submit']=="submit"){
		$sskey=$_POST['inputs'];
		if($sskey==""){
			$query="SELECT * FROM `bookcatlog` ";
		}else{
				$uskey2= metaphone($sskey);
			$query="SELECT * FROM `bookcatlog` where `skey` LIKE '%$uskey2%'  ";
		}
	}
}else{
		$query="SELECT * FROM `bookcatlog` ";
}







	
$result=mysqli_query($con,$query);
$count=1;
echo('  <tr>
    <th>Number</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>Catogory</th>
    <th>Availability</th>
    <th>Reseve</th>
  </tr>');
while($record=mysqli_fetch_assoc($result)){
	
	
	
	echo( '<tr>
    <td>'.$count.'</td>
    <td>'.$record['title'].'</td>
    <td>'.$record['author'].'</td>
    <td>'.$record['catogory'].'</td>');

	
	if($record['availability']==1){
	echo('<td>Available</td>');
		echo('<td><form methode="'.'post" action='.'"sendrequest.php'.'" ><button'.' class="'.'rbtn"'.' name="'.'bidd" '.'value="'.$record['bid'].'">Reserve</button>
			
			</form></td></tr>');
	}else{
	echo('<td>Not Available</td>   <td></td>');
	}
	
	
	
	
	$count++;
	if($count==25){
		break;
	}
		echo('</tr>');
}





?>