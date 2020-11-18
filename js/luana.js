$(document).ready(function(){		
	reconhecendoComandoDeVoz();		
	// tranformaTextoEmArray("Luana inclua cinco pastas verdes entre 18 a 19 horas na tabela semi-sólidos");
});
function enviaEdicaoQTDTbHoraLuana(valor, nomehorariodb, tipoTbHora, cor, diaDaTabela){		
	$.ajax({
		url: 'confg.php',
		type: 'post',
		data: {
			"valor": valor,
			"nomehorariodb": nomehorariodb,
			"tipoTbHora": tipoTbHora,
			"cor": cor,
			"diaDaTabela": diaDaTabela
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
function atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela){	
	var valorCapituradoParaOperacao = document.getElementById(idhorarionivelinput).value;
	var valorEquacionado=0;
	if(operacao == 'mais'){
		valorEquacionado = parseInt(valorCapituradoParaOperacao)+parseInt(quantidadepastas);
	}else{
		if(operacao == 'menos'){ valorEquacionado = parseInt(valorCapituradoParaOperacao)-parseInt(quantidadepastas); }
	}				
	var nomehorariodb = $("#"+idhorarionivelinput).attr("name");
	nomehorariodb = $("#"+nomehorariodb).attr("name");	
	var diaDaTabela = $("#SelectTabelaSolidosSemisolidosDia").val();
	// alert(operacao+' '+quantidadepastas+' Pastas '+corniveldedificuldade+' Entre '+horarioinicial+' a '+horariofinal+ ' Na Tabela '+tipotabela);	
	switch(tipotabela){
		case 'sólidos'      : tipotabela = 'solidos'; 		break; 
		case 'semi-sólidos' : tipotabela = 'semisolidos'; 	break;
	}
	enviaEdicaoQTDTbHoraLuana(valorEquacionado, nomehorariodb, tipotabela, corniveldedificuldade, diaDaTabela);	
}
function defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, quantidadepastas, corniveldedificuldade, horarioinicial, horariofinal, tipotabela){
	var idhorarionivelinput = "";
	switch(horarioinicial){		
		case '8':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora1';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora34'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora2';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora35'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora3';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora36'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '9':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora4';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora37'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora5';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora38'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora6';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora39'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '10':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora7';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora40'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora8';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora41'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora9';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora42'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '11':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora10';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora43'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora11';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora44'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora12';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora45'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '12':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora13';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora46'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora14';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora47'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora15';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora48'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '13':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora16';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora49'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora17';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora50'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora18';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora51'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '14':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora19';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora52'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora20';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora53'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora21';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora54'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '15':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora22';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora55'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora23';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora56'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora24';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora57'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '16':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora25';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora58'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora26';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora59'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora27';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora60'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '17':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora28';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora61'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora29';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora62'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora30';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora63'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; case '18':
			switch(corniveldedificuldade){
				case 'verde': case 'verdes':
					corniveldedificuldade = 'verde';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora31';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora64'; break;
						default: alert("Nome da Tabela inválido!");
					}													
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'amarela': case 'amarelas':
					corniveldedificuldade = 'amarela';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora32';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora65'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; case 'vermelha': case 'vermelhas':
					corniveldedificuldade = 'vermelha';
					switch(tipotabela){
						case 'sólidos'	   	: idhorarionivelinput = 'ipTbHora33';  break; 
						case 'semi-sólidos'	: idhorarionivelinput = 'ipTbHora66'; break;
						default: alert("Nome da Tabela inválido!");
					}
					atribuiParaInputHorarioNivelQTDpasta(operacao, quantidadepastas, corniveldedificuldade, idhorarionivelinput, horarioinicial, horariofinal, tipotabela);
				break; default: alert("Cor/Nível inválido!");		
			}
		break; default: alert("Horário inválido!");
	}
}
function convertendoVozEmComando(nomedaluana, operacao, quantidadepastas, corniveldedificuldade, horarioinicial, horariofinal, tipotabela){
	if(nomedaluana === "luana"){
		if(operacao == 'inclua' || operacao == 'diminua'){
			if(operacao == 'inclua' || operacao == 'aumenta'){operacao = 'mais';}else{
				if(operacao == 'diminua'){operacao = 'menos';}
			}
			switch(quantidadepastas){
				case 'uma'	 : case '1' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 1, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'duas'	 : case '2' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 2, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'tres'  : case '3' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 3, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'três'  : case '3' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 3, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'quatro': case '4' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 4, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'cinco' : case '5' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 5, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'seis'  : case '6' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 6, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'sete'  : case '7' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 7, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'oito'  : case '8' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 8, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'nove'  : case '9' :defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 9, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				case 'dez'   : case '10':defineIDnomeHorarioPelaCorEtipoDaTabela(operacao, 10, corniveldedificuldade, horarioinicial, horariofinal, tipotabela);break;
				default: alert("Está quantidade é inválida!");
			}
		}else{alert("Não Estou Te Entendendo! ou Seu Comando está incorreto ou ainda não evolui para executá-lo!");}
	}else{alert("Para sua informação meu nome é Luana!");}
}
function tranformaTextoEmArray(voz){
	$.ajax({
		url: 'confg.php',
		type: 'POST',
		data: {'voz': voz},
		dataType: 'JSON',
		success: function(retornado){			
			if(retornado[1]){
				if(retornado[2]){
					if(retornado[4]){						
						convertendoVozEmComando(retornado[0], retornado[1], retornado[2], retornado[4], retornado[6], retornado[8], retornado[12]);
					}else{alert("Não Estou Te Entendendo! Faltou Comandos!");}
				}else{alert("Não Estou Te Entendendo! Faltou Comandos!");}
			}else{alert("Não Estou Te Entendendo! Faltou Comandos!");}		
		}
	});
}
function reconhecendoComandoDeVoz(){	
	$("#stop").css("display", "none");
	if(window.SpeechRecognition || window.webkitSpeechRecognition){
		var btn_play = document.querySelector('#play');
		var btn_stop = document.querySelector('#stop');
		var resultado = "";
		var API = window.SpeechRecognition || window.webkitSpeechRecognition;

		var recognition = new API();

		recognition.continuous = 'true';
		recognition.lang = 'pt-br';

		recognition.onstart = function(){
			console.log('Botao start');
		}

		recognition.onresult = function(e){
			resultado = e.results[0][0].transcript;
			console.log(resultado);
			var retorno = "";
			for(var i=e.resultIndex; i<e.results.length; i++){
				console.log(e.results[0][0].transcript);
				retorno = e.results[i][0].transcript;
				document.getElementById('vozParaTexto').value = retorno;
			}			
		}

		recognition.onend = function(){
			console.log('Botao stop');			
			tranformaTextoEmArray(resultado);
		}
		if(btn_play){
			btn_play.addEventListener('click', function(){
				recognition.start();
				document.getElementById('stop').style.display="inline";
				document.getElementById('play').style.display="none";
			},false);
		}if(btn_stop){
			btn_stop.addEventListener('click', function(){
				recognition.stop();
				document.getElementById('play').style.display="inline";
				document.getElementById('stop').style.display="none";
			},false);
		}
	}else{
		console.log('Error');
	}
}