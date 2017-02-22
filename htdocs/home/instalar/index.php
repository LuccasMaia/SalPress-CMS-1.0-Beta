<?php

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/home/servidor/servidor.php";

// adiciona servidor
include_once($caminho);
include_once(PASTA_PLUGINS_PHP_ARQUIVOS."retorne_lista_todos_arquivos.php");

// carrega dependencias do php
include_once("dependencias.php");

// compila scripts php, css, javascript
include_once("compila_dependencias.php");

// instala banco de dados
include_once("banco/banco.php");

// instala tabelas
include_once("tabelas/tabelas.php");

// atualiza todas as publicacoes amigaveis
atualizar_todas_publicacoes_amigaveis();

// mensagem de sucesso
echo "INSTALADO!";

?>