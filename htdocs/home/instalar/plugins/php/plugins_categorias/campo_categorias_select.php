<?php

// function constroe o campo de categorias
function campo_categorias_select($valor_atual, $id_select){

// globals
global $idioma;

// tabela
$tabela = TABELA_CATEGORIAS;

// query
$query = "select *from $tabela order by id desc;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo categorias
for($contador == $contador; $contador <= $numero_linhas; $contador++){

    // dados
    $dados = retorne_dados_comando($comando);
    
	// separa os dados
    $id = $dados["id"];
    $categoria = $dados["categoria"];
    $data = $dados["data"];
	
	// valida id de categoria
	if($id != null){
		
		// lista com categorias
		$lista_categorias .= "$categoria,";
		$lista_valores_categorias .= "$id,";
		
	};
	
};

// id de campo
if($id_select == null){
	
	// id de select
    $idcampo[0] = md5("id_campo_seleciona_categorias_postagem_select".data_atual());

}else{
	
	// id de select
	$idcampo[0] = $id_select;
	
};

// id de campos
$idcampo[1] = md5("id_campo_seleciona_categorias_postagem_id".data_atual());
$idcampo[2] = md5("id_campo_seleciona_categorias_postagem_nome".data_atual());

// evento
$evento[0] = "alterar_id_campo_select_categoria(\"$idcampo[0]\", \"$idcampo[1]\", \"$idcampo[2]\");";

// codigo  html
$html = gerador_select_option_especial($lista_categorias, $lista_valores_categorias, $valor_atual, "categoria_postagem", $idcampo[0], $evento[0]);

// imagem
$imagem[0] = retorne_imagem_servidor(38);

// codigo html
$html = "
<div class='classe_div_campo_categoria_select'>

<div class='classe_div_campo_categoria_select_titulo'>$imagem[0]</div>
<div class='classe_div_campo_categoria_select_conteudo'>$html</div>

<input type='hidden' name='categoria_nome' id='$idcampo[1]'>
<input type='hidden' name='categoria_id' id='$idcampo[2]'>

</div>
";

// retorno
return $html;

};

?>