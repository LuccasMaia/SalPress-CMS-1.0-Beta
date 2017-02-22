<?php

// detecta tipo de resolucao
function detecta_resolucao_pagina(){
	
// dados de formulario
$largura_nova = remove_html($_REQUEST['largura']);

// valida tamanho padrao ou menor
if($largura_nova < TAMANHO_RESOLUCAO_PADRAO){
	
	// usar resolucao
	$_SESSION[USAR_RESOLUCAO_SISTEMA] = true;

}else{
	
	// nao usar resolucao
	$_SESSION[USAR_RESOLUCAO_SISTEMA] = false;

};

// valida pagina ja foi reiniciada
if($_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] != $largura_nova){
	
	// atualiza o tamanho da largura atual
    $_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = $largura_nova;

	// deve reiniciar pagina
	return 1;
	
}else{
	
	// pagina continua com o mesmo tamanho
	return -1;
	
};

};

?>