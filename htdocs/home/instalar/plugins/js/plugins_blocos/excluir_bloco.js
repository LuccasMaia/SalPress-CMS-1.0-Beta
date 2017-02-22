
// excluir bloco
function excluir_bloco(id, idbloco){

// monta requisicao
$.post(v_pagina_acoes, {href: 18, id: id}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

