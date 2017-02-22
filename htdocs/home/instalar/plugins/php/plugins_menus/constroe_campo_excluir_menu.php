<?php

// constroe campo excluir menu
function constroe_campo_excluir_menu($modo){

#>> modo 1 menu principal <<
#>> modo 2 submenu <<

// globals
global $idioma;

// imagem de sistema
$imagem_sistema[0] = retorne_imagem_servidor(16);

// id de campo
$idcampo[0] = md5("id_dialogo_excluir_menu".data_atual());

// eventos
$evento[0] = "onclick='excluir_item_menu(\"$modo\");'";
$evento[1] = "onclick='dialogo_excluir_menu(\"$idcampo[0]\");'";

$html = "
$idioma[200]
<br>
<br>
<input type='button' value='$idioma[201]' $evento[0]>
";

// adiciona dialogo
$html = janela_mensagem_dialogo($idioma[202], $html, $idcampo[0]);

// codigo html
$html = "
<div class='classe_campo_excluir_menu'>

<span class='classe_campo_excluir_menu_span' $evento[1]>
$imagem_sistema[0]
</span>

</div>

$html
";

// retorno
return $html;

};

?>