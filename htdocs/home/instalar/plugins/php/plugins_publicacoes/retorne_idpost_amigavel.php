<?php

// retorna o id de post no modo amigavel
function retorne_idpost_amigavel(){

// voce pode acessar mais barras utilizando $geturl[1], $geturl[2], $geturl[3]
// por exemplo localhost/publicacao/data/post/etc

// url via request
$geturl = explode('/', $_SERVER['REQUEST_URI']);

// titulo amigavel
$titulo_amigavel = $geturl[1];

// tabela
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;

// query
$query = "select *from $tabela where url_amigavel='$titulo_amigavel';";

// dados de query
$dados = retorne_dados_query($query);

// retorno
return $dados["id_post"];

};

?>