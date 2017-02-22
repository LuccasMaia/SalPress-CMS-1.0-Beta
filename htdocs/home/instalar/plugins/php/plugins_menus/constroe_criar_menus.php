<?php

// constroe campo para criar menus
function constroe_criar_menus(){

// globals
global $idioma;

// id de campos
$idcampo[0] = md5("id_select_campo_cria_menus".data_atual());
$idcampo[1] = md5("id_div_exibe_menus_criados".data_atual());

// array de campos
$array_campos[0] = md5("campo_titulo_menu_$idmenu".data_atual());
$array_campos[1] = md5("campo_url_menu_$idmenu".data_atual());

// eventos
$evento[0] = "carregar_submenus_criar(\"$idcampo[0]\", \"$idcampo[1]\", \"$array_campos[0]\", \"$array_campos[1]\");";

// campo com menus
$campo_menus = constroe_menus_select($idcampo[0], $evento[0], null, 1, $array_campos);

// campo cria menu
$campo_cria_menu = campo_cria_menu(true);

// codigo html
$html = "
<div class='classe_campo_criar_menus_site'>

<div class='classe_campo_criar_menus_site_campos'>$campo_cria_menu</div>
<div class='classe_campo_criar_menus_site_select'>$campo_menus</div>
<div class='classe_campo_criar_menus_site_submenus' id='$idcampo[1]'></div>

</div>
";

// retorno
return $html;

};

?>