<?php 
	
	include 'conn.php';
	
	$sql = $link->prepare("DELETE  FROM transaction WHERE transaction_id=?"); 

	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$link->close();
	header('location: activate.php');	
	
?>