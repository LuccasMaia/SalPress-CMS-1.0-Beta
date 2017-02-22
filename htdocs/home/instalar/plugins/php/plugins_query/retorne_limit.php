<?php

// retorna o limit
function retorne_limit(){

// globals
global $requeste;

// dados de formulario
$contador_avanco = remove_html($_REQUEST[$requeste[8]]);

// valida limit
if($contador_avanco == null){

    // valor padrao
    $contador_avanco = 0;
	
};

// valida configuracao de paginador numerico
if(USAR_PAGINADOR_NUMERICO == true){
	
	// atualiza o contador...
    $contador_inicio = $contador_avanco * CONFIG_LIMIT_PUBLICACOES;

}else{
	
	// iguala o contador
	$contador_inicio = $contador_avanco;
	
};

// contador final
$contador_fim = CONFIG_LIMIT_PUBLICACOES;

// limit
$limit = "limit $contador_inicio, $contador_fim";

// retorno
return $limit;

};

?>