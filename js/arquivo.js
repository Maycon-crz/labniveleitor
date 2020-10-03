$(document).ready(function(){
	pastasAtrasadasAdiantadas();
	opcoesLaboratorios();
	exipientes();	
	avisos();
	pastaAzul();
	menufixo();
	pegaPedidosDasFiliais();
	btsMaisMenosTbHora();
	diretoInputTbHora();
	nivelDePressao();
	atualizatudo();	
	chamaAtualizacao();
	sair();
	cadastroDeFuncionarios();
	login();
});
function updateAtrasadasAdiantadas(inputAtrasadasAdiantadas, parametroAtrasadasAdiantadas){
	$.ajax({
		url: 'confg.php',
		type: 'post',
		data: {
			'inputAtrasadasAdiantadas': inputAtrasadasAdiantadas,
			'parametroAtrasadasAdiantadas': parametroAtrasadasAdiantadas
		},
		dataType: 'json',
		success: function(retornado){					
			atualizatudo();
		}
	});
}
function pastasAtrasadasAdiantadas(){	
	$(document).on('click', '.btMaisAdiantadas', function(){		
		var valorAdiantadas = $("#adiantadas").val();
		valorAdiantadas = parseInt(valorAdiantadas)+1;
		updateAtrasadasAdiantadas(valorAdiantadas, "adiantadas");
	});
	$(document).on('click', '.btMenosAdiantadas', function(){		
		var valorAdiantadas = $("#adiantadas").val();
		valorAdiantadas = parseInt(valorAdiantadas)-1;
		updateAtrasadasAdiantadas(valorAdiantadas, "adiantadas");
	});
	$(document).on('click', '.btMaisAtrasadas', function(){		
		var valorAtrasadas = $("#atrasadas").val();
		valorAtrasadas = parseInt(valorAtrasadas)+1;
		updateAtrasadasAdiantadas(valorAtrasadas, "atrasadas");
	});
	$(document).on('click', '.btMenosAtrasadas', function(){		
		var valorAtrasadas = $("#atrasadas").val();
		valorAtrasadas = parseInt(valorAtrasadas)-1;
		updateAtrasadasAdiantadas(valorAtrasadas, "atrasadas");
	});
	$('.inputAtrasadasAdiantadas').keyup(function(){
		var inputAtrasadasAdiantadas = $(this).val();
		parametroAtrasadasAdiantadas = $(this).attr('id');
		updateAtrasadasAdiantadas(inputAtrasadasAdiantadas, parametroAtrasadasAdiantadas);		
	});	
}
function opcoesLaboratorios(){
	//Abre/Fecha Botões do laboratório menu poções
	$(document).on('click', '#btOpcoesLaboratorio', function(){
		$("#linhaOpcoesLaboratorio").toggle();
	});
}
function exipientes(){
	//Menu microscopio
	$(document).on('click', '.finalizaExcipiente', function(){
		var idfinalizaExcipiente = $(this).attr('id');
		if(confirm("Laboratório: Deseja Finalizar este aviso?")){			
			$.ajax({
				url: 'confg.php',
				type: 'post',
				data: {'idfinalizaexcipiente': idfinalizaExcipiente},
				dataType: 'json',
				success: function(retornado){
					alert(retornado);				
					atualizatudo();
				}
			});
		}
	});	
	$(document).on('click', '#btmostraExipientes', function(){
		$("#mostraDadosExipientes").toggle();
	});
	//Menu pocao
	$(document).on('click', '.btsPreProntos', function(){
		idbtsPreProntos = $(this).attr('id');	
		$("#linha"+idbtsPreProntos).toggle();				
	});
	$(document).on('click', '.btsFaltaProducao', function(){
		var idbtsFaltaProducao = $(this).attr('id');
		$("#linha"+idbtsPreProntos).toggle();
		$("#linhaOpcoesLaboratorio").toggle();
		var parametroexipientes = 0;
		switch(idbtsFaltaProducao){
			case 'acabou':
				parametroexipientes=1;
			break;
			case 'producao':
				parametroexipientes=2;
			break;			
		}		
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: {
				'idbtsPreProntos': idbtsPreProntos,
				'parametroexipientes': parametroexipientes
			},
			dataType: 'json',
			success: function(retorno){
				alert(retorno);				
			}
		});
	});
}
function avisos(){
	$(document).on('click', '.lixeiraum', function(){
		var idlixeira = $(this).attr('id');
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: {'idlixeira': idlixeira},
			dataType: 'json',
			success: function(retorno){
				alert(retorno);				
			}
		});
	});
	$(document).on('click', '#btmostraAvisos', function(){
		$("#conteudoLinhaMostraAvisos").toggle();
	});
	$("#formAvisos").submit(function(ev){
		ev.preventDefault();
		var formAvisos = $("#formAvisos");
		formAvisos = formAvisos.serialize();		
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: formAvisos,
			dataType: 'json',
			success: function(retorno){
				if(retorno === "Aviso Enviado!"){		
					atualizatudo();
				}else{
					alert(retorno);
				}
			}
		});
	});
}
function enviaEdicaoPastaAzul(valorPastaAzul){	
	$.ajax({
		url: 'confg.php',
		type: 'post',
		data: {'valorPastaAzul': valorPastaAzul},
		dataType: 'json',
		success: function(retornado){			
			if(retornado === "QTD pasta Azul editada!"){				
				atualizatudo();				
			}
		}
	});	
}
function pastaAzul(){
	$(document).on('click', '.btPastaAzul', function(){		
		var qtdPastaAzul = $(this).attr('id');
		if(qtdPastaAzul <5){
			var novaqtdPastaAzul = parseInt(qtdPastaAzul)+1;
			enviaEdicaoPastaAzul(novaqtdPastaAzul);
		}else{
			alert("Pode ter no máximo 5 pastas Azuis!");
		}	
	});
	$(document).on('click', '.btmenospastaazul', function(){
		var pegaqtdPastaAzul = $(".btPastaAzul").attr('id');
		if(pegaqtdPastaAzul >= 1){
			var menospasta = parseInt(pegaqtdPastaAzul)-1;
			enviaEdicaoPastaAzul(menospasta);
		}		
	})
}
function menufixo(){
	$(document).on('click', '.btsMenuFixo', function(){
		$("#conteudoMenuFixo").toggle();		
		$("#gifseta").css("display", "block");
		function callback() {
		    $("#gifseta").css("display", "none");
		    clearInterval(intervalo);
		}
		var intervalo = setInterval(callback, 2000);
	});
	$(document).on('click', '#btPossao', function(){		
		$("#conteudoMenuFixo").toggle();		
	});
}
function zerapedidos(idpedidosProntos, editapedidosqtdpedidos){
	$.ajax({
		url: 'confg.php',
		type: 'post',
		data: {			
			"editapedidosnomefilial": idpedidosProntos,
			"editapedidosqtdpedidos": editapedidosqtdpedidos
		},
		dataType: 'json',
		success: function(retorno){
			// alert(retorno);			
		}
	});
}
function pegaPedidosDasFiliais(){
	$(document).on('click', '.pedidosProntos', function(){
		//Chamando 2 funções no php
		var idpedidosProntos = $(this).val();
		var qtdPedidos = $("#"+idpedidosProntos).val();
		var inputnomemensageiro = "LabNíveLeitor";
		var inputaviso = "Pedido de "+idpedidosProntos+" no Balde! ["+qtdPedidos+"] iten(s)!";				
		var editapedidosqtdpedidos = 0;
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: {
				'inputnomemensageiro': inputnomemensageiro,
				'inputaviso': inputaviso
				// "editapedidosnomefilial": idpedidosProntos,
				// "editapedidosqtdpedidos": editapedidosqtdpedidos
			},
			dataType: 'json',
			success: function(retorno){
				alert(retorno);	
				zerapedidos(idpedidosProntos, editapedidosqtdpedidos);
			}
		});
	});
	$('.pegapedidos').keyup(function() {
		var editapedidosnomefilial = $(this).attr('id');
		var editapedidosqtdpedidos = $(this).val();
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: {
				"editapedidosnomefilial": editapedidosnomefilial,
				"editapedidosqtdpedidos": editapedidosqtdpedidos
			},
			dataType: 'json',
			success: function(retornado){
				alert(retornado);
			}
		});
	});
}
function enviaEdicaoQTDTbHora(valor, nomehorariodb, tipoTbHora, cor){	
	$.ajax({
		url: 'confg.php',
		type: 'post',
		data: {
			"valor": valor,
			"nomehorariodb": nomehorariodb,
			"tipoTbHora": tipoTbHora,
			"cor": cor,
		},
		dataType: 'json',
		success: function(retornado){
			if(retornado != "Valor foi atualizado!"){
				alert(retornado);
			}
			atualizatudo();
		}
	});
}
function btsMaisMenosTbHora(){
	$(document).on('click', '.maisformulasnivel',function(){
		var maisformulasnivel = $(this).attr('id');
		var maisum = 1;
		var valorAntigoInputTbHoraMais = $('#ipTbHora'+maisformulasnivel).val();
		var somando = parseInt(valorAntigoInputTbHoraMais) + parseInt(maisum);		
		var nomehorariodb = $("#nomehorario"+maisformulasnivel).attr("name");
		var tipoTbHora = $("#nomehorario"+maisformulasnivel).attr("class");
		var cor = $("#nomehorario"+maisformulasnivel).val();		
		enviaEdicaoQTDTbHora(somando, nomehorariodb, tipoTbHora, cor);
	});
	$(document).on('click', '.menosformulasnivel',function(){
		var menosformulasnivel = $(this).attr('id');
		var menosum = 1;
		var valorAntigoInputTbHoraMenos = $('#ipTbHora'+menosformulasnivel).val();
		var subitraido = parseInt(valorAntigoInputTbHoraMenos) - parseInt(menosum);
		var nomehorariodb = $("#nomehorario"+menosformulasnivel).attr("name");
		var tipoTbHora = $("#nomehorario"+menosformulasnivel).attr("class");
		var cor = $("#nomehorario"+menosformulasnivel).val();		
		enviaEdicaoQTDTbHora(subitraido, nomehorariodb, tipoTbHora, cor);
		// atualizatudo();
	});
}
function diretoInputTbHora(){
	$('.inputsTbHora').keyup(function() {
		var valor = $(this).val();
		var nome = $(this).attr('name');
		var nomehorariodb = $("#"+nome).attr("name");
		var tipoTbHora = $("#"+nome).attr("class");
		var cor = $("#"+nome).val();
		if(confirm("Deseja Atualizar para "+valor+" ?")){			
			enviaEdicaoQTDTbHora(valor, nomehorariodb, tipoTbHora, cor);
			//Só atualizar se for numero!
		}else{
			alert("Não foi Atualizado!");
		}
	});
};
function nivelDePressao(){
	$(document).on('click', '.nvPressao', function(){		
		var nvPressao = $(this).attr('id');
		switch(nvPressao){
			case "nvPressaoVerde":
				nvPressao = "verde";
			break;
			case "nvPressaoAmarelo":
				nvPressao = "amarelo";
			break;
			case "nvPressaoVermelho":
				nvPressao = "vermelho";
			break;
		}
		if(confirm("Deseja Atualizar o nível de pressão para "+nvPressao+" ?")){
			$.ajax({
				url: 'confg.php',
				type: 'post',
				data: {'nvPressao': nvPressao},
				dataType: 'json',
				success: function(retornado){
					alert(retornado);
					atualizatudo();
				}
			});
		}		
	});
};
function atualizatudo(){
	// alert("Vamos atualizar!");
	var vfLogin = $(".vfLogin").val();
    if(vfLogin == "nao"){
    	window.location.href = "index.php";   
    }
	var atualiza = "atualiza";
	$.ajax({
		url: "confg.php",
		type: "post",
		data: {"atualiza": atualiza},
		dataType: "json",
		success: function(retornado){	
			//Atrasadas e Adiantadas
				$('#adiantadas').val(retornado.adiantadas);			
				$('#atrasadas').val(retornado.atrasadas);				
			//Linha um
				//Solidos
					$('#ipTbHora1').val(retornado.oitonoveVerde);
					$('#ipTbHora2').val(retornado.oitonoveAmarela);
					$('#ipTbHora3').val(retornado.oitonoveVermelha);
					$('#tbHoraTotal1').val(parseInt(retornado.oitonoveVerde)+parseInt(retornado.oitonoveAmarela)+parseInt(retornado.oitonoveVermelha));

					$('#ipTbHora4').val(retornado.novedezVerde);
					$('#ipTbHora5').val(retornado.novedezAmarela);
					$('#ipTbHora6').val(retornado.novedezVermelha);
					$('#tbHoraTotal2').val(parseInt(retornado.novedezVerde)+parseInt(retornado.novedezAmarela)+parseInt(retornado.novedezVermelha));
				//Semi solidos
					$('#ipTbHora34').val(retornado.semisolidos_oitonoveVerde);
					$('#ipTbHora35').val(retornado.semisolidos_oitonoveAmarela);
					$('#ipTbHora36').val(retornado.semisolidos_oitonoveVermelha);
					$('#tbHoraTotal3').val(parseInt(retornado.semisolidos_oitonoveVerde)+parseInt(retornado.semisolidos_oitonoveAmarela)+parseInt(retornado.semisolidos_oitonoveVermelha));

					$('#ipTbHora37').val(retornado.semisolidos_novedezVerde);
					$('#ipTbHora38').val(retornado.semisolidos_novedezAmarela);
					$('#ipTbHora39').val(retornado.semisolidos_novedezVermelha);
					$('#tbHoraTotal4').val(parseInt(retornado.semisolidos_novedezVerde)+parseInt(retornado.semisolidos_novedezAmarela)+parseInt(retornado.semisolidos_novedezVermelha));
				//--
			//Linha dois
				//Solidos
					$('#ipTbHora7').val(retornado.dezonzeVerde);
					$('#ipTbHora8').val(retornado.dezonzeAmarela);
					$('#ipTbHora9').val(retornado.dezonzeVermelha);
					$('#tbHoraTotal5').val(parseInt(retornado.dezonzeVerde)+parseInt(retornado.dezonzeAmarela)+parseInt(retornado.dezonzeVermelha));

					$('#ipTbHora10').val(retornado.onzedozeVerde);
					$('#ipTbHora11').val(retornado.onzedozeAmarela);
					$('#ipTbHora12').val(retornado.onzedozeVermelha);
					$('#tbHoraTotal6').val(parseInt(retornado.onzedozeVerde)+parseInt(retornado.onzedozeAmarela)+parseInt(retornado.onzedozeVermelha));
				//Semi solidos
					$('#ipTbHora40').val(retornado.semisolidos_dezonzeVerde);
					$('#ipTbHora41').val(retornado.semisolidos_dezonzeAmarela);
					$('#ipTbHora42').val(retornado.semisolidos_dezonzeVermelha);
					$('#tbHoraTotal7').val(parseInt(retornado.semisolidos_dezonzeVerde)+parseInt(retornado.semisolidos_dezonzeAmarela)+parseInt(retornado.semisolidos_dezonzeVermelha));

					$('#ipTbHora43').val(retornado.semisolidos_onzedozeVerde);
					$('#ipTbHora44').val(retornado.semisolidos_onzedozeAmarela);
					$('#ipTbHora45').val(retornado.semisolidos_onzedozeVermelha);
					$('#tbHoraTotal8').val(parseInt(retornado.semisolidos_onzedozeVerde)+parseInt(retornado.semisolidos_onzedozeAmarela)+parseInt(retornado.semisolidos_onzedozeVermelha));
				//--
			//Linha tres
				//Solidos
					$('#ipTbHora13').val(retornado.dozetrezeVerde);
					$('#ipTbHora14').val(retornado.dozetrezeAmarela);
					$('#ipTbHora15').val(retornado.dozetrezeVermelha);
					$('#tbHoraTotal9').val(parseInt(retornado.dozetrezeVerde)+parseInt(retornado.dozetrezeAmarela)+parseInt(retornado.dozetrezeVermelha));

					$('#ipTbHora16').val(retornado.trezequaVerde);
					$('#ipTbHora17').val(retornado.trezequaAmarela);
					$('#ipTbHora18').val(retornado.trezequaVermelha);
					$('#tbHoraTotal10').val(parseInt(retornado.trezequaVerde)+parseInt(retornado.trezequaAmarela)+parseInt(retornado.trezequaVermelha));				
				//Semi solidos
					$('#ipTbHora46').val(retornado.semisolidos_dozetrezeVerde);
					$('#ipTbHora47').val(retornado.semisolidos_dozetrezeAmarela);
					$('#ipTbHora48').val(retornado.semisolidos_dozetrezeVermelha);
					$('#tbHoraTotal11').val(parseInt(retornado.semisolidos_dozetrezeVerde)+parseInt(retornado.semisolidos_dozetrezeAmarela)+parseInt(retornado.semisolidos_dozetrezeVermelha));

					$('#ipTbHora49').val(retornado.semisolidos_trezequaVerde);
					$('#ipTbHora50').val(retornado.semisolidos_trezequaAmarela);
					$('#ipTbHora51').val(retornado.semisolidos_trezequaVermelha);
					$('#tbHoraTotal12').val(parseInt(retornado.semisolidos_trezequaVerde)+parseInt(retornado.semisolidos_trezequaAmarela)+parseInt(retornado.semisolidos_trezequaVermelha));
				//--
			//Linha quatro
				//Solidos
					$('#ipTbHora19').val(retornado.quaquiVerde);
					$('#ipTbHora20').val(retornado.quaquiAmarela);
					$('#ipTbHora21').val(retornado.quaquiVermelha);
					$('#tbHoraTotal13').val(parseInt(retornado.quaquiVerde)+parseInt(retornado.quaquiAmarela)+parseInt(retornado.quaquiVermelha));

					$('#ipTbHora22').val(retornado.quidseisVerde);
					$('#ipTbHora23').val(retornado.quidseisAmarela);
					$('#ipTbHora24').val(retornado.quidseisVermelha);				
					$('#tbHoraTotal14').val(parseInt(retornado.quidseisVerde)+parseInt(retornado.quidseisAmarela)+parseInt(retornado.quidseisVermelha));
				//Semi solidos
					$('#ipTbHora52').val(retornado.semisolidos_quaquiVerde);
					$('#ipTbHora53').val(retornado.semisolidos_quaquiAmarela);
					$('#ipTbHora54').val(retornado.semisolidos_quaquiVermelha);
					$('#tbHoraTotal15').val(parseInt(retornado.semisolidos_quaquiVerde)+parseInt(retornado.semisolidos_quaquiAmarela)+parseInt(retornado.semisolidos_quaquiVermelha));

					$('#ipTbHora55').val(retornado.semisolidos_quidseisVerde);
					$('#ipTbHora56').val(retornado.semisolidos_quidseisAmarela);
					$('#ipTbHora57').val(retornado.semisolidos_quidseisVermelha);
					$('#tbHoraTotal16').val(parseInt(retornado.semisolidos_quidseisVerde)+parseInt(retornado.semisolidos_quidseisAmarela)+parseInt(retornado.semisolidos_quidseisVermelha));
				//--
			//Linha cinco
				//Solidos
					$('#ipTbHora25').val(retornado.dseisdseteVerde);
					$('#ipTbHora26').val(retornado.dseisdseteAmarela);
					$('#ipTbHora27').val(retornado.dseisdseteVermelha);
					$('#tbHoraTotal17').val(parseInt(retornado.dseisdseteVerde)+parseInt(retornado.dseisdseteAmarela)+parseInt(retornado.dseisdseteVermelha));

					$('#ipTbHora28').val(retornado.dsetedoitoVerde);
					$('#ipTbHora29').val(retornado.dsetedoitoAmarela);
					$('#ipTbHora30').val(retornado.dsetedoitoVermelha);
					$('#tbHoraTotal18').val(parseInt(retornado.dsetedoitoVerde)+parseInt(retornado.dsetedoitoAmarela)+parseInt(retornado.dsetedoitoVermelha));
				//Semi solidos
					$('#ipTbHora58').val(retornado.semisolidos_dseisdseteVerde);
					$('#ipTbHora59').val(retornado.semisolidos_dseisdseteAmarela);
					$('#ipTbHora60').val(retornado.semisolidos_dseisdseteVermelha);
					$('#tbHoraTotal19').val(parseInt(retornado.semisolidos_dseisdseteVerde)+parseInt(retornado.semisolidos_dseisdseteAmarela)+parseInt(retornado.semisolidos_dseisdseteVermelha));

					$('#ipTbHora61').val(retornado.semisolidos_dsetedoitoVerde);
					$('#ipTbHora62').val(retornado.semisolidos_dsetedoitoAmarela);
					$('#ipTbHora63').val(retornado.semisolidos_dsetedoitoVermelha);
					$('#tbHoraTotal20').val(parseInt(retornado.semisolidos_dsetedoitoVerde)+parseInt(retornado.semisolidos_dsetedoitoAmarela)+parseInt(retornado.semisolidos_dsetedoitoVermelha));
				//--
			//Linha seis
				//Solidos
					$('#ipTbHora31').val(retornado.doitodnoveVerde);
					$('#ipTbHora32').val(retornado.doitodnoveAmarela);
					$('#ipTbHora33').val(retornado.doitodnoveVermelha);
					$('#tbHoraTotal21').val(parseInt(retornado.doitodnoveVerde)+parseInt(retornado.doitodnoveAmarela)+parseInt(retornado.doitodnoveVermelha));
				//Semi solidos
					$('#ipTbHora64').val(retornado.semisolidos_doitodnoveVerde);
					$('#ipTbHora65').val(retornado.semisolidos_doitodnoveAmarela);
					$('#ipTbHora66').val(retornado.semisolidos_doitodnoveVermelha);
					$('#tbHoraTotal22').val(parseInt(retornado.semisolidos_doitodnoveVerde)+parseInt(retornado.semisolidos_doitodnoveAmarela)+parseInt(retornado.semisolidos_doitodnoveVermelha));
				//--
			//---
			//Nivel de Presão
			switch(retornado.nivel){
				case "verde":
					$("#nvPressaoVerde").css("opacity", 1);
					$("#nvPressaoAmarelo").css("opacity", 0.3);
					$("#nvPressaoVermelho").css("opacity", 0.3);
				break;
				case "amarelo":
					$("#nvPressaoAmarelo").css("opacity", 1);
					$("#nvPressaoVerde").css("opacity", 0.3);
					$("#nvPressaoVermelho").css("opacity", 0.3);
				break;
				case "vermelho":
					$("#nvPressaoVermelho").css("opacity", 1);
					$("#nvPressaoVerde").css("opacity", 0.3);
					$("#nvPressaoAmarelo").css("opacity", 0.3);
				break;
			}
			//Pasta Azul
			$(".btPastaAzul").attr('id', retornado.pastaazul);
			switch(retornado.pastaazul){
				case "0":
					$(".objetoPastaAzulum").css("display", "none");
					$(".objetoPastaAzuldois").css("display", "none");
					$(".objetoPastaAzultres").css("display", "none");
					$(".objetoPastaAzulquatro").css("display", "none");
					$(".objetoPastaAzulcinco").css("display", "none");
				break;
				case "1":
					$(".objetoPastaAzulum").css("display", "block");
					$(".objetoPastaAzuldois").css("display", "none");
					$(".objetoPastaAzultres").css("display", "none");
					$(".objetoPastaAzulquatro").css("display", "none");
					$(".objetoPastaAzulcinco").css("display", "none");
				break;
				case "2":
					$(".objetoPastaAzulum").css("display", "block");
					$(".objetoPastaAzuldois").css("display", "block");
					$(".objetoPastaAzultres").css("display", "none");
					$(".objetoPastaAzulquatro").css("display", "none");
					$(".objetoPastaAzulcinco").css("display", "none");
				break;
				case "3":
					$(".objetoPastaAzulum").css("display", "block");
					$(".objetoPastaAzuldois").css("display", "block");
					$(".objetoPastaAzultres").css("display", "block");
					$(".objetoPastaAzulquatro").css("display", "none");
					$(".objetoPastaAzulcinco").css("display", "none");
				break;
				case "4":
					$(".objetoPastaAzulum").css("display", "block");
					$(".objetoPastaAzuldois").css("display", "block");
					$(".objetoPastaAzultres").css("display", "block");
					$(".objetoPastaAzulquatro").css("display", "block");
					$(".objetoPastaAzulcinco").css("display", "none");
				break;
				case "5":
					$(".objetoPastaAzulum").css("display", "block");
					$(".objetoPastaAzuldois").css("display", "block");
					$(".objetoPastaAzultres").css("display", "block");
					$(".objetoPastaAzulquatro").css("display", "block");
					$(".objetoPastaAzulcinco").css("display", "block");
				break;
			}		
			//Pedidos Pomerode e Brusque
			$('#pomerode').val(retornado.pomerode);
			$('#brusque').val(retornado.brusque);

			//Exipientes|Pré-Prontos
			var dadosLinhaExipiente = "";
			var qtdExps=0;
			switch(retornado.excipiente){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Excipiente</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='Excipiente' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Excipiente</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='Excipiente' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}
			switch(retornado.cremenaoionico){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Creme não iônico</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='CremeNaoIonico' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Creme não iônico</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='CremeNaoIonico' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.basegelanastrozol){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Gel Anastrozol</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='BaseGelAnastrozol' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Gel Anastrozol</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='BaseGelAnastrozol' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.tacrolimus){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Tacrolimus</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='Tacrolimus' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Tacrolimus</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='Tacrolimus' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.basesabonete){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Sabonete</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='BaseSabonete' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Sabonete</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='BaseSabonete' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.baseshampooperolado){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Shampoo Perolado</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='BaseShampooPerolado' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Base Shampoo Perolado</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='BaseShampooPerolado' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.cremepsoriaseaguda){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Creme Psoriase Aguda</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='CremePsoriaseAguda' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>CremePsoriaseAguda</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='CremePsoriaseAguda' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.fluoretodesodio){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Fluoreto De Sódio</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='FluoretoDeSodio' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Fluoreto De Sódio</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='FluoretoDeSodio' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.descongestionantenasal){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Descongestionante Nasal</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='DescongestionanteNasal' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Descongestionante Nasal</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='DescongestionanteNasal' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.locaocapilarminoxidil){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Loção Capilar Minoxidil</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='LocaoCapilarMinoxidil' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Loção Capilar Minoxidil</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='LocaoCapilarMinoxidil' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.anastrozoldiluido){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Anastrozol Diluído</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='AnastrozolDiluido' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Anastrozol Diluído</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='AnastrozolDiluido' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.metilcobalaminadiluida){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Metilcobalamina Diluída</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='MetilcobalaminaDiluida' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Metilcobalamina Diluída</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='MetilcobalaminaDiluida' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.metilfolatodiluido){
				case "1":					
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-danger border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Metilfolato Diluído</p><p class='m-0 p-0'>Acabando</p>"+
					"</button><button type='button' id='MetilfolatoDiluido' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"<p class='m-0 p-0'>Metilfolato Diluído</p><p class='m-0 p-0'>Em Produção</p>"+
					"</button><button type='button' id='MetilfolatoDiluido' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}switch(retornado.almoco){
				case "1":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"Turma dos Sólidos no Almoço!"+
					"</button><button type='button' id='Almoco' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break; case "2":
					qtdExps++;
					dadosLinhaExipiente += "<button type='button' class='btn btn-warning border rounded-pill m-0 p-2'>"+
						"Turma dos Semi-Sólidos! no Almoço!"+
					"</button><button type='button' id='Almoco' class='btn btn-success rounded-circle finalizaExcipiente'>X</button>";
				break;
			}			
			if(dadosLinhaExipiente != ""){	
				$("#qtdExipientes").html(qtdExps);
				$("#mostraDadosExipientes").html(dadosLinhaExipiente);
				$("#linhaMostraExp").css("display", "block");							
			}else{								
				$("#linhaMostraExp").css("display", "none");
			}					
			//Avisos
			if(retornado.avisosbanco != ""){				
				$("#linhaqtdavisos").html(retornado.qtdavisos);
				$("#conteudoLinhaMostraAvisos").html(retornado.avisosbanco);
				$("#linhaMostraAvisos").css("display", "block");
			}else{
				$("#linhaMostraAvisos").css("display", "none");
			}
		}
	});
};
function sair(){
	$(document).on('click', '#sair', function(){
		var sair = "sair";
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: {'sair': sair},
			dataType: 'json',
			success: function(retorno){
				if(retorno == "saiu"){
					window.location.href = "index.php";
				}						
			}
		});
	});
}
function cadastroDeFuncionarios(){
	$(document).on('click', '#btmostraCadFunc', function(){
		$("#linhaDeCadFunc").toggle();
	});
	$("#formCadUsuarios").submit(function(ev){
		ev.preventDefault();
		var formCadUsuariosDados = $("#formCadUsuarios");
		formCadUsuariosDados = formCadUsuariosDados.serialize();		
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: formCadUsuariosDados,
			dataType: 'json',
			success: function(retorno){
				alert(retorno);
				if(retorno == "Cadastrado com sucesso!"){		
					carregar();
				}
			}
		});
	});	
}
function login(){
	$("#formLogin").submit(function(ev){
		ev.preventDefault();
		var formLoginDados = $("#formLogin");
		formLoginDados = formLoginDados.serialize();		
		$.ajax({
			url: 'confg.php',
			type: 'post',
			data: formLoginDados,
			dataType: 'json',
			success: function(retorno){	
				if(retorno === "Senha Correta"){		
					window.location.href = "painel.php";
				}else{
					alert(retorno);
				}
			}
		});
	});	
}
function chamaAtualizacao(){
	var funcaoTimersts = setInterval(function(){
		atualizatudo();
	}, 1000);		
}

function carregar(){	
	location.reload();
};