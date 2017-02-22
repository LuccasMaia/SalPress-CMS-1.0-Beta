<?php
	
// campo widget topo pagina
function campo_widget_topo(){

// globals
global $idioma;

// tabela
$tabela = TABELA_WIDGET_TOPO;

// query
$query = "select *from $tabela;";

// dados do widget
$dados = retorne_dados_query($query);

// separa dados
$conteudo = $dados['conteudo'];

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// conteudo
	$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[223]' id='id_campo_textarea_widget_topo' class='campo_textarea_widget_topo' onkeyup='salva_widget_topo();'>$conteudo</textarea>";
	
}else{
	
	// valida conteudo
	if($conteudo == null){

    // retorno nulo
    return null;

	};
	
	// restaura entidades html
	$conteudo = html_entity_decode($conteudo);
	
};
	
// valida usuario logado
if(retorne_usuario_logado() == true){
	
    // retorna apenas o conteudo de widget
    $conteudo = "
    <div class='classe_div_widget'>
    $conteudo
    </div>";
    
    // retorno
    return $conteudo;
    
};
	
// codigo html
if($conteudo != null){
	
    // codigo html
    $html = "<div class='classe_div_widget_topo'>$conteudo</div>";
    
};
	
// retorno
return $html;
	
};
	
?>	