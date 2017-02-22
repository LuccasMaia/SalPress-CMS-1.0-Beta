<?php

// campo cria menu
function campo_cria_menu($modo){

#>> modo true e menu <<
#>> modo false e submenu <<

// globals
global $idioma;

// valida usuario administrador
if(retorne_usuario_administrador() == false){
    
    // retorno nulo	
    return null;
	
};

// valida modo
if($modo == true){
	
	// modo
	$modo = null;
	
	// tipo de menu
	$tipo_menu = 1;
	
	// texto de botao
	$texto_botao = $idioma[195];
	
	// cor de div
	$cor_div = "cor_1";
	
	// placeholders
	$placeholder[0] = $idioma[194];
	$placeholder[1] = $idioma[196];

}else{
	
	// modo
    $modo = "sub_menu";	

	// tipo de menu
	$tipo_menu = 2;
	
	// texto de botao
	$texto_botao = $idioma[197];
	
	// cor de div
	$cor_div = "cor_2";

	// placeholders
	$placeholder[0] = $idioma[198];
	$placeholder[1] = $idioma[199];
	
};

// id de campos
$idcampo[0] = md5("id_campo_titulo_menu".data_atual().$modo);
$idcampo[1] = md5("id_campo_link_menu".data_atual().$modo);

// eventos
$eventos[0] = "onkeydown='if(event.keyCode == 13){adiciona_item_menu(\"$idcampo[0]\", \"$idcampo[1]\", \"$tipo_menu\");}'";
$eventos[1] = "onclick='adiciona_item_menu(\"$idcampo[0]\", \"$idcampo[1]\", \"$tipo_menu\");'";

// campo cria menu
$html = "
<div class='classe_div_campo_cria_menu $cor_div'>

<div class='classe_div_campo_cria_menu_entrada'>
<input type='text' placeholder='$placeholder[0]' id='$idcampo[0]' $eventos[0]>
</div>

<div class='classe_div_campo_cria_menu_entrada'>
<input type='text' placeholder='$placeholder[1]' id='$idcampo[1]' $eventos[0]>
</div>

<div class='classe_div_campo_cria_menu_cria'>
<input type='button' value='$texto_botao' $eventos[1]>
</div>

</div>
";

// retorno
return $html;

};

?>