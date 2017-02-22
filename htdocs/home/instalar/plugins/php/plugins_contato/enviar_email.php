<?php

// envia e-mail
function enviar_email($email_destino, $assunto_mensagem, $corpo_mensagem){

// valida email de destino
if($email_destino == null){

    // retorno nulo
    return null;	
	
};

// dados de sobre site
$dados = retorne_dados_sobre_site();

// nome do sistema
$nome_sistema = $dados["nome"];

// cabecalho
$cabecalho = "From: $nome_sistema"."\r\n"."Reply-To: $nome_sistema"."\r\n";

// enviando email
mail($email_destino, $assunto_mensagem , $corpo_mensagem, $cabecalho); // enviando email

};

?>
