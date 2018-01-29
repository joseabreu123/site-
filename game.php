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
  <link rel="stylesheet" type="text/css" href="jogo.css">
  
  
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
	  <li class="active"><a href="game.php">Game</a></li>
	  <li><a href="player.php">Top players</a></li>
	  
	  
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

<!--Menu-->
<div class="janela" id="menu" style="visibility: visible;">
<br><br><br><br><br><br><br><br><br>
<center>
<button id="resume" onClick="Menu(1)" type="button" class="btn btn-info btn-block btn-lg" style="width:15%; display:none;">Resume</button><br>
<div id="start"><button id="1" onClick="Menu(this.id)" type="button" class="btn btn-info btn-block btn-lg" style="width:15%">Start</button><br></div>
<button id="2" onClick="Menu(this.id)" type="button" class="btn btn-success btn-block btn-lg" style="width:15%">Help</button><br>
<button id="3" onClick="Menu(this.id)" type="button" class="btn btn-danger btn-block btn-lg" style="width:15%">Config</button><br>
<button id="quit" onClick="Kilscreen()" type="button" class="btn btn-danger btn-block btn-lg" style="width:15%; display:none;">Quit</button><br>
</center>
</div>
<!--Help-->
<div class="janela" id="help" style="visibility: hidden;">
<center>
<br><br><br><br><br><br><br><br>
<h5>Para jogar o jogo é so clicar em start e jogar :D</h5><br>
<h5>Teclas:</h5>
<h6>Rato -> clica</h6>
<h6>ESC -> Pausa/menu</h6>
<br><br>
<button id="4" onClick="Help(this.id)" type="button" class="btn btn-danger btn-block btn-lg" style="width:15%">Back</button>
</center>
</div>
<!--Config-->
<div class="janela" id="config" style="visibility: hidden;">
<br><br><br><br><br><br><br><br><br><br>
<center>
<button id="btnmusica" onClick="Mutemusica(this.id)" type="button" class="btn btn-success btn-block btn-lg" style="width:15%">Musica</button><br>
<button id="btnmute" onClick="Mutesom(this.id)" type="button" class="btn btn-success btn-block btn-lg" style="width:15%">Sons</button><br>
<button id="back1" onClick="Backtomenu()" type="button" class="btn btn-warning btn-block btn-lg" style="width:15%">Back</button>
</center>
</div>
<!--KillScreen-->
<div id="killscreen" class="end" style="display:none;">
	<br>
	<center><div><h1>Perdeste!!</h1></div></center>
	<br><br><br>
	<center><label style="align:center;" id="enddinheiro"><h5>Acabaste com: $$$$$</h5></label></center>
	<center><button id="scoreboard" onClick="Newgame()" type="button" class="btn btn-success btn-block btn-lg" style="width:15%">Quit</button></center>
</div>
<!--Jogo-->
<div class="jogo" id="jogo" style="visibility: hidden;">
<!--Garrafas-->
<div class="row">
  <div class="col-md-1"><!--<center><button id="back2" onClick="Backtomenu()" type="button" class="btn btn-success btn-block btn-lg" style="width: 80px; height: 80px">Menu</button></center>--></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="vodka" onClick="Bebidas(this.id)" src="images/bebidas/vodka.png" style="width: 100px; height: 100px;top:90px;" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="rum" onClick="Bebidas(this.id)" src="images/bebidas/rum.png" style="width: 100px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="absinto" onClick="Bebidas(this.id)" src="images/bebidas/absinto.png" style="width: 100px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="wisquei" onClick="Bebidas(this.id)" src="images/bebidas/wisquei.png" style="width: 90px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="tequila" onClick="Bebidas(this.id)" src="images/bebidas/tequila.png" style="width: 100px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="gin" onClick="Bebidas(this.id)" src="images/bebidas/gin.png" style="width: 80px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="espomante" onClick="Bebidas(this.id)" src="images/bebidas/espomante.png" style="width: 100px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="cocacola" onClick="Bebidas(this.id)" src="images/bebidas/cocacola.png" style="width: 100px; height: 100px; top:10px;" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="sprite" onClick="Bebidas(this.id)" src="images/bebidas/sprite.png" style="width: 80px; height: 100px" /></div></div>
  <div class="col-md-1"><div class="bebidas"><input type="image" id="laranja" onClick="Bebidas(this.id)" src="images/bebidas/laranja.png" style="width: 100px; height: 100px" /></div></div>
  <div class="col-md-1"></div>
</div>
<!--Legenda-->
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Vodka</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Rum</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Absinto</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Whiskey</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Tequila</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gin</dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Espumante</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Cocacola</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt><center>Sprite&nbsp;&nbsp;&nbsp;</center></dt></div></div>
  <div class="col-md-1"><div class="texto"><dt class="text-right"><center>Laranja</center></dt></div></div>
  <div class="col-md-1"></div>
</div>
<br>
<!--Info-->
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"><div class="info"><dt class="text-right">Vidas:</dt></div></div>
  <div class="col-md-1"><div class="info"><dt class="text-left" id="vidas">3</dt></div></div>
  <div class="col-md-1"><div class="info"><dt class="text-right">Dinheiro:</dt></div></div>
  <div class="col-md-1"><div class="info"><dt class="text-left" id="money">0€</dt></div></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
</div>
<br><br><br>
<!--Shaker-->
<div class="row">
  <div class="col-md-4"><center><input type="image" id="shaker1" onClick="Shaker1(this.id)" src="images/shaker.png" style="width: 60px; height: 100px" /></center></div>
  <div class="col-md-4"><dt class="text-center"id="timer"><center> </dt></div>
  <div class="col-md-4"><center><input type="image" id="shaker2" onClick="Shaker1(this.id)" src="images/shaker.png" style="width: 60px; height: 100px" /></center></div>
</div>
<br><br><br><br><br><br><br><br>
<!--Mesas clientes e bebidas-->
<div class="row">
	<div class="col-md-4">
		<div class="parent">
		<center><input type="image" id="mesa1" src="images/mesa1.png" style="width: 300px; height: 200px" /></center>
		<div class="inner"><center><input type="image" id="cocktail1" src="images/cocktail1.png" style="width: 70px; height: 70px; visibility: hidden;" /></center></div>
		<div class="innercliente"center><input type="image" id="cliente1" src="images/cliente2.png" style="width: 200px; height: 400px; visibility: hidden;" /></center></div>
		<div class="innerpedido"><center><dt class="text-left" id="pedido1"></dt></center></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="innerbarman">
			<center><input type="image" id="mesa2" src="images/barman.png" style="width: 100px; height: 300px" />
		</div>
	</div>
	<div class="col-md-4">
		<div class="parent">
		<center><input type="image" id="mesa2" src="images/mesa1.png" style="width: 300px; height: 200px" /></center>
		<div class="inneresq"><center><input type="image" id="cocktail2" src="images/cocktail1.png" style="width: 70px; height: 70px; visibility: hidden;" /></center></div>
		<div class="innerclienteesq"center><input type="image" id="cliente2" src="images/cliente2.png" style="width: 200px; height: 400px; visibility: hidden;" /></center></div>
		<div class="innerpedidodois"><center><dt class="text-right"id="pedido2"></dt></center></div>
		</div>
	</div>
</div>

<script>
var pedido1;
var textopedido;
var audiodinheiro = new Audio('musica/dinheiro.mp3');
var audioshaker = new Audio('musica/shaker.mp3');
var audiovida = new Audio('musica/vida.mp3');
var audiobg = new Audio('musica/bg.mp3');
var pedido2;
var vidas = 3;
var money = 0;
var timerreset = 0;
var timer = document.getElementById("timer");
var id;
var value = "00:00";

//Preparação de pagina
var elem = document.getElementById("menu");
elem.style.display = "block";
var elem = document.getElementById("help");
elem.style.display = "none";
var elem = document.getElementById("config");
elem.style.display = "none";
var elem = document.getElementById("jogo");
elem.style.display = "none";
//
startTimer(5, 0);
pauseTimer();

function Menu(clicked_id)
{
	if(timerreset == 0){
		startTimer(5, 0);
		pauseTimer();
		timerreset = 1;
	}
	if(clicked_id == 1){
		var elem = document.getElementById("menu");
		elem.style.display = "none";
		var elem = document.getElementById("help");
		elem.style.display = "none";
		var elem = document.getElementById("config");
		elem.style.display = "none";
		var elem = document.getElementById("jogo");
		elem.style.display = "block";
		GameStart()
	}
	if(clicked_id == 2){
		var elem = document.getElementById("menu");
		elem.style.display = "none";
		var elem = document.getElementById("config");
		elem.style.display = "none";
		var elem = document.getElementById("help");
		elem.style.display = "block";
		var elem = document.getElementById("jogo");
		elem.style.display = "none";
		Help()
	}
	if(clicked_id == 3){
		var elem = document.getElementById("menu");
		elem.style.display = "none";
		var elem = document.getElementById("help");
		elem.style.display = "none";
		var elem = document.getElementById("config");
		elem.style.display = "block";
		var elem = document.getElementById("jogo");
		elem.style.display = "none";
		Config()
	}
	
	
	
}
function GameStart(clicked_id)
{	
	var elem = document.getElementById("resume");
	elem.style.display = "none";
	var elem = document.getElementById("quit");
	elem.style.display = "none";
	document.getElementById('jogo').style.visibility='visible';
	var elem = document.getElementById("menu");
	elem.style.display = "none";
	var elem = document.getElementById("help");
	elem.style.display = "none";
	var elem = document.getElementById("config");
	elem.style.display = "none";
	Game()
}
function Game()
{
	resumeTimer();
	document.onkeydown = function(evt) {
		evt = evt || window.event;
		if (evt.keyCode == 27) {
			pauseTimer();
			Pause()
		}
	}
	audiobg.play();
	audiobg.volume = 0.2;
	audiobg.loop = true;
	Cliente()
	
}
function startTimer(m, s) {
    timer.innerHTML = m + ":" + s;
    if (s == 0) {
        if (m == 0) {
			Kilscreen();
            return;
        } else if (m != 0) {
            m = m - 1;
            s = 60;
        }
    }
    
    s = s - 1;
    id = setTimeout(function () {
        startTimer(m, s)
    }, 1000);
}

function pauseTimer() {
    value = timer.textContent;
    clearTimeout(id);
}

function resumeTimer() {
    var t = value.split(":");
    
    startTimer(parseInt(t[0], 10), parseInt(t[1], 10));
}



function Bebidas(clicked_id)
{
	var bebida;
	var source;
	var cinco;
	var um = ".png";
	var dois = "2.png";
	var str = "";
	source = document.getElementById(clicked_id).src;
	cinco = source.substr(source.length - 5);
	
	if(cinco === "2.png"){
		source = document.getElementById(clicked_id).src;
		source = source.substring(0, source.lastIndexOf('2'));
		str = source.concat(um);
		document.getElementById(clicked_id).src = str;
	}else{
		source = document.getElementById(clicked_id).src;
		source = source.substring(0, source.lastIndexOf('.'));
		str = source.concat(dois);
		document.getElementById(clicked_id).src = str;
	}
}
function Shaker1(clicked_id)
{
	/*
	bebidas [0] = vodka
	bebidas [1] = rum
	bebidas [2] = absinto
	bebidas [3] = wisquei
	bebidas [4] = tequila
	bebidas [5] = gin
	bebidas [6] = espomante
	bebidas [7] = cocacola
	bebidas [8] = sprite
	bebidas [9] = laranja
	*/
	var bebidas = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
	var nomes = ["vodka", "rum", "absinto", "wisquei", "tequila", "gin", "espomante", "cocacola", "sprite", "laranja"];
	var source;
	var cinco;
	var um = ".png";
	var dois = "2.png";
	var str = "";
	var i = 0;
	
	
	source = document.getElementById(clicked_id).src;
	cinco = source.substr(source.length - 5);
	if(cinco === "2.png"){
		return;
	}else if(clicked_id === "shaker1" && document.getElementById('cocktail1').style.visibility == 'visible'){
		return;
	}else if(clicked_id === "shaker1" && document.getElementById('cliente1').style.visibility == 'hidden'){
		return;
	}else if(clicked_id === "shaker2" && document.getElementById('cocktail2').style.visibility == 'visible'){
		return;
	}else if(clicked_id === "shaker2" && document.getElementById('cliente2').style.visibility == 'hidden'){
		return;
	}else{
	source = document.getElementById(clicked_id).src;
	source = source.substring(0, source.lastIndexOf('.'));
	str = source.concat(dois);
	document.getElementById(clicked_id).src = str;
	}
	
	while (i <= 9){
		source = document.getElementById(nomes[i]).src;
		cinco = source.substr(source.length - 5);
		if(cinco === "2.png"){
			bebidas[i] = 1;
			}
		i++;
	}
	i=0;
	//document.getElementById('pedido').innerHTML = bebidas + pedido1;
	//remove a selecção das bebidas
	while (i <= 9){
		source = document.getElementById(nomes[i]).src;
		cinco = source.substr(source.length - 5);
		if(cinco === "2.png"){
			source = document.getElementById(nomes[i]).src;
			source = source.substring(0, source.lastIndexOf('2'));
			str = source.concat(um);
			document.getElementById(nomes[i]).src = str;
			}
		i++;
	}
	audioshaker.play();
	setTimeout(function(){
	document.getElementById(clicked_id).style.zIndex = "4";
	document.getElementById(clicked_id).src = "images/shaker3.png"; 
		setTimeout(function(){
		document.getElementById(clicked_id).src = "images/shaker2.png";
			setTimeout(function(){
			document.getElementById(clicked_id).src = "images/shaker4.png"; 
				setTimeout(function(){
				document.getElementById(clicked_id).src = "images/shaker2.png";	
					setTimeout(function(){
					document.getElementById(clicked_id).src = "images/shaker3.png";
						setTimeout(function(){
						document.getElementById(clicked_id).src = "images/shaker2.png";
							setTimeout(function(){
							document.getElementById(clicked_id).src = "images/shaker4.png";
								setTimeout(function(){
								document.getElementById(clicked_id).src = "images/shaker2.png";	
								}, 500);
							}, 500);
						}, 500);
					}, 500);
				}, 500);
			}, 500);
		}, 500);
	}, 500);
	
	setTimeout(function(){
        source = document.getElementById(clicked_id).src;
		source = source.substring(0, source.lastIndexOf('2'));
		str = source.concat(um);
		document.getElementById(clicked_id).src = str;
		Cocktail(clicked_id, bebidas)
    }, 5000);

}
function Cocktail(clicked_id, bebidas)
{
	
	if(clicked_id === "shaker1"){
		var str;
		var random1 = Randomintervalo(1,5)
		if (document.getElementById('cocktail1').style.visibility == 'hidden'){
		if(random1 === 1){
		str = "images/cocktail1.png";
		}else if(random1 === 2){
			str = "images/cocktail2.png";
		}else if(random1 === 3){
			str = "images/cocktail3.png";
		}else if(random1 === 4){
			str = "images/cocktail4.png";
		}else if(random1 === 5){
			str = "images/cocktail5.png";
		}
		document.getElementById("cocktail1").src = str;
		document.getElementById('pedido1').style.visibility='hidden';
		setTimeout(function(){
		document.getElementById('cocktail1').style.visibility='visible';
		Avaliador(clicked_id, bebidas)
		}, 200);
		}
	}
	if(clicked_id === "shaker2"){
		var str2;
		var random2 = Randomintervalo(1,5)
		if (document.getElementById('cocktail2').style.visibility == 'hidden'){
		if(random2 === 1){
		str2 = "images/cocktail1.png";
		}else if(random2 === 2){
			str2 = "images/cocktail2.png";
		}else if(random2 === 3){
			str2 = "images/cocktail3.png";
		}else if(random2 === 4){
			str2 = "images/cocktail4.png";
		}else if(random2 === 5){
			str2 = "images/cocktail5.png";
		}
		document.getElementById("cocktail2").src = str2;
		document.getElementById('pedido2').style.visibility='hidden';
		setTimeout(function(){
		document.getElementById('cocktail2').style.visibility='visible';
		Avaliador(clicked_id, bebidas)
		}, 200);
		}
	}
}
function Avaliador(clicked_id, bebidas)
{
	var source;
	var txt;
	var sourcea;
	var num = bebidas.toString();
	var i;
	var pedido;
	var cliente = 0;
	var simbolo = "€";
	setTimeout(function(){
	if(clicked_id === "shaker1"){
				txt = document.getElementById('pedido1').innerHTML;
				if (txt == "Vodka,Sprite"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["1", "0", "0", "0", "0", "0", "0", "0", "1", "0"];
				}
				if (txt == "Rum,Coca-cola"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "1", "0", "0", "0", "0", "0", "1", "0", "0"];
				}
				if (txt == "Whiskey"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "1", "0", "0", "0", "0", "0", "0"];
				}
				if (txt == "Whiskey,Coca-cola"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "1", "0", "0", "0", "1", "0", "0"];
				}
				if (txt == "Espumante"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "0", "0", "1", "0", "0", "0"];
				}
				if (txt == "Gin,Sprite"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "0", "1", "0", "0", "1", "0"];
				}
				if (txt == "Tequila,Laranja"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "1", "0", "0", "0", "0", "1"];
				}
				if (txt == "Gin,Absinto"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "1", "0", "0", "1", "0", "0", "0", "0"];
				}
				if (txt == "Whiskey,Rum"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "1", "0", "1", "0", "0", "0", "0", "0", "0"];
				}
				if (txt == "Vodka,Laranja"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["1", "0", "0", "0", "0", "0", "0", "0", "0", "1"];
				}
	
	
	
	
		document.getElementById('cocktail1').style.visibility='hidden';
		var beb = bebidas.toString();
		var ped1 = p1.toString();
		var tot = beb.localeCompare(ped1);
		if (beb === ped1){
			var random = Math.floor((Math.random() * 20) + 5);
			document.getElementById('pedido1').innerHTML = random + simbolo;
			document.getElementById('pedido1').style.visibility='visible';
			audiodinheiro.play();
			money = money + random;
			document.getElementById('cliente1').style.visibility='hidden';
			Update(clicked_id)
		}else{
			var fail = "O teu cocktail não presta!! Perdeste 1 vida";
			document.getElementById('pedido1').innerHTML = fail;
			document.getElementById('pedido1').style.visibility='visible';
			audiovida.play();
			vidas = vidas - 1;
			document.getElementById('cliente1').style.visibility='hidden';
			Update(clicked_id)
		}
		
	}
		if(clicked_id === "shaker2"){
				txt = document.getElementById('pedido2').innerHTML;
				if (txt == "Vodka,Sprite"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["1", "0", "0", "0", "0", "0", "0", "0", "1", "0"];
				}
				if (txt == "Rum,Coca-cola"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "1", "0", "0", "0", "0", "0", "1", "0", "0"];
				}
				if (txt == "Whiskey"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "1", "0", "0", "0", "0", "0", "0"];
				}
				if (txt == "Whiskey,Coca-cola"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "1", "0", "0", "0", "1", "0", "0"];
				}
				if (txt == "Espumante"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "0", "0", "1", "0", "0", "0"];
				}
				if (txt == "Gin,Sprite"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "0", "1", "0", "0", "1", "0"];
				}
				if (txt == "Tequila,Laranja"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "0", "0", "1", "0", "0", "0", "0", "1"];
				}
				if (txt == "Gin,Absinto"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "0", "1", "0", "0", "1", "0", "0", "0", "0"];
				}
				if (txt == "Whiskey,Rum"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["0", "1", "0", "1", "0", "0", "0", "0", "0", "0"];
				}
				if (txt == "Vodka,Laranja"){
				p1 = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
				p1 = ["1", "0", "0", "0", "0", "0", "0", "0", "0", "1"];
				}
		
		document.getElementById('cocktail2').style.visibility='hidden';
		var beb = bebidas.toString();
		var ped1 = p1.toString();
		var tot = beb.localeCompare(ped1);
		if (beb === ped1){
			var random = Math.floor((Math.random() * 20) + 5);
			document.getElementById('pedido2').innerHTML = random + simbolo;
			document.getElementById('pedido2').style.visibility='visible';
			audiodinheiro.play();
			money = money + random;
			document.getElementById('cliente2').style.visibility='hidden';
			Update(clicked_id)
		}else{
			var fail = "O teu cocktail não presta!! Perdeste 1 vida";
			document.getElementById('pedido2').innerHTML = fail;
			document.getElementById('pedido2').style.visibility='visible';
			audiovida.play();
			vidas = vidas - 1;
			document.getElementById('cliente2').style.visibility='hidden';
			Update(clicked_id)
		}
		
	}
	}, 5000);
	
}
function Cliente()
{	
	var source;
	var str;
	var png = ".png";
	var cl = "cliente";
	var gajo;
	if (document.getElementById("cliente1").style.visibility === 'hidden'){
        
		var random = Math.floor((Math.random() * 6) + 1);
		var cliente = cl.concat(random);
		source = document.getElementById("cliente1").src;
		source = source.substring(0, source.lastIndexOf('cliente'));
		var texto = cliente.concat(png);
		str = source.concat(texto);
		document.getElementById("cliente1").src = str;
		setTimeout(function(){
		document.getElementById("cliente1").style.visibility='visible';
		gajo = 1;
		Pedir(gajo)
		}, Math.floor((Math.random() * 5000) + 2000));

	}
	if (document.getElementById("cliente2").style.visibility === 'hidden'){
        
		var random = Math.floor((Math.random() * 10) + 1);
		var cliente = cl.concat(random);
		source = document.getElementById("cliente2").src;
		source = source.substring(0, source.lastIndexOf('cliente'));
		var texto = cliente.concat(png);
		str = source.concat(texto);
		document.getElementById("cliente2").src = str;
		setTimeout(function(){
		document.getElementById("cliente2").style.visibility='visible';
		gajo = 2;
		Pedir(gajo)
		}, Math.floor((Math.random() * 10000) + 5000));
		
	}

}
function Randomintervalo(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}
function Pedir(gajo)
{	
	var random = Randomintervalo(1,10)
	var txt1 = document.getElementById('pedido1').innerHTML;
	var txt2 = document.getElementById('pedido2').innerHTML;
	if (gajo === 1 && document.getElementById('pedido1').innerHTML == ""){
		if (random == 1){
		textopedido = "Vodka,Sprite";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random == 2){
		textopedido = "Rum,Coca-cola";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==3){
		textopedido = "Whiskey";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==4){
		textopedido = "Whiskey,Coca-cola";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==5){
		textopedido = "Espumante";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==6){
		textopedido = "Gin,Sprite";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==7){
		textopedido = "Tequila,Laranja";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==8){
		textopedido = "Gin,Absinto";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==9){
		textopedido = "Whiskey,Rum";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
		if (random ==10){
		textopedido = "Vodka,Laranja";
		document.getElementById('pedido1').innerHTML = textopedido;
		}
	}else if (gajo === 2 && document.getElementById('pedido2').innerHTML == ""){
		if (random == 1){
		textopedido = "Vodka,Sprite";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random == 2){
		textopedido = "Rum,Coca-cola";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==3){
		textopedido = "Whiskey";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==4){
		textopedido = "Whiskey,Coca-cola";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==5){
		textopedido = "Espumante";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==6){
		textopedido = "Gin,Sprite";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==7){
		textopedido = "Tequila,Laranja";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==8){
		textopedido = "Gin,Absinto";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==9){
		textopedido = "Whiskey,Rum";
		document.getElementById('pedido2').innerHTML = textopedido;
		}
		if (random ==10){
		textopedido = "Vodka,Laranja";
		document.getElementById('pedido2').innerHTML = textopedido;
		}	
	}
}
function Update(clicked_id)
{
		document.getElementById('vidas').innerHTML = vidas;
		document.getElementById('money').innerHTML = money + "€";
		if (vidas <= 0){
			Kilscreen()
		}
		setTimeout(function(){
			if (clicked_id === "shaker1"){
			document.getElementById('pedido1').innerHTML = "";
			}
			if (clicked_id === "shaker2"){
			document.getElementById('pedido2').innerHTML = "";
			}
		}, Math.floor((Math.random() * 3000)));
		Cliente()
		
}
function End()
{
	var vidas = 3;
	var money = 0;
	var elem = document.getElementById("menu");
	elem.style.display = "initial";
	var elem = document.getElementById("help");
	elem.style.display = "none";
	var elem = document.getElementById("config");
	elem.style.display = "none";
	var elem = document.getElementById("jogo");
	elem.style.display = "none";
}
function Help(clicked_id)
{
	document.getElementById('help').style.visibility='visible';
	if(clicked_id == 4){
		Backtomenu()
	}
}
function Config()
{
	document.getElementById('config').style.visibility='visible';
}
function Mutesom(clicked_id)
{	
	var txt = document.getElementById(clicked_id).className;
	if (txt == "btn btn-success btn-block btn-lg" ){
	document.getElementById(clicked_id).className = "btn btn-danger btn-block btn-lg"; 
	audioshaker.muted = true;
	audiodinheiro.muted = true;
	audiovida.muted = true;
	}else if (txt == "btn btn-danger btn-block btn-lg" ){
	document.getElementById(clicked_id).className = "btn btn-success btn-block btn-lg";
	audioshaker.muted = false;
	audiodinheiro.muted = false;
	audiovida.muted = false;	
	}
}
function Mutemusica(clicked_id)
{
	var txt = document.getElementById(clicked_id).className;
	if (txt == "btn btn-success btn-block btn-lg" ){
	document.getElementById(clicked_id).className = "btn btn-danger btn-block btn-lg"; 
	audiobg.muted = true;
	}else if (txt == "btn btn-danger btn-block btn-lg" ){
	document.getElementById(clicked_id).className = "btn btn-success btn-block btn-lg"; 
	audiobg.muted = false;
	}
}
function Backtomenu()
{	
	pauseTimer();
	var elem = document.getElementById("menu");
	elem.style.display = "block";
	var elem = document.getElementById("help");
	elem.style.display = "none";
	var elem = document.getElementById("config");
	elem.style.display = "none";
	var elem = document.getElementById("jogo");
	elem.style.display = "none";
}
function Pause()
{	
	pauseTimer();
	var elem = document.getElementById("resume");
	elem.style.display = "block";
	var elem = document.getElementById("quit");
	elem.style.display = "block";
	var elem = document.getElementById("start");
	elem.style.display = "none";
	Backtomenu();
	
}
function Kilscreen()
{
	var elem = document.getElementById("resume");
	elem.style.display = "none";
	var elem = document.getElementById("quit");
	elem.style.display = "none";
	var elem = document.getElementById("jogo");
	elem.style.display = "block";
	document.getElementById('jogo').style.visibility='visible';
	var elem = document.getElementById("menu");
	elem.style.display = "none";
	var elem = document.getElementById("help");
	elem.style.display = "none";
	var elem = document.getElementById("config");
	elem.style.display = "none";
	var elem = document.getElementById("killscreen");
	elem.style.display = "block";
	document.getElementById("jogo").style.pointerEvents ='none';
	var txt = "Acabaste o jogo com: ";
	var resultado = txt + money +"€";
	document.getElementById('enddinheiro').innerHTML = resultado;
	
	var session_id = "<?php echo $_SESSION['id'];?>";
	$.ajax({
    type: "POST",
    url: "endGame.php",
    data: {
        'money' : money,
		'id' : session_id
    },
    success: function (data) {
    }
});
}
function Newgame()
{
	vidas = 3;
	money = 0;
	timerreset = 0;
	document.getElementById('vidas').innerHTML = vidas;
	document.getElementById('money').innerHTML = money + "€";
	var elem = document.getElementById("start");
	elem.style.display = "block";
	var elem = document.getElementById("resume");
	elem.style.display = "none";
	var elem = document.getElementById("quit");
	elem.style.display = "none";
	var elem = document.getElementById("jogo");
	elem.style.display = "none";
	document.getElementById('jogo').style.visibility='visible';
	var elem = document.getElementById("menu");
	elem.style.display = "block";
	var elem = document.getElementById("help");
	elem.style.display = "none";
	var elem = document.getElementById("config");
	elem.style.display = "none";
	var elem = document.getElementById("killscreen");
	elem.style.display = "none";
	document.getElementById("jogo").style.pointerEvents ='auto';
	document.getElementById("cliente1").style.visibility = 'hidden'
	document.getElementById("cliente2").style.visibility = 'hidden'
	document.getElementById('pedido1').innerHTML = "";
	document.getElementById('pedido2').innerHTML = "";
	
}
</script>
</body>
</html> 