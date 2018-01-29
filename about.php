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
	
	  <li class="active"><a href="about.php">About Us</a></li>
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
		 <form action="http://localhost/userlogin.php" method = "post">
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
  <div class="container">
  <div class="row">
    <div class="col-sm-6" style="background-color:white;">
	<br>
	<center><img src="https://scontent.flis2-1.fna.fbcdn.net/v/t31.0-1/c1.0.960.960/p960x960/22289689_1619485198072290_3363737254273976123_o.jpg?oh=0d40a120c7e737861cb08a55826a86bf&oe=5ADF9B26" class="img-thumbnail" style="width:330px;"></center>
	<center><h1>Guilherme Manteigas</h1>
	<h4>Idade: 18 Anos</h4>
	<h4>Localização: Almada</h4>
	<h5 class="text-justify">O meu nome é Guilherme Manteigas, tenho 18 anos e moro em Almada. Alguns dos meus hobbies são jogar videojogos, ver filmes e séries.<br> Desde pequeno sempre gostei de computadores, mas só com 12 anos é que comecei a desenvolver interesse por programação, quando me deparei com a oportunidade de desenvolver os meus próprios mods para os jogos que jogava.<br> Durante os seguintes anos mantive o interesse na área, mas só quando entrei para o curso de programação no 10º ano, é que tive a oportunidade de aprofundar, muito mais, os meus conhecimentos nesta área.<br> Um dos meus sonhos é um dia poder vir a trabalhar numa grande empresa na área da inteligência artificial.</h5></center>
    </div>
    <div class="col-sm-6" style="background-color:white;">
	<br>
	<center><img src="https://scontent.flis2-1.fna.fbcdn.net/v/t1.0-9/12795377_1052452284817642_3331184265647471949_n.jpg?oh=e996736a2dd84d42846ffdbc1bf698bf&oe=5ADFE395" class="img-thumbnail" style="width:200px;"></center>
	<center><h1>José Abreu</h1>
	<h4>Idade: 19 Anos</h4>
	<h4>Localização: Almada</h4>
	<h5 class="text-justify">Chamo-me José Abreu e em 19 anos de vida posso dizer que sou tímido, mas a cada dia que passa tento melhorar um bocado essa situação.<br> No entanto, sou uma pessoa amigável e um ótimo ouvinte.<br> Ao contrário da maior parte das pessoas, desde pequeno que nunca soube bem quais eram os sonhos em relação a profissões que poderia vir a exercer. Por causa disso, foi um bocado difícil decidir o que queria seguir para o meu futuro.<br> Por ter gosto em computadores, acabei por seguir a área da informática, mais concretamente, a programação.<br> Alguns hoobies que tenho são, jogar videojogos e ver séries.<br> Eu vivo um dia de cada vez, mas no futuro gostaria de trabalhar numa área ligada à programação. </h5></center>  
    </div>
  </div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>


</body>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; CocktailSociety 2017</p>
      </div>
    </footer>
</html> 