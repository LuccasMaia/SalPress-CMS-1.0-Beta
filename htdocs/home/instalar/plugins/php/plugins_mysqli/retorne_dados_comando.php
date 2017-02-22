<?php

// retorna os dados de comando
function retorne_dados_comando($comando){

// retorno
return @mysqli_fetch_array($comando, MYSQLI_ASSOC);

};

?>