$(document).ready(function(){
	excluindoMensagemPronta();
	editandoMensagemPronta();
	copiarTextoDaMSGSpronta();
	listarMensagensProntas();
	cadastroMSGSprontas();
});
var contaDinamicos=0;
function excluindoMensagemPronta(){
	$(document).on('click', '.btExluiMSGSprontaDB', function(){
		var idbtExluiMSGSprontaDB = $(this).val();
		$.ajax({
			url: 'autorespostasconfg.php',
			type: 'POST',
			data: {'idbtExluiMSGSprontaDB': idbtExluiMSGSprontaDB},
			dataType: 'json',
			success: function(retornado){
				alert(retornado);
				carregar();
			}
		});
	});
}
function editandoMensagemPronta(){
	$(document).on('click', '.btEditaMSGSprontaDB', function(){
		var idbtEditaMSGSprontaDB = $(this).attr('id');
		var DBidbtEditaMSGSpronta = $(this).val();				
		var inputAssuntoMSGSdinamicasDB 	= $("#inputAssuntoMSGSdinamicasDB"+idbtEditaMSGSprontaDB).val();
		var textareaMSGSdinamicasDB 		= $("#textareaMSGSdinamicasDB"+idbtEditaMSGSprontaDB).val();
		// alert(inputCriadaporMSGSdinamicasDB+" - "+inputAssuntoMSGSdinamicasDB+" - "+textareaMSGSdinamicasDB);
		$.ajax({
			url: 'autorespostasconfg.php',
			type: 'POST',
			data: {				
				'inputAssuntoMSGSdinamicasDB': inputAssuntoMSGSdinamicasDB,
				'textareaMSGSdinamicasDB': textareaMSGSdinamicasDB,
				'DBidbtEditaMSGSpronta': DBidbtEditaMSGSpronta
			},
			dataType: 'json',
			success: function(retornado){
				alert(retornado);
			}
		});
	});
}
function copiarTextoDaMSGSpronta(){
	$(document).on('click', '.btCopiarTexto', function(){
		var idBtCopiarTexto = $(this).attr('id');
		$("#textoMSGprontaAserCopiado"+idBtCopiarTexto).select();
		try {
		var successful = document.execCommand('copy');
		// var msg = successful ? 'foi' : 'não foi';
		// alert('Texto '+msg+' copiado!');
		} catch (err) {
		alert('Opa, Não conseguimos copiar o texto, é possivel que o seu navegador não tenha suporte, tente usar Crtl+C.');
		}
	});
}
function carregaMensagensProntasDoDB(valueBtMaisMSGSprontas, assuntoBuscaMSGpronta){
	$.ajax({
		url: 'autorespostasconfg.php',
		type: 'POST',
		data: {
			'vermsgsprontas': valueBtMaisMSGSprontas,
			'assuntoBuscaMSGpronta': assuntoBuscaMSGpronta
		},
		dataType: 'json',
		success: function(retornado){
			$("#linhaTodasProntas").html(retornado);
			var tres = 3;
			valueBtMaisMSGSprontas = parseInt(valueBtMaisMSGSprontas)+parseInt(tres);
			$("#btMaisMSGSprontas").val(valueBtMaisMSGSprontas);
		}
	});
}
function listarMensagensProntas(){
	$('#especificaMSGpronta').keyup(function(){
		var especificaMSGpronta = $("#especificaMSGpronta").val();
		carregaMensagensProntasDoDB(3, especificaMSGpronta);
	});
	$(document).on('click', '#btMaisMSGSprontas', function(){
		var valueBtMaisMSGSprontas = $("#btMaisMSGSprontas").val();		
		carregaMensagensProntasDoDB(valueBtMaisMSGSprontas, "semAssuntoBusca");		
	});
	$(document).on('click', '#vermsgsprontas', function(){
		$("#linhaProntas").toggle();
		$("#btMaisMSGSprontas").val(3);
		var valueBtMaisMSGSprontas = 3;	
		carregaMensagensProntasDoDB(valueBtMaisMSGSprontas, "semAssuntoBusca");
	});
	$(document).on('click', '.btVisualizarMSGSprontaDoDB', function(){
		var idbtVisualizarMSGSprontaDoDB 	= $(this).attr('id');
		var inputCriadaporMSGSdinamicasDB 	= $("#inputCriadaporMSGSdinamicasDB"+idbtVisualizarMSGSprontaDoDB).val();
		var inputAssuntoMSGSdinamicasDB 	= $("#inputAssuntoMSGSdinamicasDB"+idbtVisualizarMSGSprontaDoDB).val();
		var textareaMSGSdinamicasDB 		= $("#textareaMSGSdinamicasDB"+idbtVisualizarMSGSprontaDoDB).val();		
		if($("#valor1ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val()){
			var valor1ParametroMSGSdinamicas = $("#valor1ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val();			
			textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#1", valor1ParametroMSGSdinamicas);
			for(var conta=0; conta<4;conta++){textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#1", valor1ParametroMSGSdinamicas);}			
			if($("#valor2ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val()){
				var valor2ParametroMSGSdinamicas = $("#valor2ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val();				
				for(var conta=0; conta<4;conta++){textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#2", valor2ParametroMSGSdinamicas);}
				if($("#valor3ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val()){
					var valor3ParametroMSGSdinamicas = $("#valor3ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val();					
					for(var conta=0; conta<4;conta++){textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#3", valor3ParametroMSGSdinamicas);}
					if($("#valor4ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val()){
						var valor4ParametroMSGSdinamicas = $("#valor4ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val();						
						for(var conta=0; conta<4;conta++){textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#4", valor4ParametroMSGSdinamicas);}
						if($("#valor5ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val()){
							var valor5ParametroMSGSdinamicas = $("#valor5ParametroMSGSdinamicas"+idbtVisualizarMSGSprontaDoDB).val();							
							for(var conta=0; conta<4;conta++){textareaMSGSdinamicasDB = textareaMSGSdinamicasDB.replace("#5", valor5ParametroMSGSdinamicas);}
						}
					}
				}
			}												
		}
		$("#visualizandoMSGSdb"+idbtVisualizarMSGSprontaDoDB).html(
			"<div class='border border-success p-3'>"+
				"<textarea rows='4' class='form-control' id='textoMSGprontaAserCopiado"+idbtVisualizarMSGSprontaDoDB+"'>"+textareaMSGSdinamicasDB+"</textarea>"+
			"</div>"+
			"<div class='border border-success'>"+
				"<button type='button' class='form-control btn btn-success btCopiarTexto' id='"+idbtVisualizarMSGSprontaDoDB+"'>Copiar</button>"+
			"</div>"
		);
	});
}
function enviaCadastroMSGSprontasDB(mensagemParaCadastro, assuntoMSGpronta, criadaPor, inputItensDinamicos1, inputItensDinamicos2, inputItensDinamicos3, inputItensDinamicos4, inputItensDinamicos5){
	$.ajax({
		url: 'autorespostasconfg.php',
		type: 'POST',
		data: {
			"mensagemParaCadastro": mensagemParaCadastro,
			"assuntoMSGpronta": assuntoMSGpronta,
			"criadaPor": criadaPor,
			"inputItensDinamicos1": inputItensDinamicos1,
			"inputItensDinamicos2": inputItensDinamicos2,
			"inputItensDinamicos3": inputItensDinamicos3,
			"inputItensDinamicos4": inputItensDinamicos4,
			"inputItensDinamicos5": inputItensDinamicos5
		},
		dataType: "json",
		success: function(retornado){
			alert(retornado);
		}
	});
}
function cadastroMSGSprontas(){
	$(document).on('click', '#btCadastrarMSGpronta', function(){		
		var mensagemParaCadastro = $("#mensagemParaCadastro").val();
		var assuntoMSGpronta = $("#assuntoMSGpronta").val();
		var criadaPor = $("#criadaPor").val();
		var inputItensDinamicos1 = "";var inputItensDinamicos2 = "";
		var inputItensDinamicos3 = "";var inputItensDinamicos4 = "";
		var inputItensDinamicos5 = "";
		if($("#inputItensDinamicos1").val()){
			var inputItensDinamicos1 = $("#inputItensDinamicos1").val();		
			if($("#inputItensDinamicos2").val()){
				var inputItensDinamicos2 = $("#inputItensDinamicos2").val();				
				if($("#inputItensDinamicos3").val()){
					var inputItensDinamicos3 = $("#inputItensDinamicos3").val();					
					if($("#inputItensDinamicos4").val()){
						var inputItensDinamicos4 = $("#inputItensDinamicos4").val();						
						if($("#inputItensDinamicos5").val()){
							var inputItensDinamicos5 = $("#inputItensDinamicos5").val();							
						}
					}
				}
			}
		}
		enviaCadastroMSGSprontasDB(mensagemParaCadastro, assuntoMSGpronta, criadaPor, inputItensDinamicos1, inputItensDinamicos2, inputItensDinamicos3, inputItensDinamicos4, inputItensDinamicos5);
	});	
	$(document).on('click', '#btmostracadprontas', function(){
		$("#linhaCadastromsgsprontas").toggle();
	});
	$(document).on('click', '#btVerMSGpronta', function(){
		var mensagemParaCadastro = $("#mensagemParaCadastro").val();
		var assuntoMSGpronta = $("#assuntoMSGpronta").val();		
		var criadaPor = $("#criadaPor").val();
		var mensagemParaVisualizar = mensagemParaCadastro;
		if($("#inputItensDinamicos1").val()){
			var inputItensDinamicos1 = $("#inputItensDinamicos1").val();
			mensagemParaVisualizar = mensagemParaCadastro.replace("#1", "{"+inputItensDinamicos1+"}");
			for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#1", "{"+inputItensDinamicos1+"}");}			
			if($("#inputItensDinamicos2").val()){
				var inputItensDinamicos2 = $("#inputItensDinamicos2").val();
				for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#2", "{"+inputItensDinamicos2+"}");}
				if($("#inputItensDinamicos3").val()){
					var inputItensDinamicos3 = $("#inputItensDinamicos3").val();
					for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#3", "{"+inputItensDinamicos3+"}");}
					if($("#inputItensDinamicos4").val()){
						var inputItensDinamicos4 = $("#inputItensDinamicos4").val();
						for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#4", "{"+inputItensDinamicos4+"}");}
						if($("#inputItensDinamicos5").val()){
							var inputItensDinamicos5 = $("#inputItensDinamicos5").val();
							for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#5", "{"+inputItensDinamicos5+"}");}
						}
					}
				}
			}												
		}else{
			alert("Deseja cadastrar sem Dinâmicos?");
		}
		$("#visualizandoMSGS").html(
			"<div class='border border-success m-3'>"+					
				"<p>Assunto: "+assuntoMSGpronta+"</p>"+
				"<p>"+mensagemParaVisualizar+"</p>"+
				"<p>Criada por: "+criadaPor+"</p>"+
			"</div>"
		);
	});
	$(document).on('click', '.btsFechaDinamicos', function(){
		var valorItemDinamico = $(this).val();
		$("#linha"+valorItemDinamico+"itensDinamicos").remove();		
		contaDinamicos--;
		switch(contaDinamicos){
			case 1:
				$("#fechaDinamico1").css("display", "block");
			break;case 2:
				$("#fechaDinamico2").css("display", "block");
			break;case 3:
				$("#fechaDinamico3").css("display", "block");				
			break;case 4:
				$("#fechaDinamico4").css("display", "block");
			break;case 5:
				$("#fechaDinamico5").css("display", "block");				
			break;
		}			
	});
	$(document).on('click', '#btAddDinamicos', function(){		
		if(contaDinamicos <5){			
			contaDinamicos++;
			$("#itensDinamicos").prepend(
				"<li class='border border-success mt-2' id='linha"+contaDinamicos+"itensDinamicos'>"+
					"<input type='text' name='' placeholder='Para Usar No Texto Digite: #"+contaDinamicos+"' class='form-control' id='inputItensDinamicos"+contaDinamicos+"'/>"+
					"<button type='button' id='fechaDinamico"+contaDinamicos+"' value='"+contaDinamicos+"' class='form-control btn btn-danger btsFechaDinamicos'>"+contaDinamicos+" ( X )</button>"+
				"</li>"
			);	
			switch(contaDinamicos){				
				case 2:
					$("#fechaDinamico1").css("display", "none");
				break;case 3:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
				break;case 4:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
					$("#fechaDinamico3").css("display", "none");
				break;case 5:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
					$("#fechaDinamico3").css("display", "none");
					$("#fechaDinamico4").css("display", "none");
				break;
			}
		}else{
			alert("O Limite de Dinâmicos foi atingido!");
		}
		
	});	
}
function carregar(){	
	location.reload();
};