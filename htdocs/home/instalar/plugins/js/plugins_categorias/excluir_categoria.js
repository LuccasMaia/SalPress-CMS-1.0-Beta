
// exclui a categoria
function excluir_categoria(id){

// monta requisicao
$.post(v_pagina_acoes, {href: 10, id:id}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

