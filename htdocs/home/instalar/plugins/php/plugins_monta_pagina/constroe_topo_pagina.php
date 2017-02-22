<?php

// constroe o topo da pagina
function constroe_topo_pagina(){

// globals
global $idioma;

// valida campo de login
if(retorne_href_get() == $idioma[4]){

    // retorno nulo
    return null;

};

// pagina inicial
$pagina_inicial = PAGINA_INICIAL;

// valida usar resolucao
if(CONFIG_EXIBE_LOGOTIPO == true){

    // logotipo de topo
    $logotipo_topo .= "<div class='classe_div_logotipo_topo'>";
    $logotipo_topo .= retorne_imagem_servidor(0);
    $logotipo_topo .= "</div>";
	
};

// valida campo blocos de topo
if(retorne_href_get() != $idioma[38] and retorne_usuario_administrador() != true){
	
	// blocos de topo
    $blocos_topo = carrega_blocos_topo();

};

// codigo html
$html .= "<div class='div_topo_pagina'>";
$html .= $logotipo_topo;
$html .= campo_cadastro_topo();
$html .= campo_pesquisa();
$html .= "</div>";

// valida configuracao
if(CONFIG_EXIBE_WIDGET_MEIO_LADO_SLIDESHOW == true){
	
	// campo de widget
    $campo_widget_meio = campo_widget_meio();

};

// valida configuracao
if(CONFIG_EXIBE_WIDGET_LATERAL_LADO_SLIDESHOW == true){
	
	// campo de widget
	$campo_widget_lateral = campo_widget();
	
};

// valida configuracao
if(CONFIG_COLOCAR_MENU_TOP_DESTAQUE == false){
	
	// campo de navegacao de topo
	$campo_navegacao_topo = constroe_menu_navegacao_topo();

};

// campo slideshow
$campo_slide_show = constroe_slide_show();

$html .= "
<div class='div_topo_navega_pagina'>
$campo_navegacao_topo
$campo_slide_show
$campo_widget_lateral
$campo_widget_meio
$blocos_topo
</div>
";

// retorno
return $html;

};

?>