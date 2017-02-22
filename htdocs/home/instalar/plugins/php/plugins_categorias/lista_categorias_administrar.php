<?php

// lista as categorias no modo administrar
function lista_categorias_administrar(){

// globals
global $idioma;

// tabela
$tabela = TABELA_CATEGORIAS;

// query
$query = "select *from $tabela order by id desc;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// imagem de sistema
$imagem_sistema[0] = retorne_imagem_servidor(16);

// construindo categorias
for($contador == $contador; $contador <= $numero_linhas; $contador++){

    // dados
    $dados = retorne_dados_comando($comando);

    // separa os dados
    $id = $dados["id"];
    $categoria = $dados["categoria"];
    $data = $dados["data"];
	$cor = $dados["cor"];
	
	// valida id de categoria
	if($id != null){
		
		// campo excluir categoria
		$campo_excluir = "
		$idioma[190]
		<br>
		<br>
		<input type='button' value='$idioma[101]' onclick='excluir_categoria($id);'>
		";
		
		// id de dialogo
		$id_dialogo = md5("dialogo_excluir_categoria_$id");
		
		// adiciona dialogo
		$campo_excluir = janela_mensagem_dialogo($idioma[189], $campo_excluir, $id_dialogo);
		
		// id campo
		$idcampo[0] = md5("id_campo_entrada_categoria_$id");
		$idcampo[1] = retorne_idcampo_md5();
		
		// funcoes
		$funcao[0] = "atualizar_categoria(\"$idcampo[0]\", \"$idcampo[1]\", \"$id\");";
		
		// eventos
		$eventos[0] = "onkeyup='$funcao[0]'";
		$eventos[1] = "onclick='$funcao[0]'";
		
		// codigo html
		$html .= "
		<div class='classe_categoria_administrar'>
		
		<div class='classe_categoria_administrar_gerenciar' onclick='dialogo_excluir_categoria(\"$id_dialogo\");'>
		$imagem_sistema[0]
		</div>
		
		<div class='classe_categoria_administrar_categoria'>
		<input type='text' id='$idcampo[0]' value='$categoria' placeholder='$idioma[186]' $eventos[0]>
		</div>
		
		<div class='classe_categoria_administrar_categoria_cor'>
		<input type='text' value='$cor' id='$idcampo[1]' placeholder='$idioma[85]' $eventos[0]>
		</div>
		
		<div class='classe_categoria_administrar_categoria_cor_salvar'>
		<input type='button' value='$idioma[57]' $eventos[1]>
		</div>

		</div>
		
		$campo_excluir
		";

	};
	
	
};

// retorno
return $html;

};

?>