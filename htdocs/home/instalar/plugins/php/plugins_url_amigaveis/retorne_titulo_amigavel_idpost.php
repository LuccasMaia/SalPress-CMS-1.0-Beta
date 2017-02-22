<?php

// retorna o titulo amigavel por id de post
function retorne_titulo_amigavel_idpost($id_post){
	
// tabela
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;

// query
$query = "select *from $tabela where id_post='$id_post';";

// dados de query
$dados = retorne_dados_query($query);

// retorno
return $dados["url_amigavel"];

};

?>