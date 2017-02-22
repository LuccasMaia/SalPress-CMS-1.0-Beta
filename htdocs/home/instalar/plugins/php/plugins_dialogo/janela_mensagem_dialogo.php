<?php

// janela de mensagem de dialogo
function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){

// botao fechar
$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo' onclick='fechar_janela_mensagem_dialogo(\"$div_id\");'>";
$botao_fechar .= "x";
$botao_fechar .= "</span>";

// codigo html bruto
$html .= "<div id='$div_id' class='div_janela_principal_mensagem_dialogo'>";
$html .= "<div class='div_janela_mensagem_dialogo'>";
$html .= "<div class='div_janela_mensagem_dialogo_titulo'>";
$html .= $botao_fechar;
$html .= $titulo_janela;
$html .= "</div>";
$html .= "<div class='div_janela_mensagem_conteudo'>";
$html .= $conteudo_mensagem;
$html .= "</div>";
$html .= "</div>";
$html .= "</div>";

// retorno
return $html;

};

?>