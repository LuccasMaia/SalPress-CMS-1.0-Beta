<?php

// cria um novo album
function criar_novo_album(){

// globals
global $requeste;

// valida usuario administrador
if(retorne_usuario_administrador() == false){

    // retorno nulo	
    return null;
	
};

// dados de formulario
$nome_album = remove_html($_REQUEST[$requeste[5]]);

// valida campo de formulario
if($nome_album == null){
	
	// nome padrao
	$nome_album = $idioma[218];
	
};

// tabela
$tabela = TABELA_ALBUNS;

// id de usuario
$idusuario = retorne_idusuario_logado();

// data
$data = data_atual();

// query
$query = "insert into $tabela values(null, '$nome_album', '$idusuario', '$data');";

// executa query
query_executa($query);

};

?>