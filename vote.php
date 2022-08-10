<?php
require_once('Administrator/PHP/connect.php');

	$id = $_POST['id'];	
	$ip = $_SERVER['REMOTE_ADDR'];
	$time = time();	
	$timeout = 60*60*24;  //1 day or 24 hours;
	$out = $time - $timeout;
	$check = "SELECT * FROM tblip WHERE ip='$ip' AND time > '$out' ";
	$resul1 = $conn->query($check);
        
	$resul1->setFetchMode(PDO::FETCH_ASSOC);
	$r = $resul1->fetch();
	if($sr > 0 ){
		header("Location:index.php?error=1");
	}else{
		$insertip = "INSERT INTO tblip(ip,time) VALUES ('$ip','$time')";
		$updatevote = "UPDATE tblvotes SET vpoints = vpoints + 1 WHERE vid = '$id'";
		header("Location:index.php?success=1");
	}
?>