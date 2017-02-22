<?php

// constroe o campo de adicionar widget de postagem
function constroe_campo_adicionar_widget_postagem(){

// globals
global $idioma;

// id de campo
$idcampo[0] = retorne_idcampo_md5();

// campos
$campo[0] = constroe_campo_ckeditor(retorne_dados_widget_postagem(false), null, $idcampo[0]);

// funcoes
$funcao[0] = "salvar_widget_postagem(\"$idcampo[0]\");";

// eventos
$evento[0] = "onclick='$funcao[0]'";

// campos
$campo[1] = "
<input type='button' value='$idioma[57]' $evento[0]>
";

// html
$html = "

<div class='classe_campo_entrada_widget_postagem'>
$campo[0]
</div>

<div class='classe_campo_salvar_widget_postagem'>
$campo[1]
</div>

";

// retorno
return $html;

};

?>