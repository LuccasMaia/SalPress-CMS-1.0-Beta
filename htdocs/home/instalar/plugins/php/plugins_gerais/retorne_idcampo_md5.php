<?php

// retorna id de campo formato md5
function retorne_idcampo_md5(){

// retorno
return md5("idcampo_md5_".retorne_contador_iteracao().data_atual());

};

?>