<?php
	
// retorna o limit de imagens de album
function retorne_limit_imagens_album(){

// dados de formulario
$contador_avanco = remove_html($_REQUEST['contador_avanco_conteudo']);

// valida limit
if($contador_avanco == null){

	// valor padrao
	$contador_avanco = 0;

};

// contadores de avanco limit
$contador_inicio = $contador_avanco;
$contador_fim = CONFIG_LIMIT_IMAGENS_ALBUM;

// limit
$limit = "limit $contador_inicio, $contador_fim";

// retorno
return $limit;

};
	
?>	