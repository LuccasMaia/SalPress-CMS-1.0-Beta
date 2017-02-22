<?php

// adiciona bloco
function adicionar_bloco(){

// globals
global $requeste;

// dados de formulario
$titulo = remove_html($_REQUEST["titulo"]);
$subtitulo = remove_html($_REQUEST["subtitulo"]);
$conteudo = htmlentities($_REQUEST["conteudo"]);
$id = remove_html($_REQUEST[$requeste[7]]);

// valida dados de formulario
if($titulo == null and $subtitulo == null and $conteudo == null){

    // retorno nulo	
    return null;
	
};

// tabela
$tabela = TABELA_BLOCOS;

// data atual
$data = data_atual();

// valida a id
if($id == null){
	
    // query
    $query = "insert into $tabela values(null, '$titulo', '$subtitulo', '$conteudo', '$data');";

}else{
	
	// query
	$query = "update $tabela set titulo='$titulo', sub_titulo='$subtitulo', conteudo='$conteudo', data='$data' where id='$id';";
	
};

// query executa
query_executa($query);

};

?>