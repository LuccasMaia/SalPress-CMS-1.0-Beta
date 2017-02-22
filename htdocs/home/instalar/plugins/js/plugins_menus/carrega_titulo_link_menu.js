
// carrega titulo e link de menu
function carrega_titulo_link_menu(idcampo, idcampo_1, idcampo_2, modo){

// monta requisicao
$.post(v_pagina_acoes, {href: 22, id: idcampo, modo: modo, dataType : "json"}, function(retorno){

	// carregando dados...
	var objeto = jQuery.parseJSON(retorno);
	var titulo_menu = objeto['titulo_menu'];
	var link_menu = objeto['link_menu'];

	// dados de formulario
	document.getElementById(idcampo_1).value = titulo_menu;
	document.getElementById(idcampo_2).value = link_menu;

});

};

