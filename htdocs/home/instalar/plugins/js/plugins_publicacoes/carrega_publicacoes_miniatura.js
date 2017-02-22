// carrega as publicacoes em miniatura
function carrega_publicacoes_miniatura(){

// valida campo existe
if($("#id_div_campo_destaque").length == 0){

    // retorna falso	
    return false;

};

// monta requisicao
$.post(v_pagina_acoes, {pesq: pesq, categoria: v_categoria_atual, contador_avanco_conteudo: v_contador_avanco_publicacoes, tipo_post: v_tipo_post, href: 7}, function(retorno){

	// previne que aja duplicatas de publicacoes
	if(v_backup_publicacoes == retorno){
		
		// retorno nulo
		return null;
		
	};

	// atualiza o backup de publicacoes
	v_backup_publicacoes = retorno;

	// valida retorno
	if(retorno.length > 0){

		// atualiza contador
		v_contador_avanco_publicacoes += v_limit_publicacoes;

		// atualiza o conteudo
		$(retorno).appendTo('#id_div_campo_destaque');

	};

});

};

