<?php 
	
	include 'conn.php';
	
	$sql = $link->prepare("DELETE  FROM user WHERE user_id=?"); 

	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$link->close();
	header('location: alluser.php');	
	
?>