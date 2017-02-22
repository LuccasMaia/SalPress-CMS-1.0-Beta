<?php

// constroe o anuncio de postagem
function constroe_anuncio_postagem(){

// valida usuario administrador
if(retorne_usuario_administrador() == true or CONFIG_PERMITE_ANUNCIOS == false){
	
	// retorno nulo
    return null;
	
};

// dados
$dados = retorne_dados_anuncio_postagem();

// separa os dados
$conteudo = html_entity_decode($dados["conteudo"]);

// html
$html = "
<div class='classe_anuncio_postagem'>
$conteudo
</div>
";

// retorno
return $html;

};

?>