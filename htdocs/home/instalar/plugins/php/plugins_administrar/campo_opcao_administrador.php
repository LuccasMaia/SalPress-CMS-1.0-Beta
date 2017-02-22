<?php
	
// campo opcao de administrador
function campo_opcao_administrador(){

// globals
global $idioma;

// valida usuario administrador
if(retorne_usuario_administrador() == false and retorne_href_get() != $idioma[41] and retorne_usuario_colaborador() == false){
	
	// retorno nulo
	return null;	
	
};

// valida configuracao de colaborador
if(retorne_href_get() != $idioma[31] and retorne_href_get() != $idioma[41] and retorne_href_get() != null and retorne_usuario_administrador() == false){
	
	// retorna uma mensagem
	return mensagem_sistema($idioma[70]);	
	
};

// constroe o conteudo de href
switch(retorne_href_get()){
	
	case $idioma[31]:
	$conteudo = constroe_campo_publicar();
	break;
	
	case $idioma[32]:
	$conteudo = constroe_criar_slideshow();
	break;
	
	case $idioma[33]:
	$conteudo = constroe_criar_categoria();
	break;
	
	case $idioma[34]:
	$conteudo = constroe_criar_menus();
	break;
	
	case $idioma[35]:
	$conteudo = constroe_editar_rodape();
	break;
	
	case $idioma[36]:
	$conteudo = editar_mensagem_subrodape();
	break;
	
	case $idioma[37]:
	$conteudo = editar_blocos(null);
	break;
	
	case $idioma[38]:
	$conteudo .= editar_blocos_topo(null);
	$conteudo .= carrega_blocos_topo();
	break;
	
	case $idioma[39]:
	$conteudo = constroe_albuns_imagens();
	break;
	
	case $idioma[40]:
	$conteudo = campo_gerenciar_imagens_album();
	break;

	case $idioma[41]:
	$conteudo = constroe_perfil_basico();
	break;
	
	case $idioma[224]:
	$conteudo .= campo_widget();
	// valida configuracao
	if(CONFIG_EXIBE_WIDGET_TOPO == true){
	$conteudo .= campo_widget_topo();
	};
	break;
	
	case $idioma[226]:
	$conteudo = constroe_editar_sobre_site();
	break;
	
	case $idioma[42]:
	$conteudo = constroe_campo_criar_anuncio_postagem();
	break;

	case $idioma[88]:
	$conteudo = constroe_campo_adicionar_widget_postagem();
	break;
	
};

// valida conteudo
if($conteudo != null){

	// codigo html
	$html = "<div class='classe_campo_opcao_administrador'>$conteudo</div>";
	
};

// retorno
return $html;

};

?>