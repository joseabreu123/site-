<?php 
	require ("mysqli_connect2.php");

	$email = $_POST['email'];
	$password = md5($_POST['password']);
	

	$query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	$row = mysqli_fetch_object($query);
	
	
	
	if ($row > 0){
		session_start();
		$_SESSION['id'] = $row->user_id;
		$_SESSION['name'] = ucfirst($row->name);
		$_SESSION['surname'] = ucfirst($row->surname);
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['active'] = '1';
		
		 header('Location: index.php');
		 
	}else{
		 header('Location: 404.html');
		
	}
?>