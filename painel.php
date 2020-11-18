<?php session_start(['cookie_lifetime' => 43200,]);?>
<?php 
	include("include/cabecalho.php");
	include("include/automaticos.php");
?>

	<div class='container'>
		<div class='row bg-info border rounded-pill'>
			<?php if($_SESSION['logado'] != 'nao'){ echo $_SESSION['btPastaAzul']; } ?>			
			<h1 class='text-center'>Controle Diário de Fórmulas</h1> 
		    <input type='hidden' class='vfLogin' value="<?php echo $_SESSION['logado'];?>"/>
			<?php if($_SESSION['logado'] != 'nao'){ echo $_SESSION['btsair']; } ?>	
		</div>
		<?php 
			if($_SESSION['logado'] != 'nao'){
				echo $_SESSION['Nivel_de_Pressao'];
				echo $_SESSION['outras_pastas_selecionar_tabela_tranferir'];
				echo $_SESSION['tbHorariosLinhaUm'];
				echo $_SESSION['tbHorariosLinhaDois'];
				echo $_SESSION['tbHorariosLinhaTres'];
				echo $_SESSION['tbHorariosLinhaQuatro'];
				echo $_SESSION['tbHorariosLinhaCinco'];
				echo $_SESSION['tbHorariosLinhaSeis'];
				echo $_SESSION['pedidos_das_filiais'];
				echo $_SESSION['quadroDeAvisos'];
				echo $_SESSION['mostra_msgs_prontas'];
				echo $_SESSION['cadastro_de_msgs_prontas'];
				echo $_SESSION['cadastro_de_funcionarios'];
				echo $_SESSION['manual'];				
			}
		?>
	</div>	
	<?php 
		if($_SESSION['logado'] != 'nao'){ 
			echo $_SESSION['menu_fixo'];
			echo $_SESSION['pastas_azuis_layout_fixo'];
			echo $_SESSION['mostra_excipientes_pre_prontos_fixo'];
			echo $_SESSION['mostra_avisos_fixo'];
		}
	?>
<?php include("include/rodape.php")?>