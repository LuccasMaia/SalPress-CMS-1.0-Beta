<?php

// retorna a categoria via request
function retorne_categoria_request(){

// globals
global $requeste;

// retorno
return remove_html(urldecode($_REQUEST[$requeste[3]]));

};

?>