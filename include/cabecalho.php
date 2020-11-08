<!-- Sistema online foi modificado criei input hidden que tem valor de sessão para 
verificar por javascript se eestá logado para nao acesar painel nao logado -->
<?php session_start(); if(!$_SESSION['logado']){$_SESSION['logado']='nao';}?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>LabNiveleitor</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/arquivo.js"></script>
		<script type="text/javascript" src="js/autorespostas.js"></script>
		<script type="text/javascript" src="js/luana.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3" id='cabecalho'>
			<a class="navbar-brand m-3 logo" href="index.php">LabNíveLeitor</a>
			<div class="navbar-brand mr-5 my-2 my-lg-0 text-success"><h1 class='mr-5'><?php echo @$_SESSION['nome'];?></h1></div>
		</nav>	