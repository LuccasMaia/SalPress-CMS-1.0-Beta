<?php

// ativa o buffer de saida e envia a funcao ob_gzhandler para compactar dados
ob_start("ob_gzhandler"); 

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/home/servidor/servidor.php";

// adiciona servidor
include_once($caminho);

// carrega dependencias php
include_once(ARQUIVO_PHP);

// tipo de pagina
switch(retorne_href_get()){


	case PAGINA_ID1:
	$conteudo_pagina = cadastro_usuario();
	break;


	case PAGINA_ID2:
	$conteudo_pagina = logar_usuario();
	break;


	case PAGINA_ID3:
	$conteudo_pagina = publicar_conteudo();

	// chama a pagina de postagem
	chama_pagina_especifica($pagina_href[3]);

	// saindo
	die;

	break;


	case PAGINA_ID4:
	$conteudo_pagina = upload_imagens_slideshow();
	break;


	case PAGINA_ID5:
	$conteudo_pagina = carregar_slideshow();
	break;


	case PAGINA_ID6:
	$conteudo_pagina = atualizar_descricao_imagem_slideshow();
	break;


	case PAGINA_ID7:
	$conteudo_pagina = carrega_publicacoes_miniatura();
	break;


	case PAGINA_ID8:
	// faz o upload de imagens para galeria
	$conteudo_pagina = upload_imagens_galeria();
	break;


	case PAGINA_ID9:
	$conteudo_pagina = adiciona_categoria();
	break;


	case PAGINA_ID10:
	$conteudo_pagina = excluir_categoria();
	break;


	case PAGINA_ID11:
	$conteudo_pagina = atualizar_categoria();
	break;


	case PAGINA_ID12:
	$conteudo_pagina = adiciona_item_menu();
	break;


	case PAGINA_ID13:
	$conteudo_pagina = carregar_submenus_criar();
	break;


	case PAGINA_ID14:
	$conteudo_pagina = excluir_item_menu();
	break;


	case PAGINA_ID15:
	$conteudo_pagina = salvar_rodape();
	break;


	case PAGINA_ID16:
	$conteudo_pagina = salvar_subrodape();
	break;


	case PAGINA_ID17:
	$conteudo_pagina = adicionar_bloco();
	break;


	case PAGINA_ID18:
	$conteudo_pagina = excluir_bloco();
	break;


	case PAGINA_ID19:
	$conteudo_pagina = adicionar_bloco_topo();
	chama_pagina_especifica($pagina_href[10]);
	break;


	case PAGINA_ID20:
	$conteudo_pagina = excluir_bloco_topo();
	break;


	case PAGINA_ID21:
	$conteudo_pagina = atualizar_item_menu();
	break;


	case PAGINA_ID22:
	$conteudo_pagina = carrega_titulo_link_menu();
	break;


	case PAGINA_ID23:
	$conteudo_pagina = excluir_publicacao();
	break;


	case PAGINA_ID24:
	$conteudo_pagina = upload_imagens_album();
	break;


	case PAGINA_ID25:
	$conteudo_pagina = atualizar_publicacao();
	break;


	case PAGINA_ID26:
	$conteudo_pagina = excluir_imagem_publicacao();
	break;


	case PAGINA_ID27:
	$conteudo_pagina = excluir_imagem_slideshow();
	break;


	case PAGINA_ID28:
	$conteudo_pagina = envia_dados_formulario_contato_admin();
	break;


	case PAGINA_ID29:
	$conteudo_pagina = carregar_imagens_galeria();
	break;


	case PAGINA_ID30:
	$conteudo_pagina = envia_dados_formulario_orcamento();
	break;


	case PAGINA_ID31:
	$conteudo_pagina = salva_widget_meio();
	break;


	case PAGINA_ID32:
	$conteudo_pagina = salvar_perfil_usuario();
	break;


	case PAGINA_ID33:
	$conteudo_pagina = upload_imagem_perfil();
	break;


	case PAGINA_ID34:
	$conteudo_pagina = recorta_imagem_usuario();
	break;


	case PAGINA_ID35:
	$conteudo_pagina = atualiza_conexao_usuario();
	break;


	case PAGINA_ID36:
	$conteudo_pagina = retorne_numero_amigos_online();
	break;


	case PAGINA_ID37:
	$conteudo_pagina = constroe_lista_usuarios_chat();
	break;


	case PAGINA_ID38:
	$conteudo_pagina = usuario_online_offline_chat();
	break;


	case PAGINA_ID39:
	$conteudo_pagina = enviar_conversa_chat();
	break;


	case PAGINA_ID40:
	$conteudo_pagina = seta_usuario_chat();
	break;


	case PAGINA_ID41:
	$conteudo_pagina = carrega_conversas_chat();
	break;


	case PAGINA_ID42:
	$conteudo_pagina = carrega_informacoes_usuario_chat();
	break;


	case PAGINA_ID43:
	$conteudo_pagina = carregar_historico_chat();
	break;


	case PAGINA_ID44:
	$conteudo_pagina = excluir_historico_chat();
	break;


	case PAGINA_ID45:
	$conteudo_pagina = fechar_janela_conversa_chat();
	break;


	case PAGINA_ID46:
	$conteudo_pagina = abrir_janela_conversa_chat();
	break;


	case PAGINA_ID47:
	$conteudo_pagina = alterar_senha_usuario();
	break;


	case PAGINA_ID48:
	$conteudo_pagina = excluir_conta_usuario();
	break;


	case PAGINA_ID49:
	$conteudo_pagina = sessao_idioma_atualizar();
	break;


	case PAGINA_ID50:
	$conteudo_pagina = detecta_resolucao_pagina();
	break;


	case PAGINA_ID51:
	$conteudo_pagina = recuperar_conta_usuario();
	break;


	case PAGINA_ID52:
	$conteudo_pagina = salva_widget();
	break;


	case $idioma[72]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[73]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[74]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[76]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[77]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[78]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[79]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case $idioma[80]:
	$conteudo_pagina = carregar_conteudo_bloco();
	break;


	case PAGINA_ID53:
	$conteudo_pagina = salvar_descricao_imagem_publicacao();
	break;


	case PAGINA_ID54:
	$conteudo_pagina = salva_widget_topo();
	break;


	case PAGINA_ID55:
	$conteudo_pagina = criar_novo_album();
	break;


	case PAGINA_ID56:
	$conteudo_pagina = carregar_albuns();
	break;


	case PAGINA_ID57:
	$conteudo_pagina = atualizar_titulo_album();
	break;


	case PAGINA_ID58:
	$conteudo_pagina = excluir_album_imagem();
	break;


	case PAGINA_ID59:
	// salva e redireciona
	salvar_sobre_site();

	// saindo do script atual...
	die;
	break;

	case PAGINA_ID60:
	$conteudo_pagina = criar_anuncio_postagem();
	break;

	case PAGINA_ID61:
	$conteudo_pagina = salvar_widget_postagem();
	break;
	
};

// exibe o conteudo
echo $conteudo_pagina;

// finaliza o buffer de dados
ob_end_flush(); 

?>