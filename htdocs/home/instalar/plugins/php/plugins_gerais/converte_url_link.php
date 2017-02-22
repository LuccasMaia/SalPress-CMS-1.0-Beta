<?php

// converte url em link
function converte_url_link($conteudo){

// parametros
$parametros[0] = '!http://[a-z0-9\-._~\!$&\'()*+,;=:/?#[\]@%]+!i';
$parametros[1] = '!https://[a-z0-9\-._~\!$&\'()*+,;=:/?#[\]@%]+!i';

// substituir
$funcao_chama = '_funcao_converte_link_imagem_via_url';

// conteudo
$conteudo = preg_replace_callback($parametros[0], $funcao_chama, $conteudo);
$conteudo = preg_replace_callback($parametros[1], $funcao_chama, $conteudo);
	
// retorno
return $conteudo;

};

?>