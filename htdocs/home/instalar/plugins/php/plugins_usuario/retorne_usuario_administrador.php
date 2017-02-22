<?php

// retorna se o usuario e o administrador
function retorne_usuario_administrador(){

// email de cookie
$email_cookie = converte_minusculo(retorne_email_cookie());

// email de administrador
$email_admin = converte_minusculo(CONFIG_EMAIL_ADMIN);

// retorno
if($email_cookie == $email_admin and retorne_usuario_logado() == true){

    // administrador
    return true;

}else{

    // usuario normal
    return false;
	
};

};

?>