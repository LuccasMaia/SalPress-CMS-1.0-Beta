<?php

// retorna os links de submenu
function links_submenu($idmenu){

// tabela
$tabela = TABELA_SUBMENUS;

if(CONFIG_INVERTER_ORDEM_MENU == true){
	
    // query
    $query = "select *from $tabela where idmenu='$idmenu' order by id asc;";
	
}else{
	
    // query
    $query = "select *from $tabela where idmenu='$idmenu' order by id desc;";

};

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
$contador = 0;

// construindo
for($contador == $contador; $contador <= $numero_linhas; $contador++){

    // dados
    $dados = retorne_dados_comando($comando);

    // separa dados
    $id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];
	
	// valida id
	if($id != null){
        
		// valida o link de menu
		if($link_menu == "#"){
			
			// link de menu
			$link_menu = "<a href='#id' id='$id' title='$titulo_menu'>$titulo_menu</a>";
			
		}else{
			
			// link de menu
			$link_menu = "<a href='$link_menu' title='$titulo_menu'>$titulo_menu</a>";
			
		};
		
		// codigo  html
		$html .= "
		<li class='last'>$link_menu</li>
		";

	};
};

// retorno
return $html;

};

?>