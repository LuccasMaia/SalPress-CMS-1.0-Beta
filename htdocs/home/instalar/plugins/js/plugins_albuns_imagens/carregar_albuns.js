
// carrega albuns
function carregar_albuns(id_campo_carregar){

// monta requisicao
$.post(v_pagina_acoes, {contador_avanco_conteudo: v_contador_avanco_galeria_imagens_album, href: 56}, function(retorno){


// valida retorno
if(retorno.length != 0){

// atualiza contador
v_contador_avanco_galeria_imagens_album += v_limit_imagens_album;

// atualiza o conteudo
$(retorno).appendTo("#" + id_campo_carregar);


};


});

};

