<?php include('include/conn.php');?>
<?php session_start(['cookie_lifetime' => 43200,]);?>
<?php     
    class luana{
    	function transformaTextoRetornadoDaVozEmArray($ferramentas, $vozTexto){    		
			$voz = strtolower($vozTexto);
			$vozarray = explode(" ", $voz);		
			echo json_encode($vozarray);
    	}
    } 
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
		function zerandoDadosTabelaTranferidaDia($con, $ferramentas, $editadados, $refreshTranferirDadosEntreTabelas){							
			// -->solidos
			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");
			
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "solidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "solidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "solidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");
			// //<---
			// //Semi-Sólidos

			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "oitonove", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "novedez", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");
			
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dezonze", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "onzedoze", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dozetreze", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "trezequa", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quaqui", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "quidseis", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dseisdsete", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "dsetedoito", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "semisolidos", "verde", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "semisolidos", "amarela", $refreshTranferirDadosEntreTabelas, "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, "0", "doitodnove", "semisolidos", "vermelha", $refreshTranferirDadosEntreTabelas, "Transferindo");			
		}
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
			//--->Solidos

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVerde'], "oitonove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveAmarela'], "oitonove", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['oitonoveVermelha'], "oitonove", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezVerde'], "novedez", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezAmarela'], "novedez", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['novedezVermelha'], "novedez", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");
			
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dezonzeVerde'], "dezonze", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dezonzeAmarela'], "dezonze", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dezonzeVermelha'], "dezonze", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['onzedozeVerde'], "onzedoze", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['onzedozeAmarela'], "onzedoze", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['onzedozeVermelha'], "onzedoze", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dozetrezeVerde'], "dozetreze", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dozetrezeAmarela'], "dozetreze", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dozetrezeVermelha'], "dozetreze", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['trezequaVerde'], "trezequa", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['trezequaAmarela'], "trezequa", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['trezequaVermelha'], "trezequa", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quaquiVerde'], "quaqui", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quaquiAmarela'], "quaqui", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quaquiVermelha'], "quaqui", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quidseisVerde'], "quidseis", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quidseisAmarela'], "quidseis", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['quidseisVermelha'], "quidseis", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dseisdseteVerde'], "dseisdsete", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dseisdseteAmarela'], "dseisdsete", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dseisdseteVermelha'], "dseisdsete", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dsetedoitoVerde'], "dsetedoito", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dsetedoitoAmarela'], "dsetedoito", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['dsetedoitoVermelha'], "dsetedoito", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['doitodnoveVerde'], "doitodnove", "solidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['doitodnoveAmarela'], "doitodnove", "solidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSolidos['doitodnoveVermelha'], "doitodnove", "solidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");
			//<---
			//Semi-Sólidos
			$listadedados = array("");						
			$listandoSemiSolidos = $listadados->semisolidos($con, $listadedados, $refreshTranferirDadosEntreTabelas, "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_oitonoveVerde'], "oitonove", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_oitonoveAmarela'], "oitonove", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_oitonoveVermelha'], "oitonove", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_novedezVerde'], "novedez", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_novedezAmarela'], "novedez", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_novedezVermelha'], "novedez", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");
			
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dezonzeVerde'], "dezonze", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dezonzeAmarela'], "dezonze", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dezonzeVermelha'], "dezonze", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_onzedozeVerde'], "onzedoze", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_onzedozeAmarela'], "onzedoze", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_onzedozeVermelha'], "onzedoze", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dozetrezeVerde'], "dozetreze", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dozetrezeAmarela'], "dozetreze", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dozetrezeVermelha'], "dozetreze", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_trezequaVerde'], "trezequa", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_trezequaAmarela'], "trezequa", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_trezequaVermelha'], "trezequa", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quaquiVerde'], "quaqui", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quaquiAmarela'], "quaqui", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quaquiVermelha'], "quaqui", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quidseisVerde'], "quidseis", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quidseisAmarela'], "quidseis", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_quidseisVermelha'], "quidseis", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dseisdseteVerde'], "dseisdsete", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dseisdseteAmarela'], "dseisdsete", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dseisdseteVermelha'], "dseisdsete", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dsetedoitoVerde'], "dsetedoito", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dsetedoitoAmarela'], "dsetedoito", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_dsetedoitoVermelha'], "dsetedoito", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_doitodnoveVerde'], "doitodnove", "semisolidos", "verde", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_doitodnoveAmarela'], "doitodnove", "semisolidos", "amarela", "opcaoTabelaDeHoje", "Transferindo");
			$editadados->editaQTDformulas($con, $ferramentas, $listandoSemiSolidos['semisolidos_doitodnoveVermelha'], "doitodnove", "semisolidos", "vermelha", "opcaoTabelaDeHoje", "Transferindo");

			$this->zerandoDadosTabelaTranferidaDia($con, $ferramentas, $editadados, $refreshTranferirDadosEntreTabelas);
			//<--
		}
	}
	class editadados{
		function updateAtrasadasAdiantadas($con, $ferramentas, $inputAtrasadasAdiantadas, $parametroAtrasadasAdiantadas){						
			switch($parametroAtrasadasAdiantadas){
				case "adiantadas" :$sqlEditaAtrasadasAdiantadas = "UPDATE pressaopedidos SET adiantadas=:inputAtrasadasAdiantadas WHERE 1=1"; break;
				case "atrasadas"  :$sqlEditaAtrasadasAdiantadas = "UPDATE pressaopedidos SET atrasadas=:inputAtrasadasAdiantadas WHERE 1=1";  break;
			}
			$inputAtrasadasAdiantadas = $ferramentas->filtrando($inputAtrasadasAdiantadas);
			$editaAtrasadasAdiantadas = $con->prepare($sqlEditaAtrasadasAdiantadas);			
			$editaAtrasadasAdiantadas->bindParam(':inputAtrasadasAdiantadas', $inputAtrasadasAdiantadas);				
			if($editaAtrasadasAdiantadas->execute()){
				echo json_encode("A quantidade foi editada!");
			}else{ echo json_encode("Erro ao editar a quantidade!"); }
		}
		function editaPreProntos($con, $ferramentas, $idbtsPreProntos, $parametroexipientes){			
			$idbtsPreProntos = $ferramentas->filtrando($idbtsPreProntos);
			$parametroexipientes = $ferramentas->filtrando($parametroexipientes);	
			switch($idbtsPreProntos){
				case "Excipiente"		  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET excipiente=:parametroexipientes WHERE 1=1"; 		      break;
				case "CremeNaoIonico"	  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremenaoionico=:parametroexipientes WHERE 1=1";	          break;
				case "BaseGelAnastrozol"  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET basegelanastrozol=:parametroexipientes WHERE 1=1";        break;
				case "Tacrolimus"		  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET tacrolimus=:parametroexipientes WHERE 1=1";		          break;
				case "BaseSabonete"		  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET basesabonete=:parametroexipientes WHERE 1=1";	          break;
				case "BaseShampooPerolado":$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseshampooperolado=:parametroexipientes WHERE 1=1";      break;
				case "CremePsoriaseAguda" :$sqlEditaPreProntos = "UPDATE pressaopedidos SET cremepsoriaseaguda=:parametroexipientes WHERE 1=1";       break;
				case "FluoretoDeSodio"	  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET fluoretodesodio=:parametroexipientes WHERE 1=1";		  break;
				case "DescongestionanteNasal" :$sqlEditaPreProntos = "UPDATE pressaopedidos SET descongestionantenasal=:parametroexipientes WHERE 1=1"; break;
				case "LocaoCapilarMinoxidil"  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET locaocapilarminoxidil=:parametroexipientes WHERE 1=1";  break;
				case "AnastrozolDiluido"	  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET anastrozoldiluido=:parametroexipientes WHERE 1=1";	    break;
				case "MetilcobalaminaDiluida" :$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilcobalaminadiluida=:parametroexipientes WHERE 1=1"; break;
				case "MetilfolatoDiluido"	  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET metilfolatodiluido=:parametroexipientes WHERE 1=1";	    break;
				case "MetilTestosterona"	  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET metiltestosterona=:parametroexipientes WHERE 1=1";	    break;
				case "BaseEfervescenteAbacaxi":$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseefervescenteabacaxi=:parametroexipientes WHERE 1=1";break;
				case "BaseEfervescenteLimao"  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseefervescentelimao=:parametroexipientes WHERE 1=1";  break;
				case "BaseEfervescenteLaranja":$sqlEditaPreProntos = "UPDATE pressaopedidos SET baseefervescentelaranja=:parametroexipientes WHERE 1=1";break;
				case "PreProntoDigitado"      :$sqlEditaPreProntos = "UPDATE pressaopedidos SET preprontodigitado=:parametroexipientes WHERE 1=1";      break;
				case "Almoco"				  :$sqlEditaPreProntos = "UPDATE pressaopedidos SET almoco=:parametroexipientes WHERE 1=1";					break;
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
		function mostarQTDformulasAmanhaEdepoisDeAmanha($con, $ferramentas){
			$qtdProximasPastas = array("");
			$listadedados = array("");			
			$qtdPastasProximosDiasAmanhaSolidos = $this->solidos($con, $ferramentas, "opcaoTabelaDeAmanha", "contaPastasProximosDias");
			$qtdPastasProximosDiasAmanhaSemiSolidos = $this->semisolidos($con, $listadedados, "opcaoTabelaDeAmanha", "contaPastasProximosDias");					
			
			$qtdProximasPastas['amanha'] = (
				$qtdPastasProximosDiasAmanhaSolidos["oitonoveVerde"]+$qtdPastasProximosDiasAmanhaSolidos["oitonoveAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["oitonoveVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["novedezVerde"]+$qtdPastasProximosDiasAmanhaSolidos["novedezAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["novedezVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["dezonzeVerde"]+$qtdPastasProximosDiasAmanhaSolidos["dezonzeAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["dezonzeVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["onzedozeVerde"]+$qtdPastasProximosDiasAmanhaSolidos["onzedozeAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["onzedozeVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["dozetrezeVerde"]+$qtdPastasProximosDiasAmanhaSolidos["dozetrezeAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["dozetrezeVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["trezequaVerde"]+$qtdPastasProximosDiasAmanhaSolidos["trezequaAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["trezequaVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["quaquiVerde"]+$qtdPastasProximosDiasAmanhaSolidos["quaquiAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["quaquiVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["quidseisVerde"]+$qtdPastasProximosDiasAmanhaSolidos["quidseisAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["quidseisVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["dseisdseteVerde"]+$qtdPastasProximosDiasAmanhaSolidos["dseisdseteAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["dseisdseteVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["dsetedoitoVerde"]+$qtdPastasProximosDiasAmanhaSolidos["dsetedoitoAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["dsetedoitoVermelha"]+$qtdPastasProximosDiasAmanhaSolidos["doitodnoveVerde"]+$qtdPastasProximosDiasAmanhaSolidos["doitodnoveAmarela"]+$qtdPastasProximosDiasAmanhaSolidos["doitodnoveVermelha"]+
				$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_oitonoveVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_oitonoveAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_oitonoveVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_novedezVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_novedezAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_novedezVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dezonzeVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dezonzeAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dezonzeVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_onzedozeVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_onzedozeAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_onzedozeVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dozetrezeVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dozetrezeAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dozetrezeVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_trezequaVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_trezequaAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_trezequaVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quaquiVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quaquiAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quaquiVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quidseisVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quidseisAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_quidseisVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dseisdseteVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dseisdseteAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dseisdseteVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dsetedoitoVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dsetedoitoAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_dsetedoitoVermelha"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_doitodnoveVerde"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_doitodnoveAmarela"]+$qtdPastasProximosDiasAmanhaSemiSolidos["semisolidos_doitodnoveVermelha"]
			);						

			$qtdPastasProximosDiasDepoisSolidos = $this->solidos($con, $ferramentas, "opcaoTabelaDepoisDeAmanha", "contaPastasProximosDias");			
			$qtdPastasProximosDiasDepoisSemiSolidos = $this->semisolidos($con, $listadedados, "opcaoTabelaDepoisDeAmanha", "contaPastasProximosDias");
			$qtdProximasPastas['depoisDeAmanha'] = (
				$qtdPastasProximosDiasDepoisSolidos["oitonoveVerde"]+$qtdPastasProximosDiasDepoisSolidos["oitonoveAmarela"]+$qtdPastasProximosDiasDepoisSolidos["oitonoveVermelha"]+$qtdPastasProximosDiasDepoisSolidos["novedezVerde"]+$qtdPastasProximosDiasDepoisSolidos["novedezAmarela"]+$qtdPastasProximosDiasDepoisSolidos["novedezVermelha"]+$qtdPastasProximosDiasDepoisSolidos["dezonzeVerde"]+$qtdPastasProximosDiasDepoisSolidos["dezonzeAmarela"]+$qtdPastasProximosDiasDepoisSolidos["dezonzeVermelha"]+$qtdPastasProximosDiasDepoisSolidos["onzedozeVerde"]+$qtdPastasProximosDiasDepoisSolidos["onzedozeAmarela"]+$qtdPastasProximosDiasDepoisSolidos["onzedozeVermelha"]+$qtdPastasProximosDiasDepoisSolidos["dozetrezeVerde"]+$qtdPastasProximosDiasDepoisSolidos["dozetrezeAmarela"]+$qtdPastasProximosDiasDepoisSolidos["dozetrezeVermelha"]+$qtdPastasProximosDiasDepoisSolidos["trezequaVerde"]+$qtdPastasProximosDiasDepoisSolidos["trezequaAmarela"]+$qtdPastasProximosDiasDepoisSolidos["trezequaVermelha"]+$qtdPastasProximosDiasDepoisSolidos["quaquiVerde"]+$qtdPastasProximosDiasDepoisSolidos["quaquiAmarela"]+$qtdPastasProximosDiasDepoisSolidos["quaquiVermelha"]+$qtdPastasProximosDiasDepoisSolidos["quidseisVerde"]+$qtdPastasProximosDiasDepoisSolidos["quidseisAmarela"]+$qtdPastasProximosDiasDepoisSolidos["quidseisVermelha"]+$qtdPastasProximosDiasDepoisSolidos["dseisdseteVerde"]+$qtdPastasProximosDiasDepoisSolidos["dseisdseteAmarela"]+$qtdPastasProximosDiasDepoisSolidos["dseisdseteVermelha"]+$qtdPastasProximosDiasDepoisSolidos["dsetedoitoVerde"]+$qtdPastasProximosDiasDepoisSolidos["dsetedoitoAmarela"]+$qtdPastasProximosDiasDepoisSolidos["dsetedoitoVermelha"]+$qtdPastasProximosDiasDepoisSolidos["doitodnoveVerde"]+$qtdPastasProximosDiasDepoisSolidos["doitodnoveAmarela"]+$qtdPastasProximosDiasDepoisSolidos["doitodnoveVermelha"]+
				$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_oitonoveVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_oitonoveAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_oitonoveVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_novedezVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_novedezAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_novedezVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dezonzeVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dezonzeAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dezonzeVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_onzedozeVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_onzedozeAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_onzedozeVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dozetrezeVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dozetrezeAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dozetrezeVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_trezequaVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_trezequaAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_trezequaVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quaquiVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quaquiAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quaquiVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quidseisVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quidseisAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_quidseisVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dseisdseteVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dseisdseteAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dseisdseteVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dsetedoitoVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dsetedoitoAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_dsetedoitoVermelha"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_doitodnoveVerde"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_doitodnoveAmarela"]+$qtdPastasProximosDiasDepoisSemiSolidos["semisolidos_doitodnoveVermelha"]
			);	
			return $qtdProximasPastas;
		}
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
					$qtdPastasProximosDias = $this->mostarQTDformulasAmanhaEdepoisDeAmanha($con, $ferramentas);
					$listadedados['qtd_pastas_amanha'] = $qtdPastasProximosDias['amanha'];
					$listadedados['qtd_pastas_depois_de_amanha'] = $qtdPastasProximosDias['depoisDeAmanha'];			
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
			$sqlBuscaPressaoPedidos = "SELECT nivel, pastaazul, atrasadas, adiantadas, pomerode, brusque, excipiente, cremenaoionico, basegelanastrozol, tacrolimus, basesabonete, baseshampooperolado, cremepsoriaseaguda, fluoretodesodio, descongestionantenasal, locaocapilarminoxidil, anastrozoldiluido, metilcobalaminadiluida, metilfolatodiluido, metiltestosterona, baseefervescenteabacaxi, baseefervescentelimao, baseefervescentelaranja, preprontodigitado, almoco FROM pressaopedidos WHERE 1=1";
			$buscaPressaoPedidos = $con->prepare($sqlBuscaPressaoPedidos);
			if($buscaPressaoPedidos->execute()){
				$resultadosPressaoPedidos 		= $buscaPressaoPedidos->fetchAll(PDO::FETCH_ASSOC);
				$listadedados['nivel'] 			= $resultadosPressaoPedidos[0]["nivel"];
				$listadedados['pastaazul'] 		= $resultadosPressaoPedidos[0]["pastaazul"];
				$listadedados['atrasadas'] 		= $resultadosPressaoPedidos[0]["atrasadas"];
				$listadedados['adiantadas'] 	= $resultadosPressaoPedidos[0]["adiantadas"];
				$listadedados['pomerode'] 		= $resultadosPressaoPedidos[0]["pomerode"];
				$listadedados['brusque'] 		= $resultadosPressaoPedidos[0]["brusque"];
				$listadedados['excipiente'] 	= $resultadosPressaoPedidos[0]["excipiente"];
				$listadedados['cremenaoionico'] = $resultadosPressaoPedidos[0]["cremenaoionico"];
				$listadedados['basegelanastrozol'] 		= $resultadosPressaoPedidos[0]["basegelanastrozol"];
				$listadedados['tacrolimus'] 			= $resultadosPressaoPedidos[0]["tacrolimus"];
				$listadedados['basesabonete'] 			= $resultadosPressaoPedidos[0]["basesabonete"];
				$listadedados['baseshampooperolado'] 	= $resultadosPressaoPedidos[0]["baseshampooperolado"];
				$listadedados['cremepsoriaseaguda'] 	= $resultadosPressaoPedidos[0]["cremepsoriaseaguda"];
				$listadedados['fluoretodesodio'] 		= $resultadosPressaoPedidos[0]["fluoretodesodio"];
				$listadedados['descongestionantenasal'] = $resultadosPressaoPedidos[0]["descongestionantenasal"];
				$listadedados['locaocapilarminoxidil'] 	= $resultadosPressaoPedidos[0]["locaocapilarminoxidil"];
				$listadedados['anastrozoldiluido'] 		= $resultadosPressaoPedidos[0]["anastrozoldiluido"];
				$listadedados['metilcobalaminadiluida'] = $resultadosPressaoPedidos[0]["metilcobalaminadiluida"];
				$listadedados['metilfolatodiluido'] 	= $resultadosPressaoPedidos[0]["metilfolatodiluido"];

				$listadedados['metiltestosterona'] 		= $resultadosPressaoPedidos[0]["metiltestosterona"];
				$listadedados['baseefervescenteabacaxi']= $resultadosPressaoPedidos[0]["baseefervescenteabacaxi"];
				$listadedados['baseefervescentelimao'] 	= $resultadosPressaoPedidos[0]["baseefervescentelimao"];
				$listadedados['baseefervescentelaranja']= $resultadosPressaoPedidos[0]["baseefervescentelaranja"];
				$listadedados['preprontodigitado']		= $resultadosPressaoPedidos[0]["preprontodigitado"];				
				$listadedados['almoco'] 				= $resultadosPressaoPedidos[0]["almoco"];
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
								// session_start();
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
			session_unset();
			session_destroy();
			session_start(['cookie_lifetime' => 43200,]);
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
						
			$luana = new luana;
			$avisos = new avisos;
			$tranferenciaEntreTabelasParaHoje = new tranferenciaEntreTabelasParaHoje;
			$editadados = new editadados;			
			$listadados = new listadados;
			$cadastroDeFuncionarios = new cadastroDeFuncionarios;
			$login = new login;
			$ferramentas = new ferramentas;

			if(isset($_POST['voz'])){
				$luana->transformaTextoRetornadoDaVozEmArray($ferramentas, $_POST['voz']);				
			}

			// $tranferenciaEntreTabelasParaHoje->tranferenciaDeDadosEntreTabelasParaHoje($con, $ferramentas, $listadados, $editadados, "opcaoTabelaDeAmanha");
			if(isset($_POST['refreshTranferirDadosEntreTabelas'])){
				$tranferenciaEntreTabelasParaHoje->tranferenciaDeDadosEntreTabelasParaHoje($con, $ferramentas, $listadados, $editadados, $_POST['refreshTranferirDadosEntreTabelas']);
			}
			if(isset($_POST['inputAtrasadasAdiantadas']) || isset($_POST['parametroAtrasadasAdiantadas'])){
				$editadados->updateAtrasadasAdiantadas($con, $ferramentas, $_POST['inputAtrasadasAdiantadas'], $_POST['parametroAtrasadasAdiantadas']);
			}
			if(isset($_POST['idfinalizaexcipiente'])){
				// session_start();
				if($_SESSION['nivel'] === "1"){
					$editadados->editaPreProntos($con, $ferramentas, $_POST['idfinalizaexcipiente'], 0);
				}else{echo json_encode("Função restrita ao laboratório!");}		
			}
			if(isset($_POST['idbtsPreProntos']) || isset($_POST['parametroexipientes'])){
				// session_start();
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
				// session_start();
				if($_SESSION['nivel'] === "1"){				
					$editadados->editapedidos($con, $ferramentas, $_POST['editapedidosnomefilial'], $_POST['editapedidosqtdpedidos']);
				}else{echo json_encode("Função restrita ao laboratório!");}
			}
			if(isset($_POST['valor'])){
				// session_start();
				if($_SESSION['nivel'] === "1"){	
					$editadados->editaQTDformulas($con, $ferramentas, $_POST['valor'], $_POST['nomehorariodb'], $_POST['tipoTbHora'], $_POST['cor'], $_POST['diaDaTabela'], "controlador");
				}else{echo json_encode("Função restrita ao laboratório!");}
			}
			if(isset($_POST['nvPressao'])){
				// session_start();
				if($_SESSION['nivel'] === "1"){
					$editadados->editaNivelDePressao($con, $ferramentas, $_POST['nvPressao']);
				}else{echo json_encode("Função restrita ao laboratório!");}								
			}			
			// $listadados->solidos($con, $ferramentas, 'opcaoTabelaDeAmanha', "Atualizando");
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