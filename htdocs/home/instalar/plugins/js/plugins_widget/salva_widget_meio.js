
// salva o widget
function salva_widget_meio(idcampo_1){

// dados de formulario
conteudo = document.getElementById(idcampo_1).value;

// monta requisicao
$.post(v_pagina_acoes, {conteudo: conteudo, href: 31}, function(retorno){

});

};

