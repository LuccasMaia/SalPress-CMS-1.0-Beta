<?php

// atualiza todas as publicacoes amigaveis
function atualizar_todas_publicacoes_amigaveis(){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela;";

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo
for($contador == $contador; $contador <= $numero_linhas; $contador++){

	// dados
	$dados = retorne_dados_comando($comando);

	// separa dados
	$id = $dados['id'];
	$titulo = $dados['titulo'];

	// salva a url amigavel
	salvar_url_amigavel($titulo, $id, false);

};

};

?>