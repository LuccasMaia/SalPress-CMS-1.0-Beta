<?php

// retorna os metadados da pagina
function retorna_meta_dados_pagina(){

// globals
global $meta_descreve;
global $meta_palavras_chave;

// id de post
$idpost = retorne_idpost_request();

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where id='$idpost';";

// dados
$dados = retorne_dados_query($query);

// valida dados
if($dados["id"] == null){
	
	// dados de metas
    $meta_descreve = $dados_sobre_site["descricao"];
    $meta_palavras_chave = $dados_sobre_site["palavras"];

    // html
    $html .= "<meta name='description' content='$meta_descreve'>";
    $html .= "<meta name='keywords' content='$meta_palavras_chave'>";

}else{

    // conteudo
    $conteudo = substr($dados["conteudo"], 0, CONFIG_TAMANHO_DESCRICAO_PAGINA);
	
	// dados de metas
	$meta_descreve = converte_html_texto($conteudo);
	
	// palavras chave
	$array_chaves = explode(" ", $meta_descreve);

	// remove duplicatas
	$array_chaves = array_unique($array_chaves);

	// lista keywords
    foreach($array_chaves as $valor){
		
		// remove espacos
		$valor = trim($valor);

		// remove os acentos
		$valor = acento_para_html($valor);
		
		// valida valor
		if(strlen($valor) >= 3){
		    
			// remove valores
		    $valor = str_replace(",", null, $valor);
		    $valor = str_replace(".", null, $valor);
		    $valor = str_replace("(", null, $valor);
		    $valor = str_replace(")", null, $valor);
		    $valor = str_replace("[", null, $valor);
		    $valor = str_replace("]", null, $valor);
			
			// atualiza as keywords...
		    $keywords .= $valor.", ";
			
		};
		
	};

    // html
    $html .= "<meta name='description' content='$meta_descreve'>";
    $html .= "<meta name='keywords' content='$keywords'>";
	
};

// retorno
return $html;

};

?>