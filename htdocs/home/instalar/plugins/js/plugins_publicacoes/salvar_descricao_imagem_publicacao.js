
// acao padrao
function salvar_descricao_imagem_publicacao(id){

// conteudo
var v_conteudo = document.getElementById("textarea_descricao_imagem_publicacao_" + id).value;

// monta requisicao
$.post(v_pagina_acoes, {id: id, conteudo: v_conteudo, href: 53}, function(retorno){

	// recarrega a pagina
	location.reload();

});

};

