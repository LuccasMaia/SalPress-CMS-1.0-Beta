<?php

// adiciona bloco
function adicionar_bloco_topo(){

// globals
global $requeste;

// dados de formulario
$titulo = remove_html($_REQUEST["titulo"]);
$id = remove_html($_REQUEST[$requeste[7]]);
$url_link = remove_html($_REQUEST["url_link"]);

// tabela
$tabela = TABELA_BLOCOS_TOPO;

// data atual
$data = data_atual();

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// cria pasta se nao existir
$pasta_upload_root = retorne_pasta_usuario($idusuario_logado, 5, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario_logado, 5, false);

// upload de imagem
$url_imagem = upload_imagem_unica($pasta_upload_root, ESCALA_IMAGEM_BLOCO_TOPO, ESCALA_IMAGEM_BLOCO_TOPO, $pasta_upload_servidor, false);

// urls de imagem
$url_imagem_normal = $url_imagem['normal'];
$url_imagem_normal_root = $url_imagem['normal_root'];

// valida url de imagem
if($url_imagem_normal != null){
	
    // dados
    $dados = retorne_dados_bloco_topo($id);
	
	// exclui a imagem antiga
    exclui_arquivo_unico($dados["root_imagem"]);

};

// valida a id
if($id == null){
	
    // query
    $query = "insert into $tabela values(null, '$titulo', '$url_imagem_normal', '$url_imagem_normal_root', '$url_link', '$data');";

}else{
	
	// valida atualizar imagem...
	if($url_imagem_normal == null){
		
	    // query
	    $query = "update $tabela set titulo='$titulo', url_link='$url_link', data='$data' where id='$id';";
	
	}else{
	
	    // query
	    $query = "update $tabela set titulo='$titulo', url_link='$url_link', url_imagem='$url_imagem_normal', root_imagem='$url_imagem_normal_root', data='$data' where id='$id';";

	};
	
};

// query executa
query_executa($query);

};

?>