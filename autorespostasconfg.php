<?php require_once("include/conn.php");?>
<?php

	class msgsProntas{		
		function excluindoMSGSprontas($con, $ferramentas, $idbtExluiMSGSprontaDB){
			$idbtExluiMSGSprontaDB = $ferramentas->filtrando($idbtExluiMSGSprontaDB);
			$sqlDeleteMSGSprontaDB = "DELETE FROM mensagensprontas WHERE id=:idbtExluiMSGSprontaDB";
			// echo json_encode("Bora Funcao foi chamada ".$idbtExluiMSGSprontaDB);
			$deleteMSGSprontaDB = $con->prepare($sqlDeleteMSGSprontaDB);
			$deleteMSGSprontaDB->bindParam(':idbtExluiMSGSprontaDB', $idbtExluiMSGSprontaDB);
			if($deleteMSGSprontaDB->execute()){
				echo json_encode("Excluido com Sucesso!");
			}else{
				echo json_encode("Erro ao Excluir a Menssagem!");
			}
		}
		function editandoMSGSprontas($con, $ferramentas, $inputAssuntoMSGSdinamicasDB, $textareaMSGSdinamicasDB, $DBidbtEditaMSGSpronta){			
			$inputAssuntoMSGSdinamicasDB = $ferramentas->filtrando($inputAssuntoMSGSdinamicasDB);
			$textareaMSGSdinamicasDB = $ferramentas->filtrando($textareaMSGSdinamicasDB);
			$DBidbtEditaMSGSpronta = $ferramentas->filtrando($DBidbtEditaMSGSpronta);
			$sqlUpdateMSGSprontas = "UPDATE mensagensprontas SET mensagemparacadastro=:textareaMSGSdinamicasDB, assuntomsgpronta=:inputAssuntoMSGSdinamicasDB WHERE id=:DBidbtEditaMSGSpronta";
			$updateMSGSprontas = $con->prepare($sqlUpdateMSGSprontas);
			$updateMSGSprontas->bindParam(':textareaMSGSdinamicasDB', $textareaMSGSdinamicasDB);
			$updateMSGSprontas->bindParam(':inputAssuntoMSGSdinamicasDB', $inputAssuntoMSGSdinamicasDB);			
			$updateMSGSprontas->bindParam(':DBidbtEditaMSGSpronta', $DBidbtEditaMSGSpronta);
			if($updateMSGSprontas->execute()){
				echo json_encode("Menssagem Editada com Sucesso!");
			}else{
				echo json_encode("Erro ao Editar Mensagem!");
			}
		}
		function listandoMSGSprontas($con, $ferramentas, $vermsgsprontas, $parametrobusca){
			// echo json_encode("Bora laa funcao chamada ".$vermsgsprontas);
			$vermsgsprontas = $ferramentas->filtrando($vermsgsprontas);
			$parametrobusca = $ferramentas->filtrando($parametrobusca);
			if($parametrobusca === 'semAssuntoBusca'){
				$sqlSelectMSGSprontas = "SELECT * FROM mensagensprontas WHERE 1=1 ORDER BY id DESC LIMIT $vermsgsprontas";
				$selectMSGSprontas = $con->prepare($sqlSelectMSGSprontas);
			}else{
				$sqlSelectMSGSprontas = "SELECT * FROM mensagensprontas WHERE assuntomsgpronta LIKE :parametrobusca ORDER BY id DESC LIMIT $vermsgsprontas";
				$selectMSGSprontas = $con->prepare($sqlSelectMSGSprontas);
				$parametrobusca = "%".$parametrobusca."%";
				$selectMSGSprontas->bindParam(':parametrobusca', $parametrobusca, PDO::PARAM_STR);
			}
			if($selectMSGSprontas->execute()){
				$corpoMSGSprontas = $selectMSGSprontas->fetchAll(PDO::FETCH_ASSOC);
				$MSGSprontasCorpo = "";
				$contadorprontas=0;
				foreach($corpoMSGSprontas as $corpoMSGS){
					$contadorprontas++;
					$MSGSprontasCorpo .= "<ul class='border border-success m-0 p-0'>";
					$MSGSprontasCorpo .= "<li><h5 class='mt-1'>Criada Por: </h5></li>";
					$MSGSprontasCorpo .= "<li><input type='text' value='".$corpoMSGS['criadapor']."' class='form-control text-center border border-primary' id='inputCriadaporMSGSdinamicasDB".$contadorprontas."' disabled /></li>";
					$MSGSprontasCorpo .= "<li><h5 class='mt-1'>Assunto:</h5></li>";
					$MSGSprontasCorpo .= "<li><input type='text' value='".$corpoMSGS['assuntomsgpronta']."' class='form-control text-center border border-primary' id='inputAssuntoMSGSdinamicasDB".$contadorprontas."'></li>";
					$MSGSprontasCorpo .= "<li><h5 class='mt-1'>Menssagem: </h5></li>";
					$MSGSprontasCorpo .= "<li><textarea rows=5 class='form-control border border-warning' id='textareaMSGSdinamicasDB".$contadorprontas."'>".$corpoMSGS['mensagemparacadastro']."</textarea></li>";
					
					//Criar funcao separada para inputs dinamicos
					if($corpoMSGS['inputitensdinamicos1']){
						$MSGSprontasCorpo .= "<li><h3>Dinâmicos: </h3></li>";
						$MSGSprontasCorpo .= "<li><div class='row'><div class='col-2'>&nbsp;</div><div class='col-8 text-left bg-success'>";
							$MSGSprontasCorpo .= "<h5 class='mt-2'>
								<button type='button' value='".$corpoMSGS['id']."' class='btn btn-danger btExcluindoDinamicoMSGpronta' id='inputitensdinamicos1'>X</button>
								<input type='text' value='#1' size='2' class='text-center' id='numero1ParametroMSGSdinamicas".$contadorprontas."' disabled /> => 								
								<input type='text' placeholder='Digite: ".$corpoMSGS['inputitensdinamicos1']."' id='valor1ParametroMSGSdinamicas".$contadorprontas."'/> : ".$corpoMSGS['inputitensdinamicos1']."
								<input type='hidden' value='".$corpoMSGS['inputitensdinamicos1']."' id='nome1ParametroMSGSdinamicas".$contadorprontas."'/>
							</h5>";
							if($corpoMSGS['inputitensdinamicos2'] != ""){
								$MSGSprontasCorpo .= "<h5>
									<button type='button' value='".$corpoMSGS['id']."' class='btn btn-danger btExcluindoDinamicoMSGpronta' id='inputitensdinamicos2'>X</button>
									<input type='text' value='#2' size='2' class='text-center' id='numero2ParametroMSGSdinamicas".$contadorprontas."' disabled /> => 									
									<input type='text' placeholder='Digite: ".$corpoMSGS['inputitensdinamicos2']."' id='valor2ParametroMSGSdinamicas".$contadorprontas."'/> : ".$corpoMSGS['inputitensdinamicos2']."
									<input type='hidden' value='".$corpoMSGS['inputitensdinamicos2']."' id='nome2ParametroMSGSdinamicas".$contadorprontas."'/>
								</h5>";
								if($corpoMSGS['inputitensdinamicos3'] != ""){
									$MSGSprontasCorpo .= "<h5>
										<button type='button' value='".$corpoMSGS['id']."' class='btn btn-danger btExcluindoDinamicoMSGpronta' id='inputitensdinamicos3'>X</button>
										<input type='text' value='#3' size='2' class='text-center' id='numero3ParametroMSGSdinamicas".$contadorprontas."' disabled /> => 										
										<input type='text' placeholder='Digite: ".$corpoMSGS['inputitensdinamicos3']."' id='valor3ParametroMSGSdinamicas".$contadorprontas."'/> : ".$corpoMSGS['inputitensdinamicos3']."
										<input type='hidden' value='".$corpoMSGS['inputitensdinamicos3']."' id='nome3ParametroMSGSdinamicas".$contadorprontas."' />
									</h5>";
									if($corpoMSGS['inputitensdinamicos4'] != ""){
										$MSGSprontasCorpo .= "<h5>
											<button type='button' value='".$corpoMSGS['id']."' class='btn btn-danger btExcluindoDinamicoMSGpronta' id='inputitensdinamicos4'>X</button>
											<input type='text' value='#4' size='2' class='text-center' id='numero4ParametroMSGSdinamicas".$contadorprontas."' disabled /> => 											
											<input type='text' placeholder='Digite: ".$corpoMSGS['inputitensdinamicos4']."' id='valor4ParametroMSGSdinamicas".$contadorprontas."'/> : ".$corpoMSGS['inputitensdinamicos4']."
											<input type='hidden' value='".$corpoMSGS['inputitensdinamicos4']."' id='nome4ParametroMSGSdinamicas".$contadorprontas."' />
										</h5>";
										if($corpoMSGS['inputitensdinamicos5'] != ""){
											$MSGSprontasCorpo .= "<h5>
												<button type='button' value='".$corpoMSGS['id']."' class='btn btn-danger btExcluindoDinamicoMSGpronta' id='inputitensdinamicos5'>X</button>
												<input type='text' value='#5' size='2' class='text-center' id='numero5ParametroMSGSdinamicas".$contadorprontas."' disabled /> => 												
												<input type='text' placeholder='Digite: ".$corpoMSGS['inputitensdinamicos5']."' id='valor5ParametroMSGSdinamicas".$contadorprontas."'/> : ".$corpoMSGS['inputitensdinamicos5']."
												<input type='hidden' value='".$corpoMSGS['inputitensdinamicos5']."' id='nome5ParametroMSGSdinamicas".$contadorprontas."' />	
											</h5>";
										}
									}
								}
							}
						$MSGSprontasCorpo .= "</div class='col-8'><div class='col-2'>&nbsp;</div></div></li>";
					}
					$MSGSprontasCorpo .= "<li class='pt-1'>
						<button type='button' class='btn btn-success mr-3 btVisualizarMSGSprontaDoDB' id='".$contadorprontas."'>Visualizar</button>
						<button type='button' class='btn btn-warning mr-3 btEditaMSGSprontaDB' value='".$corpoMSGS['id']."' id='".$contadorprontas."'>Gravar Edição</button>
						<button type='button' class='btn btn-danger  mr-3 btExluiMSGSprontaDB' value='".$corpoMSGS['id']."' id='".$contadorprontas."'>Excluir</button>
						<button type='button' class='btn btn-primary' value='".$corpoMSGS['id']."' id='".$contadorprontas."'>Adicionar Dinâmicos</button>
					</li>";
					$MSGSprontasCorpo .= "<li id='visualizandoMSGSdb".$contadorprontas."'></li>";
					$MSGSprontasCorpo .= "<li><hr class='bg-dark'/></li>";									
					$MSGSprontasCorpo .= "</ul>";
				}
				echo json_encode($MSGSprontasCorpo);
			}else{
				echo json_encode("Erro ao listar");
			}
		}
		function cadastrandoMSGSprontas($con, $ferramentas, $mensagemParaCadastro, $assuntoMSGpronta, $criadaPor, $inputItensDinamicos1, 
		$inputItensDinamicos2, $inputItensDinamicos3, $inputItensDinamicos4, $inputItensDinamicos5){
			$mensagemParaCadastro = $ferramentas->filtrando($mensagemParaCadastro);
			$assuntoMSGpronta = $ferramentas->filtrando($assuntoMSGpronta);
			$criadaPor = $ferramentas->filtrando($criadaPor);
			$inputItensDinamicos1 = $ferramentas->filtrando($inputItensDinamicos1);
			$inputItensDinamicos2 = $ferramentas->filtrando($inputItensDinamicos2);
			$inputItensDinamicos3 = $ferramentas->filtrando($inputItensDinamicos3);
			$inputItensDinamicos4 = $ferramentas->filtrando($inputItensDinamicos4);
			$inputItensDinamicos5 = $ferramentas->filtrando($inputItensDinamicos5);
			$sqlInsertMSGSprontas = 
				"INSERT INTO mensagensprontas(mensagemparacadastro, assuntomsgpronta, criadapor, inputitensdinamicos1,
				inputitensdinamicos2, inputitensdinamicos3, inputitensdinamicos4, inputitensdinamicos5) 
				VALUES(:mensagemparacadastro, :assuntomsgpronta, :criadapor, :inputitensdinamicos1,
				:inputitensdinamicos2, :inputitensdinamicos3, :inputitensdinamicos4, :inputitensdinamicos5)"
			;
			$insertMSGSprontas = $con->prepare($sqlInsertMSGSprontas);			
			$insertMSGSprontas->bindParam(":mensagemparacadastro", $mensagemParaCadastro);
			$insertMSGSprontas->bindParam(":assuntomsgpronta", $assuntoMSGpronta);
			$insertMSGSprontas->bindParam(":criadapor", $criadaPor);
			$insertMSGSprontas->bindParam(":inputitensdinamicos1", $inputItensDinamicos1);
			$insertMSGSprontas->bindParam(":inputitensdinamicos2", $inputItensDinamicos2);
			$insertMSGSprontas->bindParam(":inputitensdinamicos3", $inputItensDinamicos3);
			$insertMSGSprontas->bindParam(":inputitensdinamicos4", $inputItensDinamicos4);
			$insertMSGSprontas->bindParam(":inputitensdinamicos5", $inputItensDinamicos5);

			if($insertMSGSprontas->execute()){
				echo json_encode("Mensagem cadastrada com sucesso!");
			}else{
				echo json_encode("Erro ao cadastrar!");
			}
		}
	}
	class ferramentas{
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

			$ferramentas = new ferramentas;			
			$msgsProntas = new msgsProntas;			
		
			if(isset($_POST['idbtExluiMSGSprontaDB'])){
				$msgsProntas->excluindoMSGSprontas($con, $ferramentas, $_POST['idbtExluiMSGSprontaDB']);
			}
			if(isset($_POST['inputAssuntoMSGSdinamicasDB']) || isset($_POST['textareaMSGSdinamicasDB']) || isset($_POST['DBidbtEditaMSGSpronta'])){		
				$msgsProntas->editandoMSGSprontas($con, $ferramentas, $_POST['inputAssuntoMSGSdinamicasDB'], $_POST['textareaMSGSdinamicasDB'], $_POST['DBidbtEditaMSGSpronta']);
			}
			// $msgsProntas->listandoMSGSprontas($con, $ferramentas, 3, 'a');
			if(isset($_POST['vermsgsprontas']) || isset($_POST['assuntoBuscaMSGpronta'])){				
				$msgsProntas->listandoMSGSprontas($con, $ferramentas, $_POST['vermsgsprontas'], $_POST['assuntoBuscaMSGpronta']);
			}
			if( isset($_POST['mensagemParaCadastro']) || isset($_POST['assuntoMSGpronta']) || isset($_POST['criadaPor']) || 
				isset($_POST['inputItensDinamicos1']) || isset($_POST['inputItensDinamicos2']) || isset($_POST['inputItensDinamicos3']) || 
				isset($_POST['inputItensDinamicos4']) || isset($_POST['inputItensDinamicos5']) ){				
				$msgsProntas->cadastrandoMSGSprontas($con, $ferramentas, $_POST['mensagemParaCadastro'], $_POST['assuntoMSGpronta'], $_POST['criadaPor'], $_POST['inputItensDinamicos1'], $_POST['inputItensDinamicos2'], $_POST['inputItensDinamicos3'], $_POST['inputItensDinamicos4'], $_POST['inputItensDinamicos5']);
			}
		}
	}		
	$inicia = new inicia;	
	$inicia->iniciando();
?>