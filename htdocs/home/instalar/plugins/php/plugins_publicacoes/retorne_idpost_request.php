<?php

// retorna o id de usuario via request
function retorne_idpost_request(){

// globals
global $requeste;

// valida o id de post amigavel
if(retorne_idpost_amigavel() != null){
	
	// retorno
	return retorne_idpost_amigavel();
	
}else{
	
	// retorno
	return remove_html($_REQUEST[$requeste[4]]);

};

};

?>