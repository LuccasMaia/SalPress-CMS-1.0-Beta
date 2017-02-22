
function atualizar_titulo_album(idcampo_1, idalbum){
var campo_1 = document.getElementById(idcampo_1).value;
$.post(v_pagina_acoes, {href: 57, idalbum: idalbum, nome_album: campo_1}, function(retorno){
});
};
function carregar_albuns(id_campo_carregar){
$.post(v_pagina_acoes, {contador_avanco_conteudo: v_contador_avanco_galeria_imagens_album, href: 56}, function(retorno){
if(retorno.length != 0){
v_contador_avanco_galeria_imagens_album += v_limit_imagens_album;
$(retorno).appendTo("#" + id_campo_carregar);
};
});
};
function carregar_imagens_galeria(id_campo_carregar, idalbum){
$.post(v_pagina_acoes, {contador_avanco_conteudo: v_contador_avanco_galeria_imagens_album, idalbum: idalbum, href: 29}, function(retorno){
if(retorno.length != 0){
	v_contador_avanco_galeria_imagens_album += v_limit_imagens_album;
	$(retorno).appendTo("#" + id_campo_carregar);
};
});
};
function criar_novo_album(idcampo_1){
var v_nome_album = document.getElementById(idcampo_1).value;
if(v_nome_album.length == 0){
    document.getElementById(idcampo_1).focus();
    return null;
};
$.post(v_pagina_acoes, {href: 55, nome_album: v_nome_album}, function(retorno){
    location.reload();
});
};
function excluir_album_imagem(id, idcampo){
$.post(v_pagina_acoes, {href: 58, idalbum: id}, function(retorno){
    $("#" + idcampo).remove();
});
};
function criar_anuncio_postagem(idconteudo){
var conteudo = document.getElementById(idconteudo).value;
$.post(v_pagina_acoes, {href: 60, conteudo: conteudo}, function(retorno){
	location.reload();
});
};
function adicionar_bloco(idcampo_1, idcampo_2, idcampo_3, id){
var campo_1 = document.getElementById(idcampo_1).value;
var campo_2 = document.getElementById(idcampo_2).value;
var campo_3 = CKEDITOR.instances[idcampo_3].getData();
$.post(v_pagina_acoes, {href: 17, titulo: campo_1, subtitulo: campo_2, conteudo: campo_3, id: id}, function(retorno){
    location.reload();
});
};
function excluir_bloco(id, idbloco){
$.post(v_pagina_acoes, {href: 18, id: id}, function(retorno){
    location.reload();
});
};
function excluir_bloco_topo(id, idbloco){
$.post(v_pagina_acoes, {href: 20, id: id}, function(retorno){
    location.reload();
});
};
function cadastro_usuario(){
var email = document.getElementById("id_email_login").value;
var senha = document.getElementById("id_senha_login").value;
$.post(v_pagina_acoes, {href: 1, email: email, senha: senha}, function(retorno){
	if(retorno == 1){
		window.open(v_url_servidor, "_self")
	}else{
		document.getElementById("id_mensagem_login_cadastro").innerHTML = retorno;
	};
});
};
function adiciona_categoria(id_elemento_nome_categoria, id_elemento_categorias){
var v_campo_categoria = document.getElementById(id_elemento_nome_categoria).value;
document.getElementById(id_elemento_nome_categoria).value = null;
document.getElementById(id_elemento_nome_categoria).focus();
if(v_campo_categoria.length == 0){
    return null;
};
$.post(v_pagina_acoes, {href: 9, campo_categoria: v_campo_categoria}, function(retorno){
    $("#" + id_elemento_categorias).html(retorno);
});
};
function alterar_id_campo_select_categoria(campo_1, campo_2, campo_3){
var select_option = document.getElementById(campo_1);
document.getElementById(campo_3).value = document.getElementById(campo_1).value;
document.getElementById(campo_2).value = select_option.options[select_option.selectedIndex].text;
};
function atualizar_categoria(idcampo_1, idcampo_2, id){
var v_nome_categoria = document.getElementById(idcampo_1).value;
var v_cor_categoria = document.getElementById(idcampo_2).value;
$.post(v_pagina_acoes, {href: 11, nome_categoria: v_nome_categoria, cor_categoria: v_cor_categoria, id_categoria: id}, function(retorno){
});
};
function excluir_categoria(id){
$.post(v_pagina_acoes, {href: 10, id:id}, function(retorno){
    location.reload();
});
};
function abrir_janela_conversa_chat(){
$.post(v_pagina_acoes, {href: 46}, function(retorno){
	if(retorno == true){
		document.getElementById("id_div_janela_conversa_chat_usuario").style.display = "inline";
	}else{
		document.getElementById("id_div_janela_conversa_chat_usuario").style.display = "none";
	};
});
};
function alterar_senha_usuario(){
senha_atual = document.getElementById("campo_altera_senha_atual").value;
nova_senha = document.getElementById("campo_altera_senha_nova").value;
nova_senha_confirma = document.getElementById("campo_altera_senha_confirma").value;
$.post(v_pagina_acoes, {nova_senha_confirma: nova_senha_confirma, nova_senha: nova_senha, senha_atual: senha_atual, href: 47}, function(retorno){
	location.reload();
});
};
function carregar_historico_chat(){
$.post(v_pagina_acoes, {contador_avanco_chat: contador_avanco_historico_chat, href: 43}, function(retorno){
	if(retorno != -1){
		$(retorno).appendTo('#id_div_mensagens_historico_chat');
		contador_avanco_historico_chat += v_limit_chat_usuario;
	};
});
};
function carrega_atualizacoes_chat(){
carrega_numero_usuarios_online_chat();
carrega_conversas_chat();
carrega_informacoes_usuario_chat();
abrir_janela_conversa_chat();
usuario_online_offline_chat();
};
function carrega_conversas_chat(){
$.post(v_pagina_acoes, {dataType : "json", contador_avanco_chat: contador_avanco_mensagens_chat, href: 41}, function(retorno){
	var objeto = jQuery.parseJSON(retorno);
	var conteudo = objeto['conteudo'];
	var contador = objeto['contador'];
	if(contador_avanco_mensagens_chat == 0){
		contador_avanco_mensagens_chat = contador;
	};
	if(parseInt(conteudo) != -1){
		contador_avanco_mensagens_chat += v_limit_chat_conversas;
		$(conteudo).appendTo('#id_div_conversas_usuario_chat');
		move_scroll_conversas_chat();
	};
});
};
function carrega_informacoes_usuario_chat(){
$.post(v_pagina_acoes, {dataType : "json", href: 42}, function(retorno){
	var objeto = jQuery.parseJSON(retorno);
	var nome = objeto['nome'];
	var online_offline = objeto['online_offline'];
	document.getElementById("id_span_nome_usuario_conversando").innerHTML = nome;
	document.getElementById("id_span_online_offline_usuario_conversando").innerHTML = online_offline;
});
};
function carrega_numero_usuarios_online_chat(){
$.post(v_pagina_acoes, {href: 36}, function(retorno){
	document.getElementById("id_span_num_usuarios_online_chat").innerHTML = retorno;
});
};
function constroe_lista_usuarios_chat(){
$.post(v_pagina_acoes, {contador_avanco_chat: contador_avanco_chat, dataType : "json", href: 37}, function(retorno){
	var objeto = jQuery.parseJSON(retorno);
	var conteudo = objeto['conteudo'];
	var ids_usuarios = objeto['ids_usuarios'];
	for(index = 0; index < ids_usuarios.length; index++) {
		var idamigo = parseInt(ids_usuarios[index]);
		if(array_usuarios_chat.indexOf(parseInt(idamigo)) == -1 && idamigo != 0){
			array_usuarios_chat[index] = idamigo;
		};
	};
	if(conteudo.length != 0){
		contador_avanco_chat += v_limit_chat_usuario;
	};
	if(document.getElementById("id_div_chat_usuario_amigos_chat").innerHTML != null){
		$(conteudo).appendTo('#id_div_chat_usuario_amigos_chat');
	}else{
		document.getElementById("id_div_chat_usuario_amigos_chat").innerHTML = conteudo;
	};
});
};
function enviar_conversa_chat(){
conteudo = document.getElementById("id_campo_entrada_conversa_chat").value;
if(conteudo.length == 0){
	return false;
};
$.post(v_pagina_acoes, {conteudo: conteudo, href: 39}, function(retorno){
	document.getElementById("id_campo_entrada_conversa_chat").value = "";
	document.getElementById("id_campo_entrada_conversa_chat").focus();
});
};
function excluir_historico_chat(){
$.post(v_pagina_acoes, {href: 44}, function(retorno){
	contador_avanco_mensagens_chat = 0;
	document.getElementById("id_div_conversas_usuario_chat").innerHTML = "";
	document.getElementById("id_div_mensagens_historico_chat").innerHTML = "";
	document.getElementById("id_campo_entrada_conversa_chat").focus();
	document.getElementById("id_campo_entrada_conversa_chat").value = "";
	contador_avanco_historico_chat = 0;
	fechar_janela_mensagem_dialogo();
});
};
function fechar_janela_conversa_chat(){
$.post(v_pagina_acoes, {href: 45}, function(retorno){
	document.getElementById("id_div_janela_conversa_chat_usuario").style.display = "none";
});
};
function minimiza_janela_chat_usuario(){
if(document.getElementById("id_div_chat_usuario_amigos_chat").style.display.length == 0){
	document.getElementById("id_div_chat_usuario_amigos_chat").style.display = "none";
	document.getElementById("id_div_amigos_usuario_chat").style.display = "none";
	document.getElementById("id_div_chat_usuario_opcoes").style.bottom = 0;
};
if(document.getElementById("id_div_chat_usuario_amigos_chat").style.display != "none"){
	document.getElementById("id_div_chat_usuario_amigos_chat").style.display = "none";
	document.getElementById("id_div_amigos_usuario_chat").style.display = "none";
	document.getElementById("id_div_chat_usuario_opcoes").style.bottom = 0;
}else{
	document.getElementById("id_div_chat_usuario_amigos_chat").style.display = "inline";
	document.getElementById("id_div_amigos_usuario_chat").style.display = "inline";
	document.getElementById("id_div_chat_usuario_opcoes").style.bottom = 460;
};
};
function move_scroll_conversas_chat(){
var objDiv = document.getElementById("id_div_conversas_usuario_chat");
objDiv.scrollTop = objDiv.scrollHeight;
};
function seta_usuario_chat(idusuario){
$.post(v_pagina_acoes, {uid: idusuario, href: 40}, function(retorno){
	contador_avanco_mensagens_chat = 0;
	document.getElementById("id_div_conversas_usuario_chat").innerHTML = "";
	document.getElementById("id_div_mensagens_historico_chat").innerHTML = "";
	document.getElementById("id_campo_entrada_conversa_chat").value = "";
	contador_avanco_historico_chat = 0;
	document.getElementById("id_div_janela_conversa_chat_usuario").style.display = "inline";
	document.getElementById("id_campo_entrada_conversa_chat").focus();
});
};
function usuario_online_offline_chat(){
for(index = 0; index < array_usuarios_chat.length; index++) {
	var idamigo = parseInt(array_usuarios_chat[index]);
	if(idamigo != null){
		$.post(v_pagina_acoes, {uid: idamigo, href: 38, dataType : "json"}, function(retorno){
		var objeto = jQuery.parseJSON(retorno);
		var conteudo = objeto['conteudo'];
		var idusuario = objeto['idusuario'];
		var numero_mensagens = objeto['numero_mensagens'];
		document.getElementById("id_div_usuario_online_offline_" + idusuario).innerHTML = conteudo;
		document.getElementById("id_numero_novas_mensagens_usuario_" + idusuario).innerHTML = numero_mensagens;
		if(numero_mensagens > 0){
			document.getElementById("id_numero_novas_mensagens_usuario_" + idusuario).style.display = "inline";
		}else{
			document.getElementById("id_numero_novas_mensagens_usuario_" + idusuario).style.display = "none";
		};
	});
};
};
};
function atualiza_conexao_usuario(){
$.post(v_pagina_acoes, {href: 35}, function(retorno){
});
};
function carrega_conteudo(){
carrega_publicacoes_miniatura();
};
function dialogo_editar_bloco(idcampo){
document.getElementById(idcampo).style.display = "block";
};
function dialogo_editar_elemento_bloco(identificador){
document.getElementById("id_dialogo_editar_elemento_bloco_" + identificador).style.display = "inline";
};
function dialogo_editar_imagem_publicacao(identificador){
document.getElementById("campo_descricao_imagem_" + identificador).style.display = "inline";
};
function dialogo_editar_perfil_excluir_conta(){
document.getElementById("dialogo_editar_perfil_excluir_conta").style.display = "inline";
};
function dialogo_editar_perfil_usuario(){
document.getElementById("dialogo_editar_perfil_usuario").style.display = "inline";
};
function dialogo_editar_perfil_usuario_imagem(){
document.getElementById("dialogo_editar_perfil_usuario_imagem").style.display = "inline";
};
function dialogo_editar_perfil_usuario_informacoes(){
document.getElementById("dialogo_editar_perfil_usuario_informacoes").style.display = "inline";
};
function dialogo_editar_perfil_usuario_senha(){
document.getElementById("dialogo_editar_perfil_usuario_senha").style.display = "inline";
};
function dialogo_excluir_album(idcampo){
document.getElementById(idcampo).style.display = "block";
};
function dialogo_excluir_bloco(id_dialogo){
document.getElementById(id_dialogo).style.display = "block";
};
function dialogo_excluir_categoria(id_dialogo){
document.getElementById(id_dialogo).style.display = "block";	
};
function dialogo_excluir_elemento_bloco(identificador){
document.getElementById("id_dialogo_excluir_elemento_bloco_" + identificador).style.display = "inline";
};
function dialogo_excluir_funcionario(id_funcionario){
document.getElementById("id_dialogo_excluir_funcionario_" + id_funcionario).style.display = "inline";
};
function dialogo_excluir_imagem_galeria(identificador){
document.getElementById(identificador).style.display = "inline";
};
function dialogo_excluir_imagem_publicacao(identificador){
document.getElementById("dialogo_excluir_imagem_publicacao_" + identificador).style.display = "inline";
};
function dialogo_excluir_imagem_slideshow(identificador){
document.getElementById("dialogo_excluir_imagem_slideshow_" + identificador).style.display = "inline";
};
function dialogo_excluir_menu(idcampo){
document.getElementById(idcampo).style.display = "block";
};
function dialogo_excluir_publicacao(identificador){
document.getElementById("id_dialogo_excluir_publicacao_" + identificador).style.display = "inline";
};
function dialogo_historico_conversa_chat(){
contador_avanco_historico_chat = 0;
document.getElementById("id_div_mensagens_historico_chat").innerHTML = "";
document.getElementById("id_dialogo_historico_conversas").style.display = "inline";
carregar_historico_chat();
};
function dialogo_limpar_historico_chat(){
document.getElementById("id_dialogo_historico_conversas_limpar").style.display = "inline";
};
function fechar_janela_mensagem_dialogo(id_janela){
document.getElementById(id_janela).style.display = "none";
};
function janela_mensagem_dialogo_excluir_album(identificador){
document.getElementById("div_excluir_album_" + identificador).style.display = "inline";
};
function excluir_imagem_galeria_imagens(id, idcampo_1){
id = parseInt(id);
$.post(v_pagina_acoes, {id: id, href: 26}, function(retorno){
    document.getElementById("id_div_imagem_galeria_" + id).style.display = "none";
});
fechar_janela_mensagem_dialogo(idcampo_1);
};
function salvar_descricao_imagem_galeria(id){
conteudo = document.getElementById("id_campo_conteudo_descricao_imagem_galeria_" + id).value;
$.post(v_pagina_acoes, {id: id, conteudo: conteudo, href: 17}, function(retorno){
});
};
function copyToClipboard(elementId) {
  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);
};
function logar_usuario(){
var email = document.getElementById("id_email_login").value;
var senha = document.getElementById("id_senha_login").value;
$.post(v_pagina_acoes, {href: 2, email: email, senha: senha}, function(retorno){
	if(retorno == 1){
		window.open(v_url_servidor, "_self")
	}else{
		document.getElementById("id_mensagem_login_cadastro").innerHTML = retorno;
	};
});
};
function adiciona_item_menu(idcampo_1, idcampo_2, tipo_menu){
var campo_1 = document.getElementById(idcampo_1).value;
var campo_2 = document.getElementById(idcampo_2).value;
if(campo_1.length == 0){
    document.getElementById(idcampo_1).focus();
};
if(campo_2.length == 0){
    document.getElementById(idcampo_2).focus();
};
if(campo_1.length == 0 || campo_2.length == 0){
    return null;
};
document.getElementById(idcampo_1).value = null;
document.getElementById(idcampo_2).value = null;
$.post(v_pagina_acoes, {href: 12, titulo_menu: campo_1, link_menu: campo_2, tipo_menu: tipo_menu, id: v_idmenu_usando}, function(retorno){
    location.reload();
});
};
function atualizar_item_menu(idcampo1, idcampo2, modo){
var campo_1 = document.getElementById(idcampo1).value;
var campo_2 = document.getElementById(idcampo2).value;
switch(parseInt(modo)){
    case 1:
	var v_id = v_idmenu_usando;
    break;
	case 2:
	var v_id = v_idsubmenu_usando;
	break;
};
$.post(v_pagina_acoes, {href: 21, titulo: campo_1, link: campo_2, id: v_id, modo: modo}, function(retorno){
});
};
function atualizar_submenu_usando(idcampo, idcampo_1, idcampo_2){
v_idsubmenu_usando = document.getElementById(idcampo).value;
carrega_titulo_link_menu(v_idsubmenu_usando, idcampo_1, idcampo_2, 2);
};
function carregar_submenus_criar(idcampo_1, idcampo_2, idcampo_3, idcampo_4){
var v_id = document.getElementById(idcampo_1).value;
v_idmenu_usando = v_id;
$.post(v_pagina_acoes, {href: 13, id: v_id}, function(retorno){
    $("#" + idcampo_2).html(retorno);
});
carrega_titulo_link_menu(v_idmenu_usando, idcampo_3, idcampo_4, 1);
};
function carrega_titulo_link_menu(idcampo, idcampo_1, idcampo_2, modo){
$.post(v_pagina_acoes, {href: 22, id: idcampo, modo: modo, dataType : "json"}, function(retorno){
	var objeto = jQuery.parseJSON(retorno);
	var titulo_menu = objeto['titulo_menu'];
	var link_menu = objeto['link_menu'];
	document.getElementById(idcampo_1).value = titulo_menu;
	document.getElementById(idcampo_2).value = link_menu;
});
};
function excluir_item_menu(modo){
$.post(v_pagina_acoes, {href: 14, idmenu: v_idmenu_usando, id_submenu: v_idsubmenu_usando, modo: modo}, function(retorno){
    location.reload();
});
};
function atualizar_publicacao(id, id_select){
var select_option = document.getElementById(id_select);
var titulo = document.getElementById("id_publicacao_titulo_" + id).value;
var conteudo = CKEDITOR.instances["id_publicacao_conteudo_" + id].getData();
var tipo_post = document.getElementById("id_tipo_post_publicacao_pagina").value;
var v_categoria_postagem = select_option.options[select_option.selectedIndex].text;
$.post(v_pagina_acoes, {post: id, titulo: titulo, conteudo: conteudo, categoria_postagem: v_categoria_postagem, tipo_post: tipo_post, href: 25}, function(retorno){
    location.reload();
});
};
function carrega_publicacoes_miniatura(){
if($("#id_div_campo_destaque").length == 0){
    return false;
};
$.post(v_pagina_acoes, {pesq: pesq, categoria: v_categoria_atual, contador_avanco_conteudo: v_contador_avanco_publicacoes, tipo_post: v_tipo_post, href: 7}, function(retorno){
	if(v_backup_publicacoes == retorno){
		return null;
	};
	v_backup_publicacoes = retorno;
	if(retorno.length > 0){
		v_contador_avanco_publicacoes += v_limit_publicacoes;
		$(retorno).appendTo('#id_div_campo_destaque');
	};
});
};
function excluir_imagem_publicacao(id){
$.post(v_pagina_acoes, {id: id, href: 26}, function(retorno){
	document.getElementById("div_imagem_publicacao_" + id).style.display = "none";
});
fechar_janela_mensagem_dialogo();
};
function excluir_publicacao(id){
$.post(v_pagina_acoes, {post: id, href: 23}, function(retorno){
    location.reload();
});
};
function visualizar_imagens_upload_postagem() {
document.getElementById("div_imagens_pre_publicacao").style.display = "table";
var files = elemento_file_campo_publicar.files;
for(var i = 0, f; f = files[i]; i++) {
if(!f.type.match('image.*')) {
continue;
}
var reader = new FileReader();
reader.onload = (function(theFile) {
return function(e) {
var div = document.createElement('div');
div.innerHTML = ['<img class="classe_imagem_pre_upload_post" src="', e.target.result, '"/>'].join('');
document.getElementById('div_imagens_pre_publicacao').insertBefore(div, null);
};
})
(f);
reader.readAsDataURL(f);
}
}
function salvar_descricao_imagem_publicacao(id){
var v_conteudo = document.getElementById("textarea_descricao_imagem_publicacao_" + id).value;
$.post(v_pagina_acoes, {id: id, conteudo: v_conteudo, href: 53}, function(retorno){
	location.reload();
});
};
function seleciona_imagens_publicacao_usuario(){
document.getElementById("div_imagens_pre_publicacao").innerHTML = "";
document.getElementById("elemento_file_campo_publicar").value = "";
document.getElementById("elemento_file_campo_publicar").click();
};
function detecta_resolucao_pagina(){
var largura = window.screen.availWidth;
$.post(v_pagina_acoes, {largura: largura, href: 50}, function(retorno){
	if(retorno == 1){
		location.reload();
	};
});
};
function salvar_subrodape(idcampo){
var conteudo = CKEDITOR.instances[idcampo].getData();
$.post(v_pagina_acoes, {href: 16, conteudo: conteudo}, function(retorno){
    location.reload();
});
};
function atualizar_descricao_imagem_slideshow(id){
var comentario = document.getElementById("id_campo_comentario_imagem_slideshow").value;
var v_url = document.getElementById("id_campo_url_imagem_slideshow").value;
$.post(v_pagina_acoes, {id: id, comentario: comentario, url: v_url, href: 6}, function(retorno){
});
};
function avanca_slideshow(modo){
pausar_slideshow(0);
if(modo == 2 && v_contador_slideshow >= 2){
	v_contador_slideshow -= 2;
};
if(v_contador_slideshow >= 0){
	carregar_slideshow();
};
};
function carregar_slideshow(){
if(v_slideshow_pausado == 1){
	return null;
};
$.post(v_pagina_acoes, {dataType : "json", avanco_contador: v_contador_slideshow, href: 5}, function(retorno){
	var objeto = jQuery.parseJSON(retorno);
	if(objeto['imagem'] == -1){
		v_contador_slideshow = 0;
	}else{
		v_contador_slideshow++;
	};
	if(objeto['imagem'] != -1){
		document.getElementById("id_div_slide_show_imagem").innerHTML = objeto['imagem'];
		document.getElementById("id_div_slide_show_comentario").innerHTML = objeto['comentario'];
	};
});
};
function excluir_imagem_slideshow(id){
$.post(v_pagina_acoes, {id: id, href: 27}, function(retorno){
	location.reload();
});
};
function pausar_slideshow(modo){
v_slideshow_pausado = modo;
};
function excluir_conta_usuario(){
senha_atual = document.getElementById("campo_senha_excluir_conta").value;
$.post(v_pagina_acoes, {senha_atual: senha_atual, href: 48}, function(retorno){
	location.reload();
});
};
function recuperar_conta_usuario(){
email = document.getElementById("campo_email_recuperar_conta_usuario").value;
$.post(v_pagina_acoes, {email: email, href: 51}, function(retorno){
if(retorno != -1){
	alert(retorno);
};
location.reload();
});
};
function salvar_perfil_usuario(){
nome_perfil_salvar = document.getElementById("id_nome_perfil_salvar").value;
endereco_perfil_salvar = document.getElementById("id_endereco_perfil_salvar").value;
cidade_perfil_salvar = document.getElementById("id_cidade_perfil_salvar").value;
estado_perfil_salvar = document.getElementById("id_estado_perfil_salvar").value;
telefone_perfil_salvar = document.getElementById("id_telefone_perfil_salvar").value;
sobre_perfil_salvar = document.getElementById("id_sobre_perfil_salvar").value;
$.post(v_pagina_acoes, {nome_perfil_salvar, endereco_perfil_salvar, cidade_perfil_salvar, estado_perfil_salvar, telefone_perfil_salvar, sobre_perfil_salvar: sobre_perfil_salvar, href: 32}, function(retorno){
	location.reload();
});
};
function salva_widget(){
conteudo = document.getElementById("id_campo_textarea_widget").value;
$.post(v_pagina_acoes, {conteudo: conteudo, href: 52}, function(retorno){
});
};
function salva_widget_meio(idcampo_1){
conteudo = document.getElementById(idcampo_1).value;
$.post(v_pagina_acoes, {conteudo: conteudo, href: 31}, function(retorno){
});
};
function salva_widget_topo(){
conteudo = document.getElementById("id_campo_textarea_widget_topo").value;
$.post(v_pagina_acoes, {conteudo: conteudo, href: 54}, function(retorno){
});
};
function salvar_widget_postagem(idcampo_1){
var conteudo = CKEDITOR.instances[idcampo_1].getData();
$.post(v_pagina_acoes, {href: 61, conteudo: conteudo}, function(retorno){
    location.reload();
});
};
