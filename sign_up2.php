<?php 
	require ("mysqli_connect2.php");

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";

	if ($conn->query($sql)==TRUE){
		header('Location: index.php');
	}else{
		echo $conn->error;
	}
	$conn->close();
 ?>