
// atualiza a publicacao
function atualizar_publicacao(id, id_select){

// select option
var select_option = document.getElementById(id_select);

// dados de formulario
var titulo = document.getElementById("id_publicacao_titulo_" + id).value;
var conteudo = CKEDITOR.instances["id_publicacao_conteudo_" + id].getData();
var tipo_post = document.getElementById("id_tipo_post_publicacao_pagina").value;

// categoria de postagem
var v_categoria_postagem = select_option.options[select_option.selectedIndex].text;

// monta requisicao
$.post(v_pagina_acoes, {post: id, titulo: titulo, conteudo: conteudo, categoria_postagem: v_categoria_postagem, tipo_post: tipo_post, href: 25}, function(retorno){

    // recarrega a pagina
    location.reload();

});


};

