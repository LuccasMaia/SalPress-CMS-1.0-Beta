<?php

// constroe os albuns de imagens
function constroe_albuns_imagens(){

// globals
global $idioma;

// id de campos
$idcampo[0] = md5("id_campo_visualiza_albuns".data_atual());

// eventos
$evento[0] = "onclick='carregar_albuns(\"$idcampo[0]\");'";

// campo criar album
$campo_criar_album = campo_criar_album();

// albuns a serem carregados
$albuns_carregar = carregar_albuns();

// html
$html = "
<div class='classe_campo_albuns_imagens'>
$campo_criar_album

<div class='classe_campo_albuns_imagens_resultados' id='$idcampo[0]'>$albuns_carregar</div>
<div class='classe_div_campo_gerenciar_imagens_album_img' $evento[0]>$idioma[145]</div>

</div>
";

// retorno
return $html;

};

?>