<?php

// retorna o incrementador
function retorne_incrementador(){

// atualiza
if($_SESSION[CONFIG_SESSAO_1] == null){
	
	// zera valor de sessao
	$_SESSION[CONFIG_SESSAO_1] = 0;
	
}else{
	
	// incrementa valor de sessao
    $_SESSION[CONFIG_SESSAO_1]++;

};

// retorno
return $_SESSION[CONFIG_SESSAO_1];

};

?>