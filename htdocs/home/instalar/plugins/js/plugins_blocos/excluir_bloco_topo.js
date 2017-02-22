
// excluir bloco
function excluir_bloco_topo(id, idbloco){

// monta requisicao
$.post(v_pagina_acoes, {href: 20, id: id}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

