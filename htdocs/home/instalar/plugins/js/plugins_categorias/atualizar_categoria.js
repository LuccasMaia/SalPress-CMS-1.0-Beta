
// atualiza a categoria
function atualizar_categoria(idcampo_1, idcampo_2, id){
	
// nome da categoria
var v_nome_categoria = document.getElementById(idcampo_1).value;

// cor da categoria
var v_cor_categoria = document.getElementById(idcampo_2).value;

// monta requisicao
$.post(v_pagina_acoes, {href: 11, nome_categoria: v_nome_categoria, cor_categoria: v_cor_categoria, id_categoria: id}, function(retorno){

});
	
};
