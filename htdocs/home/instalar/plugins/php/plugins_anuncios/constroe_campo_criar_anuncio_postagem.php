<?php

// constroe o campo de criar anuncio de postagem
function constroe_campo_criar_anuncio_postagem(){

// globals
global $idioma;

// id de campos
$idcampo[0] = md5("id_campo_criar_anuncio_".data_atual());

// eventos
$evento[0] = "onclick='criar_anuncio_postagem(\"$idcampo[0]\");'";

// dados de anuncio
$dados = retorne_dados_anuncio_postagem();

// separa os dados
$conteudo = $dados["conteudo"];

// html
$html = "
<div class='classe_campo_criar_anuncio_postagem'>

<div class='classe_campo_criar_anuncio_postagem_conteudo'>
<textarea cols='10' rows='20' placeholder='$idioma[83]' id='$idcampo[0]'>$conteudo</textarea>
</div>

<div class='classe_campo_criar_anuncio_postagem_salvar'>
<input type='button' value='$idioma[57]' $evento[0]>
</div>

</div>
";

// retorno
return $html;

};

?>