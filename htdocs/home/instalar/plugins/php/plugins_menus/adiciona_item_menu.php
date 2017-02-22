<?php

// adiciona item de menu
function adiciona_item_menu(){

// valida usuario administrador
if(retorne_usuario_administrador() == false){
    
    // retorno nulo	
    return null;
	
};

// dados de formulario
$titulo_menu = ucfirst(remove_html($_REQUEST["titulo_menu"]));
$link_menu = remove_html($_REQUEST["link_menu"]);
$tipo_menu = remove_html($_REQUEST["tipo_menu"]);
$id = remove_html($_REQUEST["id"]);

// data atual
$data = data_atual();

// tabela
switch($tipo_menu){

    case 1:
	$tabela = TABELA_MENUS;
    $query[0] = "select *from $tabela where titulo_menu='$titulo_menu';";
    $query[1] = "insert into $tabela values(null, '$titulo_menu', '$link_menu', '$data');";
	break;
	
	case 2:
	$tabela = TABELA_SUBMENUS;
	$query[1] = "insert into $tabela values(null, '$id', '$titulo_menu', '$link_menu', '$data');";
	break;
	
	default:
	$tabela = TABELA_MENUS;
	$query[0] = "select *from $tabela where titulo_menu='$titulo_menu';";
	$query[1] = "insert into $tabela values(null, '$titulo_menu', '$link_menu', '$data');";

};

// valida query
if($query[0] != null){
	
	// valida item de menu ja existe
    if(retorne_numero_linhas_query($query[0]) > 0 or strlen($titulo_menu) == 0){

	// retorno nulo
    return null;
	
    };

};

// salva menu
query_executa($query[1]);

};

?>