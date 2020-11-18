-----Implementar-----


--------->Modificações site online:	
		

<---------
--->Tarefas 
	--->Mais urgentes

		-> Restringir a ter no minimo nivel 1 
		para alterar qualquer parametro no banco e 
		nivel 2 para coisas do laboratorio;		

	<---
	--->Menos urgentes
		-> No menu poção fazer classificação botao diluídos para os diluídos ou botao Pré Sólidos e Pré Semi-sólidos

		-> Criar Espaco para expor os itens que estão em falta
	<---		
<---
-----------------------Concluidos(Organizar por DATA!!!)-----------------------
	
	--->Homologação
		-->(17/11/2020)
			-> Convertido o retante dos perifericos inputs de entrada, manual, menu_fixo, pastas_azuis_layout_fixo, mostra_excipientes_pre_prontos_fixo, mostra_avisos_fixo para sessoes
		<--
		-->(15/11/2020)
			-> Terminar pre prontos adicionais digitados no input e novas funcoes para mensagens automaticas
			-> (Talvez não precise com a nova Dinamica)Criei botões: Metil testosterona(Para peixe), Base Efervescente Abacaxi, limão e laranja;
			->Criado Opção de digitar pre pronto;
		<--
		-->(14/11/2020)
			-> Verificado um BUG de sessao que durava apenas 180 minutos  perdendo os dados de $_SESSION['nivel'] ai mesmo estando logado no nivel 1 depois de um tempo não
			permite fazer algumas modificacoes!!!(Tempo de sessão está com apenas 180 minutos procurar uma forma de aumentar)(Não testei, testar no laboratorio para ver se funciona...);
			agora durando 12 horas 
		<--
		-->(27/10/2020)
			-> Na hora de Editar a Quantidade de pastas editar a tabela do dia especificado no select!
		<--
		-->(13/10/2020)
			-> Criar colunas: Metil testosterona(Para peixe), Base Efervescente Abacaxi, limão e laranja, Vitamina B12 diluida, T3 diluido, T4 Diluido, Vitamina D3 Diluida na tabela no DB;

			-> Criar botões para adicionar dinâmicos na listagem de msgs prontas também (Criei Botões de excluir e de adicionar);

			-> Criei input para subistituir botões de pré-prontos(Acabando e Acabou) e tabela uma nova para armazenar os parametros;
		<--
	<---

	--->online
		-->(12/10/2020)
			-> Ver código do farm de respostas prontas e tentar embutir no labniveleitor
		<--
		-->(30/09/2020)
			-> Menu poção: Adicionei opção Metilfolato Diluído e coluna no DB
			-> Quando pronto ao invés de pedido pronto na frase, escrever pedidos no balde, pegar a quantidade de itens do pedido e embutir no cadastro do aviso;
		<--
		-->(29/09/2020)
			-> Criei 2 colunas na tabela pressaopedidos
			-> Criado linha opções do laboratório com BT Toggle
			-> Melhorar o layout cortado do menu poção;
			-> Adicionar mais estas opções no menu poção labniveleitor: 
			Anastrozol Diluido; Metilcobalamina diluida;
		<--
		-->
			-> Encontrar uma forma de mostrar as pastas atrasadas de ontêm;
			-> Zerar o pedido da filial quando clicar em pronto		
		<--
	<---

-------------------------------------------------------------------------