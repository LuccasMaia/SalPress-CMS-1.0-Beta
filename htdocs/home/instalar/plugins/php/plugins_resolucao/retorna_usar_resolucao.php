<?php

// retorna usar resolucao
function retorna_usar_resolucao(){

// valida configuracao
if(CONFIG_SIMULA_MOBILE == true){
	
	// retorno
	return true;
	
};

// retorno
return $_SESSION[USAR_RESOLUCAO_SISTEMA];

};

?>