<?php
	
// constroe imagens de publicacao
function constroe_imagens_publicacao($idalbum){

// globals
global $idioma;

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// query
$query = "select *from $tabela where idalbum='$idalbum' order by id desc;";

// contador
$contador = 0;

// comando
$comando = comando_executa($query);

// numero de linhas de comando
$numero_linhas = retorne_numero_linhas_comando($comando);

// usuario administrador
$usuario_administrador = retorne_usuario_administrador();

// imagens de servidor
$imagem_servidor[0] = retorne_imagem_servidor(16);
$imagem_servidor[1] = retorne_imagem_servidor(17);

// construindo imagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){
	
	// dados	
	$dados = retorne_dados_comando($comando);
	
	// url de imagem
	$id = $dados['id'];
	$url_imagem = $dados['url_imagem'];
	$conteudo = $dados['conteudo'];
	$idalbum = $dados['idalbum'];
	
	// adiciona quebra de linha
	$conteudo = adiciona_quebra_linha($conteudo);
	
	// id de post
	$idpost = retorne_idpost_por_idalbum($idalbum);
	
	// valida url de imagem
	if($url_imagem != null){

		// campo gerenciar imagem
		if($usuario_administrador == true){

			// classe extra
			$classe_extra[0] = "classe_div_imagem_publicacao_logado";

			// remove a quebra de linha
			$conteudo = str_replace("<br>", "&#13;", $conteudo);

			// campo dialogo excluir
			$campo_dialogo_excluir = "
			$idioma[114]
			<br>
			<br>
			<input type='button' value='$idioma[101]' onclick='excluir_imagem_publicacao($id);'>
			";

			// adiciona o dialogo
			$campo_dialogo_excluir = janela_mensagem_dialogo($idioma[114], $campo_dialogo_excluir, "dialogo_excluir_imagem_publicacao_$id");

			// campo gerenciar imagem
			$campo_gerenciar_imagem = "
			<div class='classe_div_imagem_publicacao_opcoes'>
			<span class='classe_span_opcao_publicacao' onclick='dialogo_excluir_imagem_publicacao($id);'>$imagem_servidor[0]</span>
			<span class='classe_span_opcao_publicacao' onclick='dialogo_editar_imagem_publicacao($id);'>$imagem_servidor[1]</span>
			</div>
			";

			// campo descricao de imagem
			$campo_descricao_imagem = "
			<div class='classe_div_campo_descricao_imagem_publicacao'>
			<textarea cols='10' rows='10' id='textarea_descricao_imagem_publicacao_$id'>$conteudo</textarea>
			<br>
			<br>
			<input type='button' value='$idioma[175]' onclick='salvar_descricao_imagem_publicacao($id);'>
			</div>
			";

			// adiciona dialogo
			$campo_descricao_imagem = janela_mensagem_dialogo($idioma[174], $campo_descricao_imagem, "campo_descricao_imagem_$id");

			}else{

			// converte url em links
			$conteudo = converter_urls($conteudo);

			// campo descricao de imagem
			$campo_div_conteudo_imagem = "
			<div class='classe_div_conteudo_imagem'>$conteudo</div>
			";

		};

	// codigo html
	$codigo_html .= "
	<div class='classe_div_imagem_publicacao $classe_extra[0]' id='div_imagem_publicacao_$id'>
	$campo_gerenciar_imagem
	<a class='fancybox' rel='group' href='$url_imagem'><img src='$url_imagem'></a>
	$campo_div_conteudo_imagem
	</div>

	$campo_descricao_imagem
	$campo_dialogo_excluir
	";

};

};

// retorno
return $codigo_html;

};

?>