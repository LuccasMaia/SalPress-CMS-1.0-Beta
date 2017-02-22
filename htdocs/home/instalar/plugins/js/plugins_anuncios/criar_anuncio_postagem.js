
// cria o anuncio de postagem
function criar_anuncio_postagem(idconteudo){

// dados de formulario
var conteudo = document.getElementById(idconteudo).value;

// monta requisicao
$.post(v_pagina_acoes, {href: 60, conteudo: conteudo}, function(retorno){

	// atualiza a pagina
	location.reload();

});

};

