
// cria um novo album de imagem
function criar_novo_album(idcampo_1){

// dados de formulario
var v_nome_album = document.getElementById(idcampo_1).value;

// valida nome digitado
if(v_nome_album.length == 0){

    // move o foco
    document.getElementById(idcampo_1).focus();
    
	// retorno nulo
    return null;
	
};

// monta requisicao
$.post(v_pagina_acoes, {href: 55, nome_album: v_nome_album}, function(retorno){

    // atualiza a pagina
    location.reload();

});

};

