<?php

// constroe os menus select
function constroe_menus_select($idcampo, $evento_campo, $idmenu, $modo, $array_campos){

#>> modo 1 e menu principal <<
#>> modo 2 e submenu <<

// valida usuario administrador
if(retorne_usuario_administrador() == false){
    
    // retorno nulo	
    return null;
	
};

// tabela
switch($modo){
	
	case 1:
    $tabela = TABELA_MENUS;
	$query = "select *from $tabela order by id desc;";
    break;
	
	case 2:
	$tabela = TABELA_SUBMENUS;
	$query = "select *from $tabela where idmenu='$idmenu' order by id desc;";
	break;
	
}

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

// codigo html
$html .= constroe_campo_excluir_menu($modo);
$html .= gerador_select_option_especial($lista_titulos, $lista_ids_menu, null, null, $idcampo, $evento_campo);
$html .= constroe_campo_edita_menu($modo, $array_campos);

// retorno
return $html;

};

?>