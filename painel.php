<?php include("include/cabecalho.php")?>
	<div class='container'>
		<div class='row bg-info border rounded-pill'>
			<button type='button' class='btn btn-info border rounded-pill btPastaAzul' id=0>Pasta Azul</button>
			<h1 class='text-center'>Controle Diário de Fórmulas</h1>
		    <input type='hidden' class='vfLogin' value="<?php echo $_SESSION['logado'];?>"/>
			<button type='button' class='btn btn-danger border rounded-pill' id='sair'>Finalizar</button>
		</div>
		<div class='row mt-5'>
			<div class='col-12'>
				<a href="#manual"><h1 class='text-center text-danger'>Nível de Pressão</h1></a>
			</div>
			<div class='col-12 bg-success rounded-pill nvPressao' id='nvPressaoVerde'>
				<h1 class='text-left'>Verde:<span> Tudo Tranquilo</span></h1>
			</div>
			<div class='col-12 bg-warning rounded-pill nvPressao' id='nvPressaoAmarelo'>
				<h1 class='text-left'>Amarelo:<span> Verifique as informações ou Dá uma perguntada...</span></h1>
			</div>
			<div class='col-12 bg-danger rounded-pill nvPressao' id='nvPressaoVermelho'>
				<h1 class='text-left'>Vermelho:<span> Muita coisa para hoje, Marca para outro dia por favor!</span></h1>
			</div>
		</div>
		<div class='row border border-warning'>			
			<div class='col-6 bg-success'>

				<ul class='m-0 p-0'>
					<li class='text-center text-warning'>
						<h5 class='mt-2'>Total de Pastas Hoje:	</h5>										
							<input type='text' size='3' class='text-center text-warning border-danger bg-danger' id='totalDePastasNoLab' disabled />
						
					</li>

					<li class='text-center text-warning'>
						<h5 class=''>Pastas Para Amanhã:
							<input type='text' name='' size='4' class='text-center text-warning border-danger bg-danger inputAtrasadasAdiantadas' id='adiantadas'>
						</h5>
					</li>
				</ul>

			</div>						

			<!-- <div class='col-6 bg-success'>
				<ul>
					<li class='text-center text-warning'>
						<h5 class='mt-3'>Pastas Para Amanhã em diante:</h5>
					</li><li class='text-center text-warning'>						
						<button type='button' class='tbHoraVerde btMenosAdiantadas bg-warning border-danger text-danger'>-</button>
						<button type='button' class='tbHoraVerde btMaisAdiantadas bg-warning border-danger text-danger'>+</button>	
						<input type='text' name='' size='4' class='text-center text-warning border-danger bg-danger inputAtrasadasAdiantadas' id='adiantadas'>
					</li>
				</ul>
			</div> -->
			<div class='col-6 bg-success'>
				<ul>
					<li class='text-center text-warning'>
						<h5 class='mt-3'>Pastas: Atrasadas ou Falta Algo:</h5>
					</li><li class='text-center text-warning'>						 
						<button type='button' class='tbHoraVerde btMenosAtrasadas bg-warning border-danger text-danger'>-</button>
						<button type='button' class='tbHoraVerde btMaisAtrasadas bg-warning border-danger text-danger'>+</button>	
						<input type='text' name='' size='4' class='text-center text-warning border-danger bg-danger inputAtrasadasAdiantadas' id='atrasadas'>
					</li>
				</ul>
			</div>
		</div>
		<div class='row'>
			<div class='col-12 p-0'>
				<select id='SelectTabelaSolidosSemisolidosDia' class='form-control bg-success border-warning text-warning'>
					<option value='opcaoTabelaDeHoje'>{*** Tabela De Hoje ***}</option>
					<option value='opcaoTabelaDeAmanha'>{*** Tabela De Amanhã ***}</option>					
					<option value='opcaoTabelaDepoisDeAmanha'>{*** Tabela Depois De Amanhã ***}</option>
				</select>
			</div>
		</div>
		<div class='row'>
			<div class='col-12 p-0'>
				<select id='tranferirDadosTabelaSolidosSemisolidos' class='form-control bg-success border-warning text-warning'>					
					<option value=''>--- Transferência de dados ---</option>
					<option value='RefreshAmanha'>Transferir dados da tabela de ( Amanhã ) para Tabela de hoje</option>
					<option value='RefreshDepoisDeAmanha'>Transferir dados da tabela ( Depois de amanhã ) para Tabela de Hoje</option>
				</select>
			</div>
		</div>
		<div class='row'>								
			<div class='col-6 bg-secondary border border-warning'>
				<p><a href="#manualtabelasSSS" class='text-dark'><h1 class='text-center text-dark m-0'>Sólidos</h1></a></p>				
				
			</div>
			<div class='col-6 bg-primary border border-warning'>
				<p><a href="#manualtabelasSSS" class='text-dark'><h1 class='text-center text-dark m-0'>Semi-sólidos</h1></a></p>
				<p class='m-0 p-0'>
					
				</p>
			</div>
		</div>
		<div class='row' id='tbHorariosLinhaUm'>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -08:00--09:00-</h5>						
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario1' class='tbHoraVerde inputsTbHora' id='ipTbHora1'/>							
							<input type='hidden' name='oitonove' class='solidos' value="verde" id='nomehorario1'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=1>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=1>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario2' class='tbHoraAmarelo inputsTbHora' id='ipTbHora2'/>						
							<input type='hidden' name='oitonove' class='solidos' value="amarela" id='nomehorario2'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=2>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=2>+</button>							
						</p><p class='text-center m-0'>		
							<input type='text' size="6" name='nomehorario3' class='tbHoraVermelho inputsTbHora' id='ipTbHora3'/>						
							<input type='hidden' name='oitonove' class='solidos' value="vermelha" id='nomehorario3'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=3>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=3>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal1'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -09:01--10:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario4' class='tbHoraVerde inputsTbHora' id='ipTbHora4'/>
							<input type='hidden' name='novedez' class='solidos' value="verde" id='nomehorario4'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=4>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=4>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario5' class='tbHoraAmarelo inputsTbHora' id='ipTbHora5'/>						
							<input type='hidden' name='novedez' class='solidos' value="amarela" id='nomehorario5'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=5>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=5>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario6' class='tbHoraVermelho inputsTbHora' id='ipTbHora6'/>
							<input type='hidden' name='novedez' class='solidos' value="vermelha" id='nomehorario6'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=6>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=6>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal2'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -08:00--09:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario34' class='tbHoraVerde inputsTbHora' id='ipTbHora34'/>
							<input type='hidden' name='oitonove' class='semisolidos' value="verde" id='nomehorario34'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=34>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=34>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario35' class='tbHoraAmarelo inputsTbHora' id='ipTbHora35'/>
							<input type='hidden' name='oitonove' class='semisolidos' value="amarela" id='nomehorario35'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=35>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=35>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario36' class='tbHoraVermelho inputsTbHora' id='ipTbHora36'/>
							<input type='hidden' name='oitonove' class='semisolidos' value="vermelha" id='nomehorario36'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=36>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=36>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal3'/>
						</p>
					</div>
				</div>				
			</div>		
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -09:01--10:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario37' class='tbHoraVerde inputsTbHora' id='ipTbHora37'/>
							<input type='hidden' name='novedez' class='semisolidos' value="verde" id='nomehorario37'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=37>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=37>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario38' class='tbHoraAmarelo inputsTbHora' id='ipTbHora38'/>
							<input type='hidden' name='novedez' class='semisolidos' value="amarela" id='nomehorario38'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=38>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=38>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario39' class='tbHoraVermelho inputsTbHora' id='ipTbHora39'/>
							<input type='hidden' name='novedez' class='semisolidos' value="vermelha" id='nomehorario39'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=39>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=39>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal4'/>
						</p>
					</div>
				</div>				
			</div>			
		</div>

		<div class='row' id='tbHorariosLinhaDois'>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -10:01--11:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario7' class='tbHoraVerde inputsTbHora' id='ipTbHora7'/>
							<input type='hidden' name='dezonze' class='solidos' value="verde" id='nomehorario7'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=7>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=7>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario8' class='tbHoraAmarelo inputsTbHora' id='ipTbHora8'/>
							<input type='hidden' name='dezonze' class='solidos' value="amarela" id='nomehorario8'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=8>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=8>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario9' class='tbHoraVermelho inputsTbHora' id='ipTbHora9'/>
							<input type='hidden' name='dezonze' class='solidos' value="vermelha" id='nomehorario9'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=9>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=9>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal5'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -11:01--12:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario10' class='tbHoraVerde inputsTbHora' id='ipTbHora10'/>
							<input type='hidden' name='onzedoze' class='solidos' value="verde" id='nomehorario10'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=10>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=10>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario11' class='tbHoraAmarelo inputsTbHora' id='ipTbHora11'/>
							<input type='hidden' name='onzedoze' class='solidos' value="amarela" id='nomehorario11'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=11>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=11>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario12' class='tbHoraVermelho inputsTbHora' id='ipTbHora12'/>
							<input type='hidden' name='onzedoze' class='solidos' value="vermelha" id='nomehorario12'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=12>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=12>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal6'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -10:01--11:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario40' class='tbHoraVerde inputsTbHora' id='ipTbHora40'/>
							<input type='hidden' name='dezonze' class='semisolidos' value="verde" id='nomehorario40'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=40>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=40>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario41' class='tbHoraAmarelo inputsTbHora' id='ipTbHora41'/>
							<input type='hidden' name='dezonze' class='semisolidos' value="amarela" id='nomehorario41'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=41>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=41>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario42' class='tbHoraVermelho inputsTbHora' id='ipTbHora42'/>						
							<input type='hidden' name='dezonze' class='semisolidos' value="vermelha" id='nomehorario42'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=42>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=42>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal7'/>
						</p>
					</div>
				</div>				
			</div>		
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -11:01--12:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario43' class='tbHoraVerde inputsTbHora' id='ipTbHora43'/>
							<input type='hidden' name='onzedoze' class='semisolidos' value="verde" id='nomehorario43'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=43>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=43>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario44' class='tbHoraAmarelo inputsTbHora' id='ipTbHora44'/>
							<input type='hidden' name='onzedoze' class='semisolidos' value="amarela" id='nomehorario44'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=44>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=44>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario45' class='tbHoraVermelho inputsTbHora' id='ipTbHora45'/>
							<input type='hidden' name='onzedoze' class='semisolidos' value="vermelha" id='nomehorario45'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=45>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=45>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal8'/>
						</p>
					</div>
				</div>				
			</div>			
		</div>

		<div class='row' id='tbHorariosLinhaTres'>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -12:01--13:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario13' class='tbHoraVerde inputsTbHora' id='ipTbHora13'/>
							<input type='hidden' name='dozetreze' class='solidos' value="verde" id='nomehorario13'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=13>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=13>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario14' class='tbHoraAmarelo inputsTbHora' id='ipTbHora14'/>						
							<input type='hidden' name='dozetreze' class='solidos' value="amarela" id='nomehorario14'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=14>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=14>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario15' class='tbHoraVermelho inputsTbHora' id='ipTbHora15'/>
							<input type='hidden' name='dozetreze' class='solidos' value="vermelha" id='nomehorario15'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=15>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=15>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal9'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -13:01--14:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario16' class='tbHoraVerde inputsTbHora' id='ipTbHora16'/>
							<input type='hidden' name='trezequa' class='solidos' value="verde" id='nomehorario16'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=16>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=16>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario17' class='tbHoraAmarelo inputsTbHora' id='ipTbHora17'/>
							<input type='hidden' name='trezequa' class='solidos' value="amarela" id='nomehorario17'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=17>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=17>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario18' class='tbHoraVermelho inputsTbHora' id='ipTbHora18'/>
							<input type='hidden' name='trezequa' class='solidos' value="vermelha" id='nomehorario18'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=18>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=18>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal10'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -12:01--13:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario46' class='tbHoraVerde inputsTbHora' id='ipTbHora46'/>
							<input type='hidden' name='dozetreze' class='semisolidos' value="verde" id='nomehorario46'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=46>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=46>+</button>					
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario47' class='tbHoraAmarelo inputsTbHora' id='ipTbHora47'/>
							<input type='hidden' name='dozetreze' class='semisolidos' value="amarela" id='nomehorario47'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=47>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=47>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario48' class='tbHoraVermelho inputsTbHora' id='ipTbHora48'/>
							<input type='hidden' name='dozetreze' class='semisolidos' value="vermelha" id='nomehorario48'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=48>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=48>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal11'/>
						</p>
					</div>
				</div>				
			</div>		
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -13:01--14:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario49' class='tbHoraVerde inputsTbHora' id='ipTbHora49'/>
							<input type='hidden' name='trezequa' class='semisolidos' value="verde" id='nomehorario49'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=49>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=49>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario50' class='tbHoraAmarelo inputsTbHora' id='ipTbHora50'/>
							<input type='hidden' name='trezequa' class='semisolidos' value="amarela" id='nomehorario50'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=50>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=50>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario51' class='tbHoraVermelho inputsTbHora' id='ipTbHora51'/>
							<input type='hidden' name='trezequa' class='semisolidos' value="vermelha" id='nomehorario51'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=51>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=51>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal12'/>
						</p>
					</div>
				</div>				
			</div>			
		</div>

		<div class='row' id='tbHorariosLinhaQuatro'>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -14:01--15:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario19' class='tbHoraVerde inputsTbHora' id='ipTbHora19'/>
							<input type='hidden' name='quaqui' class='solidos' value="verde" id='nomehorario19'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=19>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=19>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario20' class='tbHoraAmarelo inputsTbHora' id='ipTbHora20'/>
							<input type='hidden' name='quaqui' class='solidos' value="amarela" id='nomehorario20'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=20>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=20>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario21' class='tbHoraVermelho inputsTbHora' id='ipTbHora21'/>
							<input type='hidden' name='quaqui' class='solidos' value="vermelha" id='nomehorario21'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=21>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=21>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal13'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -15:01--16:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario22' class='tbHoraVerde inputsTbHora' id='ipTbHora22'/>
							<input type='hidden' name='quidseis' class='solidos' value="verde" id='nomehorario22'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=22>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=22>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario23' class='tbHoraAmarelo inputsTbHora' id='ipTbHora23'/>
							<input type='hidden' name='quidseis' class='solidos' value="amarela" id='nomehorario23'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=23>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=23>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario24' class='tbHoraVermelho inputsTbHora' id='ipTbHora24'/>
							<input type='hidden' name='quidseis' class='solidos' value="vermelha" id='nomehorario24'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=24>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=24>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal14'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -14:01--15:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario52' class='tbHoraVerde inputsTbHora' id='ipTbHora52'/>
							<input type='hidden' name='quaqui' class='semisolidos' value="verde" id='nomehorario52'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=52>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=52>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario53' class='tbHoraAmarelo inputsTbHora' id='ipTbHora53'/>
							<input type='hidden' name='quaqui' class='semisolidos' value="amarela" id='nomehorario53'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=53>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=53>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario54' class='tbHoraVermelho inputsTbHora' id='ipTbHora54'/>
							<input type='hidden' name='quaqui' class='semisolidos' value="vermelha" id='nomehorario54'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=54>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=54>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal15'/>
						</p>
					</div>
				</div>				
			</div>		
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -15:01--16:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario55' class='tbHoraVerde inputsTbHora' id='ipTbHora55'/>
							<input type='hidden' name='quidseis' class='semisolidos' value="verde" id='nomehorario55'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=55>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=55>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario56' class='tbHoraAmarelo inputsTbHora' id='ipTbHora56'/>
							<input type='hidden' name='quidseis' class='semisolidos' value="amarela" id='nomehorario56'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=56>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=56>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario57' class='tbHoraVermelho inputsTbHora' id='ipTbHora57'/>
							<input type='hidden' name='quidseis' class='semisolidos' value="vermelha" id='nomehorario57'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=57>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=57>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal16'/>
						</p>
					</div>
				</div>				
			</div>			
		</div>

		<div class='row' id='tbHorariosLinhaCinco'>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -16:01--17:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario25' class='tbHoraVerde inputsTbHora' id='ipTbHora25'/>
							<input type='hidden' name='dseisdsete' class='solidos' value="verde" id='nomehorario25'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=25>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=25>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario26' class='tbHoraAmarelo inputsTbHora' id='ipTbHora26'/>
							<input type='hidden' name='dseisdsete' class='solidos' value="amarela" id='nomehorario26'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=26>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=26>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario27' class='tbHoraVermelho inputsTbHora' id='ipTbHora27'/>
							<input type='hidden' name='dseisdsete' class='solidos' value="vermelha" id='nomehorario27'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=27>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=27>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal17'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -17:01--18:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario28' class='tbHoraVerde inputsTbHora' id='ipTbHora28'/>
							<input type='hidden' name='dsetedoito' class='solidos' value="verde" id='nomehorario28'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=28>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=28>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario29' class='tbHoraAmarelo inputsTbHora' id='ipTbHora29'/>
							<input type='hidden' name='dsetedoito' class='solidos' value="amarela" id='nomehorario29'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=29>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=29>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario30' class='tbHoraVermelho inputsTbHora' id='ipTbHora30'/>
							<input type='hidden' name='dsetedoito' class='solidos' value="vermelha" id='nomehorario30'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=30>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=30>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal18'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -16:01--17:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario58' class='tbHoraVerde inputsTbHora' id='ipTbHora58'/>
							<input type='hidden' name='dseisdsete' class='semisolidos' value="verde" id='nomehorario58'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=58>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=58>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario59' class='tbHoraAmarelo inputsTbHora' id='ipTbHora59'/>
							<input type='hidden' name='dseisdsete' class='semisolidos' value="amarela" id='nomehorario59'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=59>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=59>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario60' class='tbHoraVermelho inputsTbHora' id='ipTbHora60'/>
							<input type='hidden' name='dseisdsete' class='semisolidos' value="vermelha" id='nomehorario60'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=60>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=60>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal19'/>
						</p>
					</div>
				</div>				
			</div>		
			<div class='col-3 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -17:01--18:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario61' class='tbHoraVerde inputsTbHora' id='ipTbHora61'/>
							<input type='hidden' name='dsetedoito' class='semisolidos' value="verde" id='nomehorario61'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=61>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=61>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario62' class='tbHoraAmarelo inputsTbHora' id='ipTbHora62'/>
							<input type='hidden' name='dsetedoito' class='semisolidos' value="amarela" id='nomehorario62'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=62>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=62>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario63' class='tbHoraVermelho inputsTbHora' id='ipTbHora63'/>
							<input type='hidden' name='dsetedoito' class='semisolidos' value="vermelha" id='nomehorario63'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=63>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=63>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal20'/>
						</p>
					</div>
				</div>				
			</div>			
		</div>

		<div class='row' id='tbHorariosLinhaSeis'>			
			<div class='col-6 border border-success tbSolidos'>				
				<div class='row bg-secondary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -18:01--19:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario31' class='tbHoraVerde inputsTbHora' id='ipTbHora31'/>
							<input type='hidden' name='doitodnove' class='solidos' value="verde" id='nomehorario31'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=31>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=31>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario32' class='tbHoraAmarelo inputsTbHora' id='ipTbHora32'/>
							<input type='hidden' name='doitodnove' class='solidos' value="amarela" id='nomehorario32'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=32>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=32>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario33' class='tbHoraVermelho inputsTbHora' id='ipTbHora33'/>
							<input type='hidden' name='doitodnove' class='solidos' value="vermelha" id='nomehorario33'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=33>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=33>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal21'/>
						</p>
					</div>
				</div>				
			</div>
			<div class='col-6 border border-success tbSemiSolidos'>				
				<div class='row bg-primary pt-3'>
					<div class='col-12 text-center p-0'>
						<h5 class='text-center m-0 corhorarios'>Horário: -18:01--19:00-</h5>
						<p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario64' class='tbHoraVerde inputsTbHora' id='ipTbHora64'/>
							<input type='hidden' name='doitodnove' class='semisolidos' value="verde" id='nomehorario64'/>

							<button type='button' class='tbHoraVerde menosformulasnivel' id=64>-</button>
							<button type='button' class='tbHoraVerde maisformulasnivel' id=64>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario65' class='tbHoraAmarelo inputsTbHora' id='ipTbHora65'/>
							<input type='hidden' name='doitodnove' class='semisolidos' value="amarela" id='nomehorario65'/>

							<button type='button' class='tbHoraAmarelo menosformulasnivel' id=65>-</button>
							<button type='button' class='tbHoraAmarelo maisformulasnivel' id=65>+</button>							
						</p><p class='text-center m-0'>							
							<input type='text' size="6" name='nomehorario66' class='tbHoraVermelho inputsTbHora' id='ipTbHora66'/>
							<input type='hidden' name='doitodnove' class='semisolidos' value="vermelha" id='nomehorario66'/>

							<button type='button' class='tbHoraVermelho menosformulasnivel' id=66>-</button>
							<button type='button' class='tbHoraVermelho maisformulasnivel' id=66>+</button>							
						</p><p class='text-center m-0'>
							<label class='m-0 text-left corhorarios'>TOTAL</label>
							<input type='text' size="6" name='' class='tbHoraTotal' id='tbHoraTotal22'/>
						</p>
					</div>
				</div>				
			</div>						
		</div>
		<!-- <div class='row bg-success'>
			<div class='col-12 mt-3'>
				<h5 class='text-center text-warning'>Total de Pastas:
					<input type='text' size='3' class='bg-warning text-danger' id='totalDePastasNoLab' disabled />
				</h5>
			</div>
		</div> -->
		<div class='row linhaPedidosPomerode' id='pedidos'>
			<div class='col-12 border border-success mt-5'>
				<h1>
					Iten(s):<input type="text" name='' size='4' class='text-center pegapedidos' id='pomerode'/>
					<-Pedidos de Pomerode <button type='button' value='pomerode' class='pedidosProntos btn btn-success'>Pronto</button>
				</h1>					
			</div>
		</div>
		<div class='row linhaPedidosBrusque'>
			<div class='col-12 border border-success'>
				<h1>
					Iten(s):<input type="text" name='' size='4' class='text-center pegapedidos' id='brusque'/>
					<-Pedidos de Brusque <button type='button' value='brusque' class='pedidosProntos btn btn-success'>Pronto</button>
				</h1>
			</div>
		</div>
		<div class='row'>
			<div class='col-12 border border-success mt-5'>
				<form id='formAvisos'>
					<ul class='ml-5 mr-5 mb-0 mt-0 p-0' id='quadroDeAvisos'>
						<li><h1 class='text-center text-danger p-5'>Quadro de Avisos</h1></li>
						<li><input type='text' name='inputnomemensageiro' class='form-control text-center text-primary bg-transparent' id='' placeholder="Nome do Mensageiro(a)"/></li>
						<li><textarea name='inputaviso' class='form-control text-warning bg-transparent pt-5 pb-5' placeholder="Digite aqui um Aviso ou uma mensagem...&#10;Obs:Todos usuários logados podem ver!"></textarea></li>
						<li><button type='submit' class='form-control text-success btn btn-transparent'>ENVIAR AVISO</button></li>
					</ul>
				</form>
			</div>
		</div>

		<!-- ------------------ -->

		<div class='row border border-success'>
			<div class='col-12 text-center mt-4'>
				<h5>Campo Respostas Dinâmicas:<span class='addx'></span></h5>	
			</div>
		</div>
		<div class='row border border-success'>
			<div class='col-12 text-center'>
				<button type='button' id='vermsgsprontas' class='form-control mb-2 mt-2 btn btn-primary'>Mensagens prontas</button>
			</div>
		</div>
		<div class='row border border-success' id='linhaProntas'>
			<div class='col-12 text-center'>
				<ul>
					<li>
						<input type='text' id='especificaMSGpronta' placeholder='Digite para Procurar por assunto...' class='form-control border border-success text-center text-success'>
					</li><li>
						<div id='linhaTodasProntas'>**linhaTodasProntas**</div>					
					</li><li>
						<button type='button' value=0 id='btMaisMSGSprontas' class='form-control btn btn-secondary'>Mais (+)</button>
					</li>
				</ul>
			</div>		
		</div>
		<div class='row border border-success'>
			<div class='col-12 text-center'>
				<button type='button' class='form-control mt-2 btn btn-primary' id='btmostracadprontas'>Cadastrar Mensagem Pronta</button>
			</div>
		</div>
		<div class='row border border-success' id='linhaCadastromsgsprontas'>
			<div class='col-12 text-center'>
				<form action='confg.php' method='post' id='formsgsprontas'>
					<ul>
						<li>
							<h5 class='mt-3'>Cadastro de Mensagens Prontas</h5>
						</li><li>											
							<label for='assuntoMSGpronta' class='form-control mt-2 mb-0'><h5>Assunto:</h5></label>
						</li><li>
							<input type='text' name='' id='assuntoMSGpronta' placeholder='Ex: Estimulante...' class='form-control text-center'>
						</li><li>											
							<label for='criadaPor' class='form-control mt-2 mb-0'><h5>Criada Por:</h5></label>
						</li><li>
							<input type='text' name='' id='criadaPor' placeholder='Seu Nome' class='form-control text-center'>
						</li><li>
							<textarea cols='35' rows='5' placeholder='Mensagem...' name='' id='mensagemParaCadastro' class='form-control mt-2'></textarea>
						</li><li>
							<button type='button' id='btAddDinamicos' class='form-control mt-1 btn btn-primary'>Adicionar Dinâmicos</button>
						</li>
						<div id='itensDinamicos' class='mt-2'></div>
						<li>
							<button type='button' id='btVerMSGpronta' class='form-control mt-1 btn btn-primary'>Visualizar</button>
						</li>
						<div id='visualizandoMSGS'></div>
						<li>
							<button type='button' id='btCadastrarMSGpronta' class='form-control mt-1 btn btn-primary'>Cadastrar</button>
						</li>					
					</ul>
				</form>
			</div>
		</div>

		<!-- ------------------ -->

		<div class='row'>
			<div class='col-12 border border-success mt-5'>
				<button type='button' class='form-control btn btn-success' id='btmostraCadFunc'>Cadastrar Funcionário</button>
			</div>
		</div>
		<div class='row' id='linhaDeCadFunc'>
			<div class='col-12 border border-success'>
				<form id="formCadUsuarios">
					<ul class='m-0 p-0'>
						<li><input type='text' name='cadnome' class='form-control text-center mt-5' placeholder="Nome para cadastro:"/></li>
						<li><input type='password' name='cadsenha' class='form-control text-center mt-2' placeholder="Senha:"/></li>
						<li><button type='submit' class='form-control btn btn-success mt-5'>Cadastrar</button></li>
					</ul>
				</form>
			</div>
		</div>
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