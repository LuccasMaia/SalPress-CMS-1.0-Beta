<?php

// carrega os items de submenus no modo de criacao
function carregar_submenus_criar(){

// dados de formulario
$idmenu = remove_html($_REQUEST["id"]);

// tabela
$tabela = TABELA_SUBMENUS;

// query
$query = "select *from $tabela where idmenu='$idmenu' order by id desc;";

// contador
$contador = 0;

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo menus select
for($contador == $contador; $contador <= $numero_linhas; $contador++){

    // dados
    $dados = retorne_dados_comando($comando);
	
	// separa dados
	$id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];

	// valida id
	if($id != null){
		
		$lista_titulos .= "$titulo_menu,";
		$lista_ids_menu .= "$id,";
		
	};

};

// campo cria menu
$campo_cria_menu = campo_cria_menu(false);

// id de campos
$idcampo[0] = md5("campo_select_submenu_usando_$idmenu".data_atual());

// array de campos
$array_campos[0] = md5("campo_titulo_menu_$idmenu".data_atual());
$array_campos[1] = md5("campo_url_menu_$idmenu".data_atual());

// eventos
$evento[0] = "atualizar_submenu_usando(\"$idcampo[0]\", \"$array_campos[0]\", \"$array_campos[1]\");";

// menus select
$menus_select = constroe_menus_select($idcampo[0], $evento[0], $idmenu, 2, $array_campos);

// codigo  html
$html = "
<div class='classe_campo_criar_menus_site'>

<div class='classe_campo_criar_menus_site_campos'>$campo_cria_menu</div>
<div class='classe_campo_criar_menus_site_select'>$menus_select</div>

</div>
";

// retorno
return $html;

};

?>