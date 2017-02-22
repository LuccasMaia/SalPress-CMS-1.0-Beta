<?php
	
// constroe o campo widget do meio
function campo_widget_meio(){

// globals
global $idioma;

// tabela
$tabela = TABELA_WIDGET_MEIO;

// query
$query = "select *from $tabela;";

// dados do widget
$dados = retorne_dados_query($query);

// separa dados
$conteudo = $dados['conteudo'];

// id de campo
$idcampo[0] = md5("id_campo_widget_meio_".data_atual().retorne_contador_iteracao());

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// conteudo
	$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[66]' id='$idcampo[0]' class='campo_textarea_widget' onkeyup='salva_widget_meio(\"$idcampo[0]\");'>$conteudo</textarea>";
	
	}else{
	
	// valida conteudo
	if($conteudo == null){

		// retorno nulo
		return null;

	};
	
	// restaura entidades html
	$conteudo = html_entity_decode($conteudo);
	
};

// codigo html
if($conteudo != null){
	
	// codigo html
	$html = "<div class='classe_div_widget_meio'>$conteudo</div>";
	
};

// retorno
return $html;

};
	
?>	