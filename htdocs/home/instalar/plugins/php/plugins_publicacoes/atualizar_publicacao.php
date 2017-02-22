<?php

// atualiza a publicacao
function atualizar_publicacao(){

// globals
global $requeste;

// dados de formulario
$idpost = retorne_idpost_request();
$titulo = trim(remove_html($_REQUEST['titulo']));
$conteudo = htmlentities($_REQUEST['conteudo']);
$categoria_nome = remove_html($_REQUEST['categoria_postagem']);
$tipo_post = remove_html($_REQUEST[$requeste[9]]);

// valida configuracao
if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){

    // dados de categoria
    $dados_categoria = retorne_dados_categoria($categoria_nome);
	
	// separa os dados de categoria
	$categoria_id = $dados_categoria["id"];
	$categoria_nome = $dados_categoria["categoria"];
	
};

// tabela
$tabela = TABELA_PUBLICACOES;

// valida id de post e usuario administrador
if($idpost == null or retorne_usuario_administrador() == false){

    // retorno nulo
    return null;
	
};

// upload de imagens
upload_imagens_album();

// data atual
$data = data_atual();

// query
$query = "update $tabela set titulo='$titulo', conteudo='$conteudo', categoria_nome='$categoria_nome', categoria_id='$categoria_id', tipo_post='$tipo_post', data='$data' where id='$idpost';";

// comando executa
comando_executa($query);

// salva a url amigavel
salvar_url_amigavel($titulo, $idpost, false);

// url para redirecionar
$url_redirecionar = PAGINA_INICIAL."?$requeste[4]=$idpost";

// redireciona para a publicacao
chama_pagina_especifica($url_redirecionar);

};

?>