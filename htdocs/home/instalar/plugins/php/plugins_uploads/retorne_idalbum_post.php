<?php

// retorna o id de album modo post
function retorne_idalbum_post(){

// globals
global $requeste;

// valida idpost
if(retorne_idpost_request() == null){
	
	// retorno por id de requeste
	return remove_html($_REQUEST[$requeste[6]]);    
	
}else{
	
    // retorno por id de postagem
    return retorne_idalbum_idpost(retorne_idpost_request());
	
};

};

?>