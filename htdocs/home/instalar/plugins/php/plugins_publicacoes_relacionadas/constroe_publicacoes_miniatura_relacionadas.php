<?php

// constroe as publicacoes em miniatura relacionadas
function constroe_publicacoes_miniatura_relacionadas($categoria, $idpost){

// globals
global $idioma;

// valida configuracao
if(CONFIG_PERMITE_POSTAGENS_RELACIONADAS == false){
	
	// retorno nulo
    return null;
	
};

// valida o modo de sessao
if($_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] == true){
	
	// modo de ordenar
	$ordernar = "order by id asc";
	
	// atualiza o modo
	$_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] = false;
	
}else{
	
	// modo de ordenar
	$ordernar = "order by id desc";
	
	// atualiza o modo
	$_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] = true;	
	
};

// tabela
$tabela = TABELA_PUBLICACOES;

// limit
$limit = "limit ".CONFIG_LIMIT_RELACIONADOS;

// query
$query = "select *from $tabela where categoria_nome like '%$categoria%' and id !='$idpost' $ordernar $limit;";

// comando
$comando = comando_executa($query);

// linhas de comando
$linhas = retorne_numero_linhas_comando($comando);

// valida numero de linhas
if($linhas == 0){
	
	// retorno nulo
	return null;
	
};

// contador
$contador = 0;

// constroe publicacoes em miniatura
for($contador == $contador; $contador <= $linhas; $contador++){
	
	// dados
	$dados = retorne_dados_comando($comando);
	
	// separa os dados
	$id = $dados["id"];
    $titulo = $dados["titulo"];
    $conteudo = $dados["conteudo"];
    $idalbum = $dados["idalbum"];

    // valida id
	if($id != null){
		
		// imagem de publicacao
		$imagem[0] = retorne_ultima_imagem_idalbum($idalbum, false);
		
		// valida imagem
		if($imagem[0] != null){
		
			// imagem de publicacao reladicionada
			$imagem[0] = "<img src='$imagem[0]' title='$titulo' alt='$titulo'>";
		
		}else{
		
			// titulo de publicacao reladicionada
			$imagem[0] = $titulo;
		
		};
		
		// adiciona link
		$imagem[0] = constroe_link_publicacao_idpost($id, $titulo, $imagem[0]);
		
		// monta a publicacao
		$publicacao .= "
		<div class='classe_publicacao_miniatura_relacionado'>
		
		<div class='classe_publicacao_miniatura_relacionado_imagem'>
		$imagem[0]
		</div>

		</div>
		";

	};

};

// html
$html = "
<div class='classe_publicacoes_miniatura_relacionadas'>

<div class='classe_publicacoes_miniatura_relacionadas_titulo'>
$idioma[68]
</div>

<div class='classe_publicacoes_miniatura_relacionadas_conteudo'>
$publicacao
</div>

</div>
";

// retorno
return $html;

};

?>