<?php

// constroe o campo de administrar
function constroe_campo_administrar(){

// globals
global $idioma;
global $pagina_href;

// valida usuario administrador
if(retorne_usuario_administrador() == false and retorne_usuario_colaborador() == false){

    // retorno nulo
    return null;
	
};

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// titulo
    $titulo = $idioma[18];

    // links de administrador
    $links[] = "<a href='$pagina_href[3]'>$idioma[19]</a>";
    $links[] = "<a href='$pagina_href[31]'>$idioma[60]</a>";
    $links[] = "<a href='$pagina_href[13]'>$idioma[132]</a>";
    $links[] = "<a href='$pagina_href[32]'>$idioma[59]</a>";
    $links[] = "<a href='$pagina_href[11]'>$idioma[27]</a>";
    $links[] = "<a href='$pagina_href[4]'>$idioma[47]</a>";
    $links[] = "<a href='$pagina_href[5]'>$idioma[185]</a>";
    $links[] = "<a href='$pagina_href[6]'>$idioma[193]</a>";
    $links[] = "<a href='$pagina_href[7]'>$idioma[203]</a>";
    $links[] = "<a href='$pagina_href[8]'>$idioma[204]</a>";
    $links[] = "<a href='$pagina_href[9]'>$idioma[205]</a>";
    $links[] = "<a href='$pagina_href[10]'>$idioma[213]</a>";
    $links[] = "<a href='$pagina_href[28]'>$idioma[222]</a>";
    $links[] = "<a href='$pagina_href[30]'>$idioma[225]</a>";
	$links[] = "<a href='$pagina_href[33]'>$idioma[82]</a>";
	$links[] = "<a href='$pagina_href[34]'>$idioma[89]</a>";
	
}else{
	
	// titulo
    $titulo = $idioma[71];

	// links de administrador
    $links[] = "<a href='$pagina_href[3]'>$idioma[19]</a>";
    $links[] = "<a href='$pagina_href[31]'>$idioma[60]</a>";
    $links[] = "<a href='$pagina_href[13]'>$idioma[132]</a>";
	
};

// conteudo
$conteudo = constroe_links_menu_vertical($links);

// codigo html
$html = constroe_menu_navegacao_vertical($titulo, $conteudo);

// retorno
return $html;

};

?>