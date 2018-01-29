<?php 
	
	require ("mysqli_connect2.php");

	$score = $_POST['money'];
	$id = $_POST['id'];
	
	$query = mysqli_query($conn,"INSERT into game (score, user_id) VALUES ($score, $id)");
	
	$conn->close();
?>