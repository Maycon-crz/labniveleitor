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
	class tranferenciaEntreTabelasParaHoje{
		function tranferenciaDeDadosEntreTabelasParaHoje($con, $ferramentas, $listadados, $editadados, $refreshTranferirDadosEntreTabelas){
			$refreshTranferirDadosEntreTabelas = $ferramentas->filtrando($refreshTranferirDadosEntreTabelas);
			switch($refreshTranferirDadosEntreTabelas){
				case "RefreshAmanha":
					$refreshTranferirDadosEntreTabelas = "opcaoTabelaDeAmanha";
				break; case "RefreshDepoisDeAmanha":
					$refreshTranferirDadosEntreTabelas =  "opcaoTabelaDepoisDeAmanha";
				break; 
			}
			$listandoSolidos = $listadados->solidos($con, $ferramentas, $refreshTranferirDadosEntreTabelas, "Transferindo");

			$listadedados = array("");
			$listandoSemiSolidos = $listadados->semisolidos($con, $listadedados, $refreshTranferirDadosEntreTabelas, "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $valor, $nomehorariodb, $tipoTbHora, $cor, $diaDaTabela){

			// var_dump($listandoSolidos);

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveAmarela'], "oitonove", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVermelha'], "oitonove", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezVerde'], "novedez", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezAmarela'], "novedez", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezVermelha'], "novedez", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");

			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			// $editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");


		}
	}
	class editadados{
		function updateAtrasadasAdiantadas($con, $ferramentas, $inputAtrasadasAdiantadas, $parametroAtrasadasAdiantadas){						
			switch($parametroAtrasadasAdiantadas){
				case "adiantadas":
					$sqlEditaAtrasadasAdiantadas = "UPDATE pressaopedidos SET adiantadas=:inputAtrasadasAdiantadas WHERE 1=1";
				break;
				case "atrasadas":
					$sqlEditaAtrasadasAdiantadas = "UPDATE pressaopedidos SET atrasadas=:inputAtrasadasAdiantadas WHERE 1=1";
				break;
			}
			$editaAtrasadasAdiantadas = $con->prepare($sqlEditaAtrasadasAdiantadas);			
			$editaAtrasadasAdiantadas->bindParam(':inputAtrasadasAdiantadas', $inputAtrasadasAdiantadas);				
			if($editaAtrasadasAdiantadas->execute()){
				echo json_encode("A quantidade foi editada!");
			}else{
				echo json_encode("Erro ao editar a quantidade!");
			}
		}
		function editaPreProntos($con, $ferramentas, $idbtsPreProntos, $parametroexipientes){			
			$idbtsPreProntos = $ferramentas->filtrando($idbtsPreProntos);
			$parametroexipientes = $ferramentas->filtrando($parametroexipientes);
			switch($idbtsPreProntos){
				// case "Excipiente":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET excipiente=:parametroexipientes WHERE 1=1";
				// break;
				// case "CremeNaoIonico":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremenaoionico=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseGelAnastrozol":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET basegelanastrozol=:parametroexipientes WHERE 1=1";
				// break;
				// case "Tacrolimus":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET tacrolimus=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseSabonete":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET basesabonete=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseShampooPerolado":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseshampooperolado=:parametroexipientes WHERE 1=1";
				// break;
				// case "CremePsoriaseAguda":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremepsoriaseaguda=:parametroexipientes WHERE 1=1";
				// break;
				// case "FluoretoDeSodio":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET fluoretodesodio=:parametroexipientes WHERE 1=1";
				// break;
				// case "DescongestionanteNasal":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET descongestionantenasal=:parametroexipientes WHERE 1=1";
				// break;
				// case "LocaoCapilarMinoxidil":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET locaocapilarminoxidil=:parametroexipientes WHERE 1=1";
				// break;
				// case "AnastrozolDiluido":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET anastrozoldiluido=:parametroexipientes WHERE 1=1";
				// break;
				// case "MetilcobalaminaDiluida":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilcobalaminadiluida=:parametroexipientes WHERE 1=1";
				// break;
				// case "MetilfolatoDiluido":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";
				// break;
				// case "MetilTestosterona":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseEfervescenteAbacaxi":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseEfervescenteLimao":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";
				// break;
				// case "BaseEfervescenteLaranja":
				// 	$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";
				// break;
				case "Almoco":
					$sqlEditaPreProntos = "UPDATE pressaopedidos SET almoco=:parametroexipientes WHERE 1=1";
				break;
			}			
			$editaPreProntos = $con->prepare($sqlEditaPreProntos);
			$editaPreProntos->bindParam(':parametroexipientes', $parametroexipientes);
			if($editaPreProntos->execute()){
				echo json_encode("Alerta foi configurado!");
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
		function editaQTDformulas($con, $ferramentas, $valor, $nomehorariodb, $tipoTbHora, $cor, $diaDaTabela, $parametroTransferindo){
			$valor = $ferramentas->filtrando($valor); $nomehorariodb = $ferramentas->filtrando($nomehorariodb);
			$tipoTbHora = $ferramentas->filtrando($tipoTbHora); $cor = $ferramentas->filtrando($cor);
			$diaDaTabela = $ferramentas->filtrando($diaDaTabela);
			$diaDaTabelaSemiSolidos = "";
			$diaDaTabelaSolidos = "";
			switch($diaDaTabela){
				case 'opcaoTabelaDeHoje':
					$diaDaTabelaSemiSolidos = "semisolidos";
					$diaDaTabelaSolidos = "solidos";
				break; case 'opcaoTabelaDeAmanha':										
					$diaDaTabelaSemiSolidos = "semisolidosamanha";
					$diaDaTabelaSolidos = "solidosamanha";		
				break; case 'opcaoTabelaDepoisDeAmanha':					
					$diaDaTabelaSemiSolidos = "semisolidosdepoisdeamanha";
					$diaDaTabelaSolidos = "solidosdepoisdeamanha";					
				break;
			}
			switch($tipoTbHora){
				case 'solidos':
					switch($cor){
						case 'verde':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSolidos SET verde=:valor WHERE nomehorario=:nomehorariodb";
						break; case 'amarela':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSolidos SET amarela=:valor WHERE nomehorario=:nomehorariodb";
						break; case 'vermelha':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSolidos SET vermelha=:valor WHERE nomehorario=:nomehorariodb";
						break;
					}					
				break;
				case 'semisolidos':
					switch($cor){
						case 'verde':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSemiSolidos SET verde=:valor WHERE nomehorario=:nomehorariodb";
						break; case 'amarela':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSemiSolidos SET amarela=:valor WHERE nomehorario=:nomehorariodb";
						break; case 'vermelha':
							$sqlUpdateTbHora = "UPDATE $diaDaTabelaSemiSolidos SET vermelha=:valor WHERE nomehorario=:nomehorariodb";
						break;
					}			
				break;
			}
			$UpdateTbHora = $con->prepare($sqlUpdateTbHora);
			$UpdateTbHora->bindParam(":valor", $valor);
			$UpdateTbHora->bindParam(":nomehorariodb", $nomehorariodb);
			if($UpdateTbHora->execute()){
				if($parametroTransferindo == "controlador"){
					echo json_encode("Valor foi atualizado!");	
				}else{return "ok";}
			}else{
				if($parametroTransferindo == "controlador"){
					echo json_encode("Erro ao atualizar o valor");
				}else{return "erro";}
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
		function solidos($con, $ferramentas, $atualiza, $parametroTabelas){
			$listadedados = array("");
			switch($atualiza){
				case 'opcaoTabelaDeHoje':
					$sqlBuscasolidos = "SELECT nomehorario, verde, amarela, vermelha FROM solidos WHERE 1=1";
					$buscasolidos = $con->prepare($sqlBuscasolidos);					
				break; case 'opcaoTabelaDeAmanha':					
					$sqlBuscasolidos = "SELECT nomehorario, verde, amarela, vermelha FROM solidosamanha WHERE 1=1";
					$buscasolidos = $con->prepare($sqlBuscasolidos);					
				break; case 'opcaoTabelaDepoisDeAmanha':					
					$sqlBuscasolidos = "SELECT nomehorario, verde, amarela, vermelha FROM solidosdepoisdeamanha WHERE 1=1";
					$buscasolidos = $con->prepare($sqlBuscasolidos);					
				break;
			}
			if($buscasolidos->execute()){
				$resultadosSolidos = $buscasolidos->fetchAll(PDO::FETCH_ASSOC);					
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
				if($parametroTabelas == "Atualizando"){			
					$this->semisolidos($con, $listadedados, $atualiza, $parametroTabelas);
				}else{return $listadedados;}				
			}else{
				if($parametroTabelas == "Atualizando"){
					echo json_encode("Erro de busca de solidos");
				}else{return json_encode("Erro de busca de solidos");}				
			}
		}
		function semisolidos($con, $listadedados, $atualiza, $parametroTabelas){
			switch($atualiza){
				case 'opcaoTabelaDeHoje':
					$sqlBuscaSemiSolidos = "SELECT nomehorario, verde, amarela, vermelha FROM semisolidos WHERE 1=1";
					$buscaSemiSolidos = $con->prepare($sqlBuscaSemiSolidos);				
				break;
				case 'opcaoTabelaDeAmanha':					
					$sqlBuscaSemiSolidos = "SELECT nomehorario, verde, amarela, vermelha FROM semisolidosamanha WHERE 1=1";
					$buscaSemiSolidos = $con->prepare($sqlBuscaSemiSolidos);						
				break;
				case 'opcaoTabelaDepoisDeAmanha':					
					$sqlBuscaSemiSolidos = "SELECT nomehorario, verde, amarela, vermelha FROM semisolidosdepoisdeamanha WHERE 1=1";
					$buscaSemiSolidos = $con->prepare($sqlBuscaSemiSolidos);						
				break;
			}				
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
				if($parametroTabelas == "Atualizando"){			
					$this->nivelDePressaoEpedidos($con, $listadedados);
				}else{return $listadedados;}											
			}else{
				echo json_encode("Erro de busca de solidos");
			}
		}
		function nivelDePressaoEpedidos($con, $listadedados){
			$sqlBuscaPressaoPedidos = "SELECT nivel, pastaazul, atrasadas, adiantadas, pomerode, brusque, excipiente, cremenaoionico, basegelanastrozol, tacrolimus, basesabonete, baseshampooperolado, cremepsoriaseaguda, fluoretodesodio, descongestionantenasal, locaocapilarminoxidil, anastrozoldiluido, metilcobalaminadiluida, metilfolatodiluido, almoco FROM pressaopedidos WHERE 1=1";
			$buscaPressaoPedidos = $con->prepare($sqlBuscaPressaoPedidos);
			if($buscaPressaoPedidos->execute()){
				$resultadosPressaoPedidos = $buscaPressaoPedidos->fetchAll(PDO::FETCH_ASSOC);
				$listadedados['nivel'] = $resultadosPressaoPedidos[0]["nivel"];
				$listadedados['pastaazul'] = $resultadosPressaoPedidos[0]["pastaazul"];
				$listadedados['atrasadas'] = $resultadosPressaoPedidos[0]["atrasadas"];
				$listadedados['adiantadas'] = $resultadosPressaoPedidos[0]["adiantadas"];
				$listadedados['pomerode'] = $resultadosPressaoPedidos[0]["pomerode"];
				$listadedados['brusque'] = $resultadosPressaoPedidos[0]["brusque"];
				$listadedados['excipiente'] = $resultadosPressaoPedidos[0]["excipiente"];
				$listadedados['cremenaoionico'] = $resultadosPressaoPedidos[0]["cremenaoionico"];
				$listadedados['basegelanastrozol'] = $resultadosPressaoPedidos[0]["basegelanastrozol"];
				$listadedados['tacrolimus'] = $resultadosPressaoPedidos[0]["tacrolimus"];
				$listadedados['basesabonete'] = $resultadosPressaoPedidos[0]["basesabonete"];
				$listadedados['baseshampooperolado'] = $resultadosPressaoPedidos[0]["baseshampooperolado"];
				$listadedados['cremepsoriaseaguda'] = $resultadosPressaoPedidos[0]["cremepsoriaseaguda"];
				$listadedados['fluoretodesodio'] = $resultadosPressaoPedidos[0]["fluoretodesodio"];
				$listadedados['descongestionantenasal'] = $resultadosPressaoPedidos[0]["descongestionantenasal"];
				$listadedados['locaocapilarminoxidil'] = $resultadosPressaoPedidos[0]["locaocapilarminoxidil"];
				$listadedados['anastrozoldiluido'] = $resultadosPressaoPedidos[0]["anastrozoldiluido"];
				$listadedados['metilcobalaminadiluida'] = $resultadosPressaoPedidos[0]["metilcobalaminadiluida"];
				$listadedados['metilfolatodiluido'] = $resultadosPressaoPedidos[0]["metilfolatodiluido"];				
				$listadedados['almoco'] = $resultadosPressaoPedidos[0]["almoco"];
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
						<p class='p-0 m-0'>".$msgAvisosDB['horario']."</p><h2 class='p-0 m-0'>".$msgAvisosDB['nome'].":</h2>						
						<h5 class='p-0 m-0 text-danger'>".$msgAvisosDB['msg']."<img src='img/lixeiraum.gif' class='lixeiraum' id='".$msgAvisosDB['id']."'/></h5>			
					</div>";
				}				
				$listadedados['qtdavisos'] = $qtdavisos;
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
				$sqlNomeLogin = "SELECT nome, senha, nivel FROM usuarios WHERE nome=:nomeLogin";
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
								$_SESSION['nome'] = "{---".$retornado['nome']."---}";
								$_SESSION['nivel'] = $retornado['nivel'];
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
			session_unset();
			session_destroy();
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
			$tranferenciaEntreTabelasParaHoje = new tranferenciaEntreTabelasParaHoje;
			$editadados = new editadados;			
			$listadados = new listadados;
			$cadastroDeFuncionarios = new cadastroDeFuncionarios;
			$login = new login;
			$ferramentas = new ferramentas;

			// $tranferenciaEntreTabelasParaHoje->tranferenciaDeDadosEntreTabelasParaHoje($con, $ferramentas, $listadados, $editadados, "opcaoTabelaDeAmanha");
			if(isset($_POST['refreshTranferirDadosEntreTabelas'])){
				$tranferenciaEntreTabelasParaHoje->tranferenciaDeDadosEntreTabelasParaHoje($con, $ferramentas, $listadados, $editadados, $_POST['refreshTranferirDadosEntreTabelas']);
			}
			if(isset($_POST['inputAtrasadasAdiantadas']) || isset($_POST['parametroAtrasadasAdiantadas'])){
				$editadados->updateAtrasadasAdiantadas($con, $ferramentas, $_POST['inputAtrasadasAdiantadas'], $_POST['parametroAtrasadasAdiantadas']);
			}
			if(isset($_POST['idfinalizaexcipiente'])){
				session_start(); 
				if($_SESSION['nivel'] === "1"){
					$editadados->editaPreProntos($con, $ferramentas, $_POST['idfinalizaexcipiente'], 0);
				}else{echo json_encode("Função restrita ao laboratório!");}		
			}
			if(isset($_POST['idbtsPreProntos']) || isset($_POST['parametroexipientes'])){
				session_start(); 
				if($_SESSION['nivel'] === "1"){
					$editadados->editaPreProntos($con, $ferramentas, $_POST['idbtsPreProntos'], $_POST['parametroexipientes']);
				}else{echo json_encode("Função restrita ao laboratório!");}
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
				session_start(); 
				if($_SESSION['nivel'] === "1"){				
					$editadados->editapedidos($con, $ferramentas, $_POST['editapedidosnomefilial'], $_POST['editapedidosqtdpedidos']);
				}else{echo json_encode("Função restrita ao laboratório!");}
			}
			if(isset($_POST['valor'])){
				session_start(); 
				if($_SESSION['nivel'] === "1"){	
					$editadados->editaQTDformulas($con, $ferramentas, $_POST['valor'], $_POST['nomehorariodb'], $_POST['tipoTbHora'], $_POST['cor'], $_POST['diaDaTabela'], "controlador");
				}else{echo json_encode("Função restrita ao laboratório!");}
			}
			if(isset($_POST['nvPressao'])){
				session_start(); 
				if($_SESSION['nivel'] === "1"){
					$editadados->editaNivelDePressao($con, $ferramentas, $_POST['nvPressao']);
				}else{echo json_encode("Função restrita ao laboratório!");}								
			}
			// $listadados->solidos($con);
			if(isset($_POST['atualiza'])){				
				$listadados->solidos($con, $ferramentas, $_POST['atualiza'], "Atualizando");
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