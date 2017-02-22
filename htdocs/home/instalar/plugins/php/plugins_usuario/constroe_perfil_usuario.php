<?php

// constroe o perfil do usuario
function constroe_perfil_usuario(){

// globals
global $idioma;

// valida configuracao
if((CONFIG_CONSTROE_PERFIL_DESLOGADO == true or retorne_usuario_administrador() == true) and retorne_href_get() != $idioma[41]){
	
	// perfil basico do usuario
    $html = constroe_perfil_basico();

};

// permite exibir o perfil do usuario comum
if(retorne_usuario_administrador() == false and retorne_usuario_logado() == true and retorne_href_get() != $idioma[41]){
	
	// perfil basico do usuario
    $html = constroe_perfil_basico();	
	
};

// retorno
return $html;

};

?>