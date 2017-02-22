
// atualiza item de menu
function atualizar_item_menu(idcampo1, idcampo2, modo){

// dados de formulario
var campo_1 = document.getElementById(idcampo1).value;
var campo_2 = document.getElementById(idcampo2).value;

// valida o modo
switch(parseInt(modo)){

    case 1:
	var v_id = v_idmenu_usando;
    break;
	
	case 2:
	var v_id = v_idsubmenu_usando;
	break;
	
};

// monta requisicao
$.post(v_pagina_acoes, {href: 21, titulo: campo_1, link: campo_2, id: v_id, modo: modo}, function(retorno){



});

};

