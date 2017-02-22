<?php

// carrega o slideshow
function carregar_slideshow(){

// globals
global $idioma;

// tabela
$tabela = TABELA_SLIDESHOW;

// usuario administrador
$usuario_administrador = retorne_usuario_administrador();

// limit
$limit = retorne_limit_slideshow();

// query
$query = "select *from $tabela order by id desc $limit";

// dados
$dados = retorne_dados_query($query);

// separa dados
$id = $dados['id'];
$url_imagem = $dados['url_imagem'];
$comentario = $dados['comentario'];
$data = converte_data_amigavel($dados['data']);
$url = $dados['url'];

// imagens de servidor
$imagem_servidor[0] = retorne_imagem_servidor(16);

// campo comentario
if($usuario_administrador == true){

	// campo excluir imagem
	$campo_excluir_imagem = "
	$idioma[115]
	<br>
	<br>
	<input type='button' value='$idioma[101]' onclick='excluir_imagem_slideshow($id);'>
	";

	// adiciona dialogo
	$campo_excluir_imagem = janela_mensagem_dialogo($idioma[114], $campo_excluir_imagem, "dialogo_excluir_imagem_slideshow_$id");

	// campo excluir imagem
	$campo_excluir_imagem .= "
	<div class='classe_div_campo_excluir_imagem_slideshow' onclick='pausar_slideshow(1), dialogo_excluir_imagem_slideshow($id);'>
	$imagem_servidor[0]
	</div>
	";

	// campo adicionar url
	$campo_adicionar_url = constroe_campo_adicionar_url_slideshow($dados);
	
	// campo comentario
	$comentario = "
	<div class='classe_div_editar_descricao_img_slideshow'>
	<textarea cols='10' rows='10' placeholder='$idioma[54]' id='id_campo_comentario_imagem_slideshow' onkeyup='atualizar_descricao_imagem_slideshow($id);'>$comentario</textarea>
	</div>
	
	$campo_adicionar_url
	$campo_excluir_imagem
	";

}else{

	// valida comentario
	if($comentario != null){
		
		// data
		$data = "
		<span class='classe_span_data_slideshow'>
		$data
		</span>
		";
		
		// valida url
		if($url != null){
			
			// adiciona link em comentario
			$campo_link = "
			<a href='$url'>$idioma[164]</a>
			";
			
			// campo link
			$campo_link = "
			
			<span class='classe_span_link_slideshow'>
			$campo_link
			</span>
			
			";
			
		};
		
		// comentario
		$comentario = "
		
		$data
		
		<span class='classe_span_comentario_slideshow fade-in two'>
		$comentario
		</span>
		
		$campo_link
		
		";

	};

};

// imagem de slide
$imagem_slide = "
<div class='animated slideInLeft'>
<a class='fancybox fade-in one' rel='group' href='$url_imagem'>
<img src='$url_imagem'>
</a>
</div>
";

// dados de retorno
if($id != null){

	$dados_retorno['imagem'] = $imagem_slide;
	$dados_retorno['comentario'] = html_entity_decode($comentario);

}else{
	
	$dados_retorno['imagem'] = -1;
	$dados_retorno['comentario'] = -1;
	
};

// retorno
return json_encode($dados_retorno);

};

?>