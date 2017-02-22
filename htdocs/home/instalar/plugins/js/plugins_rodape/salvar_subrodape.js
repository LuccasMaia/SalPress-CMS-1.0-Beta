
// salva o subrodape
function salvar_subrodape(idcampo){

// dados de formulario
var conteudo = CKEDITOR.instances[idcampo].getData();

// monta requisicao
$.post(v_pagina_acoes, {href: 16, conteudo: conteudo}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

