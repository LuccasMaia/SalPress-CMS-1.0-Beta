<?php

// constroe o subtopo de pagina
function constroe_sub_topo_pagina(){

// globals
global $idioma;

// valida usar resolucao
if(CONFIG_EXIBE_WIDGET_TOPO == true and retorne_href_get() != $idioma[4] and retorne_usuario_logado() == false){

    // campo widget de topo
    $campo[0] = campo_widget_topo();

};

// valida configuracao
if(CONFIG_EXIBE_TOPO_PAGINA == true){
	
	// campos
	$campo[1] = "
	<div class='div_sub_topo_pagina'></div>
	";

};

// codigo html
$html = "
$campo[0]
$campo[1]
";

// retorno
return $html;

};

?>