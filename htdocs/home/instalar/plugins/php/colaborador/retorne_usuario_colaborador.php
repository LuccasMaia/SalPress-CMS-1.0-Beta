<?php

// retorna se o usuario é um colaborador
function retorne_usuario_colaborador(){

// globals
global $email_colaborador;

// email de usuario logado
$email_cookie = retorne_email_cookie();

// valida usuario logado
if(retorne_usuario_logado() == false){

    // retorno falso
    return false;	
	
};

// procurando por email
foreach($email_colaborador as $email){
	
	// valida emails
	if($email == $email_cookie){
		
		// retorna que o usuario e um colaborador
		return true;
		
	};
	
};

// retorno
return false;

};

?>