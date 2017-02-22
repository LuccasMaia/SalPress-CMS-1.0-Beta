
// carrega os submenus no modo de criacao
function carregar_submenus_criar(idcampo_1, idcampo_2, idcampo_3, idcampo_4){

// dados de formulario
var v_id = document.getElementById(idcampo_1).value;

// seta o id de menu que esta sendo usado
v_idmenu_usando = v_id;

// monta requisicao
$.post(v_pagina_acoes, {href: 13, id: v_id}, function(retorno){

    // exibe retorno...
    $("#" + idcampo_2).html(retorno);

});

// carrega titulo e link de menu
carrega_titulo_link_menu(v_idmenu_usando, idcampo_3, idcampo_4, 1);

};

