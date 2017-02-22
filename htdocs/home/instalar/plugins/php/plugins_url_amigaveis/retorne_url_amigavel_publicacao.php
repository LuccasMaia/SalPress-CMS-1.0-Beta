<?php

// retorna a url amigavel da publicacao
function retorne_url_amigavel_publicacao($dados, $modo){

// modo true retorna o link
// modo false retorna somente a url

// separa dados
$id = $dados['id'];
$titulo = $dados['titulo'];
$titulo_original = $dados['titulo'];

// remove espacos vazios de titulo
$titulo = retorne_titulo_amigavel_idpost($id);

// url
$url = URL_SERVIDOR_RAIZ."/$titulo/";

// valida o modo
if($modo == true){

    // adiciona o link...
	$url = "<a href='$url' title='$titulo_original'>$titulo_original</a>";

};

// retorno
return $url;

};

?>