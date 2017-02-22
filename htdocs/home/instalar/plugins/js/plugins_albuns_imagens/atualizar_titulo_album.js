
// atualiza o titulo de album
function atualizar_titulo_album(idcampo_1, idalbum){

// dados de formulario
var campo_1 = document.getElementById(idcampo_1).value;

// monta requisicao
$.post(v_pagina_acoes, {href: 57, idalbum: idalbum, nome_album: campo_1}, function(retorno){



});

};

