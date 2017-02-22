<?php

// atualizacoes javascript que devem iniciar com a pagina
function carregar_atualizacoes_jquery(){

// globals
global $idioma;

// tempo de timer
$tempo_timer = CONFIG_TIMER;

// campo conexao
$campo_conexao = "
\n
atualiza_conexao_usuario();
\n
";

// campo chat de usuario
$campo_chat = "
\n
carrega_atualizacoes_chat();
\n

";

// codigo html
$html .= "
<script>
\n
var variavelTempoAtualizador = setInterval(function(){ AtualizadorTimer() }, $tempo_timer);
\n
function AtualizadorTimer() {
\n
carregar_atualizacoes_jquery();
\n
};
\n
\n
function carregar_atualizacoes_jquery(){
\n

// codigos aqui ::::
$campo_conexao
$campo_chat

// codigos aqui ::::
detecta_resolucao_pagina();
\n


// ::::

\n
};
\n
</script>
\n
";

// retorno
return $html;

};

?>