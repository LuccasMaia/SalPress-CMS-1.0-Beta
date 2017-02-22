<?php

// carrega os blocos de topo
function carrega_blocos_topo(){

// globals
global $idioma;

// valida pagina sair
if(retorne_href_get() == $idioma[4]){
	
	// retorno nulo
	return null;
	
};

// tabela
$tabela = TABELA_BLOCOS_TOPO;

// query
$query = "select *from $tabela order by id desc;";

// comando
$comando = comando_executa($query);

// numero de linhas de comando
$numero_linhas = retorne_numero_linhas_comando($comando);

// valida numero de linhas
if($numero_linhas == 0){
	
	// retorno
	return null;
	
};

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
    $url_imagem = $dados["url_imagem"];
    $url_link = $dados["url_link"];

	// valida id
	if($id != null){

	    // id de bloco
		$idbloco = md5("id_bloco_pagina_".data_atual());
		
	    // valida usuario administrador
	    if($usuario_administrador == true){
			
			// campo gerenciar bloco
	        $campo_gerenciar = campo_gerenciar_bloco_topo($dados, $idbloco);
		
		};

		// valida usuario administrador
	    if($usuario_administrador == true){
			
			// atualiza os campos
			$campos_blocos .= "<div class='classe_bloco_topo_atualizar'>";
			$campos_blocos .= "<div class='classe_bloco_topo_atualizar_gerenciar'>";
            $campos_blocos .= $campo_gerenciar;
			$campos_blocos .= "</div>";
            $campos_blocos .= editar_blocos_topo($dados);
			$campos_blocos .= "</div>";
			
		}else{
			
			// conteudo
			$conteudo = "
			<img src='$url_imagem' title='$titulo'>
			";
			
			// valida url de link
			if($url_link != null){
				
				// conteudo
				$conteudo = "<a href='$url_link' title='$titulo'>$conteudo</a>";
				
			};

	        // atualiza os campos
            $campos_blocos .= "

		    <div class='classe_bloco_topo' id='$idbloco'>

		    <div class='classe_bloco_topo_descreve'>$conteudo</div>
		    <div class='classe_bloco_topo_titulo'>$titulo</div>
		    $campo_gerenciar
		
		    </div>

            ";		

		};
		
	};
	
};



// codigo html
$html = "
<div class='classe_campo_blocos_topo'>
$campos_blocos
</div>
";

// retorno
return $html;

};

?>