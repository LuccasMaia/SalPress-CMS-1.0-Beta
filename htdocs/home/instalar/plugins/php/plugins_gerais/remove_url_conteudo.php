<?php

// remove url de conteudo
function remove_url_conteudo($conteudo){

// regex
$regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@";

// retorno
return preg_replace($regex, ' ', $conteudo);

};

?>