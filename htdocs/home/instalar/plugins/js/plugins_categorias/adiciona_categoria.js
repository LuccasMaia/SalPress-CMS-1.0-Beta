
// adiciona ou remove categoria
function adiciona_categoria(id_elemento_nome_categoria, id_elemento_categorias){

// dados de formulario
var v_campo_categoria = document.getElementById(id_elemento_nome_categoria).value;

// limpa campos
document.getElementById(id_elemento_nome_categoria).value = null;

// move o foco
document.getElementById(id_elemento_nome_categoria).focus();

// valida categoria
if(v_campo_categoria.length == 0){

    // retorno nulo	
    return null;
	
};

// monta requisicao
$.post(v_pagina_acoes, {href: 9, campo_categoria: v_campo_categoria}, function(retorno){

    // aplicando conteudo...
    $("#" + id_elemento_categorias).html(retorno);

});

};

