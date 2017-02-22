<?php

// constroe o campo tipo de publicacao
function constroe_campo_tipo_publicacao($dados){

// globals
global $idioma;
global $requeste;

// valida usuario administrador
if(retorne_usuario_administrador() == false and retorne_usuario_colaborador() == false){
	
	// retorno nulo
    return null;
	
};

// separa os dados
$tipo_post = $dados["tipo_post"];

// array com opcoes
$array_options = $idioma[56];
$array_valores = "1,2";

// nome de campo
$nome_campo[0] = $requeste[9];

// id de campo
$idcampo[0] = "id_tipo_post_publicacao_pagina";

// campo select
$campo_select = gerador_select_option_especial($array_options, $array_valores, $tipo_post, $nome_campo[0], $idcampo[0], null);

// imagem
$imagem[0] = retorne_imagem_servidor(39);

// html
$html = "
<div class='classe_campo_tipo_publicacao'>
<div class='classe_campo_tipo_publicacao_titulo'>$imagem[0]</div>
<div class='classe_campo_tipo_publicacao_select'>$campo_select</div>
</div>
";

// retorno
return $html;

};

?>