<?php

// deleta a url amigavel por id de post
function deleta_url_amigavel_idpost($id_post){
	
// tabela
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;

// query
$query = "delete from $tabela where id_post='$id_post';";

// executa query
query_executa($query);

};

?>