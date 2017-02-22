<?php
	
// constroe o campo widget
function campo_widget(){

// globals
global $idioma;

// tabela
$tabela = TABELA_WIDGET;

// query
$query = "select *from $tabela;";

// dados do widget
$dados = retorne_dados_query($query);

// separa dados
$conteudo = $dados['conteudo'];

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// conteudo
	$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[162]' id='id_campo_textarea_widget' class='campo_textarea_widget' onkeyup='salva_widget();'>$conteudo</textarea>";

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
	$html = "<div class='classe_div_widget'>$conteudo</div>";
	
};

// retorno
return $html;
	
};
	
?>	