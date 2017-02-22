
// adiciona blocos
function adicionar_bloco(idcampo_1, idcampo_2, idcampo_3, id){

// dados de formulario
var campo_1 = document.getElementById(idcampo_1).value;
var campo_2 = document.getElementById(idcampo_2).value;
var campo_3 = CKEDITOR.instances[idcampo_3].getData();


// monta requisicao
$.post(v_pagina_acoes, {href: 17, titulo: campo_1, subtitulo: campo_2, conteudo: campo_3, id: id}, function(retorno){

    // atualiza a pagina
    location.reload();

});


};

