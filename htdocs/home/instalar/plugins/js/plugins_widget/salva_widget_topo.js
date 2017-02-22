
// salva o widget
function salva_widget_topo(){

// dados de formulario
conteudo = document.getElementById("id_campo_textarea_widget_topo").value;

// monta requisicao
$.post(v_pagina_acoes, {conteudo: conteudo, href: 54}, function(retorno){

});

};

