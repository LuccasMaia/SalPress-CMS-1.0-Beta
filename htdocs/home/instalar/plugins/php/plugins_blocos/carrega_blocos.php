<?php

// carrega os blocos
function carrega_blocos(){

// tabela
$tabela = TABELA_BLOCOS;

// query
$query = "select *from $tabela order by id desc;";

// comando
$comando = comando_executa($query);

// numero de linhas de comando
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
$contador = 0;

// usuario administrador
$usuario_administrador = retorne_usuario_administrador();

// construindo blocos
for($contador == $contador; $contador <= $numero_linhas; $contador++){
	
	// dados
	$dados = retorne_dados_comando($comando);
	
	// separa os dados
	$id = $dados["id"];
	$titulo = $dados["titulo"];
    $sub_titulo = $dados["sub_titulo"];
    $conteudo = $dados["conteudo"];

	// valida id
	if($id != null){
	   
	    // conteudo
	    $conteudo = html_entity_decode($conteudo);
	   
	    // id de bloco
		$idbloco = md5("id_bloco_pagina_".data_atual());
		
	    // valida usuario administrador
	    if($usuario_administrador == true){
			
			// campo gerenciar bloco
	        $campo_gerenciar = campo_gerenciar_bloco($dados, $idbloco);
		
		};
		
		// valida titulo
		if($titulo != null){
			
			// campos
			$campo[0] = "
			<div class='classe_bloco_numero'>$titulo</div>
			";
		
		};
		
		// valida o subtitulo
		if($sub_titulo != null){
			
			// campos
			$campo[1] = "
			<div class='classe_bloco_titulo'>$sub_titulo</div>
			";
		
		};
		
	    // atualiza os campos
        $campos_blocos .= "
		$campo_gerenciar
		<div class='classe_bloco animated bounceIn' id='$idbloco'>
		$campo[0]
		$campo[1]
		<div class='classe_bloco_descreve'>$conteudo</div>
		</div>
        ";		
		
	};
	
};



// codigo html
$html = "
<div class='classe_campo_blocos'>

$campos_blocos

</div>
";

// retorno
return $html;

};

?>