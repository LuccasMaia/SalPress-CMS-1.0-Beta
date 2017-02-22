<?php

// carrega o titulo e o link de menu
function carrega_titulo_link_menu(){

// dados de formulario
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
$query = "select *from $tabela where id='$id';";

// dados de query
return json_encode(retorne_dados_query($query));

};

?>