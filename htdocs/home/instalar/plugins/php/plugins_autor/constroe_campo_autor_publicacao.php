<?php

// constroe o campo de autor de publicacao
function constroe_campo_autor_publicacao($idusuario){

// globals
global $idioma;

// valida usuario dono do perfil
if(retorne_usuario_dono_perfil() == true){

    // retorno nulo
	return null;
};

// valida configuracao exibe autor de postagem
if(CONFIG_EXIBE_AUTOR_POSTAGENS == true){
	
	// dados do autor
    $dados_autor = dados_perfil_usuario($idusuario);

    // dados do autor
	$idusuario = $dados_autor['idusuario'];
    $nome_autor = $dados_autor['nome'];
    $url_imagem_perfil_miniatura = $dados_autor['url_imagem_perfil_miniatura'];
    $endereco = $dados_autor['endereco'];
    $cidade = $dados_autor['cidade'];
    $estado = $dados_autor['estado'];
    $telefone = $dados_autor['telefone'];
    $sobre = $dados_autor['sobre'];
	
	// valida idusuario
	if($idusuario == null){
		
		// retorno nulo
	    return null;
		
	};
	
	// constroe a imagem de perfil de usuario
	$imagem_perfil = constroe_imagem_perfil_miniatura($idusuario);
	
    // campo autor de publicacao
    $html = "
	
    <div class='classe_div_autor_publicacao'>
	
	<div class='classe_div_autor_publicacao_imagem_perfil'>
	$imagem_perfil
	</div>
	
	<div class='classe_div_autor_publicacao_informacoes'>
	<span>$idioma[163]$nome_autor</span>
	<span>$idioma[183]$sobre</span>
    <span>$idioma[133]: $endereco - $cidade - $estado</span>
    <span>$idioma[136]: $telefone</span>
    </div>
	</div>
	
    ";

};

// retorno
return $html;

};

?>