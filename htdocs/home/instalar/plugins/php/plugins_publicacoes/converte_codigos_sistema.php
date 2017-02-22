<?php

// converte os codigos do sistema
function converte_codigos_sistema($conteudo, $modo){

// valida o modo
if($modo == true){
	
    // converte para formulario
    $conteudo = str_replace(CODIGO_SISTEMA_FORM_CONTATO, formulario_contato_usuario(), $conteudo);
    $conteudo = str_replace(CODIGO_SISTEMA_FORM_ORCAMENTO, formulario_orcamento_servico(), $conteudo);
	
}else{
	
    // remove...
    $conteudo = str_replace(CODIGO_SISTEMA_FORM_CONTATO, null, $conteudo);
	$conteudo = str_replace(CODIGO_SISTEMA_FORM_ORCAMENTO, null, $conteudo);
	
};

// retorno
return $conteudo;

};

?>