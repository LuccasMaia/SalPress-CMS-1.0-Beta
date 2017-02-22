<?php

// exclui um album de imagem
function excluir_album_imagem(){

// globals
global $requeste;

// valida usuario administrador
if(retorne_usuario_administrador() == false){

    // retorno nulo	
    return null;
	
};

// dados de formulario
$idalbum = remove_html($_REQUEST[$requeste[6]]);

// tabela
$tabela[0] = TABELA_ALBUNS;
$tabela[1] = TABELA_IMAGENS_ALBUM;

// query
$query[0] = "delete from $tabela[0] where id='$idalbum';";
$query[1] = "select *from $tabela[1] where idalbum='$idalbum';";
$query[2] = "delete from $tabela[1] where idalbum='$idalbum';";

// contador
$contador = 0;

// comando
$comando = comando_executa($query[1]);

// linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
for($contador == $contador; $contador <= $numero_linhas; $contador++){
	
	// dados
	$dados = retorne_dados_comando($comando);

	// pasta de usuario
    $pasta_usuario = retorne_pasta_usuario($dados['idusuario'], 2, true);

    // separa os dados
    $url_imagem = $pasta_usuario.basename($dados['url_imagem']);
    $url_imagem_miniatura = $pasta_usuario.basename($dados['url_imagem_miniatura']);

    // excluindo arquivo
    exclui_arquivo_unico($url_imagem);
    exclui_arquivo_unico($url_imagem_miniatura);
	
};

// remove album
comando_executa($query[0]);
comando_executa($query[2]);

};

?>