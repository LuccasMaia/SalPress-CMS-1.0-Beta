<?php

// salva a url amigavel
function salvar_url_amigavel($titulo, $id_post, $modo){

// modo true publica
// modo false atualiza

// valida id de post
if($id_post == null){
	
	// retorno nulo
	return null;
	
};

// tabela
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;

// valida modo e evita duplicatas
if($modo == false){
	
	// remove dados antigos
	$query[0] = "delete from $tabela where id_post='$id_post';";
	
	// query executa
	query_executa($query[0]);

};

// titulo amigavel
$titulo_amigavel = retorne_titulo_amigavel_publicacao($titulo);

// query
$query[1] = "select *from $tabela where url_amigavel='$titulo_amigavel';";

// valida se adiciona ou atualiza
if(retorne_numero_linhas_query($query[1]) == 0){

	// query
	$query[2] = "insert into $tabela values(null, '$id_post', '$titulo_amigavel');";

	// adiciona
	query_executa($query[2]);

}else{
	
	// adiciona a id de publicacao
	$titulo_amigavel .= $id_post;
	
	// query
	$query[2] = "insert into $tabela values(null, '$id_post', '$titulo_amigavel');";

	// adiciona
	query_executa($query[2]);

};

};

?>