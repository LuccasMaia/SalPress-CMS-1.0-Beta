<?php

// constroe campo destaque
function constroe_campo_destaque(){

// globals
global $idioma;

// valida configuracao
if(CONFIG_COLOCAR_MENU_TOP_DESTAQUE == true){
	
	// html
    $html .= constroe_menu_navegacao_topo();

};

// valida configuracao de paginador numerico
if(USAR_PAGINADOR_NUMERICO == true){
	
	// codigo html
	$html .= carrega_publicacoes_miniatura();
	$html .= constroe_paginadores_numericos();
	
};

// codigo html
$html = "
<div class='classe_div_campo_destaque' id='id_div_campo_destaque'>$html</div>
";

// retorno
return $html;

};

?>