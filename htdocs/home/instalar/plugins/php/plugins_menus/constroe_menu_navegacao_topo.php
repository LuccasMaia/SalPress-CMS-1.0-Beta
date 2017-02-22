<?php

// constroe o menu de navegacao de topo
function constroe_menu_navegacao_topo(){

// globals
global $idioma;
global $requeste;

// valida configuracao exibir menu topo
if(CONFIG_EXIBE_MENUS_NAVEGACAO_TOPO == false){

    // retorno nulo	
    return null;
	
};

// url de pagina inicial
$url_pagina_inicial = PAGINA_INICIAL;

// tabela
$tabela = TABELA_MENUS;

// valida inverter ordem de menus
if(CONFIG_INVERTER_ORDEM_MENU == true){

    // query
    $query = "select *from $tabela order by id desc;";
	
}else{
	
    // query
    $query = "select *from $tabela order by id asc;";

};

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// valida numero de linhas
if($numero_linhas == 0){

    // retorno nulo	
    return null;
	
};

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
		
		// lista com links de submenu
		$lista_links = links_submenu($id);
		
		// valida lista de links
		if($lista_links != null){
			
			// lista de menus
		    $lista_menus .= "
		    <li>
		    $link_menu
		    <ul>$lista_links</ul>
		    </li>
		    ";
		
		}else{
			
			// lista de menus
			$lista_menus .= "
			<li>$link_menu</li>
			";
			
		};
		
		
	};

};

// codigo html
$html = "
<div class='classe_menu_navegacao_topo'>

<nav>
<ul class='menu'>$lista_menus</ul>
</nav>

</div>
";

// retorno
return $html;

};

?>