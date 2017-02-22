<?php
	
// constroe o conteudo
function constroe_conteudo(){

// globals
global $idioma;
global $pagina_href;

// valida usuario logado
if(retorne_usuario_logado() == true){
	
	// executa funcoes necessarias
	adicionar_amizade();
	
	// define dados de perfil padrao
	define_padrao_perfil_cadastrar();
	
};

// usar resolucao
$usar_resolucao = retorna_usar_resolucao();

// valida href
if(retorne_href_get() == null){
	
	// codigo html
	$html .= "<div class='classe_div_centro_topo_pagina'>";
	$html .= "</div>";
	
};

// constroe o menu de navegacao vertical
$html .= "<div class='classe_div_centro_pagina'>";

// valida id de post
if(retorne_idpost_request() == null){
	
	// codigo html
	$html .= campo_opcao_administrador();
	
};

// valida exibir destaques
if(retorne_idpost_request() == null and retorne_href_get() == null){
	
	// codigo html	
	$html .= constroe_campo_destaque();
	
};

// codigo html
$html .= constroe_campo_conteudo_postagem();
$html .= "</div>";

// campos usuario logado
if(retorne_usuario_logado() == false){
	
	// valida configuracao
	if(CONFIG_EXIBE_WIDGET_LATERAL_LADO_SLIDESHOW == false){

		// campos...
		$campos_logado .= campo_widget();

	};
	
	// valida exibe widget
	if(CONFIG_EXIBE_WIDGET_TOPO == false){

		// campos...
		$campos_logado .= campo_widget_topo();

	};
	
};

// valida usar resolucao
if($usar_resolucao == false){
	
	// codigo html
	$html .= "<div class='classe_div_menus_principal'>";
	$html .= constroe_anuncio_postagem();
	$html .= constroe_perfil_usuario();
	$html .= constroe_campo_administrar();
	$html .= $campos_logado;
	$html .= constroe_ultimas_publicacoes_miniatura();
	$html .= carrega_blocos();
	$html .= constroe_chat_usuario();
	$html .= constroe_navegacao_lateral();
	$html .= "</div>";
	
}else{
	
	// codigo html
	$html .= constroe_chat_usuario();
	
};

// valida constroe publicacao de usuario
if(retorne_idpost_request() != null){
	
	// html
	$html = "
	<div class='div_conteudo_pagina'>$html</div>
	";

	// retorna o codigo html
	return $html;
	
};

// constro conteudo
switch(retorne_href_get()){
	
	case $idioma[15]:
	salvar_cookies(retorne_email_cookie(), null, true);
	chama_pagina_especifica($pagina_href[0]);
	break;
	
	case $idioma[4]:
	$html = campo_cadastro_login();
	break;
	
	case $idioma[30]:
	$html = formulario_contato_usuario();
	break;

};

// html
$html = "
<div class='div_conteudo_pagina'>$html</div>
";

// retorno
return $html;

};

?>