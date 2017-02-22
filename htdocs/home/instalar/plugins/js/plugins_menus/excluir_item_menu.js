
// exclui o item de menu
function excluir_item_menu(modo){

// monta requisicao
$.post(v_pagina_acoes, {href: 14, idmenu: v_idmenu_usando, id_submenu: v_idsubmenu_usando, modo: modo}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};
