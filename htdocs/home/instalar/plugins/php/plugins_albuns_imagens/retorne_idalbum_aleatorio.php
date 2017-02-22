<?php

// retorna o idalbum aleatorio
function retorne_idalbum_aleatorio(){

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// retorno
return md5("idalbum_".$idusuario.data_atual().retorne_incrementador());

};

?>