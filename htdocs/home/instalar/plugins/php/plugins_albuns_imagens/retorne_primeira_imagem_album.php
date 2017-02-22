<?php

// retorna a primeira imagem de album
function retorne_primeira_imagem_album($idalbum){

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// query
$query = "select *from $tabela where idalbum='$idalbum' order by id desc limit 0,1;";

// dados de query
$dados = retorne_dados_query($query);

// separa dados
$url_imagem_miniatura = $dados["url_imagem_miniatura"];

// valida imagem em miniatura
if($url_imagem_miniatura == null){

    // imagem de sistema
    return retorne_imagem_servidor(4);
	
};

// html
$html = "
<img src='$url_imagem_miniatura'>
";

// retorno
return $html;

};

?>