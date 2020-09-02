<?php include('include/conn.php');?>
<?php
    $_SESSION['logado'] = "nao";
	class avisos{
		function excluiAviso($con, $ferramentas, $idlixeira){
			$idlixeira = $ferramentas->filtrando($idlixeira);
			$sqlDeleteAviso = "DELETE FROM avisos WHERE id=:idlixeira";
			$deleteAviso = $con->prepare($sqlDeleteAviso);			
			$deleteAviso->bindParam(":idlixeira", $idlixeira);
			if($deleteAviso->execute()){
				echo json_encode("Aviso Apagado!");
			}else{
				echo json_encode("Erro ao apagar Aviso!");
			}
		}
		function validaAviso($con, $inputnomemensageiro, $inputaviso, $ferramentas){
			if(!empty($inputnomemensageiro)){
				if(!empty($inputaviso)){
					$inputnomemensageiro = $ferramentas->filtrando($inputnomemensageiro);
					$inputaviso =$ferramentas->filtrando($inputaviso);
					$this->cadastraAviso($con, $inputnomemensageiro, $inputaviso);
				}else{
					echo json_encode("Digite seu aviso!");	
				}
			}else{
				echo json_encode("Informe seu nome!");
			}
		}
		function cadastraAviso($con, $inputnomemensageiro, $inputaviso){
			date_default_timezone_set('America/Sao_Paulo');
			$horario = date('H:i:s');
			$sqlInsertAviso = "INSERT INTO avisos(nome, msg, horario) VALUES(:nome, :msg, :horario)";
			$insertAviso = $con->prepare($sqlInsertAviso);
			$insertAviso->bindParam(":nome", $inputnomemensageiro);
			$insertAviso->bindParam(":msg", $inputaviso);
			$insertAviso->bindParam(":horario", $horario);
			if($insertAviso->execute()){
				echo json_encode("Aviso Enviado!");
			}else{
				echo json_encode("Erro ao enviar Aviso!");
			}
		}
	}
	class editadados{
		function editaPreProntos($con, $ferramentas, $idbtsPreProntos, $parametroexipientes){			
			$idbtsPreProntos = $ferramentas->filtrando($idbtsPreProntos);
			$parametroexipientes = $ferramentas->filtrando($parametroexipientes);
			switch($idbtsPreProntos){
				case "Excipiente":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET excipiente=:parametroexipientes WHERE 1=1";
				break;
				case "CremeNaoIonico":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremenaoionico=:parametroexipientes WHERE 1=1";
				break;
				case "BaseGelAnastrozol":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET basegelanastrozol=:parametroexipientes WHERE 1=1";
				break;
				case "Tacrolimus":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET tacrolimus=:parametroexipientes WHERE 1=1";
				break;
				case "BaseSabonete":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET basesabonete=:parametroexipientes WHERE 1=1";
				break;
				case "BaseShampooPerolado":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseshampooperolado=:parametroexipientes WHERE 1=1";
				break;
				case "CremePsoriaseAguda":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremepsoriaseaguda=:parametroexipientes WHERE 1=1";
				break;
				case "FluoretoDeSodio":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET fluoretodesodio=:parametroexipientes WHERE 1=1";
				break;
				case "DescongestionanteNasal":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET descongestionantenasal=:parametroexipientes WHERE 1=1";
				break;
				case "LocaoCapilarMinoxidil":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET locaocapilarminoxidil=:parametroexipientes WHERE 1=1";
				break;
			}			
			$editaPreProntos = $con->prepare($sqlEditaPreProntos);
			$editaPreProntos->bindParam(':parametroexipientes', $parametroexipientes);
			if($editaPreProntos->execute()){
				echo json_encode("Alerta inserido com sucesso!");
			}else{
				echo json_encode("Erro em inserir alerta!");
			}
		}
		function editaValorPastaAzul($con, $ferramentas, $valorPastaAzul){
			$valorPastaAzul = $ferramentas->filtrando($valorPastaAzul);
			$sqlPastaAzul = "UPDATE pressaopedidos SET pastaazul=:valorPastaAzul WHERE 1=1";
			$pastaAzul = $con->prepare($sqlPastaAzul);
			$pastaAzul->bindParam(':valorPastaAzul', $valorPastaAzul);
			if($pastaAzul->execute()){
				echo json_encode("QTD pasta Azul editada!");
			}else{
				echo json_encode("Erro na edicao de pasta Azul!");
			}
		}
		function editapedidos($con, $ferramentas, $editapedidosnomefilial, $editapedidosqtdpedidos){
			$editapedidosnomefilial = $ferramentas->filtrando($editapedidosnomefilial);
			$editapedidosqtdpedidos = $ferramentas->filtrando($editapedidosqtdpedidos);
			switch($editapedidosnomefilial){
				case 'pomerode':
					$sqlUpdatePedidos = "UPDATE pressaopedidos SET pomerode=:editapedidosqtdpedidos WHERE 1=1";
				break;
				case 'brusque':
					$sqlUpdatePedidos = "UPDATE pressaopedidos SET brusque=:editapedidosqtdpedidos WHERE 1=1";
				break;
			}
			$updatePedidos = $con->prepare($sqlUpdatePedidos);
			$updatePedidos->bindParam(':editapedidosqtdpedidos', $editapedidosqtdpedidos);
			if($updatePedidos->execute()){
				echo json_encode("Pedido foi atualizado!");
			}else{
				echo json_encode("Erro ao atualizar o pedido!");
			}
		}
		function editaQTDformulasSolidos($con, $ferramentas, $valor, $nomehorariodb, $tipoTbHora, $cor){
			$valor = $ferramentas->filtrando($valor); $nomehorariodb = $ferramentas->filtrando($nomehorariodb);
			$tipoTbHora = $ferramentas->filtrando($tipoTbHora); $cor = $ferramentas->filtrando($cor);
			switch($tipoTbHora){
				case 'solidos':
					switch($cor){
						case 'verde':
							$sqlUpdateTbHora = "UPDATE solidos SET verde=:valor WHERE nomehorario=:nomehorariodb";
						break;
						case 'amarela':
							$sqlUpdateTbHora = "UPDATE solidos SET amarela=:valor WHERE nomehorario=:nomehorariodb";
						break;
						case 'vermelha':
							$sqlUpdateTbHora = "UPDATE solidos SET vermelha=:valor WHERE nomehorario=:nomehorariodb";
						break;
					}					
				break;
				case 'semisolidos':
					switch($cor){
						case 'verde':
							$sqlUpdateTbHora = "UPDATE semisolidos SET verde=:valor WHERE nomehorario=:nomehorariodb";
						break;
						case 'amarela':
							$sqlUpdateTbHora = "UPDATE semisolidos SET amarela=:valor WHERE nomehorario=:nomehorariodb";
						break;
						case 'vermelha':
							$sqlUpdateTbHora = "UPDATE semisolidos SET vermelha=:valor WHERE nomehorario=:nomehorariodb";
						break;
					}			
				break;
			}
			$UpdateTbHora = $con->prepare($sqlUpdateTbHora);
			$UpdateTbHora->bindParam(":valor", $valor);
			$UpdateTbHora->bindParam(":nomehorariodb", $nomehorariodb);
			if($UpdateTbHora->execute()){
				echo json_encode("Valor foi atualizado!");
			}else{
				echo json_encode("Erro ao atualizar o valor");
			}
		}
		function editaNivelDePressao($con, $ferramentas, $parametronivel){	
			$parametronivel = $ferramentas->filtrando($parametronivel);
			$sqlUpdateNivel = "UPDATE pressaopedidos SET nivel=:nivel WHERE 1=1";
			$updateNivel = $con->prepare($sqlUpdateNivel);
			$updateNivel->bindParam(':nivel', $parametronivel);
			if($updateNivel->execute()){
				echo json_encode("Nível de pressão foi alterado para ".$parametronivel);
			}else{
				echo json_encode("Erro ao trocar de nivel!");	
			}
		}		
	}
	class listadados{
		function solidos($con){
			$sqlBuscasolidos = "SELECT nomehorario, verde, amarela, vermelha FROM solidos WHERE 1=1";
			$buscasolidos = $con->prepare($sqlBuscasolidos);
			if($buscasolidos->execute()){
				$resultadosSolidos = $buscasolidos->fetchAll(PDO::FETCH_ASSOC);
				$listadedados = array("");		
				$listadedados['oitonoveVerde'] 	= $resultadosSolidos[0]["verde"];
				$listadedados['oitonoveAmarela'] 	= $resultadosSolidos[0]["amarela"];
				$listadedados['oitonoveVermelha'] 	= $resultadosSolidos[0]["vermelha"];

				$listadedados['novedezVerde'] 		= $resultadosSolidos[1]["verde"];
				$listadedados['novedezAmarela'] 	= $resultadosSolidos[1]["amarela"];
				$listadedados['novedezVermelha'] 	= $resultadosSolidos[1]["vermelha"];

				$listadedados['dezonzeVerde'] 		= $resultadosSolidos[2]["verde"];
				$listadedados['dezonzeAmarela'] 	= $resultadosSolidos[2]["amarela"];
				$listadedados['dezonzeVermelha'] 	= $resultadosSolidos[2]["vermelha"];

				$listadedados['onzedozeVerde'] 	= $resultadosSolidos[3]["verde"];
				$listadedados['onzedozeAmarela'] 	= $resultadosSolidos[3]["amarela"];
				$listadedados['onzedozeVermelha'] 	= $resultadosSolidos[3]["vermelha"];

				$listadedados['dozetrezeVerde'] 	= $resultadosSolidos[4]["verde"];
				$listadedados['dozetrezeAmarela'] 	= $resultadosSolidos[4]["amarela"];
				$listadedados['dozetrezeVermelha'] 	= $resultadosSolidos[4]["vermelha"];

				$listadedados['trezequaVerde'] 	= $resultadosSolidos[5]["verde"];
				$listadedados['trezequaAmarela'] 	= $resultadosSolidos[5]["amarela"];
				$listadedados['trezequaVermelha'] 	= $resultadosSolidos[5]["vermelha"];

				$listadedados['quaquiVerde'] 		= $resultadosSolidos[6]["verde"];
				$listadedados['quaquiAmarela'] 	= $resultadosSolidos[6]["amarela"];
				$listadedados['quaquiVermelha'] 	= $resultadosSolidos[6]["vermelha"];

				$listadedados['quidseisVerde'] 	= $resultadosSolidos[7]["verde"];
				$listadedados['quidseisAmarela'] 	= $resultadosSolidos[7]["amarela"];
				$listadedados['quidseisVermelha'] 	= $resultadosSolidos[7]["vermelha"];

				$listadedados['dseisdseteVerde'] 	= $resultadosSolidos[8]["verde"];
				$listadedados['dseisdseteAmarela'] = $resultadosSolidos[8]["amarela"];
				$listadedados['dseisdseteVermelha'] = $resultadosSolidos[8]["vermelha"];

				$listadedados['dsetedoitoVerde'] 	= $resultadosSolidos[9]["verde"];
				$listadedados['dsetedoitoAmarela'] = $resultadosSolidos[9]["amarela"];
				$listadedados['dsetedoitoVermelha'] = $resultadosSolidos[9]["vermelha"];	

				$listadedados['doitodnoveVerde'] 	= $resultadosSolidos[10]["verde"];
				$listadedados['doitodnoveAmarela'] = $resultadosSolidos[10]["amarela"];
				$listadedados['doitodnoveVermelha'] = $resultadosSolidos[10]["vermelha"];				
				$this->semisolidos($con, $listadedados);
			}else{
				echo json_encode("Erro de busca de solidos");
			}
		}
		function semisolidos($con, $listadedados){
			$sqlBuscaSemiSolidos = "SELECT nomehorario, verde, amarela, vermelha FROM semisolidos WHERE 1=1";
			$buscaSemiSolidos = $con->prepare($sqlBuscaSemiSolidos);
			if($buscaSemiSolidos->execute()){
				$resultadosSemiSolidos = $buscaSemiSolidos->fetchAll(PDO::FETCH_ASSOC);
				$listadedados['semisolidos_oitonoveVerde'] 	= $resultadosSemiSolidos[0]["verde"];
				$listadedados['semisolidos_oitonoveAmarela'] 	= $resultadosSemiSolidos[0]["amarela"];
				$listadedados['semisolidos_oitonoveVermelha'] 	= $resultadosSemiSolidos[0]["vermelha"];

				$listadedados['semisolidos_novedezVerde'] 		= $resultadosSemiSolidos[1]["verde"];
				$listadedados['semisolidos_novedezAmarela'] 	= $resultadosSemiSolidos[1]["amarela"];
				$listadedados['semisolidos_novedezVermelha'] 	= $resultadosSemiSolidos[1]["vermelha"];

				$listadedados['semisolidos_dezonzeVerde'] 		= $resultadosSemiSolidos[2]["verde"];
				$listadedados['semisolidos_dezonzeAmarela'] 	= $resultadosSemiSolidos[2]["amarela"];
				$listadedados['semisolidos_dezonzeVermelha'] 	= $resultadosSemiSolidos[2]["vermelha"];

				$listadedados['semisolidos_onzedozeVerde'] 	= $resultadosSemiSolidos[3]["verde"];
				$listadedados['semisolidos_onzedozeAmarela'] 	= $resultadosSemiSolidos[3]["amarela"];
				$listadedados['semisolidos_onzedozeVermelha'] 	= $resultadosSemiSolidos[3]["vermelha"];

				$listadedados['semisolidos_dozetrezeVerde'] 	= $resultadosSemiSolidos[4]["verde"];
				$listadedados['semisolidos_dozetrezeAmarela'] 	= $resultadosSemiSolidos[4]["amarela"];
				$listadedados['semisolidos_dozetrezeVermelha'] = $resultadosSemiSolidos[4]["vermelha"];

				$listadedados['semisolidos_trezequaVerde'] 	= $resultadosSemiSolidos[5]["verde"];
				$listadedados['semisolidos_trezequaAmarela'] 	= $resultadosSemiSolidos[5]["amarela"];
				$listadedados['semisolidos_trezequaVermelha'] 	= $resultadosSemiSolidos[5]["vermelha"];

				$listadedados['semisolidos_quaquiVerde'] 		= $resultadosSemiSolidos[6]["verde"];
				$listadedados['semisolidos_quaquiAmarela'] 	= $resultadosSemiSolidos[6]["amarela"];
				$listadedados['semisolidos_quaquiVermelha'] 	= $resultadosSemiSolidos[6]["vermelha"];

				$listadedados['semisolidos_quidseisVerde'] 	= $resultadosSemiSolidos[7]["verde"];
				$listadedados['semisolidos_quidseisAmarela'] 	= $resultadosSemiSolidos[7]["amarela"];
				$listadedados['semisolidos_quidseisVermelha'] 	= $resultadosSemiSolidos[7]["vermelha"];

				$listadedados['semisolidos_dseisdseteVerde'] 	= $resultadosSemiSolidos[8]["verde"];
				$listadedados['semisolidos_dseisdseteAmarela'] = $resultadosSemiSolidos[8]["amarela"];
				$listadedados['semisolidos_dseisdseteVermelha'] = $resultadosSemiSolidos[8]["vermelha"];

				$listadedados['semisolidos_dsetedoitoVerde'] 	= $resultadosSemiSolidos[9]["verde"];
				$listadedados['semisolidos_dsetedoitoAmarela'] = $resultadosSemiSolidos[9]["amarela"];
				$listadedados['semisolidos_dsetedoitoVermelha'] = $resultadosSemiSolidos[9]["vermelha"];	

				$listadedados['semisolidos_doitodnoveVerde'] 	= $resultadosSemiSolidos[10]["verde"];
				$listadedados['semisolidos_doitodnoveAmarela'] = $resultadosSemiSolidos[10]["amarela"];
				$listadedados['semisolidos_doitodnoveVermelha'] = $resultadosSemiSolidos[10]["vermelha"];								
				$this->nivelDePressaoEpedidos($con, $listadedados);
			}else{
				echo json_encode("Erro de busca de solidos");
			}
		}
		function nivelDePressaoEpedidos($con, $listadedados){
			$sqlBuscaPressaoPedidos = "SELECT nivel, pastaazul, pomerode, brusque FROM pressaopedidos WHERE 1=1";
			$buscaPressaoPedidos = $con->prepare($sqlBuscaPressaoPedidos);
			if($buscaPressaoPedidos->execute()){
				$resultadosPressaoPedidos = $buscaPressaoPedidos->fetchAll(PDO::FETCH_ASSOC);
				$listadedados['nivel'] = $resultadosPressaoPedidos[0]["nivel"];
				$listadedados['pastaazul'] = $resultadosPressaoPedidos[0]["pastaazul"];
				$listadedados['pomerode'] = $resultadosPressaoPedidos[0]["pomerode"];
				$listadedados['brusque'] = $resultadosPressaoPedidos[0]["brusque"];
				$this->mostraAvisos($con, $listadedados);
			}else{
				echo json_encode("Erro de busca em pressaopedidos");
			}
		}
		function mostraAvisos($con, $listadedados){
			$sqlListaAvisos = "SELECT id, nome, msg, horario FROM avisos WHERE 1=1";
			$listaAvisos = $con->prepare($sqlListaAvisos);
			$listadedados['avisosbanco'] = "";
			if($listaAvisos->execute()){
				$msgAvisos = $listaAvisos->fetchAll(PDO::FETCH_ASSOC);
				$avisosDB = "";
				$qtdavisos=0;				
				foreach($msgAvisos as $msgAvisosDB){
					$qtdavisos++;					
					$avisosDB .= "<div class='border border-danger'>						
						<p class='p-0 m-0'>".$msgAvisosDB['horario']."</p><h2 class='p-0 m-0'>".$msgAvisosDB['nome'].": </h2>						
						<h5 class='p-0 m-0 text-danger'>".$msgAvisosDB['msg']."<img src='img/lixeiraum.gif' class='lixeiraum' id='".$msgAvisosDB['id']."'/></h5>			
					</div>";
				}				
				$listadedados['avisosbanco'] = $avisosDB;
			}
			echo json_encode($listadedados);
		}
	}
	class cadastroDeFuncionarios{
		function cadastroDeFuncionarioDB($con, $cadnome, $cadsenha){
			$sqlInsertFuncionario = "INSERT INTO usuarios(nome, senha) VALUES(:cadnome, :cadsenha)";
			$insertFuncionario = $con->prepare($sqlInsertFuncionario);
			$insertFuncionario->bindParam(":cadnome", $cadnome);
			$insertFuncionario->bindParam(":cadsenha", $cadsenha);
			if($insertFuncionario->execute()){
				echo json_encode("Cadastrado com sucesso!");
			}else{
				echo json_encode("Erro ao cadastrar!");
			}
		}
		function validaCadastroDeFuncionario($con, $cadnome, $cadsenha, $ferramentas){
			if(!empty($cadnome)){
				$cadnome = strtolower($ferramentas->filtrando($cadnome));				
				$sqlCadVerNome = "SELECT nome FROM usuarios WHERE nome=:cadnome";
				$cadVerNome = $con->prepare($sqlCadVerNome);
				$cadVerNome->bindParam(":cadnome", $cadnome);
				if($cadVerNome->execute()){
					$cadVerNomedb = $cadVerNome->fetchAll(PDO::FETCH_ASSOC);
					$verificandoNome = "";
					foreach($cadVerNomedb as $VerNome){
						$verificandoNome = $VerNome['nome'];
					}
					if($verificandoNome == ""){						
						if(!empty($cadsenha)){
							$contasenha = strlen($cadsenha);
							if($contasenha >=8){
								$cadsenha = $ferramentas->filtrando($cadsenha);
								$options = ['cost' => 10,];
								$cadsenha = password_hash($cadsenha, PASSWORD_DEFAULT, $options);
								$this->cadastroDeFuncionarioDB($con, $cadnome, $cadsenha);
							}else{
								echo json_encode("Senha muito insegura!");
							}					
						}else{
							echo json_encode("Informe sua senha!");
						}
					}else{
						echo json_encode("Já existe um usuário com este nome!");
					}				
				}else{
					echo json_encode("Erro ao verificar nome!");
				}				
			}else{
				echo json_encode("Informe o nome!");
			}
		}
	}
	class login{
		function validaLogin($con, $nome, $senha, $ferramentas){
			if(!empty($nome)){
				$nome = strtolower($ferramentas->filtrando($nome));
				$senha = $ferramentas->filtrando($senha);
				$sqlNomeLogin = "SELECT nome, senha FROM usuarios WHERE nome=:nomeLogin";
				$nomeLogin = $con->prepare($sqlNomeLogin);
				$nomeLogin->bindParam(":nomeLogin", $nome);
				if($nomeLogin->execute()){
					$logindb = $nomeLogin->fetchAll(PDO::FETCH_ASSOC);
					$retornado = array("");
					foreach($logindb as $dadosdb){
						$retornado = $dadosdb;
					}
					if(!empty($retornado['nome']) AND $retornado['nome'] == $nome){
						if(!empty($senha)){							
							if(password_verify($senha, $retornado['senha'])){	
								session_start();
								$_SESSION['logado'] = "sim";
								echo json_encode("Senha Correta");
							}else{
								echo json_encode("Senha incorreta");
							}
						}else{
							echo json_encode("Informe sua senha!");
						}					
					}else{
						echo json_encode("Esse Nome não está cadastrado!");
					}
				}else{
					echo json_encode("Erro de nome!");
				}
			}else{
				echo json_encode("Informe seu nome!");
			}
		}
	}
	class ferramentas{
		function sair(){
			session_start();
			$_SESSION['logado'] = "nao";
			echo json_encode("saiu");
		}
		function filtrando($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;		
		}
	}
	class inicia{
		function iniciando(){			
			$banco = new banco;
			$con = $banco->conexao();
			
			$avisos = new avisos;
			$editadados = new editadados;
			$listadados = new listadados;
			$cadastroDeFuncionarios = new cadastroDeFuncionarios;
			$login = new login;
			$ferramentas = new ferramentas;

			if(isset($_POST['idbtsPreProntos']) || isset($_POST['parametroexipientes'])){
				$editadados->editaPreProntos($con, $ferramentas, $_POST['idbtsPreProntos'], $_POST['parametroexipientes']);
			}
			if(isset($_POST['idlixeira'])){
				$avisos->excluiAviso($con, $ferramentas, $_POST['idlixeira']);
			}
			if(isset($_POST['inputnomemensageiro']) || isset($_POST['inputaviso'])){
				$avisos->validaAviso($con, $_POST['inputnomemensageiro'], $_POST['inputaviso'], $ferramentas);				
			}
			if(isset($_POST['valorPastaAzul'])){				
				$editadados->editaValorPastaAzul($con, $ferramentas, $_POST['valorPastaAzul']);
			}
			if(isset($_POST['editapedidosnomefilial'])){				
				$editadados->editapedidos($con, $ferramentas, $_POST['editapedidosnomefilial'], $_POST['editapedidosqtdpedidos']);
			}
			if(isset($_POST['valor'])){				
				$editadados->editaQTDformulasSolidos($con, $ferramentas, $_POST['valor'], $_POST['nomehorariodb'], $_POST['tipoTbHora'], $_POST['cor']);
			}
			if(isset($_POST['nvPressao'])){
				$editadados->editaNivelDePressao($con, $ferramentas, $_POST['nvPressao']);								
			}
			if(isset($_POST['atualiza'])){
				$listadados->solidos($con);
			}	
			if(isset($_POST['sair'])){
				$ferramentas->sair();
			}
			if(isset($_POST['cadnome']) || isset($_POST['cadsenha'])){
				$cadastroDeFuncionarios->validaCadastroDeFuncionario($con, $_POST['cadnome'], $_POST['cadsenha'], $ferramentas);
			}
			if(isset($_POST['nome']) || isset($_POST['senha'])){
				$login->validaLogin($con, $_POST['nome'], $_POST['senha'], $ferramentas);				
			}
		}
	}
	$inicia = new inicia;
	$inicia->iniciando();
?>