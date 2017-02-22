<?php

// retorna o id de usuario via request
function retorne_idusuario_request(){

// globals
global $requeste;

// id de usuario
$idusuario = remove_html($_REQUEST[$requeste[2]]);

// valida id de usuario
if($idusuario == null){
	
	// id de usuario
    $idusuario = retorne_idusuario_logado();
	
};

// valida id de usuario
if($idusuario == null){
	
	// id de usuario
    $idusuario = retorne_idusuario_administrador();
	
};

// retorno
return $idusuario;

};

?>