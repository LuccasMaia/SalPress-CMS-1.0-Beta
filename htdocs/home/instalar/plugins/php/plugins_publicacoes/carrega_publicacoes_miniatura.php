<?php
	
// carrega as publicacoes em miniatura
function carrega_publicacoes_miniatura(){

// globals
global $idioma;
global $requeste;

// url de pagina inicial
$url_pagina_inicial = PAGINA_INICIAL;

// tabela
$tabela = TABELA_PUBLICACOES;

// limit
$limit = retorne_limit();

// termo de pesquisa
$termo_pesquisa = retorne_termo_pesquisa();

// categoria
$categoria = retorne_categoria_request();

// tipo de post
$tipo_post = retorna_tipo_post_request();

// query
if($termo_pesquisa != null){
	
	// query
	$query = "select *from $tabela where tipo_post='$tipo_post' and (titulo like '%$termo_pesquisa%' or conteudo like '%$termo_pesquisa%') order by id desc $limit;";
	
}else{
	
	// valida categoria
	if($categoria == null){

		// query
		$query = "select *from $tabela where tipo_post='$tipo_post' order by id desc $limit;";

	}else{

		// query
		$query = "select *from $tabela where categoria_nome='$categoria' and tipo_post='$tipo_post' order by id desc $limit;";

	};
	
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
	$id = $dados['id'];
	$idusuario = $dados['idusuario'];
	$titulo = $dados['titulo'];
	$conteudo = $dados['conteudo'];
	$idalbum = $dados['idalbum'];
	$data = converte_data_amigavel($dados['data']);
	$categoria_nome = $dados['categoria_nome'];
	$categoria_id = $dados["categoria_id"];
	
	// valida id de categoria
	if($categoria_id != null){
		
		// dados de categoria
		$dados_categoria = retorne_dados_categoria($categoria_id);
		
		// separa dados
		$cor_categoria = $dados_categoria["cor"];
		
	};
	
	// converte os codigos do sistema
	$conteudo = converte_codigos_sistema($conteudo, false);

	// valida tamanho de conteudo
	if(strlen($conteudo) > CONFIG_TAMANHO_DESCRICAO_MINIATURA_PUBLICACAO){
		
		// trunca conteudo
		$conteudo = substr($conteudo, 0, CONFIG_TAMANHO_DESCRICAO_MINIATURA_PUBLICACAO)."..."	;
		
	};

	// valida exibir link leia mais
	if(CONFIG_EXIBE_LINK_LEIA_MAIS == true){

		// link saiba mais
		$link_saiba_mais = constroe_link_publicacao_idpost($id, $idioma[164], $idioma[164]);
		
		// link saiba mais
		$link_saiba_mais = "
		<div class='classe_div_leia_mais_conteudo'>$link_saiba_mais</div>
		";
		
	};

	// url amigavel da publicacao
	$titulo_link = retorne_url_amigavel_publicacao($dados, true);

	// url de imagem de album
	$url_imagem_album = retorne_ultima_imagem_idalbum($idalbum, IMAGEM_GRANDE_PUBLICACAO_MINIATURA);

	// imagem de post
	if($url_imagem_album != null){

		// imagem de postagem
		$imagem_post = "<img src='$url_imagem_album' title='$titulo'>";
		
		// constroe o link de imagem de post
		$imagem_post = constroe_link_publicacao_idpost($id, $titulo, $imagem_post);
		
	};

	// valida id
	if($id != null){
		
		// converte o conteudo
		$conteudo = html_entity_decode($conteudo);
		$conteudo = strip_tags($conteudo);
		
		// define o conteudo do post
		if(CONFIG_EXIBE_DESCRICAO_MINIATURA_POST == true){
		
			// conteudo de post
			$conteudo_post = "

			<div class='classe_publicacao_miniatura_conteudo_texto'>
			$conteudo
			</div>

			";

		};
		
		// valida imagem de post existe
		if($imagem_post != null){

			// campo com imagem de publicacao
			$campo_imagem = "

			<div class='classe_publicacao_miniatura_imagem'>
			$imagem_post 
			</div>

			";

		};
		
		// valida configuracao
		if(CONFIG_DATA_TITULO_PUBLICACAO == true){
		
			// campo titulo
			$campo_titulo = "

			<div class='classe_publicacao_miniatura_topo'>
			<div class='classe_publicacao_miniatura_topo_data'>$data</div>
			<div class='classe_publicacao_miniatura_titulo'>$titulo_link</div>
			</div>

			";

		}else{
		
			// campo titulo
			$campo_titulo = "

			<div class='classe_publicacao_miniatura_topo'>
			<div class='classe_publicacao_miniatura_titulo'>$titulo_link</div>
			</div>

			";
	
		};
		
		// numero de itens na categoria
		$numero_itens_categoria = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria_nome));
		
		// valida configuracao
		if(CONFIG_EXIBE_CATEGORIA_MINIATURA == true and $categoria_nome != null){

			// codifica categoria
			$categoria_nome_codificado = urlencode($categoria_nome);

			// links
			$categoria_nome_codificado = "<a href='$url_pagina_inicial?$requeste[3]=$categoria_nome_codificado' title='$idioma[192]'>$categoria_nome - $numero_itens_categoria</a>";

			// valida cor de categoria
			if($cor_categoria != null){
				
				// classe de cores
				$classe_cor[0] = "
				style='background-color: $cor_categoria;'
				";

			};
			
			// campo categoria
			$campo_categoria = "
			<div class='classe_div_categoria_subtitulo' $classe_cor[0]>
			$categoria_nome_codificado
			</div>
			";

		};
		
		// valida url de imagem
		if($url_imagem_album == null){

			// limpa imagem
			$campo_imagem = null;

		};
		
		// campo relacionados
		$campo_relacionados = constroe_publicacoes_miniatura_relacionadas($categoria_nome, $id);
		
		// valida permite campos sociais
		if(CONFIG_SOCIAL_PUBLICACAO_MINIATURA == true){
			
			// campo compartilhar
			$campo_compartilhar[0] = campo_rede_social(retorne_url_publicacao($id), false);
			
		};
		
		// valida exibir widget entre post
		if(CONFIG_EXIBE_WIDGET_ENTRE_POSTS == true){
			
			// campo widget
			$widget_post = constroe_widget_postagem(true);
			
		};
		
		// codigo html
		$codigo_html .= "
		<div class='classe_publicacao_miniatura animated zoomInUp'>
		<div class='classe_publicacao_miniatura_conteudo'>
		$campo_titulo
		$campo_categoria
		$campo_imagem
		$conteudo_post
		$link_saiba_mais
		</div>
		
		$widget_post
		$campo_compartilhar[0]
		$campo_relacionados
		</div>
		";	
		
};

	};
	
// retorno
return $codigo_html;
	
};
	
?>	