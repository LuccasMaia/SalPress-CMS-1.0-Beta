
// atualiza o submenu que esta sendo usado
function atualizar_submenu_usando(idcampo, idcampo_1, idcampo_2){

// dados de formulario
v_idsubmenu_usando = document.getElementById(idcampo).value;

// carrega titulo e link de menu
carrega_titulo_link_menu(v_idsubmenu_usando, idcampo_1, idcampo_2, 2);

};
