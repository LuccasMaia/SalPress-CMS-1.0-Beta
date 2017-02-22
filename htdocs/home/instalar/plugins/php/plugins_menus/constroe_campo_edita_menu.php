<?php

// constroe o campo edita menu
function constroe_campo_edita_menu($modo, $array_campos){

#>> modo 1 e menu principal <<
#>> modo 2 e submenu <<

// globals
global $idioma;

// valida usuario administrador
if(retorne_usuario_administrador() == false){
    
    // retorno nulo	
    return null;
	
};

// valida o modo
switch($modo){
	
    case 1:
	$texto_campo[0] = $idioma[194];
	$texto_campo[1] = $idioma[196];
    break;
	
	case 2:
	$texto_campo[0] = $idioma[198];
	$texto_campo[1] = $idioma[199];
	break;
	
};

// id de campos
$icampo[0] = $array_campos[0];
$icampo[1] = $array_campos[1];

// eventos
$eventos[0] = "onkeyup='atualizar_item_menu(\"$icampo[0]\", \"$icampo[1]\", \"$modo\");'";

// codigo html
$html = "
<div class='classe_campo_edita_menu'>

<div class='classe_campo_edita_menu_separa'>
<input type='text' id='$icampo[0]' placeholder='$texto_campo[0]' $eventos[0]>
</div>

<div class='classe_campo_edita_menu_separa'>
<input type='text' id='$icampo[1]' placeholder='$texto_campo[1]' $eventos[0]>
</div>
	
</div>
";

// retorno
return $html;

};

?>