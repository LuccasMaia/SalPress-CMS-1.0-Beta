<?php

// define o timezone
date_default_timezone_set("America/Sao_Paulo");

// dados do servidor
define("URL_INDEX_HOME", "http://".$_SERVER['SERVER_NAME']."/index.php");
define("URL_SERVIDOR", "http://".$_SERVER['SERVER_NAME']."/home");
define("PASTA_ROOT_SERVIDOR", $_SERVER['DOCUMENT_ROOT']."/home");
define("URL_SERVIDOR_RAIZ", "http://".$_SERVER['SERVER_NAME']);

// configuracoes da instalacao
include("configuracoes_instalacao.php");

// carrega as configuracoes do site
include("configuracoes_site.php");

?>