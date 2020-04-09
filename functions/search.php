<?php

require_once('../comman/connectDb.php');

$setkeyquery="SELECT * FROM `book` WHERE searchindex='novalue' ";

$result=mysqli_query($con,$setkeyquery);

while($data=mysqli_fetch_assoc($result)){

	$storekey="";
	$twords=explode(" ",$data['Title']);
	foreach($twords as $oneword ){
		$storekey.=metaphone($oneword)." ";
	}
	$awords=explode(" ",$data['Author']);
	foreach($awords as $oneword ){
		$storekey.=metaphone($oneword)." ";
	}
		$cwords=explode(" ",$data['Catagory']);
	foreach($cwords as $oneword ){
		$storekey.=metaphone($oneword)." ";
	}

	$id=$data['BID'];
	$addkey= "CALL addSearchKey ('$id','$storekey')";
	mysqli_query($con,$addkey);
	
}

if(isset($_POST['unkey'])){
	if($_POST['unkey']==""){
		$query2="SELECT * FROM `bookcatlog`";
	}else{
		$uskey= metaphone($_POST['unkey']);
$query2="SELECT * FROM `bookcatlog` where `skey` LIKE '%$uskey%'  ";
	}
	



	
	//echo($query2);

$count=1;
	$result2=mysqli_query($con,$query2);
	echo('  <tr>
    <th>Number</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>Catogory</th>
    <th>Availability</th>
    <th>Reseve</th>
  </tr>');
	while($data2=mysqli_fetch_assoc($result2)){

		echo('<tr><td>'.$count.'</td><td>'.$data2['title'].'</td><td>'.$data2['author'].'</td><td>'.$data2['catogory'].'</td>');
		
		
			if($data2['availability']==1){
			echo('<td>Available</td>');
			echo('<td><a href="'.'sendrequest.php?bid='.$data2['bid'].'" ><button'.' class="'.'rbtn">Reserve</button>
			
			</a></td></tr>');
	}else{
	echo('<td>Not Available</td>   <td></td></tr>');
	}
	
	
	
	
	$count++;
	if($count==25){
		break;
	}
		

	}

}

















?>