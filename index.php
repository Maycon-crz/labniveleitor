 <!-- <?php 
    // session_start();
	//if(!empty(@$_SESSION['logado'])){
		//header("location:labniveleitor/painel.php");
	//}
?> -->
<?php $_SESSION['nome'] = "";?>
<?php include("include/cabecalho.php");?>
	<ul class='text-center border border-success mb-5 p-5'>
		<form class='mb-5 mt-5' id='formLogin'>		
			<li><h1 class='text-success'>Controle Diário de Fórmulas Artesani</h1></li>
			<li><input type='text' name='nome' class='form-control text-center bg-white border border-success' placeholder='Nome de Usuário' id=''></li>
			<li><input type='password' name='senha' class='form-control text-center bg-white border border-success' placeholder='Senha' id=''></li>
			<li><button type='submit' class='form-control text-center bg-success border border-success'>ENTRAR</button></li>
		</form>
	</ul>

<?php include("include/rodape.php")?>