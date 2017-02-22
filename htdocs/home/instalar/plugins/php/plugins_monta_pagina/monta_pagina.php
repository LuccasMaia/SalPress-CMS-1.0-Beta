<?php

// monta pagina
function monta_pagina(){

// globals
global $idioma;
global $tema_disponivel;

// dados de sobre site
$dados_sobre_site = retorne_dados_sobre_site();

// usar resolucao
$usar_resolucao = retorna_usar_resolucao();

// autor da pagina
$autor_pagina = $dados_sobre_site["autor"];

// dependencias da pagina head
$dependencia[0] = "<script type='text/javascript' src='".ARQUIVO_JQUERY."'></script>";
$dependencia[1] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_HOST."'/>";
$dependencia[2] = "<script type='text/javascript' src='".ARQUIVO_JQUERY_FORM."'></script>";

// depois de body
$dependencia[3] = "<script type='text/javascript' src='".ARQUIVO_JS_HOST."'></script>";
$dependencia[4] = "<script type='text/javascript' src='".ARQUIVO_JQUERY_PAGINACAO."'></script>";
$dependencia[5] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_RESOLUCAO."'/>";
$dependencia[6] = "<link rel='stylesheet' type='text/css' href='".$tema_disponivel[NUMERO_TEMA_USAR]."'/>";

// valida usar resolucao
if($usar_resolucao == false){

// limpa dependencia
$dependencia[5] = null;

};

// titulo da pagina
$titulo_pagina = retorna_titulo_pagina();

// metas da pagina
$metas_pagina .= "<meta charset='UTF-8'>";
$metas_pagina .= "<meta name='viewport' content='width=device-width'/>";
$metas_pagina .= "<meta name='author' content='$autor_pagina'>";

// campo de topo
if(CONFIG_INVERTER_TOPO_PAGINA == true){
	
	// campo de topo
	$campo_topo .= constroe_topo_pagina();
	$campo_topo .= constroe_sub_topo_pagina();
	
}else{
	
	// campo de topo
	$campo_topo .= constroe_sub_topo_pagina();
	$campo_topo .= constroe_topo_pagina();
	
};

// valida campo de login
if(retorne_href_get() != $idioma[4]){
	
	// campo de rodape
    $campo_rodape .= mensagem_subrodape();
    $campo_rodape .= constroe_rodape_pagina();

};

// valida configuracao de widget
if(CONFIG_EXIBE_WIDGET_MEIO == true and retorne_href_get() != $idioma[4] and CONFIG_EXIBE_WIDGET_MEIO_LADO_SLIDESHOW == false){
	
	// campo widget meio
    $campo_widget_meio = campo_widget_meio();
	
};

// codigo html
$html .= "<html>";
$html .= "<head>";
$html .= "<title>$titulo_pagina</title>";
$html .= $dependencia[0];
$html .= $dependencia[1];
$html .= $dependencia[2];
$html .= $dependencia[6];
$html .= $metas_pagina;
$html .= retorna_meta_dados_pagina();
$html .= constroe_variaveis_js_pagina();
$html .= carrega_recursos_cabecalho();
$html .= $dependencia[5];
$html .= "</head>";
$html .= constroe_tag_body();
$html .= "<div class='classe_div_corpo_pagina'>";
$html .= $campo_topo;
$html .= constroe_campo_administrador_modo_resolucao();
$html .= "<div class='classe_div_principal_pagina'>";
$html .= $campo_widget_meio;
$html .= constroe_conteudo();
$html .= "</div>";
$html .= $campo_rodape;
$html .= "</div>";
$html .= "</body>";
$html .= $dependencia[3];
$html .= $dependencia[4];
$html .= constroe_dependencias_timer();
$html .= scripts_js_carregar_onload();
$html .= carregar_atualizacoes_jquery();
$html .= carregar_atualizacoes_jquery_longo();
$html .= constroe_paginadores_javascript();
$html .= carregar_header_redes_sociais();
$html .= "</html>";

// remove as linhas em branco
$html = remove_linhas_branco($html);

// retorno
return $html;

};

?>