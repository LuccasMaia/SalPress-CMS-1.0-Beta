<?php

// ativa o buffer de saida e envia a funcao ob_gzhandler para compactar dados
ob_start("ob_gzhandler"); 

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/home/servidor/servidor.php";

// adiciona servidor
include_once($caminho);

// carrega dependencias php
include_once(ARQUIVO_PHP);

// monta a pagina
echo monta_pagina();

// finaliza o buffer de dados
ob_end_flush(); 

?>