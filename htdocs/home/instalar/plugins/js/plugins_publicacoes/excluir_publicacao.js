
// excluir publicacao
function excluir_publicacao(id){

// monta requisicao
$.post(v_pagina_acoes, {post: id, href: 23}, function(retorno){

    // atualiza a pagina...
    location.reload();

});

};

