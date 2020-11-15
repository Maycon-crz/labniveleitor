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
				
				
			}
		?>
		<div class='row'>
			<div class='col-12 border border-success mt-5' id='manual'>
				<h1 class='text-center text-success'><u>Manual</u></h1>
			</div>
		</div>
		<div class='row'>
			<div class='col-12 border border-success'>
				<ul class='m-0 p-0'>					
					<li class='text-danger mt-3'><u><h1>Nível de Pressão</h1></u></li>
					<li class='mt-3'><u><h4><span class='text-success'> Verde: </span>Provavelmente não tem muitas pastas no laboratório ou são pastas rápidas, <span class='text-success'>Tudo tranquilo</span></li></u></h4>
					<li class='mt-3'>
						<u><h4>
							<span class='text-warning'>Amarelo: </span>Há muitas pastas no laboratório ou são pastas demoradas porém estamos dando conta de tudo, 
							se for adicionar mais verifique as tabelas de sólidos, semi sólidos e pedidos de filiais talvez de para fazer hoje ou <span class='text-warning'>Dá uma perguntada!</span>
						</h4></u>
					</li>
					<li class='mt-3'>
						<u><h4><span class='text-danger'>Vermelho: </span> Muitas fórmulas marcadas para hoje ou Pode ser que estámos fazendo algo extra como Pedidos de filiais, Organizando algo, Muita louça, etc... <span class='text-danger'>Muita coisa para hoje, Marca para outro dia por favor!</span>
					</li></u></h4>
				</ul>
			</div>
		</div>
		<div class='row' id='manualtabelasSSS'>
			<div class='col-12 border border-success'>
				<ul class='m-0 p-0'>					
					<li class='text-success mt-3'><u><h1>Tabelas Sólidos e Semi-sólidos</h1></u></li>
					<li class='mt-3'><u><h4>Estas tabelas contém a quantidade de fórmulas no laboratório classificadas por intervalo de tempo e pelas cores:</h4></u></li>
					<li class='mt-4'><u><h4><span class='text-success'>Verde: </span>Fórmulas rápidas com poucos itens ou poucas cápsulas ou nível de dificuldade baixo, Tempo estimado: 00:15 a 00:30 minutos(Não é exato!)(Mais ou Menos)</span></h4></u></li>
					<li class='mt-3'><u><h4><span class='text-warning'>Amarela: </span>Fórmulas com uma quantidade média de itens ou de cápsulas ou com nível médio de dificuldade, Tempo estimado: 00:20 a 00:40 minutos(Não é exato!)(Mais ou Menos)</h4></u></li>
					<li class='mt-3'><u><h4><span class='text-danger'>Vermelha: </span>Fórmulas com quantidade alta de itens ou de cápsulas ou com nível alto de dificuldade, Tempo estimado: 00:30 a 00:60 minutos(Não é exato!)(Mais ou Menos)</h4></u></li>
					<li class='text-secondary mt-4'><u><h2>Tabelas Sólidos</h2></u></li>
					<li class='mt-2'><u><h4>Fórmulas envolvendo capsulas, saches, envelopes, etc..</h4></u></li>
					<li class='text-primary mt-4'><u><h2>Tabelas Semi-Sólidos</h2></u></li>
					<li class='mt-2'><u><h4>Fórmulas envolvendo liquidos, shampoos, xaropes, cremes, etc..</h4></u></li>
					<li class='text-danger mt-4'><u><h2>Tabelas Pedidos das Filiais</h2></u></li>
					<li class='mt-2'><u><h4>Informa a quantidade de itens dos pedidos de cada filial(Somando os itens das folhas da filial em questão)</h4></u></li>
				</ul>
			</div>
		</div>
	</div>	
	<div id='menuFixo'>
		<button type='button' class='rounded-circle p-0 m-0 btn' id='btPossao'>
			<table>
				<tr>
					<td id='gifseta'>
						<img src='img/flechader.gif'>
					</td><td>
						<img src='img/possao.gif' class='rounded-circle p-0 m-0'/>
					</td>
				</tr>
			</table>
		</button>
		<ul class='m-0 p-0' id='conteudoMenuFixo'>
			<li>
				<a href="#tbHorariosLinhaUm"><button type='button' class='btsMenuFixo mt-2'>08:00-10:00</button></a>
			</li><li>
				<a href="#tbHorariosLinhaDois"><button type='button' class='btsMenuFixo mt-2'>10:01-12:00</button></a>
			</li><li>
				<a href="#tbHorariosLinhaTres"><button type='button' class='btsMenuFixo mt-2'>12:01-14:00</button></a>
			</li><li>
				<a href="#tbHorariosLinhaQuatro"><button type='button' class='btsMenuFixo mt-2'>14:01-16:00</button></a>
			</li><li>
				<a href="#tbHorariosLinhaCinco"><button type='button' class='btsMenuFixo mt-2'>16:01-18:00</button></a>
			</li><li>
				<a href="#tbHorariosLinhaSeis"><button type='button' class='btsMenuFixo mt-2'>18:01-19:00</button></a>
			</li><li>
				<a href="#pedidos"><button type='button' class='btsMenuFixo mt-2'>Pedidos</button></a>
			</li><li>
				<a href="#quadroDeAvisos"><button type='button' class='btsMenuFixo mt-2'>Quadro</button></a>
			</li><li>
				<a href="#btmostraCadFunc"><button type='button' class='btsMenuFixo mt-2'>Cadastro</button></a>
			</li><li>
				<a href="#manual"><button type='button' class='btsMenuFixo mt-2'>Manual</button></a>
			</li><li>
				<button type='button' class='mt-2' id='btOpcoesLaboratorio'>Laboratório</button>
			</li>
			<div id='linhaOpcoesLaboratorio'>
				<li>
					<button type='button' class='btsPreProntos mt-2' id='Excipiente'>Excipiente</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaExcipiente'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='CremeNaoIonico'>Creme<br/>Não<br/>Iônico</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaCremeNaoIonico'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseGelAnastrozol'>Base<br/>Gel<br/>Anastrozol</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseGelAnastrozol'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='Tacrolimus'>Tacrolimus</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaTacrolimus'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseSabonete'>Base<br/>Sabonete</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseSabonete'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseShampooPerolado'>Base<br/>Shampoo<br/>Perolado</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseShampooPerolado'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='CremePsoriaseAguda'>Creme<br/>Psoriase<br/>Aguda</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaCremePsoriaseAguda'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='FluoretoDeSodio'>Fluoreto<br/>de<br/>sódio</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaFluoretoDeSodio'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='DescongestionanteNasal'>Desobstruidor<br/>Nasal</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaDescongestionanteNasal'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='LocaoCapilarMinoxidil'>Loção<br/>capilar<br/>Minoxidil</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaLocaoCapilarMinoxidil'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='AnastrozolDiluido'>Anastrozol<br/>Diluído</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaAnastrozolDiluido'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='MetilcobalaminaDiluida'>Metilcobalamina<br/>Diluída</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaMetilcobalaminaDiluida'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='MetilfolatoDiluido'>Metilfolato<br/>Diluído</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaMetilfolatoDiluido'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='MetilTestosterona'>Metil<br/>Testosterona</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaMetilTestosterona'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseEfervescenteAbacaxi'>Base Efervescente<br/>Abacaxi</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseEfervescenteAbacaxi'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseEfervescenteLimao'>Base Efervescente<br/>Limão</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseEfervescenteLimao'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='BaseEfervescenteLaranja'>Base Efervescente<br/>Laranja</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaBaseEfervescenteLaranja'>
						<button type='button' class='btsFaltaProducao form-control btn btn-danger' id='acabou'>Acabando</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-warning' id='producao'>Produção</button>
					</div>
				</li><li>
					<input type='text' placeholder='' size='16' id=''/>
				</li><li>					
					<button type='button' class='btsFaltaProducao form-control btn btn-danger m-0 p-0' id='acabou'>Acabando</button>
					<button type='button' class='btsFaltaProducao form-control btn btn-warning m-0 p-0' id='producao'>Produção</button>					
				</li><li>
					<button type='button' class='btsPreProntos mt-2' id='Almoco'>Almoço</button>
				</li><li>
					<div class='linhaPreProntos' id='linhaAlmoco'>
						<button type='button' class='btsFaltaProducao form-control btn btn-secondary' id='acabou'>Sólidos</button>
						<button type='button' class='btsFaltaProducao form-control btn btn-primary' id='producao'>Semi-sólidos</button>
					</div>
				</li><li>
					<button type='button' id='play'>Play</button>
					<button type='button' id='stop'>Stop</button>
				</li>
			</div>
		</ul>	
	</div>
	<div class='objetoPastaAzulum text-success'><button type='button' class='btn btn-success P-0 btmenospastaazul' id=''>OK</button>--1°--<p class='text-center text-danger mt-2'><b>URGENTE!</b></p></div>
	<div class='objetoPastaAzuldois text-success'><button type='button' class='btn btn-success P-0 btmenospastaazul' id=''>OK</button>--2°--<p class='text-center text-danger mt-2'><b>URGENTE!</b></p></div>
	<div class='objetoPastaAzultres text-success'><button type='button' class='btn btn-success P-0 btmenospastaazul' id=''>OK</button>--3°--<p class='text-center text-danger mt-2'><b>URGENTE!</b></p></div>
	<div class='objetoPastaAzulquatro text-success'><button type='button' class='btn btn-success P-0 btmenospastaazul' id=''>OK</button>--4°--<p class='text-center text-danger mt-2'><b>URGENTE!</b></p></div>
	<div class='objetoPastaAzulcinco text-success'><button type='button' class='btn btn-success P-0 btmenospastaazul' id=''>OK</button>--5°--<p class='text-center text-danger mt-2'><b>URGENTE!</b></p></div>
	<div id='linhaMostraExp'>
		<table class='m-0'>
			<tr><td>
				<button type='button' id='btmostraExipientes' class='rounded-circle p-0 m-0 btn'>
					<img src='img/microscopio.gif'/>
				</button>
			</td><td>
				<div id='mostraDadosExipientes'></div>
			</td><td>
				<span id='qtdExipientes' class='text-warning m-0 p-0'></span>
			</td></tr>
		</table>
	</div>
	<div id='linhaMostraAvisos' class='bg-success rounded-circle m-0 p-0'>
		<table class='m-0'>
			<tr>				
				<td>					
					<button type='button' class='rounded-circle pt-4 m-0 btn btn-success' id='btmostraAvisos'></p>
						<p><span id='linhaqtdavisos' class='text-warning rounded-circle m-0 btn btn-danger'></span>
						<p><img src="img/radiocapsula.gif"/></p>
					</button>
				</td><td>
					<div id='conteudoLinhaMostraAvisos' class='bg-success p-0 m-0'></div>
				</td>
			</tr>
		</table>
	</div>

<?php include("include/rodape.php")?>