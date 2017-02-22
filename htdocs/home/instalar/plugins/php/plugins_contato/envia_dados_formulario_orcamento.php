<?php

// envia dados do formulario para o contato de orcamento
function envia_dados_formulario_orcamento(){

// globals
global $idioma;

// dados de formulario
$email_telefone_contato = remove_html($_REQUEST['email_telefone_contato']);
$cidade_contato = remove_html($_REQUEST['cidade_contato']);
$estado_contato = remove_html($_REQUEST['estado_contato']);
$mensagem_contato = remove_html($_REQUEST['mensagem_contato']);

// dados de sobre site
$dados = retorne_dados_sobre_site();

// nome do site
$nome_site = $dados["nome"];

// corpo da mensagem
$corpo_mensagem = "
\n
$idioma[65]: $nome_site
\n
\n
$idioma[5]: $email_telefone_contato
\n
$idioma[134]: $cidade_contato
\n
$idioma[135]: $estado_contato
\n
$idioma[64]: $mensagem_contato
\n
";

// envia o e-mail
if($email_telefone_contato != null and $mensagem_contato != null and $cidade_contato != null and $estado_contato != null){

    // envia a mensagem
    enviar_email(CONFIG_EMAIL_ORCAMENTO, $email_telefone_contato, $corpo_mensagem);
    
	// envia a mensagem
    enviar_email(CONFIG_EMAIL_ADMIN, $email_telefone_contato, $corpo_mensagem);

};

// chama pagina inicial
chama_pagina_inicial();

};

?>