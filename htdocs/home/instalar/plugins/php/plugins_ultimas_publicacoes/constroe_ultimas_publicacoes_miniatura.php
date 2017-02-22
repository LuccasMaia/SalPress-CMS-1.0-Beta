<?php

// constroe as ultimas publicacoes em miniatura
function constroe_ultimas_publicacoes_miniatura(){

// globals
global $idioma;

// valida configuracao
if(CONFIG_EXIBE_CAMPO_NOVIDADES == false){
	
	// retorno nulo
	return null;
	
};

// modo de ordenar
$ordernar = "order by id desc";

// tabela
$tabela = TABELA_PUBLICACOES;

// categoria
$categoria = retorne_categoria_publicacao(retorne_idpost_request());

// limit
$limit = "limit ".CONFIG_LIMIT_ULTIMAS_NOVIDADES_MINIATURA;

// query
$query = "select *from $tabela where categoria_nome like '%$categoria%' and id !='$idpost' $ordernar $limit;";

// comando
$comando = comando_executa($query);

// linhas de comando
$linhas = retorne_numero_linhas_comando($comando);

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
		$imagem[0] = "<img src='$imagem[0]' title='$titulo' alt='$titulo'>";
		
		// adiciona link
		$imagem[0] = constroe_link_publicacao_idpost($id, $titulo, $imagem[0]);
		
		// monta a publicacao
		$publicacao .= "
		<div class='classe_publicacao_miniatura_novidades'>
		
		<div class='classe_publicacao_miniatura_novidades_imagem'>
		$imagem[0]
		</div>

		</div>
		";

	};

};

// html
$html = "
<div class='classe_publicacoes_miniatura_novidades'>

<div class='classe_publicacoes_miniatura_novidades_titulo'>
$idioma[69]
</div>

<div class='classe_publicacoes_miniatura_novidades_conteudo'>
$publicacao
</div>

</div>
";

// retorno
return $html;

};

?>