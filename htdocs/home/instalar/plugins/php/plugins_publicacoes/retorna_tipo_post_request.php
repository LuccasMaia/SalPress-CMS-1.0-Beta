<?php

// tipo de post via request
function retorna_tipo_post_request(){

// globals
global $requeste;

// tipo de post
$tipo_post = remove_html($_REQUEST[$requeste[9]]);

// valida tipo de post
if($tipo_post == null or $tipo_post < 0 or is_numeric($tipo_post) == false){
	
	// tipo de post padrao
    $tipo_post = 1;
	
};

// retorno
return $tipo_post;

};

?>