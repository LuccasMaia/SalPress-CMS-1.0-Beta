
// atualiza a descricao de imagem de slideshow
function atualizar_descricao_imagem_slideshow(id){

// comentario
var comentario = document.getElementById("id_campo_comentario_imagem_slideshow").value;
var v_url = document.getElementById("id_campo_url_imagem_slideshow").value;

// monta requisicao
$.post(v_pagina_acoes, {id: id, comentario: comentario, url: v_url, href: 6}, function(retorno){

});

};

