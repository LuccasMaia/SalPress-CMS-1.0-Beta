
// adiciona item de menu
function adiciona_item_menu(idcampo_1, idcampo_2, tipo_menu){

// dados de formulario
var campo_1 = document.getElementById(idcampo_1).value;
var campo_2 = document.getElementById(idcampo_2).value;

// valida campo
if(campo_1.length == 0){
	
	// move o foco
    document.getElementById(idcampo_1).focus();

};

// valida campo
if(campo_2.length == 0){
	
	// move o foco
    document.getElementById(idcampo_2).focus();

};

// valida valor de campo
if(campo_1.length == 0 || campo_2.length == 0){

    // retorno nulo	
    return null;
	
};

// limpa os campos
document.getElementById(idcampo_1).value = null;
document.getElementById(idcampo_2).value = null;

// monta requisicao
$.post(v_pagina_acoes, {href: 12, titulo_menu: campo_1, link_menu: campo_2, tipo_menu: tipo_menu, id: v_idmenu_usando}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

