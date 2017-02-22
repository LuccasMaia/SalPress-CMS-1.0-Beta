<?php

// atualiza o item de menu
function atualizar_item_menu(){

// dados de formulario
$titulo = remove_html($_REQUEST["titulo"]);
$link = remove_html($_REQUEST["link"]);
$id = remove_html($_REQUEST["id"]);
$modo = remove_html($_REQUEST["modo"]);

// data
$data = data_atual();

// valida o modo e escolhe a tabela
switch($modo){
	
    case 1:
	$tabela = TABELA_MENUS;
    break;
	
	case 2:
	$tabela = TABELA_SUBMENUS;
	break;
	
};

// query
$query = "update $tabela set titulo_menu='$titulo', link_menu='$link', data='$data' where id='$id';";

// executa query
query_executa($query);

};

?>