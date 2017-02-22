<?php
	
// gerador de select option especial
function gerador_select_option_especial($array_options, $array_valores, $valor_atual, $nome, $idcampo, $evento_campo){

// separa os itens por virgula
$array_options = explode(",", $array_options);
$array_valores = explode(",", $array_valores);

// contador
$contador = 0;

// codigo html
foreach($array_options as $valor){

	// valor especial
	$valor_especial = $array_valores[$contador];

	// valor original
	$valor_original = $valor;

	// valida configuracao
	if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
		
		// atualiza o valor especial
		$valor = $valor_especial;
		
	};

	// monta option
	if($valor == $valor_atual or $valor_especial == $valor_atual){
		
		// codigo html
		$html .= "<option value='$valor_especial' selected>$valor_original</option>";
		
		}else{
		
		// codigo html
		$html .= "<option value='$valor_especial'>$valor_original</option>";
		
	};

	// atualiza o contador
	$contador++;

};

// monta select
$html = "<select name='$nome' id='$idcampo' onchange='$evento_campo'>$html</select>";

// retorno
return $html; // retorno

};

?>