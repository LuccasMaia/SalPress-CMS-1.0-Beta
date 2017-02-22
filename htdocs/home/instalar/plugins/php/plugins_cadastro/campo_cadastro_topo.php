<?php

// campo cadastro em topo
function campo_cadastro_topo(){

// globals
global $idioma;
global $pagina_href;

// valida configuracao
if(CONFIG_EXIBE_CAMPO_LOGIN_TOPO == false and retorne_usuario_logado() == false){

    // retorno nulo	
    return null;
	
};

// valida usuario logado
if(retorne_usuario_logado() == true){
	
	// texto de link
	$texto_link = $idioma[15];
	
}else{
	
	// texto de link
	$texto_link = $idioma[4];
	
};

// codigo html
$html = "
<div class='classe_cadastro_topo'>
<a href='$pagina_href[29]' title='$texto_link'>$texto_link</a>
</div>
";

// retorno
return $html;

};

?>