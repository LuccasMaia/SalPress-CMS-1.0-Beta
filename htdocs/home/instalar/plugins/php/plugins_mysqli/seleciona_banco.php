<?php

// seleciona banco de dados
function seleciona_banco($nome_banco){

// seleciona o banco de dados
mysqli_select_db($_SESSION["CONEXAO_MYSQLI"], $nome_banco);

};

?>