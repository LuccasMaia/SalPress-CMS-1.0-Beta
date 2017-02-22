<?php

// atualiza a descricao de imagem de slideshow
function atualizar_descricao_imagem_slideshow(){

// dados de formulario
$id = remove_html($_REQUEST['id']);
$comentario = htmlentities($_REQUEST['comentario']);
$url = htmlentities($_REQUEST['url']);

// valida id
if($id == null){

    // retorno nulo
    return null;
	
};

// tabela
$tabela = TABELA_SLIDESHOW;

// query
$query = "update $tabela set comentario='$comentario', url='$url' where id='$id';";

// comando executa
comando_executa($query);

};

?>