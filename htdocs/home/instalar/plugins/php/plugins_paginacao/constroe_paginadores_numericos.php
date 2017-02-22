<?php

// constroe os paginadores numericos
function constroe_paginadores_numericos(){

// globals
global $requeste;
global $url_pagina_href;
global $idioma;

// valida o numero de publicacoes
if(retorne_numero_publicacoes() <= CONFIG_LIMIT_PUBLICACOES){

    // retorno nulo	
    return null;
	
};

// tipo de postagem
$tipo_post = retorna_tipo_post_request();

// define a url de pagina inicial
$url_pagina_inicial = $url_pagina_href."$requeste[9]=$tipo_post&";

// tabela
$tabela = TABELA_PUBLICACOES;

// termo de pesquisa
$termo_pesquisa = retorne_termo_pesquisa();

// dados de formulario
$contador_avanco = remove_html($_REQUEST[$requeste[8]]);

// categoria
$categoria = retorne_categoria_request();

// valida termo de pesquisa
if($termo_pesquisa == null){
	
    // valida existe uma categoria
	if($categoria == null){
		
		// query
        $query = "select *from $tabela where tipo_post='$tipo_post';";

	}else{
		
		// query
        $query = "select *from $tabela where tipo_post='$tipo_post' and $requeste[3]='$categoria';";
		
	};
	
}else{
	
	// query
    $query = "select *from $tabela where (titulo like '%$termo_pesquisa%' or conteudo like '%$termo_pesquisa%') and tipo_post='$tipo_post';";
	
};

// numero de linhas
$numero_linhas = retorne_numero_linhas_query($query);

// valida usar paginador
if(($numero_linhas * 2) <= CONFIG_LIMIT_PUBLICACOES){
	
	// retorno nulo
	return null;
	
};

// numero de linhas
$numero_paginas = ($numero_linhas / CONFIG_LIMIT_PUBLICACOES);

// valida é um numero float
if(is_float($numero_paginas) == true){
	
	// arredonda
    $numero_paginas = round($numero_paginas);
	
};

// contador
$contador = $contador_avanco;

// proxima pagina
$proxima_pagina = ($contador_avanco + CONFIG_NUMERO_PAGINAS_TROCA);

// numero de paginas
$numero_paginas = $proxima_pagina;

// subtrai contador, isto permite carregar links anteriores
$contador -= CONFIG_LIMIT_PUBLICACOES;

// constroe links de paginacao
for($contador == $contador; $contador <= $numero_paginas; $contador++){

	// valida atingiu o limite
	if(($contador * CONFIG_LIMIT_PUBLICACOES) > $numero_linhas){
	
	    // saindo
	    break;

    };

	// url de pagina
    $url_pagina = $url_pagina_inicial."$requeste[8]=$contador&$requeste[1]=$termo_pesquisa&$requeste[3]=$categoria";
	
	// texto de link
	$texto_link = $contador + 1;
		
	// valida contador de avanco para item selecionado
	if($contador == $contador_avanco){
		
		// classe para link
		$classe_link = "link_paginacao_selecionado";
		
	}else{
		
		// classe para link
		$classe_link = "link_paginacao";
		
	};

	if($contador >= 0){
		
		// html
		$html .= "
		<a href='$url_pagina' title='$texto_link' class='$classe_link'>$texto_link</a>
		";
	
	};
	
};

// html
$html = "
<div class='classe_campo_paginacao_numerica'>$html</div>
";

// retorno
return $html;

};

?>