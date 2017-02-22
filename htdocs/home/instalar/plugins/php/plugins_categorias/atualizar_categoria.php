<?php

// atualiza a categoria
function atualizar_categoria(){

// dados de formulario
$nome_categoria = remove_html($_REQUEST['nome_categoria']);
$id_categoria = remove_html($_REQUEST['id_categoria']);
$cor_categoria = remove_html($_REQUEST['cor_categoria']);

// tabela
$tabela[0] = TABELA_CATEGORIAS;
$tabela[1] = TABELA_PUBLICACOES;

// query
$query[] = "update $tabela[0] set categoria='$nome_categoria' where id='$id_categoria';";
$query[] = "update $tabela[1] set categoria_nome='$nome_categoria' where categoria_id='$id_categoria';";
$query[] = "update $tabela[0] set cor='$cor_categoria' where id='$id_categoria';";

// salva categoria
executador_querys($query);

};

?>