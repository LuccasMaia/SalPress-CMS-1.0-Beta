
// salva o widget de postagem
function salvar_widget_postagem(idcampo_1){

// dados de formulario
var conteudo = CKEDITOR.instances[idcampo_1].getData();

// monta requisicao
$.post(v_pagina_acoes, {href: 61, conteudo: conteudo}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

