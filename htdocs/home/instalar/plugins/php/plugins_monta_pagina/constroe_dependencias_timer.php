<?php

// constroe dependencias de timer
function constroe_dependencias_timer(){

// valida numero de imagens
if(retorne_numero_imagens_slideshow() != 0){
	
	// funcoes a serem carregadas
	$html .= "
	\n
	carregar_slideshow();
	\n
	";
	
};

// codigo html
$html = timer_sistema(25, $html);

// retorno
return $html;

};


?>