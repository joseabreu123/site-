<?php 
     session_start();
	 
	function nl2br2($string) { 
	$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string); 
	return $string; 
	}
	 
     if(isset($_POST['submit'])){

     require ("mysqli_connect2.php");

     $namecocktail = $_POST['namecocktail'];
     $reccocktail = $_POST['reccocktail'];
	 
	 $reccocktail = nl2br2($reccocktail);
	 

	$target_dir = "image/";
	$file_name = $_FILES["image"]["name"];
	$target_file = $target_dir . basename($file_name);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
		} else {
    $erro = '<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> File is not an image.
    </div>';  
        $uploadOk = 0;
		}
	}
		// Check if file already exists
	if (file_exists($target_file)) {
	$erro = '<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Sorry, file already exists.
    </div>'; 
	$uploadOk = 0;
	}
		// Check file size
	if ($_FILES["image"]["size"] > 500000000000000) {
    $erro = '<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Sorry, your file is too large.
    </div>'; 
    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
    $erro = '<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Sorry, only JPG, JPEG, PNG & GIF files are allowed.
    </div>';
    $uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    
	// if everything is ok, try to upload file
		} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
		} else {
	$erro = '<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Sorry, your image could not be uploaded.
    </div>';
		}
	}
	
	if ($uploadOk == 1){
	$nome = $_SESSION['name'];
	$apelido = $_SESSION['surname'];
	$espaço = " ";
	$sql = "INSERT INTO comunity (name,recipe,image,username) VALUES ('$namecocktail','$reccocktail','image/$file_name','$nome' '$espaço' '$apelido')";
	
	if ($conn->query($sql)==TRUE){
		
	$ok = '<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Your cocktail has been submited successfully.
    </div>';
     }else{
        echo $conn->error;
     }
	}
	 $conn->close();
	 }
	 
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>CocktailSociety</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
   <img class="img-responsive" src="Banner.png" alt="Banner" style="width:100%"> 
</head>
<body>

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)"><span class="glyphicon glyphicon-glass"></span> CocktailSociety</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="classics.php">Classics</a></li>
      <li><a href="comunity.php">Comunity</a></li>
	  
	<?php
	if (@$_SESSION['active'] == '1'){
		echo '<li><a href="game.php">Game</a></li>';	     
	}
	?>
	
	  <li><a href="player.php">Top players</a></li>
	  <li class="active"><a href="submit.php">Submit your cocktail</a></li>
	  <li><a href="about.php">About Us</a></li>
    </ul>
	
	<?php
	$Login=('<ul class="nav navbar-nav navbar-right">
      <li><a href="#"data-toggle="modal" data-target="#registermodal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" data-toggle="modal" data-target="#loginmodal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>');
	
	@$nome = $_SESSION['name'];
	@$apelido = $_SESSION['surname'];
	if (@$_SESSION['active'] == '1'){
		echo '<ul class="nav navbar-nav navbar-right"><li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.$nome.' '.$apelido.'</a></li></ul>';
	     
	}else if (@$_SESSION['active']!= '1'){
		echo $Login;
	}
	?>
  </div>
</nav> 


<div class="container" style="width:40%">
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="nome">Cocktail Name:</label>
		<input maxlength="100" type="text" class="form-control" id="namecocktail" name="namecocktail" required>
	</div>
	<div class="form-group">
    <label for="receita">Cocktail Recipe:</label>
    <textarea maxlength="500" style="resize: vertical;" class="form-control" id="reccocktail" name="reccocktail" rows="3" required></textarea>
    </div>
	<div class="form-group">
	<label for="img">Select Image:</label>
	<input value = "image" type="file" id="image" name="image" required>
	</div>
<?php if(isset($erro)) echo $erro ?>
<?php if(isset($ok)) echo $ok ?>
  <input class="btn btn-success" name="submit" type="submit" value="Submit &raquo;" />
</form>
</div>
</body>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; CocktailSociety 2017</p>
      </div>
    </footer>
</html> 
 
 
 