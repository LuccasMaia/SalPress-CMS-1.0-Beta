<?php

// constroe campo conteudo de postagem
function constroe_campo_conteudo_postagem(){

// globals
global $idioma;
global $requeste;

// url de pagina inicial
$url_pagina_inicial = PAGINA_INICIAL;

// id de post
$idpost = retorne_idpost_request();

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where id='$idpost';";

// dados de query
$dados = retorne_dados_query($query);

// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$titulo = $dados['titulo'];
$conteudo = $dados['conteudo'];
$idalbum = $dados['idalbum'];
$data = converte_data_amigavel($dados['data']);
$categoria_nome = $dados["categoria_nome"];
$categoria_id = $dados["categoria_id"];

// valida id
if($id == null){

    // retorno nulo
    return null;
	
};

// valida id de categoria
if($categoria_id != null){

	// dados de categoria
	$dados_categoria = retorne_dados_categoria($categoria_id);

	// separa dados
	$cor_categoria = $dados_categoria["cor"];

};
	
// imagens de publicacao
$imagens = constroe_imagens_publicacao($idalbum);

// campo opcoes
$campo_opcoes = campo_opcoes_publicacao($dados);

// usuario administrador
$usuario_administrador = retorne_usuario_administrador();

// valida se o usuario e dono do post
if($idusuario == retorne_idusuario_logado() and retorne_usuario_logado() == true){
	
	// usuario e dono da postagem entao pode administrar esta publicacao
	$usuario_administrador = true;
	
};

// valida usuario administrador
if($usuario_administrador == true){

	// campo titulo
	$campo_titulo = "
	<input type='text' value='$titulo' name='titulo' placeholder='$idioma[43]' id='id_publicacao_titulo_$id'>
	";

	// campo conteudo
	$campo_conteudo = constroe_campo_ckeditor($conteudo, "conteudo", "id_publicacao_conteudo_$id");

	// campo upload de imagens
	$campo_upload_imagens .= $imagens;
	$campo_upload_imagens .= constroe_campo_adicionar_imagens_publicacao();

	// id de campos
	$idcampo[0] = md5("id_campo_select_atualizar_publicacao_$id");

	// valida configuracao
	if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
		
		// campo com categorias
		$campo_categorias_admin = campo_categorias_select($categoria_id, $idcampo[0]);
		
	}else{
		
		// campo com categorias
		$campo_categorias_admin = campo_categorias_select($categoria_nome, $idcampo[0]);

	};

	// campos ocultos
	$campos_ocultos = "
	<input type='hidden' name='$requeste[0]' value='25'>
	<input type='hidden' name='$requeste[4]' value='$id'>
	";

	// valida configuracao
	if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){

		// campo salvar
		$campo_salvar = "
		<div class='classe_div_atualizar_publicacao_salvar'>
		<input type='submit' value='$idioma[112]'>
		</div>
		";

	}else{

		// campo salvar
		$campo_salvar = "
		<div class='classe_div_atualizar_publicacao_salvar'>
		<input type='button' value='$idioma[112]' onclick='atualizar_publicacao(\"$id\", \"$idcampo[0]\");'>
		</div>
		";

	};

}else{

	// converte todas as urls, links, videos etc
	$conteudo = html_entity_decode($conteudo);
	$conteudo = converte_url_video_youtube($conteudo);
	$conteudo = converte_codigos_sistema($conteudo, true);

	// valida configuracao
	if(CONFIG_LINKA_TITULO_PUBLICACAO == true){
		
		// constroe titulo com link
		$campo_titulo = retorne_url_amigavel_publicacao($dados, true);

	}else{
		
		// campo titulo
		$campo_titulo = $titulo;
		
	};

	// campo conteudo
	$campo_conteudo = $conteudo;

	// campo upload de imagens
	$campo_upload_imagens = $imagens;

};

// valida usuario administrador logado
if($usuario_administrador == false){

	// campo compartilhar
	$campo_compartilhar[0] = campo_rede_social(null, true);

	// numero de itens na categoria
	$numero_itens_categoria = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria_nome));

	// codifica categoria
	$categoria_nome_codificado = urlencode($categoria_nome);

	// links
	$link[0] = "<a href='$url_pagina_inicial?$requeste[3]=$categoria_nome_codificado' title='$idioma[192]'>$categoria_nome - $numero_itens_categoria</a>";

	// valida existe uma categoria
	if($categoria_nome != null){
		
		// valida cor de categoria
		if($cor_categoria != null){
		
			// classe de cores
			$classe_cor[0] = "
			style='background-color: $cor_categoria;'
			";

		};
		
		// campo com categoria de postagem
		$campo_categorias = "
		<div class='classe_div_categoria_postagem' $classe_cor[0]>
		$link[0]
		</div>
		";

	};

	// classes
	$classe[0] = "classe_topo_publicacao_usuario";
	
}else{
	
	// classes
	$classe[0] = "classe_opcoes_publicar";
	
};

// campo autor de publicacao
$campo_autor = constroe_campo_autor_publicacao($idusuario);

// campo imagens de publicacao
$campo_imagens_upload_publicacao = "
<div class='classe_imagens_postagem'>$campo_upload_imagens</div>
";

// valida configuracao
if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true and $usuario_administrador == true){
	
	// limpa campo de imagens de publicacao
    $campo_imagens_publicacao[0] = null;
	$campo_imagens_publicacao[1] = $campo_imagens_upload_publicacao;
	
}else{
	
	// limpa campo de imagens de publicacao
	$campo_imagens_publicacao[0] = $campo_imagens_upload_publicacao;
    $campo_imagens_publicacao[1] = null;
	
};

// valida existe imagem de capa
if(CONFIG_EXIBE_IMAGEM_CAPA_POST == false and $usuario_administrador == false){
	
	// limpa variaveis
	$campo_imagens_publicacao[0] = null;

};

// campo tipo de publicacao
$campo_tipo_publicacao = constroe_campo_tipo_publicacao($dados);

// campo relacionados
$campo_relacionados = constroe_publicacoes_miniatura_relacionadas($categoria_nome, $id);

// valida exibir widget entre post
if(CONFIG_EXIBE_WIDGET_POST == true){

	// campo widget
	$widget_post = constroe_widget_postagem(true);

};

// codigo html
$html = "
<div class='classe_div_campo_postagem'>

<input type='hidden' name='$requeste[4]' value='$id'>
<input type='hidden' name='$requeste[6]' value='$idalbum'>

$campo_opcoes


<div class='$classe[0]'>
$campo_categorias_admin
$campo_tipo_publicacao
$imagens_topo
</div>


<div class='classe_div_campo_publicar_principal'>
<div class='classe_titulo_postagem'>
$campo_titulo
</div>

<div class='classe_conteudo_postagem'>
$campo_conteudo
</div>

$campo_imagens_publicacao[0]
$campo_imagens_publicacao[1]
$campo_salvar
</div>

<div class='classe_publicacao_miniatura_conteudo_data'>
$data
</div>

$widget_post
$campo_categorias
$campo_autor
$campo_relacionados
$campo_compartilhar[0]

</div>
";

// valida usuario administrador
if($usuario_administrador == true and CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){

    // url do formulario
    $url_formulario = PAGINA_ACOES;

    // html
    $html = "
    <form action='$url_formulario' method='post' enctype='multipart/form-data'>
    $html
    $campos_ocultos
    </form>
    ";

};

// retorno
return $html;

};

?>