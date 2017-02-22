
// exclui imagem de galeria
function excluir_imagem_galeria_imagens(id, idcampo_1){

// converte id para numero
id = parseInt(id);

// monta requisicao
$.post(v_pagina_acoes, {id: id, href: 26}, function(retorno){

    // oculta elemento
    document.getElementById("id_div_imagem_galeria_" + id).style.display = "none";

});

// fecha as jenalas de dialogo
fechar_janela_mensagem_dialogo(idcampo_1);

};

