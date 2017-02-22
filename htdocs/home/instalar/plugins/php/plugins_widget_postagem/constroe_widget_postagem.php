<?php

// constroe o widget de postagem
function constroe_widget_postagem($modo){

// valida usuario logado e modo
if(retorne_usuario_logado() == true and $modo == true){
	
	// retorno nulo
	return null;
	
};

// campos
$campo[0] = retorne_dados_widget_postagem($modo);

// html
$html = "
<div class='classe_campo_widget_postagem'>
$campo[0]
</div>
";

// retorno
return $html;

};

?>