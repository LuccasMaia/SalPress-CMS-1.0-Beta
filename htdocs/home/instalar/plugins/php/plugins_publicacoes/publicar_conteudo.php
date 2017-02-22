<?php

// publica conteudo
function publicar_conteudo(){

// globals
global $requeste;
global $idioma;

// dados de formulario
$titulo = trim(remove_html($_REQUEST['titulo']));
$conteudo = htmlentities($_REQUEST['conteudo']);
$categoria_nome = remove_html($_REQUEST['categoria_nome']);
$categoria_id = remove_html($_REQUEST['categoria_id']);
$tipo_post = remove_html($_REQUEST[$requeste[9]]);

// limpa id de album
$_SESSION[$requeste[6]] = null;

// valida dados de formulario
if($titulo == null){

	// seta o titulo padrao
	$titulo = $idioma[92]." ".retorne_numero_publicacoes();
	
};

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// tabela
$tabela = TABELA_PUBLICACOES;

// data atual
$data = data_atual();

// id de album
$idalbum = upload_imagens_album();

// query
$query = "insert into $tabela values(null ,'$idusuario', '$titulo', '$conteudo', '$idalbum', '$categoria_nome', '$categoria_id', '$tipo_post', '$data');";

// comando executa
comando_executa($query);

// salva a url amigavel
salvar_url_amigavel($titulo, retorne_id_ultima_publicacao(), true);

};

?>