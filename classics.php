 <?php
 session_start();
 
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
  <style> 
    .imgsize{width:400px; height:300px}
	.astext {
    background:none;
    border:none;
    margin:0;
    padding:0;
}
  </style>
  
  
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
      <li class="active"><a href="classics.php">Classics</a></li>
      <li><a href="comunity.php">Comunity</a></li>
	  
	<?php
	if (@$_SESSION['active'] == '1'){
		echo '<li><a href="game.php">Game</a></li>';	     
	}
	?>
	
	<?php
	if (@$_SESSION['active'] == '1'){
		echo '<li><a href="player.php">Top players</a></li>';	     
	}
	?>
	
	 <?php
	if (@$_SESSION['active'] == '1'){
		echo '<li><a href="submit.php">Submit your cocktail</a></li>';	     
	}
	?>
	
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

  <!-- Modal de Login -->
  <div class="modal fade" id="loginmodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Login</b></h3>
        </div>
        <div class="modal-body">
		 <form action="userlogin.php" method = "post">
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" required>
			</div>
			<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password" required>
			</div>
	<div class="checkbox">
		<label><input type="checkbox"> Remember me</label>
	</div>
  <button type="submit" name="submit" value="Send" class="btn btn-success">Login</button>
</form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <!-- Modal de Register -->
  <div class="modal fade" id="registermodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Register</b></h3>
        </div>
        <div class="modal-body">
		 <form>
			<div class="form-group">
			<label for="usr">Name:</label>
			<input type="text" class="form-control" id="username">
			</div>
			<div class="form-group">
			<label for="usr">Surname:</label>
			<input type="text" class="form-control" id="usr">
			</div>
			<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email">
			</div>
			<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password">
			</div>
	<div class="checkbox">
		<label><input type="checkbox"> Remember me</label>
	</div>
  <button type="submit" class="btn btn-success">Login</button>
</form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
	<!-- Modal de Imagem -->
	
	<div id="infoimg" class="modal fade" role="dialog">
	</div>
  
      <!-- Pagina -->
	  
    <div class="container">

      <h1 class="my-4 text-center text-lg-left">Classics</h1>
	  <hr/>

      <div id="imgcocktail" class="row text-center text-lg-left">
	  <form action="" method="post">
	<?php
	
	 require ("mysqli_connect2.php");
	
	 $query = mysqli_query($conn,"SELECT * FROM classics");
	
          while($row = mysqli_fetch_object($query))
             {
	 echo "<div class='col-lg-3 col-md-4 col-xs-6'>
	 <a href='#' class='d-block mb-4 h-100'>
	 <input type='hidden' name='id' value='$row->classic_id'/>
	 <button data-toggle='modal' data-target='#infoimg'  name='submitimg' class='astext' type='button'>
	 <img class='img-fluid img-thumbnail imgsize' src='$row->image' alt=''>
	 </button>
	 </a>
	 </div>";
	 
	 }
	?>
	
	</form>

    </div>
<hr/>
<script>
$(document).on("click", "#imgcocktail a", function(e){
        var idClick = $('input[type=hidden]',this).val();
		
        var dataString = 'id=' + idClick;
	
        $.ajax({
            type: "POST",
            url: "classicsup.php",
            data: dataString,
            success: function (data) {
				 $('#infoimg').append(data);

        }
    });
});
</script>
<div id="teste">
</div>
</body>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; CocktailSociety 2017</p>
      </div>
    </footer>
</html> 