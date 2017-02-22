<?php
	
// retorna o limit
function retorne_limit_slideshow(){

// dados de formulario
$contador_avanco = remove_html($_REQUEST['avanco_contador']);

// valida limit
if($contador_avanco == null){
	
	// valor padrao
	$contador_avanco = 0;
	
};

// contadores de avanco limit
$contador_inicio = $contador_avanco;
$contador_fim = 1;

// limit
$limit = "limit $contador_inicio, $contador_fim";

// retorno
return $limit;

};
	
?>