
// exclui album de imagem
function excluir_album_imagem(id, idcampo){

// monta requisicao
$.post(v_pagina_acoes, {href: 58, idalbum: id}, function(retorno){


    // remove div
    $("#" + idcampo).remove();


});

};

