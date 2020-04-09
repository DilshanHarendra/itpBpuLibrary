<?php
require_once('../comman/connectDb.php');

if(!empty($_GET)){

	if($_GET['do']=="request"){
	$rid=trim($_GET['rid']);
$query="SELECT * FROM `libraryrequest` WHERE requestId='$rid'";
	$result= mysqli_query($con,$query);
	if($result){
		$data=mysqli_fetch_assoc($result);
		//print_r($data);
		
		$title="New Request";
		$content='<center><h1 style="text-align: center;">'.$title.'</h1></center>
		<br><br><br><br><br><br>
		<table border="1" cellspacing="0" cellpadding="10" >
		<tr>
		<th>Requset ID</th>
		<td>'.$data['requestId'].'</td>
		
		
		
		</tr>
		<tr>
		<th>Library Member ID</th>
		<td>'.$data['lmemid'].'</td>
		</tr>
			<tr>
		<th>Message</th>
		<td>'.$data['message'].'</td>
		</tr>
			<tr>
		<th>Date</th>
		<td>'.$data['requestDate'].'</td>
		
		</tr>
		</table>
		
		
		';
	//	echo($content);
		createpdf($title,$content);
		
	}else{
		echo("<br><center><h1>Something Went Worng</h1></center>");
	}
	
	
	
}else if($_GET['do']=="request"){
	
}
}

function createpdf($title,$content){
	
	require_once('../Pdflibrary/tcpdf.php');
	  $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $pdf->SetCreator(PDF_CREATOR);  
      $pdf->SetTitle($title);  
      $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $pdf->SetDefaultMonospacedFont('helvetica');  
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $pdf->setPrintHeader(false);  
      $pdf->setPrintFooter(false);  
      $pdf->SetAutoPageBreak(TRUE, 10);  
      $pdf->SetFont('helvetica', '', 12);  
      $pdf->AddPage();   
	$pdf->writeHTML($content);
	$name=$title.'pdf';
	$pdf->Output($name,"I");
	
	
	
}

?>