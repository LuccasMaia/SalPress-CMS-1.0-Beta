<?php

// carrega as imagens da galeria
function carregar_imagens_galeria(){

// globals
global $idioma;

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// limit de query
$limit_query = retorne_limit_imagens_album();

// idalbum
$idalbum = retorne_idalbum_post();

// valida id de album
if($idalbum == null){
	
    // query
	$query = "select *from $tabela order by id desc $limit_query;";

}else{
	
    // query
	$query = "select *from $tabela where idalbum='$idalbum' order by id desc $limit_query;";
	
};

// comando
$comando = comando_executa($query);

// numero de linhas
$linhas = retorne_numero_linhas_comando($comando);

// valida numero de linhas
if($linhas == 0){

    // retorno	
    return null;
	
};

// contador
$contador = 0;

// imagens de servidor
$imagem_servidor[0] = retorne_imagem_servidor(16);

// construindo imagens
for($contador == $contador; $contador <= $linhas; $contador++){

    // dados de query
    $dados = retorne_dados_comando($comando);

    // separa os dados
    $id = $dados["id"];
    $idusuario = $dados["idusuario"];
    $idalbum = $dados["idalbum"];
    $url_imagem = $dados["url_imagem"];
    $url_imagem_miniatura = $dados["url_imagem_miniatura"];
    $conteudo = $dados["conteudo"];
    $data = $dados["data"];

	// valida id
	if($id != null){

		// id de dialogo para excluir imagem
		$id_dialogo_excluir_imagem = retorne_idcampo_md5();
	
		// campo dialogo excluir
        $campo_dialogo_excluir = "
        $idioma[90]
        <br>
        <br>
        <input type='button' value='$idioma[101]' onclick='excluir_imagem_galeria_imagens(\"$id\", \"$id_dialogo_excluir_imagem\");'>
        ";

        // adiciona o dialogo
        $campo_dialogo_excluir = janela_mensagem_dialogo($idioma[114], $campo_dialogo_excluir, $id_dialogo_excluir_imagem);

        // campo gerenciar imagem
        $campo_gerenciar_imagem = "
        <div class='classe_div_imagem_publicacao_opcoes'>
        <span class='classe_span_opcao_publicacao' onclick='dialogo_excluir_imagem_galeria(\"$id_dialogo_excluir_imagem\");'>$imagem_servidor[0]</span>
        </div>
        ";
		
        // campo de imagem
        $html .= "
		$campo_dialogo_excluir
		
        <div class='classe_div_imagem_galeria' id='id_div_imagem_galeria_$id'>
        $campo_gerenciar_imagem
		<div class='classe_div_imagem_galeria_imagem'>
        <img src='$url_imagem_miniatura'>
		</div>
		<div class='classe_div_imagem_galeria_endereco'>
		<p id='id_campo_endereco_imagem_$id'>$url_imagem</p>
		<input type='button' value='$idioma[212]' onclick=\"copyToClipboard('id_campo_endereco_imagem_$id');\">
		</div>
		</div>
        ";
	
	};
	
};

// retorno
return $html;

};

?>