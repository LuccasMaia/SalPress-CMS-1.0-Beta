<?php

// inicia a sessao
session_start();

// campos de requestes
$requeste[0] = "href";
$requeste[1] = "pesq";
$requeste[2] = "uid";
$requeste[3] = "categoria_nome";
$requeste[4] = "post";
$requeste[5] = "nome_album";
$requeste[6] = "idalbum";
$requeste[7] = "id";
$requeste[8] = "avanco_contador";
$requeste[9] = "tipo_post";

// variavel de conexao
$_SESSION["CONEXAO_MYSQLI"] = null;

// pastas compilados host e root
define("PASTA_COMPILADOS_HOST", URL_SERVIDOR."/compilados/");
define("PASTA_COMPILADOS_ROOT", PASTA_ROOT_SERVIDOR."/compilados/");

// pasta instalar root
define("PASTA_INSTALAR", PASTA_ROOT_SERVIDOR."/instalar/");
define("PASTA_CATEGORIAS", PASTA_INSTALAR."instalar_configuracoes/");

// pasta de plugins todos root
define("PASTA_PLUGINS", PASTA_INSTALAR."plugins/");

// pasta com o jquery host
define("PASTA_JQUERY", URL_SERVIDOR."/jquery/");

// pasta com plugins separados
define("PASTA_PLUGINS_CSS", PASTA_PLUGINS."/css/");
define("PASTA_PLUGINS_JAVASCRIPT", PASTA_PLUGINS."/javascript/");
define("PASTA_PLUGINS_PHP", PASTA_PLUGINS."/php/");

// pasta de imagens do sistema host
define("PASTA_IMAGENS_SISTEMA", URL_SERVIDOR."/imagens/");

// pasta de acoes host
define("PASTA_ACOES", URL_SERVIDOR."/acoes/");

// pasta de arquivos de usuarios root e host
define("PASTA_ARQUIVOS_USUARIOS_ROOT", PASTA_ROOT_SERVIDOR."/arquivos_usuarios/");
define("PASTA_ARQUIVOS_USUARIOS_HOST", URL_SERVIDOR."/arquivos_usuarios/");

// pasta de servidor root
define("PASTA_SERVIDOR_ROOT", PASTA_ROOT_SERVIDOR."/servidor/");

// pasta de plugins php que manipulam arquivos root
define("PASTA_PLUGINS_PHP_ARQUIVOS", PASTA_PLUGINS."/php/plugins_arquivos/");

// pasta de recursos
define("PASTA_RECURSOS", URL_SERVIDOR."/recursos/");

// pasta de temas
define("PASTA_TEMAS_HOST", URL_SERVIDOR."/temas/");
define("PASTA_TEMAS_ROOT", PASTA_ROOT_SERVIDOR."/temas/");

// arquivos de sistema root
define("ARQUIVO_PHP", PASTA_COMPILADOS_ROOT."php.php");
define("ARQUIVO_CSS", PASTA_COMPILADOS_ROOT."tema.css");
define("ARQUIVO_JS", PASTA_COMPILADOS_ROOT."javascript.js");

// arquivos de sistema servidor
define("ARQUIVO_JS_HOST", PASTA_COMPILADOS_HOST."javascript.js");
define("ARQUIVO_CSS_HOST", PASTA_COMPILADOS_HOST."tema.css");
define("ARQUIVO_JQUERY", PASTA_JQUERY."jquery-2.1.3.min.js");
define("ARQUIVO_JQUERY_PAGINACAO", PASTA_JQUERY."jquery_paginacao.js");
define("ARQUIVO_JQUERY_FORM", PASTA_JQUERY."jquery.form.js");
define("ARQUIVO_CSS_RESOLUCAO", PASTA_RECURSOS."resolucao/resolucao.css");

// extensoes
define("EXTENSAO_1", ".php");
define("EXTENSAO_2", ".js");
define("EXTENSAO_3", ".css");
define("EXTENSAO_4", ".txt");
define("EXTENSAO_5", ".png");
define("EXTENSAO_6", ".jpg");

// tabelas
define("TABELA_CADASTRO", "tb_cadastro");
define("TABELA_PERFIL", "tb_perfil");
define("TABELA_PUBLICACOES", "tb_publicacoes");
define("TABELA_IMAGENS_ALBUM", "tb_imagens_album");
define("TABELA_SLIDESHOW", "tb_slideshow");
define("TABELA_CONEXAO_USUARIO", "tb_conexao_usuario");
define("TABELA_CHAT_USUARIO", "tb_chat_usuario");
define("TABELA_AMIZADE", "tb_amizade");
define("TABELA_IDIOMA_USUARIO", "tb_idioma_usuario");
define("TABELA_WIDGET", "tb_widget");
define("TABELA_WIDGET_TOPO", "tb_widget_topo");
define("TABELA_CATEGORIAS", "tb_categorias");
define("TABELA_MENUS", "tb_menus");
define("TABELA_SUBMENUS", "tb_submenus");
define("TABELA_RODAPE", "tb_rodape");
define("TABELA_SUBRODAPE", "tb_subrodape");
define("TABELA_BLOCOS", "tb_blocos");
define("TABELA_BLOCOS_TOPO", "tb_blocos_topo");
define("TABELA_ALBUNS", "tb_albuns");
define("TABELA_SOBRE_SITE", "tb_sobre_site");
define("TABELA_WIDGET_MEIO", "tb_widget_meio");
define("TABELA_ANUNCIO_POSTAGEM", "tb_anuncio_postagem");
define("TABELA_URL_AMIGAVEL_POSTAGEM", "tb_url_amigavel_postagem");
define("TABELA_WIDGET_POSTAGEM", "tb_widget_postagem");

// codigos de sistema
define("CODIGO_SISTEMA_FORM_CONTATO", "[formulario-contato-salpress]");
define("CODIGO_SISTEMA_FORM_ORCAMENTO", "[formulario-orcamento_servico]");

// lista de tabelas de usuarios
$array_tabelas_usuarios[] = TABELA_CADASTRO;
$array_tabelas_usuarios[] = TABELA_PERFIL;
$array_tabelas_usuarios[] = TABELA_PUBLICACOES;
$array_tabelas_usuarios[] = TABELA_IMAGENS_ALBUM;
$array_tabelas_usuarios[] = TABELA_SLIDESHOW;
$array_tabelas_usuarios[] = TABELA_CONEXAO_USUARIO;
$array_tabelas_usuarios[] = TABELA_CHAT_USUARIO;
$array_tabelas_usuarios[] = TABELA_AMIZADE;
$array_tabelas_usuarios[] = TABELA_IDIOMA_USUARIO;
$array_tabelas_usuarios[] = TABELA_CATEGORIAS;
$array_tabelas_usuarios[] = TABELA_MENUS;
$array_tabelas_usuarios[] = TABELA_SUBMENUS;
$array_tabelas_usuarios[] = TABELA_RODAPE;
$array_tabelas_usuarios[] = TABELA_SUBRODAPE;
$array_tabelas_usuarios[] = TABELA_BLOCOS;
$array_tabelas_usuarios[] = TABELA_BLOCOS_TOPO;
$array_tabelas_usuarios[] = TABELA_ALBUNS;
$array_tabelas_usuarios[] = TABELA_SOBRE_SITE;
$array_tabelas_usuarios[] = TABELA_WIDGET_MEIO;
$array_tabelas_usuarios[] = TABELA_ANUNCIO_POSTAGEM;
$array_tabelas_usuarios[] = TABELA_URL_AMIGAVEL_POSTAGEM;
$array_tabelas_usuarios[] = TABELA_WIDGET_POSTAGEM;

// tipos de paginas
define("PAGINA_ID1", 1);
define("PAGINA_ID2", 2);
define("PAGINA_ID3", 3);
define("PAGINA_ID4", 4);
define("PAGINA_ID5", 5);
define("PAGINA_ID6", 6);
define("PAGINA_ID7", 7);
define("PAGINA_ID8", 8);
define("PAGINA_ID9", 9);
define("PAGINA_ID10", 10);
define("PAGINA_ID11", 11);
define("PAGINA_ID12", 12);
define("PAGINA_ID13", 13);
define("PAGINA_ID14", 14);
define("PAGINA_ID15", 15);
define("PAGINA_ID16", 16);
define("PAGINA_ID17", 17);
define("PAGINA_ID18", 18);
define("PAGINA_ID19", 19);
define("PAGINA_ID20", 20);
define("PAGINA_ID21", 21);
define("PAGINA_ID22", 22);
define("PAGINA_ID23", 23);
define("PAGINA_ID24", 24);
define("PAGINA_ID25", 25);
define("PAGINA_ID26", 26);
define("PAGINA_ID27", 27);
define("PAGINA_ID28", 28);
define("PAGINA_ID29", 29);
define("PAGINA_ID30", 30);
define("PAGINA_ID31", 31);
define("PAGINA_ID32", 32);
define("PAGINA_ID33", 33);
define("PAGINA_ID34", 34);
define("PAGINA_ID35", 35);
define("PAGINA_ID36", 36);
define("PAGINA_ID37", 37);
define("PAGINA_ID38", 38);
define("PAGINA_ID39", 39);
define("PAGINA_ID40", 40);
define("PAGINA_ID41", 41);
define("PAGINA_ID42", 42);
define("PAGINA_ID43", 43);
define("PAGINA_ID44", 44);
define("PAGINA_ID45", 45);
define("PAGINA_ID46", 46);
define("PAGINA_ID47", 47);
define("PAGINA_ID48", 48);
define("PAGINA_ID49", 49);
define("PAGINA_ID50", 50);
define("PAGINA_ID51", 51);
define("PAGINA_ID52", 52);
define("PAGINA_ID53", 53);
define("PAGINA_ID54", 54);
define("PAGINA_ID55", 55);
define("PAGINA_ID56", 56);
define("PAGINA_ID57", 57);
define("PAGINA_ID58", 58);
define("PAGINA_ID59", 59);
define("PAGINA_ID60", 60);
define("PAGINA_ID61", 61);
define("PAGINA_ID62", 62);
define("PAGINA_ID63", 63);
define("PAGINA_ID64", 64);
define("PAGINA_ID65", 65);
define("PAGINA_ID66", 66);
define("PAGINA_ID67", 67);
define("PAGINA_ID68", 68);
define("PAGINA_ID69", 69);
define("PAGINA_ID70", 70);
define("PAGINA_ID71", 71);
define("PAGINA_ID72", 72);
define("PAGINA_ID73", 73);
define("PAGINA_ID74", 74);
define("PAGINA_ID75", 75);
define("PAGINA_ID76", 76);
define("PAGINA_ID77", 77);
define("PAGINA_ID78", 78);
define("PAGINA_ID79", 79);
define("PAGINA_ID80", 80);
define("PAGINA_ID81", 81);
define("PAGINA_ID82", 82);
define("PAGINA_ID83", 83);
define("PAGINA_ID84", 84);
define("PAGINA_ID85", 85);
define("PAGINA_ID86", 86);
define("PAGINA_ID87", 87);
define("PAGINA_ID88", 88);
define("PAGINA_ID89", 89);
define("PAGINA_ID90", 90);
define("PAGINA_ID91", 91);
define("PAGINA_ID92", 92);
define("PAGINA_ID93", 93);
define("PAGINA_ID94", 94);
define("PAGINA_ID95", 95);
define("PAGINA_ID96", 96);
define("PAGINA_ID97", 97);
define("PAGINA_ID98", 98);
define("PAGINA_ID99", 99);
define("PAGINA_ID100", 100);

// pagina do site
define("PAGINA_INICIAL", URL_SERVIDOR."/index.php");
define("PAGINA_ACOES", PASTA_ACOES."index.php");

// dados de desenvolvimento
define("DESENVOLVEDOR_SISTEMA", "Taimber Software");
define("DESENVOLVEDOR_SISTEMA_RODAPE", "<a href='http://www.taimber.com/' target='_blank' title='Taimber Software'>www.taimber.com</a>");
define("DESENVOLVEDOR_SISTEMA_AUTOR", "Salomão Francisco da Silva");

// configuracoes de perfil
define("TAMANHO_MINIMO_SENHA", 6);
define("COOKIES_DIAS_EXISTE", 30);
define("TAMANHO_ESCALA_IMG_PERFIL", 250);
define("TAMANHO_ESCALA_IMG_PERFIL_MINIATURA", 100);
define("TAMANHO_MAXIMO_CARACTERES_SOBRE_PERFIL_EXIBIR", 800);
define("TAMANHO_MAXIMO_NOME_USUARIO_CARACTERES", 50);

// configuracoes do sistema
define("CONFIG_NOME_COOKIE_EMAIL" , md5("cookie_email"));
define("CONFIG_NOME_COOKIE_SENHA" , md5("cookie_senha"));
define("CONFIG_TIMER", 5000);
define("CONFIG_TIMER_LONGO", 20000);
define("TEMPO_FICAR_OFFLINE", 30);
define("CONFIG_SESSAO_IDUSUARIO_CHAT", md5("CONFIG_SESSAO_IDUSUARIO_CHAT"));
define("CONFIG_LIMIT_CHAT", 1);
define("CONFIG_LIMIT_CHAT_INICIO", 20);
define("LIMIT_MAX_NUM_USUARIOS_CHAT", 12);
define("CONFIG_MD5_IDUSUARIO_CHAT", md5("CONFIG_MD5_IDUSUARIO_CHAT"));
define("CONFIG_LIMIT_CONVERSAS_CHAT", 1);
define("TAMANHO_RESOLUCAO_PADRAO", 1024);
define("DETECTOR_SESSAO_TAMANHO_RESOLUCAO", md5("DETECTOR_SESSAO_TAMANHO_RESOLUCAO"));
define("USAR_RESOLUCAO_SISTEMA", md5("USAR_RESOLUCAO_SISTEMA"));
define("CONFIG_ALTURA_CKEDITOR", 500);
define("CONFIG_LIMIT_IMAGENS_ALBUM", 8);
define("CONFIG_LIMIT_PUBLICACOES", 10);
define("CONFIG_NUMERO_PAGINAS_TROCA", 5);
define("CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO", true);
define("CONFIG_TAMANHO_DESCRICAO_PAGINA", 512);
define("CONFIG_LIMIT_RELACIONADOS", 4);
define("CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR", md5("CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR"));
define("CONFIG_LIMIT_ULTIMAS_NOVIDADES_MINIATURA", 2);
define("CONFIG_SOCIAL_PUBLICACAO_MINIATURA", true);
define("CONFIG_EXIBE_CAMPO_NOVIDADES", true);
define("CONFIG_PERMITE_ANUNCIOS", true);
define("CONFIG_EXIBE_IMAGEM_CAPA_POST", true);
define("CONFIG_EXIBE_WIDGET_ENTRE_POSTS", true);
define("CONFIG_EXIBE_WIDGET_POST", true);
define("CONFIG_EXIBE_RODAPE_MODO_RESOLUCAO", true);
define("CONFIG_SIMULA_MOBILE", false);

// variaveis de sessao
define("CONFIG_SESSAO_1", md5("S0"));

// carrega o arquivo de idioma
include_once("idioma_pt_br.php");

// url de pagina href
$url_pagina_href = URL_SERVIDOR."/index.php?";

// paginas href
$pagina_href[0] = URL_SERVIDOR;
$pagina_href[1] = "$url_pagina_href$requeste[0]=$idioma[14]";
$pagina_href[2] = "$url_pagina_href$requeste[0]=$idioma[15]";
$pagina_href[3] = "$url_pagina_href$requeste[0]=$idioma[31]";
$pagina_href[4] = "$url_pagina_href$requeste[0]=$idioma[32]";
$pagina_href[5] = "$url_pagina_href$requeste[0]=$idioma[33]";
$pagina_href[6] = "$url_pagina_href$requeste[0]=$idioma[34]";
$pagina_href[7] = "$url_pagina_href$requeste[0]=$idioma[35]";
$pagina_href[8] = "$url_pagina_href$requeste[0]=$idioma[36]";
$pagina_href[9] = "$url_pagina_href$requeste[0]=$idioma[37]";
$pagina_href[10] = "$url_pagina_href$requeste[0]=$idioma[38]";
$pagina_href[11] = "$url_pagina_href$requeste[0]=$idioma[39]";
$pagina_href[12] = "$url_pagina_href$requeste[0]=$idioma[40]";
$pagina_href[13] = "$url_pagina_href$requeste[0]=$idioma[41]";
$pagina_href[14] = "$url_pagina_href$requeste[0]=$idioma[42]";
$pagina_href[15] = "$url_pagina_href$requeste[0]=$idioma[43]";
$pagina_href[16] = "$url_pagina_href$requeste[0]=$idioma[44]";
$pagina_href[17] = "$url_pagina_href$requeste[0]=$idioma[72]";
$pagina_href[18] = "$url_pagina_href$requeste[0]=$idioma[73]";
$pagina_href[19] = "$url_pagina_href$requeste[0]=$idioma[74]";
$pagina_href[20] = "$url_pagina_href$requeste[0]=$idioma[75]";
$pagina_href[21] = "$url_pagina_href$requeste[0]=$idioma[76]";
$pagina_href[22] = "$url_pagina_href$requeste[0]=$idioma[77]";
$pagina_href[23] = "$url_pagina_href$requeste[0]=$idioma[78]";
$pagina_href[24] = "$url_pagina_href$requeste[0]=$idioma[79]";
$pagina_href[25] = "$url_pagina_href$requeste[0]=$idioma[80]";
$pagina_href[26] = "$url_pagina_href$requeste[0]=$idioma[81]";
$pagina_href[27] = "$url_pagina_href$requeste[0]=$idioma[77]";
$pagina_href[28] = "$url_pagina_href$requeste[0]=$idioma[224]";
$pagina_href[29] = "$url_pagina_href$requeste[0]=$idioma[4]";
$pagina_href[30] = "$url_pagina_href$requeste[0]=$idioma[226]";
$pagina_href[31] = "$url_pagina_href$requeste[9]=1";
$pagina_href[32] = "$url_pagina_href$requeste[9]=2";
$pagina_href[33] = "$url_pagina_href$requeste[0]=$idioma[42]";
$pagina_href[34] = "$url_pagina_href$requeste[0]=$idioma[88]";
$pagina_href[35] = "$url_pagina_href$requeste[0]=xx";
$pagina_href[36] = "$url_pagina_href$requeste[0]=xx";
$pagina_href[37] = "$url_pagina_href$requeste[0]=xx";
$pagina_href[38] = "$url_pagina_href$requeste[0]=xx";
$pagina_href[39] = "$url_pagina_href$requeste[0]=xx";
$pagina_href[40] = "$url_pagina_href$requeste[0]=xx";

// temas disponiveis
$tema_disponivel[0] = PASTA_TEMAS_HOST."blogdajehsoares/tema.css";

// dados de sessao
define(SESSAO_CONTADOR_ITERACAO, md5("campo_sessao_0"));

?>