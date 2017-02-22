<?php

// exclui menu ou submenu
function excluir_item_menu(){

// valida usuario administrador
if(retorne_usuario_administrador() == false){
    
    // retorno nulo	
    return null;
	
};

// dados de formulario
$idmenu = remove_html($_REQUEST["idmenu"]);
$id_submenu = remove_html($_REQUEST["id_submenu"]);
$modo = remove_html($_REQUEST["modo"]);

// tabela
$tabela[0] = TABELA_MENUS;
$tabela[1] = TABELA_SUBMENUS;

// valida o modo e monta a query
switch($modo){

    case 1: // remove menu
	$query[0] = "delete from $tabela[0] where id='$idmenu';";
	$query[1] = "delete from $tabela[1] where idmenu='$idmenu';";
	break;
	
	case 2: // remove o submenu
	$query[1] = "delete from $tabela[1] where id='$id_submenu';";
	break;

};

// query executa
executador_querys($query);

};

?>