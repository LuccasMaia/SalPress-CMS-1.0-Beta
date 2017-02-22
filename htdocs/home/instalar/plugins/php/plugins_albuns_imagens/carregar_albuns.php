<?php

// carrega albuns de imagens
function carregar_albuns(){

// globals
global $idioma;
global $requeste;

// valida usuario administrador
if(retorne_usuario_administrador() == false){

    // retorno nulo	
    return null;
	
};

// tabela
$tabela = TABELA_ALBUNS;

// limit de query
$limit_query = retorne_limit_imagens_album();

// query
$query = "select *from $tabela order by id desc $limit_query;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo albuns
for($contador == $contador; $contador <= $numero_linhas; $contador++){
	
	// dados
	$dados = retorne_dados_comando($comando);
	
	// separa os dados
	$id = $dados["id"];
    $nome_album = $dados["nome_album"];
    $data = $dados["data"];
	
	// valida id
	if($id != null){
		
		// converte data em amigavel
		$data = converte_data_amigavel($data);
		
		// imagem de album
		$imagem_album = retorne_primeira_imagem_album($id);
		
		// id de campos
		$idcampo[0] = md5("id_campo_nome_album_$id");
		$idcampo[1] = md5("id_campo_album_numero_$id");
		
		// eventos
		$eventos[0] = "onkeyup='atualizar_titulo_album(\"$idcampo[0]\", \"$id\");'";
		
		$campo_nome = "
		<input type='text' id='$idcampo[0]' value='$nome_album' placeholder='$idioma[216]' $eventos[0]>
		";
		
		// url de album
		$url_album = PAGINA_INICIAL."?$requeste[0]=$idioma[40]&$requeste[6]=$id";
		
		// campo gerencia album
		$campo_gerenciar = campo_gerenciar_album($id, $idcampo[1]);
		
		// html
	    $html .= "
	    <div class='classe_album_usuario' id='$idcampo[1]'>
	    
		<div class='classe_album_usuario_imagens'>
		<a href='$url_album' title='$nome_album'>$imagem_album</a>
		</div>
	    
		<div class='classe_album_usuario_nome'>$campo_nome</div>
		$campo_gerenciar
		<div class='classe_album_usuario_data'>$data</div>

		</div>
	    ";

	};
	
};

// retorno
return $html;

};

?>