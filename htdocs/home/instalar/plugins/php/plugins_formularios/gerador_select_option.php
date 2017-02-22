<?php

// gerador de select option
function gerador_select_option($array_options, $valor_atual, $nome, $idcampo, $evento_campo){

// separa os itens por virgula
$array_options = explode(",", $array_options);

// codigo html
foreach($array_options as $valor){

// monta option
if($valor == $valor_atual){

    // codigo html
    $html .= "<option value='$valor' selected>$valor</option>";

}else{

    // codigo html
    $html .= "<option value='$valor'>$valor</option>";

};

};

// monta select
$html = "<select name='$nome' id='$idcampo' onchange='$evento_campo'>$html</select>";

// retorno
return $html; // retorno

};

?>