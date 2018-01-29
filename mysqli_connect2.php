<?php 
	$host = "localhost";
	$user = "sportin5_tpsib-5";
	$pass = "qR!zg58@.5(C";
	$db = "sportin5_tpsib17-p5";

	$conn = new mysqli ($host, $user, $pass, $db);
	if ($conn->connect_error){
		die ("Falha na conexão: ". $conn->connect_error);
	}
 ?>