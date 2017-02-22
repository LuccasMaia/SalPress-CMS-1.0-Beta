<?php 
function retorne_usuario_colaborador(){
global $email_colaborador;
$email_cookie = retorne_email_cookie();
if(retorne_usuario_logado() == false){
        return false;	
};
foreach($email_colaborador as $email){
		if($email == $email_cookie){
				return true;
	};
};
return false;
};
function campo_opcao_administrador(){
global $idioma;
if(retorne_usuario_administrador() == false and retorne_href_get() != $idioma[41] and retorne_usuario_colaborador() == false){
		return null;	
};
if(retorne_href_get() != $idioma[31] and retorne_href_get() != $idioma[41] and retorne_href_get() != null and retorne_usuario_administrador() == false){
		return mensagem_sistema($idioma[70]);	
};
switch(retorne_href_get()){
	case $idioma[31]:
	$conteudo = constroe_campo_publicar();
	break;
	case $idioma[32]:
	$conteudo = constroe_criar_slideshow();
	break;
	case $idioma[33]:
	$conteudo = constroe_criar_categoria();
	break;
	case $idioma[34]:
	$conteudo = constroe_criar_menus();
	break;
	case $idioma[35]:
	$conteudo = constroe_editar_rodape();
	break;
	case $idioma[36]:
	$conteudo = editar_mensagem_subrodape();
	break;
	case $idioma[37]:
	$conteudo = editar_blocos(null);
	break;
	case $idioma[38]:
	$conteudo .= editar_blocos_topo(null);
	$conteudo .= carrega_blocos_topo();
	break;
	case $idioma[39]:
	$conteudo = constroe_albuns_imagens();
	break;
	case $idioma[40]:
	$conteudo = campo_gerenciar_imagens_album();
	break;
	case $idioma[41]:
	$conteudo = constroe_perfil_basico();
	break;
	case $idioma[224]:
	$conteudo .= campo_widget();
		if(CONFIG_EXIBE_WIDGET_TOPO == true){
	$conteudo .= campo_widget_topo();
	};
	break;
	case $idioma[226]:
	$conteudo = constroe_editar_sobre_site();
	break;
	case $idioma[42]:
	$conteudo = constroe_campo_criar_anuncio_postagem();
	break;
	case $idioma[88]:
	$conteudo = constroe_campo_adicionar_widget_postagem();
	break;
};
if($conteudo != null){
		$html = "<div class='classe_campo_opcao_administrador'>$conteudo</div>";
};
return $html;
};
		function constroe_campo_administrador_modo_resolucao(){
				global $idioma;
		global $pagina_href;
				if(retorne_usuario_administrador() == false or retorna_usar_resolucao() == false){
						return null;
		};
				$imagem_servidor[0] = retorne_imagem_servidor(6);
		$imagem_servidor[1] = retorne_imagem_servidor(7);
				$link[0] = "<a href='$pagina_href[3]'>$imagem_servidor[0]</a>";
		$link[1] = "<a href='$pagina_href[4]'>$imagem_servidor[1]</a>";
				$html = "
		<div class='classe_div_campo_administrador_resolucao'>
		<div class='classe_div_campo_administrador_resolucao_div'>$link[0]</div>
		<div class='classe_div_campo_administrador_resolucao_div'>$link[1]</div>
		</div>
		";
				return $html;
	};
function constroe_campo_administrar(){
global $idioma;
global $pagina_href;
if(retorne_usuario_administrador() == false and retorne_usuario_colaborador() == false){
        return null;
};
if(retorne_usuario_administrador() == true){
	    $titulo = $idioma[18];
        $links[] = "<a href='$pagina_href[3]'>$idioma[19]</a>";
    $links[] = "<a href='$pagina_href[31]'>$idioma[60]</a>";
    $links[] = "<a href='$pagina_href[13]'>$idioma[132]</a>";
    $links[] = "<a href='$pagina_href[32]'>$idioma[59]</a>";
    $links[] = "<a href='$pagina_href[11]'>$idioma[27]</a>";
    $links[] = "<a href='$pagina_href[4]'>$idioma[47]</a>";
    $links[] = "<a href='$pagina_href[5]'>$idioma[185]</a>";
    $links[] = "<a href='$pagina_href[6]'>$idioma[193]</a>";
    $links[] = "<a href='$pagina_href[7]'>$idioma[203]</a>";
    $links[] = "<a href='$pagina_href[8]'>$idioma[204]</a>";
    $links[] = "<a href='$pagina_href[9]'>$idioma[205]</a>";
    $links[] = "<a href='$pagina_href[10]'>$idioma[213]</a>";
    $links[] = "<a href='$pagina_href[28]'>$idioma[222]</a>";
    $links[] = "<a href='$pagina_href[30]'>$idioma[225]</a>";
	$links[] = "<a href='$pagina_href[33]'>$idioma[82]</a>";
	$links[] = "<a href='$pagina_href[34]'>$idioma[89]</a>";
}else{
	    $titulo = $idioma[71];
	    $links[] = "<a href='$pagina_href[3]'>$idioma[19]</a>";
    $links[] = "<a href='$pagina_href[31]'>$idioma[60]</a>";
    $links[] = "<a href='$pagina_href[13]'>$idioma[132]</a>";
};
$conteudo = constroe_links_menu_vertical($links);
$html = constroe_menu_navegacao_vertical($titulo, $conteudo);
return $html;
};
function retorne_idusuario_administrador(){
$email = CONFIG_EMAIL_ADMIN;
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email';";
$dados = retorne_dados_query($query);
return $dados['id'];
};
function atualizar_titulo_album(){
$nome_album = remove_html($_REQUEST["nome_album"]);
$idalbum = retorne_idalbum_post();
$tabela = TABELA_ALBUNS;
$query = "update $tabela set nome_album='$nome_album' where id='$idalbum';";
comando_executa($query);
};
function campo_criar_album(){
global $idioma;
global $requeste;
global $idioma;
$idcampo[0] = md5("id_campo_nome_novo_album".data_atual());
$eventos[0] = "onclick='criar_novo_album(\"$idcampo[0]\");'";
$eventos[1] = "onkeydown='if(event.keyCode == 13){criar_novo_album(\"$idcampo[0]\");}'";
$url_abrir[0] = PAGINA_INICIAL."?$requeste[0]=$idioma[40]";
$imagem_sistema[0] = retorne_imagem_servidor(4);
$numero_imagens = retorne_tamanho_resultado(retorne_numero_imagens_albuns());
$campo_imagens_gerais = "
<div class='classe_album_usuario_gerais'>
<div class='classe_album_usuario_imagens_gerais'>
<a href='$url_abrir[0]' title='$nome_album'>$imagem_sistema[0]</a>
</div>
<div class='classe_album_usuario_numero'>
<a href='$url_abrir[0]' title='$nome_album'>$idioma[221]$numero_imagens</a>
</div>
</div>
";
$html = "
<div class='classe_campo_criar_album'>
<div class='classe_campo_criar_album_nome'>
<input type='text' placeholder='$idioma[216]' id='$idcampo[0]' $eventos[1]>
</div>
<div class='classe_campo_criar_album_botao'>
<input type='button' value='$idioma[217]' $eventos[0]>
</div>
</div>
$campo_imagens_gerais
";
return $html;
};
function campo_gerenciar_album($id, $idcampo){
global $idioma;
$imagem_sistema[0] = retorne_imagem_servidor(16);
$id_dialogo[0] = md5("id_dialogo_excluir_album_$id");
$eventos[0] = "onclick='excluir_album_imagem(\"$id\", \"$idcampo\");'";
$eventos[1] = "onclick='dialogo_excluir_album(\"$id_dialogo[0]\");'";
$html = "
$idioma[219]
<br>
<br>
<input type='button' value='$idioma[101]' $eventos[0]>
";
$html = janela_mensagem_dialogo($idioma[220], $html, $id_dialogo[0]);
$html = "
<div class='classe_campo_gerencia_album_imagem'>
<div class='classe_campo_gerencia_album_imagem_separa' $eventos[1]>$imagem_sistema[0]</div>
</div>
$html
";
return $html;
};
function campo_gerenciar_imagens_album(){
global $idioma;
if(retorne_usuario_administrador() == false){
	    return null;
};
$id_campo_carregar = md5("id_carregar_galeria_imagens_".data_atual());
$imagens_album = carregar_imagens_galeria();
$campo_carregar_imagens = "
<div class='classe_div_carregar_galeria_imagens' id='$id_campo_carregar'>$imagens_album</div>
";
$campo_upload_imagens = constroe_formulario_barra_progresso(PAGINA_ACOES, "id_formulario_upload_imagens_album_gerencia", "fotos[]", 8, true, 1);
$idalbum = retorne_idalbum_post();
$html = "
$campo_upload_imagens
$campo_carregar_imagens
<div class='classe_div_campo_gerenciar_imagens_album_img' onclick='carregar_imagens_galeria(\"$id_campo_carregar\", \"$idalbum\");'>
$idioma[180]
</div>
";
return $html;
};
function carregar_albuns(){
global $idioma;
global $requeste;
if(retorne_usuario_administrador() == false){
        return null;
};
$tabela = TABELA_ALBUNS;
$limit_query = retorne_limit_imagens_album();
$query = "select *from $tabela order by id desc $limit_query;";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados["id"];
    $nome_album = $dados["nome_album"];
    $data = $dados["data"];
		if($id != null){
				$data = converte_data_amigavel($data);
				$imagem_album = retorne_primeira_imagem_album($id);
				$idcampo[0] = md5("id_campo_nome_album_$id");
		$idcampo[1] = md5("id_campo_album_numero_$id");
				$eventos[0] = "onkeyup='atualizar_titulo_album(\"$idcampo[0]\", \"$id\");'";
		$campo_nome = "
		<input type='text' id='$idcampo[0]' value='$nome_album' placeholder='$idioma[216]' $eventos[0]>
		";
				$url_album = PAGINA_INICIAL."?$requeste[0]=$idioma[40]&$requeste[6]=$id";
				$campo_gerenciar = campo_gerenciar_album($id, $idcampo[1]);
			    $html .= "
	    <div class='classe_album_usuario' id='$idcampo[1]'>
		<div class='classe_album_usuario_imagens'>
		<a href='$url_album' title='$nome_album'>$imagem_album</a>
		</div>
		<div class='classe_album_usuario_nome'>$campo_nome</div>
		$campo_gerenciar
		<div class='classe_album_usuario_data'>$data</div>
		</div>
	    ";
	};
};
return $html;
};
function carregar_imagens_galeria(){
global $idioma;
$tabela = TABELA_IMAGENS_ALBUM;
$limit_query = retorne_limit_imagens_album();
$idalbum = retorne_idalbum_post();
if($idalbum == null){
    	$query = "select *from $tabela order by id desc $limit_query;";
}else{
    	$query = "select *from $tabela where idalbum='$idalbum' order by id desc $limit_query;";
};
$comando = comando_executa($query);
$linhas = retorne_numero_linhas_comando($comando);
if($linhas == 0){
        return null;
};
$contador = 0;
$imagem_servidor[0] = retorne_imagem_servidor(16);
for($contador == $contador; $contador <= $linhas; $contador++){
        $dados = retorne_dados_comando($comando);
        $id = $dados["id"];
    $idusuario = $dados["idusuario"];
    $idalbum = $dados["idalbum"];
    $url_imagem = $dados["url_imagem"];
    $url_imagem_miniatura = $dados["url_imagem_miniatura"];
    $conteudo = $dados["conteudo"];
    $data = $dados["data"];
		if($id != null){
				$id_dialogo_excluir_imagem = retorne_idcampo_md5();
		        $campo_dialogo_excluir = "
        $idioma[90]
        <br>
        <br>
        <input type='button' value='$idioma[101]' onclick='excluir_imagem_galeria_imagens(\"$id\", \"$id_dialogo_excluir_imagem\");'>
        ";
                $campo_dialogo_excluir = janela_mensagem_dialogo($idioma[114], $campo_dialogo_excluir, $id_dialogo_excluir_imagem);
                $campo_gerenciar_imagem = "
        <div class='classe_div_imagem_publicacao_opcoes'>
        <span class='classe_span_opcao_publicacao' onclick='dialogo_excluir_imagem_galeria(\"$id_dialogo_excluir_imagem\");'>$imagem_servidor[0]</span>
        </div>
        ";
                $html .= "
		$campo_dialogo_excluir
        <div class='classe_div_imagem_galeria' id='id_div_imagem_galeria_$id'>
        $campo_gerenciar_imagem
		<div class='classe_div_imagem_galeria_imagem'>
        <img src='$url_imagem_miniatura'>
		</div>
		<div class='classe_div_imagem_galeria_endereco'>
		<p id='id_campo_endereco_imagem_$id'>$url_imagem</p>
		<input type='button' value='$idioma[212]' onclick=\"copyToClipboard('id_campo_endereco_imagem_$id');\">
		</div>
		</div>
        ";
	};
};
return $html;
};
function constroe_albuns_imagens(){
global $idioma;
$idcampo[0] = md5("id_campo_visualiza_albuns".data_atual());
$evento[0] = "onclick='carregar_albuns(\"$idcampo[0]\");'";
$campo_criar_album = campo_criar_album();
$albuns_carregar = carregar_albuns();
$html = "
<div class='classe_campo_albuns_imagens'>
$campo_criar_album
<div class='classe_campo_albuns_imagens_resultados' id='$idcampo[0]'>$albuns_carregar</div>
<div class='classe_div_campo_gerenciar_imagens_album_img' $evento[0]>$idioma[145]</div>
</div>
";
return $html;
};
function criar_novo_album(){
global $requeste;
if(retorne_usuario_administrador() == false){
        return null;
};
$nome_album = remove_html($_REQUEST[$requeste[5]]);
if($nome_album == null){
		$nome_album = $idioma[218];
};
$tabela = TABELA_ALBUNS;
$idusuario = retorne_idusuario_logado();
$data = data_atual();
$query = "insert into $tabela values(null, '$nome_album', '$idusuario', '$data');";
query_executa($query);
};
function excluir_album_imagem(){
global $requeste;
if(retorne_usuario_administrador() == false){
        return null;
};
$idalbum = remove_html($_REQUEST[$requeste[6]]);
$tabela[0] = TABELA_ALBUNS;
$tabela[1] = TABELA_IMAGENS_ALBUM;
$query[0] = "delete from $tabela[0] where id='$idalbum';";
$query[1] = "select *from $tabela[1] where idalbum='$idalbum';";
$query[2] = "delete from $tabela[1] where idalbum='$idalbum';";
$contador = 0;
$comando = comando_executa($query[1]);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
	    $pasta_usuario = retorne_pasta_usuario($dados['idusuario'], 2, true);
        $url_imagem = $pasta_usuario.basename($dados['url_imagem']);
    $url_imagem_miniatura = $pasta_usuario.basename($dados['url_imagem_miniatura']);
        exclui_arquivo_unico($url_imagem);
    exclui_arquivo_unico($url_imagem_miniatura);
};
comando_executa($query[0]);
comando_executa($query[2]);
};
function retorne_idalbum_aleatorio(){
$idusuario = retorne_idusuario_logado();
return md5("idalbum_".$idusuario.data_atual().retorne_incrementador());
};
function retorne_numero_imagens_albuns(){
$tabela = TABELA_IMAGENS_ALBUM;
$query = "select *from $tabela;";
return retorne_numero_linhas_query($query);
};
function retorne_primeira_imagem_album($idalbum){
$tabela = TABELA_IMAGENS_ALBUM;
$query = "select *from $tabela where idalbum='$idalbum' order by id desc limit 0,1;";
$dados = retorne_dados_query($query);
$url_imagem_miniatura = $dados["url_imagem_miniatura"];
if($url_imagem_miniatura == null){
        return retorne_imagem_servidor(4);
};
$html = "
<img src='$url_imagem_miniatura'>
";
return $html;
};
		function adicionar_amizade(){
				$tabela = TABELA_AMIZADE;
				$idusuario_logado = retorne_idusuario_logado();
				$idusuario_admin = retorne_idusuario_administrador();
				if($idusuario_logado == $idusuario_admin or retorne_usuario_logado() == false){
						return null;
		};
				$data = data_atual();
			$query[0] = "select *from $tabela where idusuario='$idusuario_logado' and idamigo='$idusuario_admin';";
		$numero_linhas = retorne_numero_linhas_query($query[0]);
		if($numero_linhas == 0){
				$query[1] = "insert into $tabela values(null, '$idusuario_logado', '$idusuario_admin', '$data');";
		$query[2] = "insert into $tabela values(null, '$idusuario_admin', '$idusuario_logado', '$data');";
				comando_executa($query[1]);
		comando_executa($query[2]);
	};
	};
		function retorne_numero_amigos($modo, $idusuario){
				$tabela_amigos = TABELA_AMIZADE;
		$tabela_solicitacao_amigos = TABELA_SOLICITACAO_AMIZADE;
				switch($modo){
			case 1:
			$query = "select *from $tabela_amigos where idusuario='$idusuario';";
			break;
			case 2:
			$query = "select *from $tabela_solicitacao_amigos where idusuario='$idusuario' and modo='0';";
			break;
			case 3:
			$query = "select *from $tabela_solicitacao_amigos where idusuario='$idusuario' and modo='1';";
			break;
		};
		return retorne_numero_linhas_query($query);
	};
function retorne_numero_amigos_online(){
$tabela = TABELA_AMIZADE;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario';";
$comando = comando_executa($query);
$contador = 0;
$numero_amigos_online = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$idamigo = $dados['idamigo'];
		if($idamigo != null){
				if(retorne_usuario_online($idamigo) == true){
						$numero_amigos_online++;
		};
	};
};
return $numero_amigos_online;
};
function retorne_usuario_amigo($idamigo, $modo){
				if($modo == false){
						$dados_usuario = sessao_completa_usuario();
						return $dados_usuario['usuario_amigo'];
		};
				if(retorne_usuario_dono_perfil(false) == true){
						return true;
		};
				$tabela = TABELA_AMIZADE;
		$idusuario = retorne_idusuario_logado();
		$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
		$numero_linhas = retorne_numero_linhas_query($query);
		if($numero_linhas == 1){
				return true;
	}else{
				return false;
	};
};
function constroe_anuncio_postagem(){
if(retorne_usuario_administrador() == true or CONFIG_PERMITE_ANUNCIOS == false){
	    return null;
};
$dados = retorne_dados_anuncio_postagem();
$conteudo = html_entity_decode($dados["conteudo"]);
$html = "
<div class='classe_anuncio_postagem'>
$conteudo
</div>
";
return $html;
};
function constroe_campo_criar_anuncio_postagem(){
global $idioma;
$idcampo[0] = md5("id_campo_criar_anuncio_".data_atual());
$evento[0] = "onclick='criar_anuncio_postagem(\"$idcampo[0]\");'";
$dados = retorne_dados_anuncio_postagem();
$conteudo = $dados["conteudo"];
$html = "
<div class='classe_campo_criar_anuncio_postagem'>
<div class='classe_campo_criar_anuncio_postagem_conteudo'>
<textarea cols='10' rows='20' placeholder='$idioma[83]' id='$idcampo[0]'>$conteudo</textarea>
</div>
<div class='classe_campo_criar_anuncio_postagem_salvar'>
<input type='button' value='$idioma[57]' $evento[0]>
</div>
</div>
";
return $html;
};
function criar_anuncio_postagem(){
$conteudo = htmlentities($_REQUEST['conteudo']);
$tabela = TABELA_ANUNCIO_POSTAGEM;
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values(\"$conteudo\");";
executador_querys($query);
};
function retorne_dados_anuncio_postagem(){
$tabela = TABELA_ANUNCIO_POSTAGEM;
$query = "select *from $tabela;";
return retorne_dados_query($query);
};
		function criar_pasta($pasta){
				if($pasta != null or is_dir($pasta) == false){
						if(file_exists($pasta) == false){
				mkdir($pasta, 0777, true); 				
			};
		};
	};
		function excluir_pastas_subpastas($endereco_pasta_remover){
				if (is_dir($endereco_pasta_remover)) {
			$objects = scandir($endereco_pasta_remover);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($endereco_pasta_remover."/".$object) == "dir") excluir_pastas_subpastas($endereco_pasta_remover."/".$object); else unlink($endereco_pasta_remover."/".$object);
				};
			};
			reset($objects);
			rmdir($endereco_pasta_remover);
		};
	};
		function exclui_arquivo_unico($endereco_arquivo){
				if($endereco_arquivo != null){
						@unlink($endereco_arquivo);
		};
	};
function remove_comentarios($codigo_entrada){
$newStr  = '';
$commentTokens = array(T_COMMENT);
if (defined('T_DOC_COMMENT'))
	$commentTokens[] = T_DOC_COMMENT; if (defined('T_ML_COMMENT'))
	$commentTokens[] = T_ML_COMMENT;  	$tokens = token_get_all($codigo_entrada);
foreach ($tokens as $token) {
	if (is_array($token)) {
if (in_array($token[0], $commentTokens))
	continue;
	$token = $token[1];
	};
	$newStr .= $token;
};
$codigo_entrada = $newStr;
$codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada);
$codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada);
$codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada);
return $codigo_entrada; 	
};
function retorna_conteudo_arquivo($endereco_arquivo){
if($endereco_arquivo != null){
		return @file_get_contents($endereco_arquivo);
};
};
		function retorne_lista_todas_pastas($endereco_pasta){
				$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);
				$array_retorno = array();
				foreach($pasta_diretorio as $endereco){
						if($endereco != null){
								$array_retorno[] = $endereco;
			};
		};
				return $array_retorno;
	};
function retorne_lista_todos_arquivos($endereco_pasta, $extensao, $auto_include){
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);
$lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio);
$arquivos_encontrados = array();
foreach ($lista_arquivos as $informacao_arquivo) {
		$extensao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION);
		if($extensao == $extensao_arquivo or $extensao == null){
				$endereco_arquivo = $informacao_arquivo->getPathname();
				$arquivos_encontrados[] = $endereco_arquivo;
				if($auto_include == true){
						include_once($endereco_arquivo);
		};
	};
};
return $arquivos_encontrados;
};
function salvar_arquivo($endereco, $conteudo){
$conteudo = remove_comentarios($conteudo);
$arquivo = fopen($endereco, "w+");
fwrite($arquivo, $conteudo);
fclose($arquivo);
};
function constroe_campo_autor_publicacao($idusuario){
global $idioma;
if(retorne_usuario_dono_perfil() == true){
    	return null;
};
if(CONFIG_EXIBE_AUTOR_POSTAGENS == true){
	    $dados_autor = dados_perfil_usuario($idusuario);
    	$idusuario = $dados_autor['idusuario'];
    $nome_autor = $dados_autor['nome'];
    $url_imagem_perfil_miniatura = $dados_autor['url_imagem_perfil_miniatura'];
    $endereco = $dados_autor['endereco'];
    $cidade = $dados_autor['cidade'];
    $estado = $dados_autor['estado'];
    $telefone = $dados_autor['telefone'];
    $sobre = $dados_autor['sobre'];
		if($idusuario == null){
			    return null;
	};
		$imagem_perfil = constroe_imagem_perfil_miniatura($idusuario);
        $html = "
    <div class='classe_div_autor_publicacao'>
	<div class='classe_div_autor_publicacao_imagem_perfil'>
	$imagem_perfil
	</div>
	<div class='classe_div_autor_publicacao_informacoes'>
	<span>$idioma[163]$nome_autor</span>
	<span>$idioma[183]$sobre</span>
    <span>$idioma[133]: $endereco - $cidade - $estado</span>
    <span>$idioma[136]: $telefone</span>
    </div>
	</div>
    ";
};
return $html;
};
function adicionar_bloco(){
global $requeste;
$titulo = remove_html($_REQUEST["titulo"]);
$subtitulo = remove_html($_REQUEST["subtitulo"]);
$conteudo = htmlentities($_REQUEST["conteudo"]);
$id = remove_html($_REQUEST[$requeste[7]]);
if($titulo == null and $subtitulo == null and $conteudo == null){
        return null;
};
$tabela = TABELA_BLOCOS;
$data = data_atual();
if($id == null){
        $query = "insert into $tabela values(null, '$titulo', '$subtitulo', '$conteudo', '$data');";
}else{
		$query = "update $tabela set titulo='$titulo', sub_titulo='$subtitulo', conteudo='$conteudo', data='$data' where id='$id';";
};
query_executa($query);
};
function adicionar_bloco_topo(){
global $requeste;
$titulo = remove_html($_REQUEST["titulo"]);
$id = remove_html($_REQUEST[$requeste[7]]);
$url_link = remove_html($_REQUEST["url_link"]);
$tabela = TABELA_BLOCOS_TOPO;
$data = data_atual();
$idusuario_logado = retorne_idusuario_logado();
$pasta_upload_root = retorne_pasta_usuario($idusuario_logado, 5, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario_logado, 5, false);
$url_imagem = upload_imagem_unica($pasta_upload_root, ESCALA_IMAGEM_BLOCO_TOPO, ESCALA_IMAGEM_BLOCO_TOPO, $pasta_upload_servidor, false);
$url_imagem_normal = $url_imagem['normal'];
$url_imagem_normal_root = $url_imagem['normal_root'];
if($url_imagem_normal != null){
        $dados = retorne_dados_bloco_topo($id);
	    exclui_arquivo_unico($dados["root_imagem"]);
};
if($id == null){
        $query = "insert into $tabela values(null, '$titulo', '$url_imagem_normal', '$url_imagem_normal_root', '$url_link', '$data');";
}else{
		if($url_imagem_normal == null){
	    	    $query = "update $tabela set titulo='$titulo', url_link='$url_link', data='$data' where id='$id';";
	}else{
	    	    $query = "update $tabela set titulo='$titulo', url_link='$url_link', url_imagem='$url_imagem_normal', root_imagem='$url_imagem_normal_root', data='$data' where id='$id';";
	};
};
query_executa($query);
};
function campo_gerenciar_bloco($dados, $idbloco){
global $titulo;
global $idioma;
$id = $dados["id"];
$titulo = $dados["titulo"];
$sub_titulo = $dados["sub_titulo"];
$conteudo = $dados["conteudo"];
$imagem_servidor[0] = retorne_imagem_servidor(16);
$imagem_servidor[1] = retorne_imagem_servidor(17);
$id_dialogo[0] = md5("id_dialogo_excluir_bloco_$id".data_atual());
$id_dialogo[1] = md5("id_dialogo_editar_bloco_$id".data_atual());
$html = "
$idioma[211]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_bloco(\"$id\", \"$idbloco\");'>
";
$campo_editar_bloco= janela_mensagem_dialogo($idioma[210], editar_blocos($dados), $id_dialogo[1]);
$html = janela_mensagem_dialogo($idioma[210], $html, $id_dialogo[0]);
$html = "
<div class='classe_campo_gerenciar_blocos'>
<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_excluir_bloco(\"$id_dialogo[0]\");'>
$imagem_servidor[0]
</div>
<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_editar_bloco(\"$id_dialogo[1]\");'>
$imagem_servidor[1]
</div>
</div>
$html
$campo_editar_bloco
";
return $html;
};
function campo_gerenciar_bloco_topo($dados, $idbloco){
global $titulo;
global $idioma;
$id = $dados["id"];
$titulo = $dados["titulo"];
$sub_titulo = $dados["sub_titulo"];
$conteudo = $dados["conteudo"];
$imagem_servidor[0] = retorne_imagem_servidor(16);
$id_dialogo = md5("id_dialogo_excluir_bloco_$id".data_atual());
$html = "
$idioma[211]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_bloco_topo(\"$id\", \"$idbloco\");'>
";
$html = janela_mensagem_dialogo($idioma[210], $html, $id_dialogo);
$html = "
<div class='classe_campo_gerenciar_blocos'>
<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_excluir_bloco(\"$id_dialogo\");'>
$imagem_servidor[0]
</div>
</div>
$html
";
return $html;
};
function carrega_blocos(){
$tabela = TABELA_BLOCOS;
$query = "select *from $tabela order by id desc;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
$usuario_administrador = retorne_usuario_administrador();
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados["id"];
	$titulo = $dados["titulo"];
    $sub_titulo = $dados["sub_titulo"];
    $conteudo = $dados["conteudo"];
		if($id != null){
	    	    $conteudo = html_entity_decode($conteudo);
	    		$idbloco = md5("id_bloco_pagina_".data_atual());
	    	    if($usuario_administrador == true){
				        $campo_gerenciar = campo_gerenciar_bloco($dados, $idbloco);
		};
				if($titulo != null){
						$campo[0] = "
			<div class='classe_bloco_numero'>$titulo</div>
			";
		};
				if($sub_titulo != null){
						$campo[1] = "
			<div class='classe_bloco_titulo'>$sub_titulo</div>
			";
		};
	            $campos_blocos .= "
		$campo_gerenciar
		<div class='classe_bloco animated bounceIn' id='$idbloco'>
		$campo[0]
		$campo[1]
		<div class='classe_bloco_descreve'>$conteudo</div>
		</div>
        ";		
	};
};
$html = "
<div class='classe_campo_blocos'>
$campos_blocos
</div>
";
return $html;
};
function carrega_blocos_topo(){
global $idioma;
if(retorne_href_get() == $idioma[4]){
		return null;
};
$tabela = TABELA_BLOCOS_TOPO;
$query = "select *from $tabela order by id desc;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
		return null;
};
$contador = 0;
$usuario_administrador = retorne_usuario_administrador();
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados["id"];
	$titulo = $dados["titulo"];
    $url_imagem = $dados["url_imagem"];
    $url_link = $dados["url_link"];
		if($id != null){
	    		$idbloco = md5("id_bloco_pagina_".data_atual());
	    	    if($usuario_administrador == true){
				        $campo_gerenciar = campo_gerenciar_bloco_topo($dados, $idbloco);
		};
			    if($usuario_administrador == true){
						$campos_blocos .= "<div class='classe_bloco_topo_atualizar'>";
			$campos_blocos .= "<div class='classe_bloco_topo_atualizar_gerenciar'>";
            $campos_blocos .= $campo_gerenciar;
			$campos_blocos .= "</div>";
            $campos_blocos .= editar_blocos_topo($dados);
			$campos_blocos .= "</div>";
		}else{
						$conteudo = "
			<img src='$url_imagem' title='$titulo'>
			";
						if($url_link != null){
								$conteudo = "<a href='$url_link' title='$titulo'>$conteudo</a>";
			};
	                    $campos_blocos .= "
		    <div class='classe_bloco_topo' id='$idbloco'>
		    <div class='classe_bloco_topo_descreve'>$conteudo</div>
		    <div class='classe_bloco_topo_titulo'>$titulo</div>
		    $campo_gerenciar
		    </div>
            ";		
		};
	};
};
$html = "
<div class='classe_campo_blocos_topo'>
$campos_blocos
</div>
";
return $html;
};
function editar_blocos($dados){
global $idioma;
$id = $dados["id"];
$titulo = $dados["titulo"];
$sub_titulo = $dados["sub_titulo"];
$conteudo = $dados["conteudo"];
$idcampo[0] = md5("id_campo_edita_blocos_titulo".data_atual().$id);
$idcampo[1] = md5("id_campo_edita_blocos_subtitulo".data_atual().$id);
$idcampo[2] = md5("id_campo_edita_blocos_conteudo".data_atual().$id);
$eventos[0] = "onclick='adicionar_bloco(\"$idcampo[0]\", \"$idcampo[1]\", \"$idcampo[2]\", \"$id\");'";
$campo_editar = constroe_campo_ckeditor($conteudo, null, $idcampo[2]);
if($id == null){
		$texto_botao = $idioma[209];
}else{
		$texto_botao = $idioma[215];
};
$html = "
<div class='classe_campo_edita_blocos'>
<div class='classe_campo_edita_blocos_titulo'>
<input type='text' placeholder='$idioma[207]' id='$idcampo[0]' value='$titulo'>
</div>
<div class='classe_campo_edita_blocos_subtitulo'>
<input type='text' placeholder='$idioma[208]' id='$idcampo[1]' value='$sub_titulo'>
</div>
<div class='classe_campo_edita_blocos_conteudo'>
$campo_editar
</div>
<div class='classe_campo_edita_blocos_salvar'>
<input type='button' value='$texto_botao' $eventos[0]>
</div>
</div>
";
return $html;
};
function editar_blocos_topo($dados){
global $idioma;
global $requeste;
$url_formulario = PAGINA_ACOES;
$id = $dados["id"];
$titulo = $dados["titulo"];
$conteudo = $dados["conteudo"];
$url_imagem = $dados["url_imagem"];
$url_link = $dados["url_link"];
$idcampo[0] = md5("id_campo_ckeditor_bloco_topo_conteudo_$id");
$idcampo[1] = md5("id_campo_upload_imagem_file");
$idcampo[2] = md5("id_campo_upload_imagem_exibe");
if($id == null){
		$texto_botao = $idioma[209];
}else{
		$texto_botao = $idioma[215];
};
$campo_upload = "
<div class='classe_campo_upload_imagem_bloco_topo'>
<input type='file' name='foto' id='$idcampo[1]'>
</div>
";
if($id != null and $url_imagem != null){
	$campo_upload .= "
	<div class='classe_div_imagem_bloco_topo_editar'>
	<img src='$url_imagem' title='$titulo'>
	</div>
	";
};
$html = "
<div class='classe_campo_add_bloco_topo'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>
<input type='hidden' name='$requeste[0]' value='19'>
<input type='hidden' name='$requeste[7]' value='$id'>
<div class='classe_campo_add_bloco_topo_div'>
<input type='text' placeholder='$idioma[43]' name='titulo' value='$titulo'>
</div>
<div class='classe_campo_add_bloco_topo_div'>
<input type='text' name='url_link' value='$url_link' placeholder='$idioma[228]'>
</div>
<div class='classe_campo_add_bloco_topo_div'>
$campo_upload
</div>
<div class='classe_campo_add_bloco_topo_div'>
<input type='submit' value='$texto_botao'>
</div>
</form>
</div>
";
return $html;
};
function excluir_bloco(){
$id = remove_html($_REQUEST["id"]);
if($id == null){
        return null;
};
$tabela = TABELA_BLOCOS;
$query = "delete from $tabela where id='$id';";
query_executa($query);
};
function excluir_bloco_topo(){
$id = remove_html($_REQUEST["id"]);
if($id == null){
        return null;
};
$dados = retorne_dados_bloco_topo($id);
exclui_arquivo_unico($dados["root_imagem"]);
$tabela = TABELA_BLOCOS_TOPO;
$query = "delete from $tabela where id='$id';";
query_executa($query);
};
function retorne_dados_bloco_topo($id){
$tabela = TABELA_BLOCOS_TOPO;
$query = "select *from $tabela where id='$id';";
return retorne_dados_query($query);
};
		function cadastro_usuario(){
				global $idioma;
				$email = remove_html($_REQUEST['email']);
		$senha = remove_html($_REQUEST['senha']);
		$senha_normal = remove_html($_REQUEST['senha_normal']);
				$senha = cifra_senha_md5($senha);
				$numero_erros = 0;
				if(CONFIG_PERMITE_CADASTRO == false and converte_minusculo($email) != CONFIG_EMAIL_ADMIN){
						$mensagem_erro .= "<li>";
			$mensagem_erro .= $idioma[177];
						$numero_erros++;
		};
				if(verifica_se_email_valido($email) == false){
						$mensagem_erro .= "<li>";
			$mensagem_erro .= $idioma[11];
						$numero_erros++;
		};
				if(strlen($senha) < TAMANHO_MINIMO_SENHA){
						$mensagem_erro .= "<li>";
			$mensagem_erro .= $idioma[12];
				$numero_erros++;
		};
				if($numero_erros > 0){
						return mensagem_sistema($mensagem_erro);
		};
				$tabela = TABELA_CADASTRO;
				$data = data_atual();
				$query[0] = "select *from $tabela where email='$email';";
		$query[1] = "insert into $tabela values(null, '$email', '$senha', '$senha_normal', '$data');";
				if(retorne_numero_linhas_query($query[0]) == 1){
						return mensagem_sistema($idioma[10]);
		};
				comando_executa($query[1]);
				salvar_cookies($email, $senha, false);
				return true;
		};
		function campo_cadastro_login(){
				global $idioma;
		global $pagina_href;
				if(retorne_usuario_logado() == false){
						$html = formulario_login();
			}else{
						$html = "
			<div class='classe_div_campo_cadastro_login'>
			<a href='$pagina_href[2]' title='$idioma[15]'>$idioma[15]</a>
			</div>
			";
		};
		return $html;
	};
function campo_cadastro_topo(){
global $idioma;
global $pagina_href;
if(CONFIG_EXIBE_CAMPO_LOGIN_TOPO == false and retorne_usuario_logado() == false){
        return null;
};
if(retorne_usuario_logado() == true){
		$texto_link = $idioma[15];
}else{
		$texto_link = $idioma[4];
};
$html = "
<div class='classe_cadastro_topo'>
<a href='$pagina_href[29]' title='$texto_link'>$texto_link</a>
</div>
";
return $html;
};
function adiciona_categoria(){
$tabela = TABELA_CATEGORIAS;
$data = data_atual();
$categoria = remove_html($_POST['campo_categoria']);
if($categoria == null or retorne_usuario_administrador() == false){
        return null;	
};
$query = "select *from $tabela where categoria='$categoria';";
if(retorne_numero_linhas_query($query) == 0){
        $query = "insert into $tabela values(null, '$categoria', null, '$data');";
        query_executa($query);
};
return lista_categorias_administrar();
};
function atualizar_categoria(){
$nome_categoria = remove_html($_REQUEST['nome_categoria']);
$id_categoria = remove_html($_REQUEST['id_categoria']);
$cor_categoria = remove_html($_REQUEST['cor_categoria']);
$tabela[0] = TABELA_CATEGORIAS;
$tabela[1] = TABELA_PUBLICACOES;
$query[] = "update $tabela[0] set categoria='$nome_categoria' where id='$id_categoria';";
$query[] = "update $tabela[1] set categoria_nome='$nome_categoria' where categoria_id='$id_categoria';";
$query[] = "update $tabela[0] set cor='$cor_categoria' where id='$id_categoria';";
executador_querys($query);
};
function campo_categorias_select($valor_atual, $id_select){
global $idioma;
$tabela = TABELA_CATEGORIAS;
$query = "select *from $tabela order by id desc;";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
	    $id = $dados["id"];
    $categoria = $dados["categoria"];
    $data = $dados["data"];
		if($id != null){
				$lista_categorias .= "$categoria,";
		$lista_valores_categorias .= "$id,";
	};
};
if($id_select == null){
	    $idcampo[0] = md5("id_campo_seleciona_categorias_postagem_select".data_atual());
}else{
		$idcampo[0] = $id_select;
};
$idcampo[1] = md5("id_campo_seleciona_categorias_postagem_id".data_atual());
$idcampo[2] = md5("id_campo_seleciona_categorias_postagem_nome".data_atual());
$evento[0] = "alterar_id_campo_select_categoria(\"$idcampo[0]\", \"$idcampo[1]\", \"$idcampo[2]\");";
$html = gerador_select_option_especial($lista_categorias, $lista_valores_categorias, $valor_atual, "categoria_postagem", $idcampo[0], $evento[0]);
$imagem[0] = retorne_imagem_servidor(38);
$html = "
<div class='classe_div_campo_categoria_select'>
<div class='classe_div_campo_categoria_select_titulo'>$imagem[0]</div>
<div class='classe_div_campo_categoria_select_conteudo'>$html</div>
<input type='hidden' name='categoria_nome' id='$idcampo[1]'>
<input type='hidden' name='categoria_id' id='$idcampo[2]'>
</div>
";
return $html;
};
function constroe_criar_categoria(){
global $idioma;
$imagem_servidor[0] = retorne_imagem_servidor(36);
$id_campo[0] = md5("campo_nome_nova_categoria".data_atual());
$id_campo[1] = md5("campo_lista_categorias".data_atual());
$eventos[0] = "onclick='adiciona_categoria(\"$id_campo[0]\", \"$id_campo[1]\");'";
$eventos[1] = "onkeydown='if(event.keyCode == 13){adiciona_categoria(\"$id_campo[0]\", \"$id_campo[1]\");}'";
$categorias = lista_categorias_administrar();
$html = "
<div class='classe_campo_criar_categoria'>
<div class='classe_campo_criar_categoria_imagem'>
$imagem_servidor[0]
</div>
<div class='classe_campo_criar_categoria_descreve'>$idioma[188]</div>
<div class='classe_campo_criar_categoria_nome'>
<input type='text' placeholder='$idioma[186]' id='$id_campo[0]' $eventos[1]>
</div>
<div class='classe_campo_criar_categoria_adicionar'>
<input type='button' value='$idioma[187]' $eventos[0]>
</div>
<div class='classe_campo_criar_categoria_categorias' id='$id_campo[1]'>$categorias</div>
</div>
";
return $html;
};
function excluir_categoria(){
$tabela = TABELA_CATEGORIAS;
$id = remove_html($_POST['id']);
if($id == null or retorne_usuario_administrador() == false){
        return null;	
};
$query = "delete from $tabela where id='$id';";
query_executa($query);
};
function lista_categorias_administrar(){
global $idioma;
$tabela = TABELA_CATEGORIAS;
$query = "select *from $tabela order by id desc;";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
$imagem_sistema[0] = retorne_imagem_servidor(16);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
        $id = $dados["id"];
    $categoria = $dados["categoria"];
    $data = $dados["data"];
	$cor = $dados["cor"];
		if($id != null){
				$campo_excluir = "
		$idioma[190]
		<br>
		<br>
		<input type='button' value='$idioma[101]' onclick='excluir_categoria($id);'>
		";
				$id_dialogo = md5("dialogo_excluir_categoria_$id");
				$campo_excluir = janela_mensagem_dialogo($idioma[189], $campo_excluir, $id_dialogo);
				$idcampo[0] = md5("id_campo_entrada_categoria_$id");
		$idcampo[1] = retorne_idcampo_md5();
				$funcao[0] = "atualizar_categoria(\"$idcampo[0]\", \"$idcampo[1]\", \"$id\");";
				$eventos[0] = "onkeyup='$funcao[0]'";
		$eventos[1] = "onclick='$funcao[0]'";
				$html .= "
		<div class='classe_categoria_administrar'>
		<div class='classe_categoria_administrar_gerenciar' onclick='dialogo_excluir_categoria(\"$id_dialogo\");'>
		$imagem_sistema[0]
		</div>
		<div class='classe_categoria_administrar_categoria'>
		<input type='text' id='$idcampo[0]' value='$categoria' placeholder='$idioma[186]' $eventos[0]>
		</div>
		<div class='classe_categoria_administrar_categoria_cor'>
		<input type='text' value='$cor' id='$idcampo[1]' placeholder='$idioma[85]' $eventos[0]>
		</div>
		<div class='classe_categoria_administrar_categoria_cor_salvar'>
		<input type='button' value='$idioma[57]' $eventos[1]>
		</div>
		</div>
		$campo_excluir
		";
	};
};
return $html;
};
function retorne_categoria_publicacao($idpost){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
$dados = retorne_dados_query($query);
if($dados["categoria_nome"] == null){
		return retorne_categoria_request();
}else{
		return $dados["categoria_nome"];
};
};
function retorne_categoria_request(){
global $requeste;
return remove_html(urldecode($_REQUEST[$requeste[3]]));
};
function retorne_dados_categoria($id){
$tabela = TABELA_CATEGORIAS;
$query = "select *from $tabela where id='$id';";
return retorne_dados_query($query);
};
function retorne_numero_itens_categoria($categoria){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where categoria_nome='$categoria';";
return retorne_numero_linhas_query($query);
};
		function abrir_janela_conversa_chat(){
				if(retorne_usuario_chat() == null){
						return false;
			}else{
						return true;
		};
	};
function carregar_historico_chat(){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
$idamigo = retorne_usuario_chat();
if($idusuario == null or $idamigo == null){
		return -1;
};
$limit = retorne_limit_chat();
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' order by id asc $limit";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
		return -1;
};
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$html .= constroe_conversas_chat_dados($dados);
};
return $html;
};
function carrega_conversas_chat(){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
$idamigo = retorne_usuario_chat();
$contador_avanco = remove_html($_REQUEST['contador_avanco_chat']);
if($idusuario == null or $idamigo == null){
		$html = -1;
};
if($contador_avanco == 0){
		$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
		$numero_mensagens = retorne_numero_linhas_query($query) - 1;
		if($numero_mensagens < 0){
				$numero_mensagens = 0;
	};
		$limit = "limit $numero_mensagens, 25";
}else{
		$limit = retorne_limit_conversas_chat();
		$numero_mensagens = 0;
};
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' order by id asc $limit";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
		$html = -1;
};
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$html .= constroe_conversas_chat_dados($dados);
};
$array_retorno['conteudo'] = $html;
$array_retorno['contador'] = $numero_mensagens;
return json_encode($array_retorno);
};
		function carrega_informacoes_usuario_chat(){
				$idusuario = retorne_usuario_chat();
				if($idusuario == null){
						return null;
		};
				$nome_usuario = retorne_nome_usuario($idusuario);
				$usuario_online = retorne_usuario_online($idusuario);
				if($usuario_online == true){
			$imagem_servidor[0] = retorne_imagem_servidor(23);
		}else{
			$imagem_servidor[0] = retorne_imagem_servidor(22);
		};
				$array_retorno['nome'] = $nome_usuario;
		$array_retorno['online_offline'] = $imagem_servidor[0];
				return json_encode($array_retorno);
		};
function constroe_chat_usuario(){
global $idioma;
if(retorne_usuario_logado() == false){
		return null;
};
$numero_amigos_online = retorne_numero_amigos_online();
$imagem_servidor[0] = retorne_imagem_servidor(24);
$imagem_servidor[1] = retorne_imagem_servidor(16);
$imagem_servidor[2] = retorne_imagem_servidor(25);
$campo_historico = "
<span class='classe_div_conversa_chat_opcoes_historico' onclick='dialogo_historico_conversa_chat();'>$imagem_servidor[0]</span>
";
$campo_conteudo_historico = "
<div class='classe_div_opcoes_historico_chat'>
<div onclick='dialogo_limpar_historico_chat()'>$imagem_servidor[1]</div>
</div>
<div class='classe_div_mensagens_historico_chat' id='id_div_mensagens_historico_chat'></div>
<div class='classe_div_limpar_historico_chat' onclick='carregar_historico_chat();'>$idioma[145]</div>
";
$campo_conteudo_historico = janela_mensagem_dialogo($idioma[144], $campo_conteudo_historico, "id_dialogo_historico_conversas");
$campo_excluir = "
$idioma[146]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_historico_chat();'>
";
$campo_excluir = janela_mensagem_dialogo($idioma[146], $campo_excluir, "id_dialogo_historico_conversas_limpar");
$campo_usuarios_chat = "
<div class='classe_div_chat_usuario_opcoes' id='id_div_chat_usuario_opcoes' onclick='minimiza_janela_chat_usuario();'>
<span>$idioma[139]</span>
<span id='id_span_num_usuarios_online_chat'>$numero_amigos_online</span>
</div>
<div class='classe_div_chat_usuario' id='id_div_amigos_usuario_chat'>
<div class='classe_div_chat_usuario_amigos' id='id_div_chat_usuario_amigos_chat' onscroll='constroe_lista_usuarios_chat();'></div>
</div>
";
$campo_conversa_chat = "
<div class='classe_div_conversa_chat' id='id_div_janela_conversa_chat_usuario'>
<div class='classe_div_conversa_chat_opcoes'>
<span class='classe_div_conversa_chat_opcoes_historico_fechar' onclick='fechar_janela_conversa_chat();'>$imagem_servidor[2]</span>
<span class='classe_div_conversa_chat_opcoes_online_offline' id='id_span_online_offline_usuario_conversando'>...</span>
<span class='classe_div_conversa_chat_opcoes_nome' id='id_span_nome_usuario_conversando'>...</span>
$campo_historico
</div>
<div class='classe_div_conversas_usuario' id='id_div_conversas_usuario_chat'></div>
<div class='classe_div_enviar_conversa_chat'>
<textarea cols='10' rows='5' placeholder='$idioma[142]' id='id_campo_entrada_conversa_chat' onkeydown='if(event.keyCode == 13){enviar_conversa_chat();}'></textarea>
</div>
</div>
$campo_conteudo_historico
$campo_excluir
";
$html .= $campo_usuarios_chat;
$html .= $campo_conversa_chat;
return $html;
};
		function constroe_conversas_chat_dados($dados){
				$idusuario = retorne_idusuario_logado();
				$id_tabela = $dados['id'];
		$idusuario_tabela = $dados['idusuario'];
		$idamigo_tabela = $dados['idamigo'];
		$mensagem_tabela = $dados['mensagem'];
		$data_tabela = $dados['data'];
		$idusuario_enviou = $dados['idusuario_enviou'];
				if($id_tabela == null){
						return null;
		};
				if($idusuario_enviou == $idusuario){
			$classe_div_imagem_perfil = "classe_div_imagem_perfil_1";
			$classe_mensagem_chat = "classe_mensagem_chat_1";
			}else{
			$classe_div_imagem_perfil = "classe_div_imagem_perfil_2";
			$classe_mensagem_chat = "classe_mensagem_chat_2";
		};
			$data_tabela = converte_data_amigavel($data_tabela);
		$nome_usuario = retorne_nome_usuario($idusuario_enviou);
		$dados_imagem = retorne_imagem_perfil_usuario($idusuario_enviou);
		$url_imagem_perfil_miniatura = $dados_imagem['url_imagem_perfil_miniatura'];
		$imagem_perfil = "<img src='$url_imagem_perfil_miniatura' title='$data_tabela'>";
		$mensagem_tabela = converter_urls($mensagem_tabela);
		$html .= "<div class='classe_div_mensagem_recebida'>";
	$html .= "<div class='$classe_div_imagem_perfil'>";
	$html .= $imagem_perfil;
	$html .= "</div>";
	$html .= "<div class='$classe_mensagem_chat'>";
	$html .= $mensagem_tabela;
	$html .= "</div>";
	$html .= "</div>";
		return $html;
	};
function constroe_lista_usuarios_chat(){
$tabela = TABELA_AMIZADE;
$idusuario = retorne_idusuario_logado();
$limit = retorne_limit_chat();
$query = "select *from $tabela where idusuario='$idusuario' order by id desc $limit;";
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$array_retorno = array();
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$idamigo = $dados['idamigo'];
		if($idamigo != null){
				$nome_usuario = retorne_nome_usuario($idamigo);
				$dados_imagem = retorne_imagem_perfil_usuario($idamigo);
				$imagem_perfil_miniatura = $dados_imagem['url_imagem_perfil_miniatura'];
				$imagem_perfil = "<img src='$imagem_perfil_miniatura' title='$nome_usuario'>";
				$usuario_online = retorne_usuario_online($idamigo);
				if($usuario_online == true){
			$imagem_servidor[0] = retorne_imagem_servidor(23);
		}else{
			$imagem_servidor[0] = retorne_imagem_servidor(22);
		};
				$html .= "
		<div class='classe_div_usuario_chat' onclick='seta_usuario_chat($idamigo);'>
		<div class='classe_div_usuario_chat_img_perfil'>$imagem_perfil</div>
		<div class='classe_div_usuario_chat_nome'>$nome_usuario</div>
		<div class='classe_div_usuario_chat_usuario_online' id='id_div_usuario_online_offline_$idamigo'>$imagem_servidor[0]</div>
		<span class='classe_div_usuario_chat_novas_mensagens' id='id_numero_novas_mensagens_usuario_$idamigo'></span>
		</div>
		";
				$array_amigos_carregados[] = $idamigo;
};
};
if($numero_linhas == 0){
		$html = null;
	$array_amigos_carregados[] = 0;
};
$array_retorno['conteudo'] = $html;
$array_retorno['ids_usuarios'] = $array_amigos_carregados;
return json_encode($array_retorno);
};
function enviar_conversa_chat(){
$tabela = TABELA_CHAT_USUARIO;
$conteudo = remove_html($_REQUEST['conteudo']);
$idusuario = retorne_idusuario_logado();
$idamigo = retorne_usuario_chat();
$data = data_atual();
$query[0] = "insert into $tabela values(null, '$idusuario', '$idamigo', '$conteudo', '1', '$data', '$idusuario');";
$query[1] = "insert into $tabela values(null, '$idamigo', '$idusuario', '$conteudo', '0', '$data', '$idusuario');";
$query[2] = "update $tabela set visualizada='1' where idusuario='$idusuario' and idamigo='$idamigo';";
comando_executa($query[0]);
comando_executa($query[1]);
comando_executa($query[2]);
};
		function excluir_historico_chat(){
				$tabela = TABELA_CHAT_USUARIO;
				$idusuario = retorne_idusuario_logado();
				$idamigo = retorne_usuario_chat();
				if($idusuario == null or $idamigo == null){
						return null;
		};
				$query = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
				comando_executa($query);
	};
function fechar_janela_conversa_chat(){
$_SESSION[CONFIG_MD5_IDUSUARIO_CHAT] = null;
};
function retorna_numero_mensagens_chat($idamigo){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and visualizada='0';";
return retorne_numero_linhas_query($query);
};
function retorne_limit_chat(){
$avanco_contador = remove_html($_REQUEST['contador_avanco_chat']);
$contador_inicio = $avanco_contador;
$contador_fim = $avanco_contador + LIMIT_MAX_NUM_USUARIOS_CHAT;
$limit = "limit $contador_inicio, $contador_fim";
return $limit;
};
function retorne_limit_conversas_chat(){
$contador_avanco = remove_html($_REQUEST['contador_avanco_chat']);
$limit = "limit $contador_avanco, 1";
return $limit;
};
function retorne_numero_novas_mensagens_chat($idamigo){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and visualizada='0';";
return retorne_numero_linhas_query($query);
};
function retorne_usuario_chat(){
return $_SESSION[CONFIG_MD5_IDUSUARIO_CHAT];
};
		function seta_usuario_chat(){
				$idusuario = retorne_idusuario_request();
				if($idusuario == retorne_idusuario_logado()){
						$idusuario = null;
		};
				$_SESSION[CONFIG_MD5_IDUSUARIO_CHAT] = $idusuario;
	};
		function usuario_online_offline_chat(){
				$idusuario = retorne_idusuario_request();
				$usuario_online = retorne_usuario_online($idusuario);
				if($usuario_online == true){
						$imagem_servidor = retorne_imagem_servidor(23);
			}else{
						$imagem_servidor = retorne_imagem_servidor(22);
		};
				$array_retorno['conteudo'] = $imagem_servidor;
		$array_retorno['idusuario'] = $idusuario;
		$array_retorno['numero_mensagens'] = retorne_tamanho_resultado(retorne_numero_novas_mensagens_chat($idusuario));
		return json_encode($array_retorno);
	};
		function atualiza_conexao_usuario(){
				$tabela = TABELA_CONEXAO_USUARIO;
				$idusuario = retorne_idusuario_logado();
				$data_conexao = retorne_data_atual_conexao();
				$query[] = "delete from $tabela where idusuario='$idusuario';";
		$query[] = "insert into $tabela values('$idusuario','$data_conexao');";
				if($idusuario != null){
			executador_querys($query);
		};
	};
function diferenca_data_conexao($data_comparar){
return strtotime(date('Y/m/d H:i:s')) - strtotime($data_comparar);
};
function retorne_data_atual_conexao(){
return date('Y/m/d H:i:s');
};
function retorne_numero_usuarios_online(){
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela;";
$comando = comando_executa($query);
$contador = 0;
$numero_online = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$idusuario = $dados['idusuario'];
		if($idusuario != null){
				if(retorne_usuario_online($idusuario) == true){
						$numero_online++;
		};
	};
};
return $numero_online;
};
function retorne_usuario_online($idusuario){
				$tabela = TABELA_CONEXAO_USUARIO;
				$query = "select *from $tabela where idusuario='$idusuario';";
				$dados = retorne_dados_query($query);
				$data_conexao = $dados['data_conexao'];
				if($data_conexao == null){
						return false;
		};
				$tempo_diferenca = diferenca_data_conexao($data_conexao);
				if($tempo_diferenca <= TEMPO_FICAR_OFFLINE){
						return true;
			}else{
						return false;
		};
};
function constroe_conteudo(){
global $idioma;
global $pagina_href;
if(retorne_usuario_logado() == true){
		adicionar_amizade();
		define_padrao_perfil_cadastrar();
};
$usar_resolucao = retorna_usar_resolucao();
if(retorne_href_get() == null){
		$html .= "<div class='classe_div_centro_topo_pagina'>";
	$html .= "</div>";
};
$html .= "<div class='classe_div_centro_pagina'>";
if(retorne_idpost_request() == null){
		$html .= campo_opcao_administrador();
};
if(retorne_idpost_request() == null and retorne_href_get() == null){
		$html .= constroe_campo_destaque();
};
$html .= constroe_campo_conteudo_postagem();
$html .= "</div>";
if(retorne_usuario_logado() == false){
		if(CONFIG_EXIBE_WIDGET_LATERAL_LADO_SLIDESHOW == false){
				$campos_logado .= campo_widget();
	};
		if(CONFIG_EXIBE_WIDGET_TOPO == false){
				$campos_logado .= campo_widget_topo();
	};
};
if($usar_resolucao == false){
		$html .= "<div class='classe_div_menus_principal'>";
	$html .= constroe_anuncio_postagem();
	$html .= constroe_perfil_usuario();
	$html .= constroe_campo_administrar();
	$html .= $campos_logado;
	$html .= constroe_ultimas_publicacoes_miniatura();
	$html .= carrega_blocos();
	$html .= constroe_chat_usuario();
	$html .= constroe_navegacao_lateral();
	$html .= "</div>";
}else{
		$html .= constroe_chat_usuario();
};
if(retorne_idpost_request() != null){
		$html = "
	<div class='div_conteudo_pagina'>$html</div>
	";
		return $html;
};
switch(retorne_href_get()){
	case $idioma[15]:
	salvar_cookies(retorne_email_cookie(), null, true);
	chama_pagina_especifica($pagina_href[0]);
	break;
	case $idioma[4]:
	$html = campo_cadastro_login();
	break;
	case $idioma[30]:
	$html = formulario_contato_usuario();
	break;
};
$html = "
<div class='div_conteudo_pagina'>$html</div>
";
return $html;
};
function enviar_email($email_destino, $assunto_mensagem, $corpo_mensagem){
if($email_destino == null){
        return null;	
};
$dados = retorne_dados_sobre_site();
$nome_sistema = $dados["nome"];
$cabecalho = "From: $nome_sistema"."\r\n"."Reply-To: $nome_sistema"."\r\n";
mail($email_destino, $assunto_mensagem , $corpo_mensagem, $cabecalho); 
};
function envia_dados_formulario_contato_admin(){
$dados = retorne_dados_sobre_site();
if($dados["email_contato"] == null){
        return null;
};
$email_telefone_contato = remove_html($_REQUEST['email_telefone_contato']);
$mensagem_contato = remove_html($_REQUEST['mensagem_contato']);
$corpo_mensagem .= "\n";
$corpo_mensagem .= $email_telefone_contato;
$corpo_mensagem .= "\n";
$corpo_mensagem .= "--------------------";
$corpo_mensagem .= "\n";
$corpo_mensagem .= $mensagem_contato;
$corpo_mensagem .= "\n";
if($email_telefone_contato != null and $mensagem_contato != null){
        enviar_email($dados["email_contato"], $email_telefone_contato, $corpo_mensagem);
};
chama_pagina_inicial();
};
function envia_dados_formulario_orcamento(){
global $idioma;
$email_telefone_contato = remove_html($_REQUEST['email_telefone_contato']);
$cidade_contato = remove_html($_REQUEST['cidade_contato']);
$estado_contato = remove_html($_REQUEST['estado_contato']);
$mensagem_contato = remove_html($_REQUEST['mensagem_contato']);
$dados = retorne_dados_sobre_site();
$nome_site = $dados["nome"];
$corpo_mensagem = "
\n
$idioma[65]: $nome_site
\n
\n
$idioma[5]: $email_telefone_contato
\n
$idioma[134]: $cidade_contato
\n
$idioma[135]: $estado_contato
\n
$idioma[64]: $mensagem_contato
\n
";
if($email_telefone_contato != null and $mensagem_contato != null and $cidade_contato != null and $estado_contato != null){
        enviar_email(CONFIG_EMAIL_ORCAMENTO, $email_telefone_contato, $corpo_mensagem);
	    enviar_email(CONFIG_EMAIL_ADMIN, $email_telefone_contato, $corpo_mensagem);
};
chama_pagina_inicial();
};
function formulario_contato_usuario(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_ACOES;
$imagem_servidor[0] = retorne_imagem_servidor(32);
$html = "
<div class='classe_div_formulario_contato'>
<form action='$url_formulario' method='post'>
<div class='classe_div_formulario_contato_div_1'>
$imagem_servidor[0]
</div>
<span>$idioma[116]</span>
<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='email_telefone_contato' placeholder='$idioma[117]' required>
</div>
<div class='classe_div_formulario_contato_div_2'>
<textarea cols='10' rows='5' name='mensagem_contato' placeholder='$idioma[118]' required></textarea>
</div>
<div class='classe_div_formulario_contato_div_2'>
<input type='submit' value='$idioma[119]' onclick=''>
</div>
<div class='classe_div_formulario_contato_div_2'>
<input type='hidden' name='$requeste[0]' value='28'>
</div>
</form>
</div>
";
return $html;
};
function constroe_campo_destaque(){
global $idioma;
if(CONFIG_COLOCAR_MENU_TOP_DESTAQUE == true){
	    $html .= constroe_menu_navegacao_topo();
};
if(USAR_PAGINADOR_NUMERICO == true){
		$html .= carrega_publicacoes_miniatura();
	$html .= constroe_paginadores_numericos();
};
$html = "
<div class='classe_div_campo_destaque' id='id_div_campo_destaque'>$html</div>
";
return $html;
};
function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){
$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo' onclick='fechar_janela_mensagem_dialogo(\"$div_id\");'>";
$botao_fechar .= "x";
$botao_fechar .= "</span>";
$html .= "<div id='$div_id' class='div_janela_principal_mensagem_dialogo'>";
$html .= "<div class='div_janela_mensagem_dialogo'>";
$html .= "<div class='div_janela_mensagem_dialogo_titulo'>";
$html .= $botao_fechar;
$html .= $titulo_janela;
$html .= "</div>";
$html .= "<div class='div_janela_mensagem_conteudo'>";
$html .= $conteudo_mensagem;
$html .= "</div>";
$html .= "</div>";
$html .= "</div>";
return $html;
};
function constroe_div_especial_1($conteudo){
$html = "
<div class='constroe_div_especial_1'>$conteudo</div>
";
return $html;
};
function constroe_formulario($conteudo){
$html = "
<div class='classe_div_formulario'>$conteudo</div>
";
return $html;
};
function constroe_formulario_barra_progresso($url_envio, $id_formulario, $nome_file, $tipo_pagina, $multiplo, $tipo_arquivo){
global $idioma;
global $requeste;
if(retorne_usuario_logado() == false){
        return null;	
};
$numero_nome_funcao = $tipo_pagina.$tipo_arquivo.$id_formulario;
$idpost = retorne_idpost_request();
$idalbum = retorne_idalbum_post();
$campos_ocultos = "
<input type='hidden' name='$requeste[4]' value='$idpost'>
<input type='hidden' name='$requeste[6]' value='$idalbum'>
";
switch($tipo_arquivo){
	case 1:
	$tipo_arquivo = "accept='image/*'";
	$texto_botao_enviar = $idioma[48];
	break;
	case 2:
	$tipo_arquivo = "accept='audio/*'";
	$texto_botao_enviar = $idioma[50];
	break;
	case 3:
	$tipo_arquivo = "accept='video/*'";
	$texto_botao_enviar = $idioma[51];
	break;
};
switch($tipo_pagina){
    case 8:
	$texto_botao_enviar = $idioma[181];
    break;
};
if($multiplo == false){
		$texto_botao_enviar = $idioma[227];	
};
$id_porcentagem = md5("porcentagem".$numero_nome_funcao);
$id_campo_file = md5("campo_file".$numero_nome_funcao);
$id_div_progresso = md5("campo_div_progresso".$numero_nome_funcao);
$id_div_botao_upload = md5("campo_botao_upload".$numero_nome_funcao);
if($multiplo == true){
        $multiplo = "multiple";
};
$campo_formulario = "
<div class='classe_div_formulario_progresso'>
<form action='$url_envio' method='post' enctype='multipart/form-data' id='$id_formulario'>
<input type='file' id='$id_campo_file' name='$nome_file' onchange='simula_enviar_formulario_barra_progresso_$numero_nome_funcao();' $tipo_arquivo $multiplo>
<div class='classe_exibe_barra_progresso_formulario' id='$id_div_progresso'>
<progress value='0' max='100'></progress>
<span id='$id_porcentagem' class='classe_barra_progresso_formulario_span'>0%</span>
<input type='hidden' name='$requeste[0]' value='$tipo_pagina'>
$campos_ocultos
</div>
$campo_hidden_extra
<div class='classe_div_botao_upload_formulario_progresso' id='$id_div_botao_upload'>
<input type='button' value='$texto_botao_enviar' onclick='simula_clique_file_formulario_barra_progresso_$numero_nome_funcao();'>
</div>
</form> 
</div>
";
$campo_script = "
<script language='javascript'>
$('#$id_formulario').ajaxForm({uploadProgress: function(event, position, total, percentComplete){
$('progress').attr('value',percentComplete);
$('#$id_porcentagem').html(percentComplete+'%');
}, success: function(data){
$('progress').attr('value','100');
$('#$id_porcentagem').html('100%');
$('pre').html(data);
location.reload();
}
});
function simula_clique_file_formulario_barra_progresso_$numero_nome_funcao(){
$('#' + '$id_campo_file').click();
};
function simula_enviar_formulario_barra_progresso_$numero_nome_funcao(){
$('#$id_formulario').submit();
document.getElementById('$id_div_progresso').style.display = 'inline';
document.getElementById('$id_div_botao_upload').style.display = 'none';
};
</script>
";
$html = "
$campo_formulario
$campo_script
";
return $html;
};
function converte_data_amigavel($data){
global $semana_idioma;
global $mes_extenso_idioma;
global $idioma;
if($data == null){
	return null;
};
$data_explode = explode("-", $data); 
if($data_explode[0] == null or $data_explode[1] == null or $data_explode[2] == null){
	return null;
};
$time = mktime(0, 0, 0, $data_explode[1]);
$nome_mes = strftime("%b", $time);
$numero_dia = $data_explode[0];
$mes = $nome_mes; $dia = $data_explode[0]; $ano = $data_explode[2]; 
$ano = explode(":", $ano);
$ano = $ano[0];
$ano = explode(" ", $ano);
$ano = $ano[0];
$dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2]));
$data_completa = $semana_idioma[$dia_semana]." {$dia} $idioma[182] ".$mes_extenso_idioma[$mes]." $idioma[182] {$ano}";
return $data_completa;
};
function formulario_login(){
global $idioma;
if(retorne_usuario_logado() == true){
        return null;
};
$imagem_servidor[0] = retorne_imagem_servidor(28);
$botao_cadastro = "
<input type='button' value='$idioma[206]' onclick='cadastro_usuario();'>
";
if(CONFIG_PERMITE_CADASTRO == false and retorne_idusuario_administrador() != null){
        $botao_cadastro = null;
};
$email = retorne_email_cookie();
$url_index = URL_INDEX_HOME;
$html = "
<div class='classe_div_formulario_login'>
<div class='classe_div_formulario_login_exibir_campos'>
<a href='$url_index' title='$idioma[14]'>$imagem_servidor[0]</a>
<span class='classe_div_formulario_login_span_grande'>$idioma[7]</span>
</div>
<div class='classe_div_formulario_login_campos' id='id_div_formulario_login_campos'>
<div class='classe_mensagem_login_cadastro' id='id_mensagem_login_cadastro'></div>
<div class='classe_div_formulario_login_entrada'>
<input type='text' id='id_email_login' placeholder='$idioma[5]' value='$email' onkeydown='if(event.keyCode == 13){logar_usuario();}'>
<input type='password' id='id_senha_login' placeholder='$idioma[6]' onkeydown='if(event.keyCode == 13){logar_usuario();}'>
</div>
<div class='classe_div_formulario_login_botoes'>
<input type='button' value='$idioma[4]' onclick='logar_usuario();'>
$botao_cadastro
</div>
<div class='classe_div_formulario_login_recupera_conta'>
<div>
<span>$idioma[158]</span>
</div>
<div class='classe_div_recuperar_senha'>
<input type='text' id='campo_email_recuperar_conta_usuario' placeholder='$idioma[159]' onkeydown='if(event.keyCode == 13){recuperar_conta_usuario();}'>
</div>
</div>
</div>
</div>
";
return $html;
};
function formulario_orcamento_servico(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_ACOES;
$imagem_servidor[0] = retorne_imagem_servidor(37);
$campo_estados = gerador_select_option(retorne_array_estados_pais(), null, "estado_contato", null, null);
$html = "
<div class='classe_div_formulario_contato'>
<form action='$url_formulario' method='post'>
<div class='classe_div_formulario_contato_div_1'>
$imagem_servidor[0]
</div>
<span>$idioma[62]</span>
<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='email_telefone_contato' placeholder='$idioma[117]' required>
</div>
<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='cidade_contato' placeholder='$idioma[134]' required>
</div>
<div class='classe_div_formulario_contato_div_2'>
$campo_estados
</div>
<div class='classe_div_formulario_contato_div_2'>
<textarea cols='10' rows='5' name='mensagem_contato' placeholder='$idioma[63]' required></textarea>
</div>
<div class='classe_div_formulario_contato_div_2'>
<input type='submit' value='$idioma[119]' onclick=''>
</div>
<div class='classe_div_formulario_contato_div_2'>
<input type='hidden' name='$requeste[0]' value='30'>
</div>
</form>
</div>
";
return $html;
};
function gerador_select_option($array_options, $valor_atual, $nome, $idcampo, $evento_campo){
$array_options = explode(",", $array_options);
foreach($array_options as $valor){
if($valor == $valor_atual){
        $html .= "<option value='$valor' selected>$valor</option>";
}else{
        $html .= "<option value='$valor'>$valor</option>";
};
};
$html = "<select name='$nome' id='$idcampo' onchange='$evento_campo'>$html</select>";
return $html; 
};
function gerador_select_option_especial($array_options, $array_valores, $valor_atual, $nome, $idcampo, $evento_campo){
$array_options = explode(",", $array_options);
$array_valores = explode(",", $array_valores);
$contador = 0;
foreach($array_options as $valor){
		$valor_especial = $array_valores[$contador];
		$valor_original = $valor;
		if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
				$valor = $valor_especial;
	};
		if($valor == $valor_atual or $valor_especial == $valor_atual){
				$html .= "<option value='$valor_especial' selected>$valor_original</option>";
		}else{
				$html .= "<option value='$valor_especial'>$valor_original</option>";
	};
		$contador++;
};
$html = "<select name='$nome' id='$idcampo' onchange='$evento_campo'>$html</select>";
return $html; 
};
function retorne_href_get(){
global $requeste;
global $idioma;
return remove_html($_REQUEST[$requeste[0]]);
};
function retorne_idusuario_request(){
global $requeste;
$idusuario = remove_html($_REQUEST[$requeste[2]]);
if($idusuario == null){
	    $idusuario = retorne_idusuario_logado();
};
if($idusuario == null){
	    $idusuario = retorne_idusuario_administrador();
};
return $idusuario;
};
function excluir_imagem_galeria_imagens(){
$tabela = TABELA_GALERIA_IMAGENS;
$id = remove_html($_REQUEST['id']);
$query[0] = "select *from $tabela where id='$id';";
$query[1] = "delete from $tabela where id='$id';";
$dados = retorne_dados_query($query[0]);
comando_executa($query[1]);
$url_imagem_root = $dados['url_imagem_root'];
$url_imagem_miniatura_root = $dados['url_imagem_miniatura_root'];
exclui_arquivo_unico($url_imagem_root);
exclui_arquivo_unico($url_imagem_miniatura_root);
};
function salvar_descricao_imagem_galeria(){
$tabela = TABELA_GALERIA_IMAGENS;
$id = remove_html($_REQUEST['id']);
$conteudo = remove_html($_REQUEST['conteudo']);
$query = "update $tabela set conteudo='$conteudo' where id='$id';";
comando_executa($query);
};
function acento_para_html($texto){
		$texto = str_replace("&nbsp;", " ", $texto);
		$acentos_normal = array('Á','á','Â','â','À','à','Ã','ã','É','é','Ê','ê','È','è','Ó','ó','Ô','ô','Ò','ò','Õ','õ','Í','í','Î','î','Ì','ì','Ú','ú','Û','û','Ù','ù','Ç','ç',);
	$acentos_html = array('&Aacute;','&aacute;','&Acirc;','&acirc;','&Agrave;','&agrave;','&Atilde;','&atilde;','&Eacute;','&eacute;','&Ecirc;','&ecirc;','&Egrave;','&egrave;','&Oacute;','&oacute;','&Ocirc;','&ocirc;','&Ograve;','&ograve;','&Otilde;','&otilde;','&Iacute;','&iacute;','&Icirc;','&icirc;','&Igrave;','&igrave;','&Uacute;','&uacute;','&Ucirc;','&ucirc;','&Ugrave;','&ugrave;','&Ccedil;','&ccedil;');
		$texto = str_replace($acentos_html, $acentos_normal, $texto);
		return $texto;
};
function adiciona_quebra_linha($conteudo){
$conteudo = str_replace("\n", "<br>", $conteudo);
return $conteudo;
};
function chama_pagina_especifica($pagina){
header("Location: $pagina");
};
function cifra_senha_md5($senha){
if($senha != null and strlen($senha) >= TAMANHO_MINIMO_SENHA){
	    $senha = md5($senha);
};
return $senha;
};
function converter_urls($conteudo_post){
$conteudo_post = converte_url_video_youtube($conteudo_post);
$conteudo_post = converte_url_link($conteudo_post);
return $conteudo_post; 
};
function converte_html_texto($html){
$html = html_entity_decode($html);
$html = strip_tags($html);
$html = acento_para_html($html);
return $html;
};
function converte_minusculo($conteudo){
return mb_strtolower($conteudo, "UTF-8");
};
function converte_url_link($conteudo){
$parametros[0] = '!http://[a-z0-9\-._~\!$&\'()*+,;=:/?#[\]@%]+!i';
$parametros[1] = '!https://[a-z0-9\-._~\!$&\'()*+,;=:/?#[\]@%]+!i';
$funcao_chama = '_funcao_converte_link_imagem_via_url';
$conteudo = preg_replace_callback($parametros[0], $funcao_chama, $conteudo);
$conteudo = preg_replace_callback($parametros[1], $funcao_chama, $conteudo);
return $conteudo;
};
function converte_url_video_youtube($conteudo_post){
return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<br><iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $conteudo_post);
};
function data_atual(){
$data_atual = Date("d-m-Y G:i:s");
return $data_atual;
};
function escapar_codigo_html($html){
$html = addslashes($html);
$html = htmlentities($html);
return $html;
};
function remove_acentos($texto){
$map = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'Á' => 'A',
    'À' => 'A',
    'Ã' => 'A',
    'Â' => 'A',
    'É' => 'E',
    'Ê' => 'E',
    'Í' => 'I',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ú' => 'U',
    'Ü' => 'U',
    'Ç' => 'C'
);
$texto = strtr($texto, $map);
return remove_parenteses($texto);
};
function remove_html($html){
$html = addslashes($html);
$html = strip_tags($html);
if(verifica_se_email_valido($html) == true){
        $html = converte_minusculo($html);
};
return $html;
};
function remove_linhas_branco($conteudo){
return preg_replace('/\n\s*\n/', "\n", $conteudo);
};
function remove_parenteses($texto){
return preg_replace("/[^a-z0-9_\s-]/", "", $texto);
};
function remove_url_conteudo($conteudo){
$regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@";
return preg_replace($regex, ' ', $conteudo);
};
function retorne_array_estados_pais(){
$html = "
Acre, 
Alagoas, 
Amapá, 
Amazonas, 
Bahia, 
Ceará, 
Distrito Federal, 
Espírito Santo, 
Goiás, 
Maranhão, 
Mato Grosso, 
Mato Grosso do Sul, 
Minas Gerais, 
Pará, 
Paraíba, 
Paraná, 
Pernambuco, 
Piauí, 
Rio de Janeiro, 
Rio Grande do Norte, 
Rio Grande do Sul, 
Rondônia, 
Roraima, 
Santa Catarina, 
São Paulo, 
Sergipe, 
Tocantins
";
return $html;
};
function retorne_contador_iteracao(){
$_SESSION[SESSAO_CONTADOR_ITERACAO]++;
return $_SESSION[SESSAO_CONTADOR_ITERACAO];
};
		function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){
				if($array_pesquisa == null){
			return false;
		};
				foreach($array_pesquisa as $valor_array){
						if($valor_array == $valor_pesquisa){
				return true;
			};
		};
				return false;
	};
function retorne_idcampo_md5(){
return md5("idcampo_md5_".retorne_contador_iteracao().data_atual());
};
function retorne_imagem_servidor($numero){
global $idioma;
global $pagina_href;
global $requeste;
$dados = retorne_dados_sobre_site();
switch($numero){
	case 0:
	$url_link = PAGINA_INICIAL;
	$titulo = $dados["email_contato"];
	break;
	case 1:
	$url_link = null;
	$titulo = $idioma[48];
	break;
	case 2:
	$url_link = null;
	$titulo = $idioma[52];
	break;
	case 3:
	$url_link = null;
	$titulo = $idioma[53];
	break;
	case 4:
	$url_link = null;
	$titulo = null;
	break;
	case 5:
	$url_link = null;
	$titulo = null;
	break;
	case 6:
	$url_link = null;
	$titulo = $idioma[45];
	break;
	case 7:
	$url_link = null;
	$titulo = $idioma[47];
	break;
	case 8:
	$url_link = null;
	$titulo = null;
	break;
	case 9:
	$url_link = null;
	$titulo = null;
	break;
	case 10:
	$url_link = null;
	$titulo = null;
	break;
	case 11:
	$url_link = null;
	$titulo = null;
	break;
	case 12:
	$url_link = null;
	$titulo = null;
	break;
	case 13:
	$url_link = null;
	$titulo = null;
	break;
	case 14:
	$url_link = null;
	$titulo = null;
	break;
	case 15:
	$url_link = null;
	$titulo = null;
	break;
	case 16:
	$url_link = null;
	$titulo = $idioma[98];
	break;
	case 17:
	$url_link = null;
	$titulo = $idioma[99];
	break;
	case 18:
	$url_link = null;
	$titulo = null;
	break;
	case 19:
	$url_link = null;
	$titulo = $idioma[113];
	break;
	case 20:
	$url_link = null;
	$titulo = null;
	$endereco = true;
	break;
	case 21:
	$url_link = null;
	$titulo = null;
	$endereco = true;
	break;
	case 22:
	$url_link = null;
	$titulo = $idioma[141];
	break;
	case 23:
	$url_link = null;
	$titulo = $idioma[140];
	break;
	case 24:
	$url_link = null;
	$titulo = $idioma[143];
	break;
	case 25:
	$url_link = null;
	$titulo = $idioma[147];
	break;
	case 26:
	$url_link = null;
	$titulo = $idioma[156];
	break;
	case 27:
	$url_link = null;
	$titulo = null;
	break;
	case 28:
	$url_link = null;
	$titulo = $idioma[4];
	break;
	case 29:
	$url_link = PAGINA_INICIAL;
	$titulo = $idioma[165];
	break;
	case 30:
	$url_link = $pagina_href[28];
	$titulo = $dados["email_contato"];
	break;
	case 31:
	$url_link = null;
	$titulo = $idioma[166];
	break;
	case 32:
	$url_link = null;
	$titulo = $idioma[30];
	break;
	case 33:
	$url_link = null;
	$titulo = $idioma[176];
	break;
	case 34:
	$url_link = null;
	$titulo = $idioma[179];
	break;
	case 35:
	$url_link = null;
	$titulo = $idioma[148];
	break;
	case 36:
	$url_link = null;
	$titulo = $idioma[185];
	break;
	case 37:
	$url_link = null;
	$titulo = $idioma[61];
	break;
	case 38:
	$url_link = null;
	$titulo = $idioma[192];
	break;
	case 39:
	$url_link = null;
	$titulo = $idioma[84];
	break;
};
if($endereco == true){
		return PASTA_IMAGENS_SISTEMA."$numero.png";
};
if($url_link == null){
		$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
}else{
		$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
		if($evento == null){
	$imagem = "<a href='$url_link' title='$titulo'>$imagem</a>";
};
};
return $imagem;
};
function retorne_incrementador(){
if($_SESSION[CONFIG_SESSAO_1] == null){
		$_SESSION[CONFIG_SESSAO_1] = 0;
}else{
	    $_SESSION[CONFIG_SESSAO_1]++;
};
return $_SESSION[CONFIG_SESSAO_1];
};
function retorne_tamanho_resultado($numero_resultados){
				$tamanho_mil = 1000;
		$tamanho_milhao = 1000000;
		$tamanho_bilhao = 1000000000;
				if($numero_resultados == null){
						$numero_resultados = 0;
		};
				if($numero_resultados == 0){
			return 0;
		};
			$retorno = $numero_resultados;
		if($numero_resultados >= $tamanho_mil){
		$retorno = round($numero_resultados / $tamanho_mil, 2)."k";
	};
		if($numero_resultados >= $tamanho_milhao){
		$retorno = round($numero_resultados / $tamanho_milhao, 2)."mi";
	};
		if($numero_resultados >= $tamanho_bilhao){
		$retorno = round($numero_resultados / $tamanho_bilhao, 2)."bi";
	};
		return $retorno;
};
function retorne_url_atual(){
$url_servidor = $_SERVER['SERVER_NAME'];
$endereco_url = $_SERVER ['REQUEST_URI'];
return "http://".$url_servidor.$endereco_url;
};
function timer_sistema($segundos, $funcoes_timer){
$segundos *= 1000;
$codigo_md5[0] = "a".md5($segundos.$funcoes_timer);
$codigo_md5[1] = "b".md5($segundos.$funcoes_timer);
$codigo_md5[2] = "c".md5($segundos.$funcoes_timer);
$html = "
\n
<script language='javascript'>
\n
var $codigo_md5[2] = setInterval(function(){ $codigo_md5[1]() }, $segundos);
\n
function $codigo_md5[1]() {
\n
$codigo_md5[0]();
\n
};
\n
function $codigo_md5[0](){
\n
$funcoes_timer
\n
};
\n
</script>
\n
";
return $html;
};
function verifica_se_email_valido($email){
$email = converte_minusculo(trim($email));
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	    list($usuario, $dominio) = explode("@", $email);
		if(checkdnsrr($dominio, "MX")){
				return true;
	}else{
				return false;
	}
}else{
	    return false;
};
};
function _funcao_converte_link_imagem_via_url($matches)
{     if (preg_match('/\.(?:jpe?g|png|gif)(?:$|[?#])/', $matches[0]))
    {         return '<p><img class="imagem_convertida_url" src="'. $matches[0] .'"></p>';
    }     return '<a target="_blank" href="'. $matches[0] .'">'. $matches[0] .'</a>';
	};
function campo_recortar_imagem($dados){
global $idioma;
global $requeste;
$id = $dados['id'];
$imagem_grande_url = $dados['url_imagem_perfil'];
$imagem_miniatura_url = $dados['url_imagem_perfil'];
$nome_usuario = $dados['nome'];
$tipo_pagina = $dados['tipo_pagina'];
$url_pagina = $dados['url_pagina'];
if($url_pagina == null){
		$url_pagina = PAGINA_ACOES;
};
$html = "
<div class='classe_div_campo_altera_imagem_perfil'>
<div class='classe_div_pre_visualiza_imagem_perfil_recortar' id='id_div_pre_visualiza_imagem_perfil'>
<img src='$imagem_grande_url' title='$nome_usuario' id='cropbox'>
</div>
<div class='classe_div_formulario_recorte_imagem_grande_url'>
<form action='$url_pagina' method='post' enctype='multipart/form-data' onsubmit='return checkCoords();'>
<input type='hidden' id='x' name='x'>
<input type='hidden' id='y' name='y'>
<input type='hidden' id='w' name='w'>
<input type='hidden' id='h' name='h'>
<input type='hidden' value='$id' name='$requeste[2]'>
<input type='hidden' value='$imagem_grande_url' name='imagem_grande_url'>
<input type='hidden' value='$imagem_miniatura_url' name='imagem_miniatura_url'>
<input type='hidden' name='$requeste[0]' value='$tipo_pagina'>
<input type='hidden' value='' name='endereco_imagem_grande_url_upload' id='id_endereco_imagem_grande_url_upload'>
<input type='submit' value='$idioma[108]'>
</form>
</div>
</div>
";
return $html;
};
function recorta_imagem_perfil_usuario(){
$targ_w[0] = TAMANHO_IMG_PERFIL_RECORTAR_LARGURA;
$targ_h[0] = TAMANHO_IMG_PERFIL_RECORTAR_ALTURA;
$targ_w[1] = TAMANHO_IMG_PERFIL_RECORTAR_LARGURA_MIN;
$targ_h[1] = TAMANHO_IMG_PERFIL_RECORTAR_ALTURA_MIN;
$jpeg_quality = 100;
$src[0] = remove_html($_REQUEST['imagem_perfil']);
$img_r[0] = imagecreatefromjpeg($src[0]);
$dst_r[0] = ImageCreateTrueColor($targ_w[0], $targ_h[0]);
imagecopyresampled($dst_r[0], $img_r[0], 0, 0, $_POST['x'], $_POST['y'], $targ_w[0], $targ_h[0], $_POST['w'], $_POST['h']);
$src[1] = remove_html($_REQUEST['imagem_perfil']);
$img_r[1] = imagecreatefromjpeg($src[1]);
$dst_r[1] = ImageCreateTrueColor($targ_w[1], $targ_h[1]);
imagecopyresampled($dst_r[1], $img_r[1], 0, 0, $_POST['x'], $_POST['y'], $targ_w[1], $targ_h[1], $_POST['w'], $_POST['h']);
$dados_imagem = retorne_imagem_perfil_usuario_root();
$imagem_perfil = $dados_imagem['imagem_perfil'];
$imagem_perfil_miniatura = $dados_imagem['imagem_perfil_miniatura'];
imagejpeg($dst_r[0], $imagem_perfil);
imagejpeg($dst_r[1], $imagem_perfil_miniatura);
chama_pagina_inicial();
};
function logar_usuario(){
global $idioma;
$email = remove_html($_REQUEST['email']);
$senha = remove_html($_REQUEST['senha']);
$senha = cifra_senha_md5($senha);
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
if(retorne_numero_linhas_query($query) == 1){
        salvar_cookies($email, $senha, false);
        return true;
}else{
        salvar_cookies(retorne_email_cookie(), null, false);
        return mensagem_sistema($idioma[13]);
};
};
function retorne_usuario_logado(){
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
if(retorne_numero_linhas_query($query) == 1 and $email != null and $senha != null){
		return true;
}else{
		return false;	
};
};
function mensagem_sistema($mensagem){
$html .= "<div class='classe_div_mensagem_sistema'>";
$html .= $mensagem;
$html .= "</div>";
return $html;
};
function mensagem_sistema_sucesso($mensagem){
$html .= "<div class='classe_div_mensagem_sistema_sucesso'>";
$html .= $mensagem;
$html .= "</div>";
return $html;
};
function adiciona_item_menu(){
if(retorne_usuario_administrador() == false){
        return null;
};
$titulo_menu = ucfirst(remove_html($_REQUEST["titulo_menu"]));
$link_menu = remove_html($_REQUEST["link_menu"]);
$tipo_menu = remove_html($_REQUEST["tipo_menu"]);
$id = remove_html($_REQUEST["id"]);
$data = data_atual();
switch($tipo_menu){
    case 1:
	$tabela = TABELA_MENUS;
    $query[0] = "select *from $tabela where titulo_menu='$titulo_menu';";
    $query[1] = "insert into $tabela values(null, '$titulo_menu', '$link_menu', '$data');";
	break;
	case 2:
	$tabela = TABELA_SUBMENUS;
	$query[1] = "insert into $tabela values(null, '$id', '$titulo_menu', '$link_menu', '$data');";
	break;
	default:
	$tabela = TABELA_MENUS;
	$query[0] = "select *from $tabela where titulo_menu='$titulo_menu';";
	$query[1] = "insert into $tabela values(null, '$titulo_menu', '$link_menu', '$data');";
};
if($query[0] != null){
	    if(retorne_numero_linhas_query($query[0]) > 0 or strlen($titulo_menu) == 0){
	    return null;
    };
};
query_executa($query[1]);
};
function atualizar_item_menu(){
$titulo = remove_html($_REQUEST["titulo"]);
$link = remove_html($_REQUEST["link"]);
$id = remove_html($_REQUEST["id"]);
$modo = remove_html($_REQUEST["modo"]);
$data = data_atual();
switch($modo){
    case 1:
	$tabela = TABELA_MENUS;
    break;
	case 2:
	$tabela = TABELA_SUBMENUS;
	break;
};
$query = "update $tabela set titulo_menu='$titulo', link_menu='$link', data='$data' where id='$id';";
query_executa($query);
};
function campo_cria_menu($modo){
global $idioma;
if(retorne_usuario_administrador() == false){
        return null;
};
if($modo == true){
		$modo = null;
		$tipo_menu = 1;
		$texto_botao = $idioma[195];
		$cor_div = "cor_1";
		$placeholder[0] = $idioma[194];
	$placeholder[1] = $idioma[196];
}else{
	    $modo = "sub_menu";	
		$tipo_menu = 2;
		$texto_botao = $idioma[197];
		$cor_div = "cor_2";
		$placeholder[0] = $idioma[198];
	$placeholder[1] = $idioma[199];
};
$idcampo[0] = md5("id_campo_titulo_menu".data_atual().$modo);
$idcampo[1] = md5("id_campo_link_menu".data_atual().$modo);
$eventos[0] = "onkeydown='if(event.keyCode == 13){adiciona_item_menu(\"$idcampo[0]\", \"$idcampo[1]\", \"$tipo_menu\");}'";
$eventos[1] = "onclick='adiciona_item_menu(\"$idcampo[0]\", \"$idcampo[1]\", \"$tipo_menu\");'";
$html = "
<div class='classe_div_campo_cria_menu $cor_div'>
<div class='classe_div_campo_cria_menu_entrada'>
<input type='text' placeholder='$placeholder[0]' id='$idcampo[0]' $eventos[0]>
</div>
<div class='classe_div_campo_cria_menu_entrada'>
<input type='text' placeholder='$placeholder[1]' id='$idcampo[1]' $eventos[0]>
</div>
<div class='classe_div_campo_cria_menu_cria'>
<input type='button' value='$texto_botao' $eventos[1]>
</div>
</div>
";
return $html;
};
function carregar_submenus_criar(){
$idmenu = remove_html($_REQUEST["id"]);
$tabela = TABELA_SUBMENUS;
$query = "select *from $tabela where idmenu='$idmenu' order by id desc;";
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
		$id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];
		if($id != null){
		$lista_titulos .= "$titulo_menu,";
		$lista_ids_menu .= "$id,";
	};
};
$campo_cria_menu = campo_cria_menu(false);
$idcampo[0] = md5("campo_select_submenu_usando_$idmenu".data_atual());
$array_campos[0] = md5("campo_titulo_menu_$idmenu".data_atual());
$array_campos[1] = md5("campo_url_menu_$idmenu".data_atual());
$evento[0] = "atualizar_submenu_usando(\"$idcampo[0]\", \"$array_campos[0]\", \"$array_campos[1]\");";
$menus_select = constroe_menus_select($idcampo[0], $evento[0], $idmenu, 2, $array_campos);
$html = "
<div class='classe_campo_criar_menus_site'>
<div class='classe_campo_criar_menus_site_campos'>$campo_cria_menu</div>
<div class='classe_campo_criar_menus_site_select'>$menus_select</div>
</div>
";
return $html;
};
function carrega_titulo_link_menu(){
$id = remove_html($_REQUEST["id"]);
$modo = remove_html($_REQUEST["modo"]);
$data = data_atual();
switch($modo){
    case 1:
	$tabela = TABELA_MENUS;
    break;
	case 2:
	$tabela = TABELA_SUBMENUS;
	break;
};
$query = "select *from $tabela where id='$id';";
return json_encode(retorne_dados_query($query));
};
function constroe_campo_edita_menu($modo, $array_campos){
global $idioma;
if(retorne_usuario_administrador() == false){
        return null;
};
switch($modo){
    case 1:
	$texto_campo[0] = $idioma[194];
	$texto_campo[1] = $idioma[196];
    break;
	case 2:
	$texto_campo[0] = $idioma[198];
	$texto_campo[1] = $idioma[199];
	break;
};
$icampo[0] = $array_campos[0];
$icampo[1] = $array_campos[1];
$eventos[0] = "onkeyup='atualizar_item_menu(\"$icampo[0]\", \"$icampo[1]\", \"$modo\");'";
$html = "
<div class='classe_campo_edita_menu'>
<div class='classe_campo_edita_menu_separa'>
<input type='text' id='$icampo[0]' placeholder='$texto_campo[0]' $eventos[0]>
</div>
<div class='classe_campo_edita_menu_separa'>
<input type='text' id='$icampo[1]' placeholder='$texto_campo[1]' $eventos[0]>
</div>
</div>
";
return $html;
};
function constroe_campo_excluir_menu($modo){
global $idioma;
$imagem_sistema[0] = retorne_imagem_servidor(16);
$idcampo[0] = md5("id_dialogo_excluir_menu".data_atual());
$evento[0] = "onclick='excluir_item_menu(\"$modo\");'";
$evento[1] = "onclick='dialogo_excluir_menu(\"$idcampo[0]\");'";
$html = "
$idioma[200]
<br>
<br>
<input type='button' value='$idioma[201]' $evento[0]>
";
$html = janela_mensagem_dialogo($idioma[202], $html, $idcampo[0]);
$html = "
<div class='classe_campo_excluir_menu'>
<span class='classe_campo_excluir_menu_span' $evento[1]>
$imagem_sistema[0]
</span>
</div>
$html
";
return $html;
};
function constroe_criar_menus(){
global $idioma;
$idcampo[0] = md5("id_select_campo_cria_menus".data_atual());
$idcampo[1] = md5("id_div_exibe_menus_criados".data_atual());
$array_campos[0] = md5("campo_titulo_menu_$idmenu".data_atual());
$array_campos[1] = md5("campo_url_menu_$idmenu".data_atual());
$evento[0] = "carregar_submenus_criar(\"$idcampo[0]\", \"$idcampo[1]\", \"$array_campos[0]\", \"$array_campos[1]\");";
$campo_menus = constroe_menus_select($idcampo[0], $evento[0], null, 1, $array_campos);
$campo_cria_menu = campo_cria_menu(true);
$html = "
<div class='classe_campo_criar_menus_site'>
<div class='classe_campo_criar_menus_site_campos'>$campo_cria_menu</div>
<div class='classe_campo_criar_menus_site_select'>$campo_menus</div>
<div class='classe_campo_criar_menus_site_submenus' id='$idcampo[1]'></div>
</div>
";
return $html;
};
		function constroe_links_menu_vertical($link){
				foreach($link as $link_url){
						if($link_url != null){
								$html .= $link_url;
			};
		};
				return $html;
	};
function constroe_menus_select($idcampo, $evento_campo, $idmenu, $modo, $array_campos){
if(retorne_usuario_administrador() == false){
        return null;
};
switch($modo){
	case 1:
    $tabela = TABELA_MENUS;
	$query = "select *from $tabela order by id desc;";
    break;
	case 2:
	$tabela = TABELA_SUBMENUS;
	$query = "select *from $tabela where idmenu='$idmenu' order by id desc;";
	break;
}
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
		$id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];
		if($id != null){
		$lista_titulos .= "$titulo_menu,";
		$lista_ids_menu .= "$id,";
	};
};
$html .= constroe_campo_excluir_menu($modo);
$html .= gerador_select_option_especial($lista_titulos, $lista_ids_menu, null, null, $idcampo, $evento_campo);
$html .= constroe_campo_edita_menu($modo, $array_campos);
return $html;
};
function constroe_menu_navegacao_topo(){
global $idioma;
global $requeste;
if(CONFIG_EXIBE_MENUS_NAVEGACAO_TOPO == false){
        return null;
};
$url_pagina_inicial = PAGINA_INICIAL;
$tabela = TABELA_MENUS;
if(CONFIG_INVERTER_ORDEM_MENU == true){
        $query = "select *from $tabela order by id desc;";
}else{
        $query = "select *from $tabela order by id asc;";
};
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
        return null;
};
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
        $id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];
		if($id != null){
				if($link_menu == "#"){
						$link_menu = "<a href='#id' id='$id' title='$titulo_menu'>$titulo_menu</a>";
		}else{
						$link_menu = "<a href='$link_menu' title='$titulo_menu'>$titulo_menu</a>";
		};
				$lista_links = links_submenu($id);
				if($lista_links != null){
					    $lista_menus .= "
		    <li>
		    $link_menu
		    <ul>$lista_links</ul>
		    </li>
		    ";
		}else{
						$lista_menus .= "
			<li>$link_menu</li>
			";
		};
	};
};
$html = "
<div class='classe_menu_navegacao_topo'>
<nav>
<ul class='menu'>$lista_menus</ul>
</nav>
</div>
";
return $html;
};
function constroe_menu_navegacao_vertical($titulo, $conteudo){
global $idioma;
$html = "
<div class='classe_div_menus_vertical'>
<div class='classe_div_titulo_menu_vertical'>$titulo</div>
<div class='classe_menu_vertical_menus'>$conteudo</div>
</div>
";
return $html;
};
function excluir_item_menu(){
if(retorne_usuario_administrador() == false){
        return null;
};
$idmenu = remove_html($_REQUEST["idmenu"]);
$id_submenu = remove_html($_REQUEST["id_submenu"]);
$modo = remove_html($_REQUEST["modo"]);
$tabela[0] = TABELA_MENUS;
$tabela[1] = TABELA_SUBMENUS;
switch($modo){
    case 1: 	$query[0] = "delete from $tabela[0] where id='$idmenu';";
	$query[1] = "delete from $tabela[1] where idmenu='$idmenu';";
	break;
	case 2: 	$query[1] = "delete from $tabela[1] where id='$id_submenu';";
	break;
};
executador_querys($query);
};
function links_submenu($idmenu){
$tabela = TABELA_SUBMENUS;
if(CONFIG_INVERTER_ORDEM_MENU == true){
        $query = "select *from $tabela where idmenu='$idmenu' order by id asc;";
}else{
        $query = "select *from $tabela where idmenu='$idmenu' order by id desc;";
};
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
        $dados = retorne_dados_comando($comando);
        $id = $dados["id"];
    $titulo_menu = $dados["titulo_menu"];
    $link_menu = $dados["link_menu"];
		if($id != null){
				if($link_menu == "#"){
						$link_menu = "<a href='#id' id='$id' title='$titulo_menu'>$titulo_menu</a>";
		}else{
						$link_menu = "<a href='$link_menu' title='$titulo_menu'>$titulo_menu</a>";
		};
				$html .= "
		<li class='last'>$link_menu</li>
		";
	};
};
return $html;
};
function chama_pagina_inicial(){
$index = URL_SERVIDOR;
header("Location: $index");
die;
};
function constroe_dependencias_timer(){
if(retorne_numero_imagens_slideshow() != 0){
		$html .= "
	\n
	carregar_slideshow();
	\n
	";
};
$html = timer_sistema(25, $html);
return $html;
};
function constroe_rodape_pagina(){
global $idioma;
if(retorna_usar_resolucao() == true and CONFIG_EXIBE_RODAPE_MODO_RESOLUCAO == false){
        return null;
};
$dados = retorne_dados_sobre_site();
$copyright_sistema = $dados["copyright"];
$tabela = TABELA_RODAPE;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$conteudo_1 = html_entity_decode($dados["conteudo_1"]);
$conteudo_2 = html_entity_decode($dados["conteudo_2"]);
$conteudo_3 = html_entity_decode($dados["conteudo_3"]);
$conteudo[0] = "
<div class='classe_div_conteudo_rodape_separa_1'>
$conteudo_1
</div>
";
$conteudo[1] = "
<div class='classe_div_conteudo_rodape_separa_2'>
$conteudo_2
</div>
";
$conteudo[2] = "
<div class='classe_div_conteudo_rodape_separa_3'>
$conteudo_3
</div>
";
$desenvolvedor = DESENVOLVEDOR_SISTEMA_RODAPE;
$html = "
<div class='div_rodape_pagina'>
$conteudo[0]
$conteudo[1]
$conteudo[2]
<div class='classe_div_conteudo_rodape_copyright'>$copyright_sistema</div>
<div class='classe_rodape_desenvolvedor'>$desenvolvedor</div>
</div>
";
return $html;
};
function constroe_sub_topo_pagina(){
global $idioma;
if(CONFIG_EXIBE_WIDGET_TOPO == true and retorne_href_get() != $idioma[4] and retorne_usuario_logado() == false){
        $campo[0] = campo_widget_topo();
};
if(CONFIG_EXIBE_TOPO_PAGINA == true){
		$campo[1] = "
	<div class='div_sub_topo_pagina'></div>
	";
};
$html = "
$campo[0]
$campo[1]
";
return $html;
};
function constroe_tag_body(){
$html .= "<body onmousemove='' onkeydown=''>";
return $html;
};
function constroe_topo_pagina(){
global $idioma;
if(retorne_href_get() == $idioma[4]){
        return null;
};
$pagina_inicial = PAGINA_INICIAL;
if(CONFIG_EXIBE_LOGOTIPO == true){
        $logotipo_topo .= "<div class='classe_div_logotipo_topo'>";
    $logotipo_topo .= retorne_imagem_servidor(0);
    $logotipo_topo .= "</div>";
};
if(retorne_href_get() != $idioma[38] and retorne_usuario_administrador() != true){
	    $blocos_topo = carrega_blocos_topo();
};
$html .= "<div class='div_topo_pagina'>";
$html .= $logotipo_topo;
$html .= campo_cadastro_topo();
$html .= campo_pesquisa();
$html .= "</div>";
if(CONFIG_EXIBE_WIDGET_MEIO_LADO_SLIDESHOW == true){
	    $campo_widget_meio = campo_widget_meio();
};
if(CONFIG_EXIBE_WIDGET_LATERAL_LADO_SLIDESHOW == true){
		$campo_widget_lateral = campo_widget();
};
if(CONFIG_COLOCAR_MENU_TOP_DESTAQUE == false){
		$campo_navegacao_topo = constroe_menu_navegacao_topo();
};
$campo_slide_show = constroe_slide_show();
$html .= "
<div class='div_topo_navega_pagina'>
$campo_navegacao_topo
$campo_slide_show
$campo_widget_lateral
$campo_widget_meio
$blocos_topo
</div>
";
return $html;
};
function constroe_variaveis_js_pagina(){
global $requeste;
$url_pagina_acoes = PAGINA_ACOES;
$href_pagina = retorne_href_get();
$limit_chat_usuario = LIMIT_MAX_NUM_USUARIOS_CHAT;
$limit_chat_conversas = CONFIG_LIMIT_CONVERSAS_CHAT;
$termo_pesquisa = retorne_termo_pesquisa();
$largura_atual_sistema = TAMANHO_RESOLUCAO_PADRAO;
$limit_imagens_album = CONFIG_LIMIT_IMAGENS_ALBUM;
$contador_avanco_galeria_imagens_album += CONFIG_LIMIT_IMAGENS_ALBUM;
$categoria_atual = retorne_categoria_request();
$url_servidor = URL_SERVIDOR;
$limit_publicacoes = CONFIG_LIMIT_PUBLICACOES;
$tipo_post = retorna_tipo_post_request();
$html = "<script>
var v_pagina_acoes = '$url_pagina_acoes';
\n
var v_contador_slideshow = 0;
\n
var v_slideshow_pausado = 0;
\n
var v_contador_avanco_publicacoes = 0;
\n
var v_href = '$href_pagina';
\n
var contador_avanco_chat = 0;
\n
var array_usuarios_chat = [];
\n
var v_limit_chat_usuario = $limit_chat_usuario;
\n
var v_limit_chat_conversas = $limit_chat_conversas;
\n
var contador_avanco_mensagens_chat = 0;
\n
var contador_avanco_historico_chat = 0;
\n
var $requeste[1] = '$termo_pesquisa';
\n
var v_largura_atual_sistema = $largura_atual_sistema;
\n
var v_contador_timer_paginacao = 0;
\n
var v_contador_avanco_galeria_imagens_album = $contador_avanco_galeria_imagens_album;
\n
var v_limit_imagens_album = $limit_imagens_album;
\n
var v_categoria_atual = \"$categoria_atual\";
\n
var v_idmenu_usando = null;
\n
var v_idsubmenu_usando = null;
\n
var v_url_servidor = \"$url_servidor\";
\n
var v_limit_publicacoes = $limit_publicacoes;
\n
var v_backup_publicacoes = null;
\n
var v_tipo_post = \"$tipo_post\";
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
</script>";
return $html;
};
function monta_pagina(){
global $idioma;
global $tema_disponivel;
$dados_sobre_site = retorne_dados_sobre_site();
$usar_resolucao = retorna_usar_resolucao();
$autor_pagina = $dados_sobre_site["autor"];
$dependencia[0] = "<script type='text/javascript' src='".ARQUIVO_JQUERY."'></script>";
$dependencia[1] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_HOST."'/>";
$dependencia[2] = "<script type='text/javascript' src='".ARQUIVO_JQUERY_FORM."'></script>";
$dependencia[3] = "<script type='text/javascript' src='".ARQUIVO_JS_HOST."'></script>";
$dependencia[4] = "<script type='text/javascript' src='".ARQUIVO_JQUERY_PAGINACAO."'></script>";
$dependencia[5] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_RESOLUCAO."'/>";
$dependencia[6] = "<link rel='stylesheet' type='text/css' href='".$tema_disponivel[NUMERO_TEMA_USAR]."'/>";
if($usar_resolucao == false){
$dependencia[5] = null;
};
$titulo_pagina = retorna_titulo_pagina();
$metas_pagina .= "<meta charset='UTF-8'>";
$metas_pagina .= "<meta name='viewport' content='width=device-width'/>";
$metas_pagina .= "<meta name='author' content='$autor_pagina'>";
if(CONFIG_INVERTER_TOPO_PAGINA == true){
		$campo_topo .= constroe_topo_pagina();
	$campo_topo .= constroe_sub_topo_pagina();
}else{
		$campo_topo .= constroe_sub_topo_pagina();
	$campo_topo .= constroe_topo_pagina();
};
if(retorne_href_get() != $idioma[4]){
	    $campo_rodape .= mensagem_subrodape();
    $campo_rodape .= constroe_rodape_pagina();
};
if(CONFIG_EXIBE_WIDGET_MEIO == true and retorne_href_get() != $idioma[4] and CONFIG_EXIBE_WIDGET_MEIO_LADO_SLIDESHOW == false){
	    $campo_widget_meio = campo_widget_meio();
};
$html .= "<html>";
$html .= "<head>";
$html .= "<title>$titulo_pagina</title>";
$html .= $dependencia[0];
$html .= $dependencia[1];
$html .= $dependencia[2];
$html .= $dependencia[6];
$html .= $metas_pagina;
$html .= retorna_meta_dados_pagina();
$html .= constroe_variaveis_js_pagina();
$html .= carrega_recursos_cabecalho();
$html .= $dependencia[5];
$html .= "</head>";
$html .= constroe_tag_body();
$html .= "<div class='classe_div_corpo_pagina'>";
$html .= $campo_topo;
$html .= constroe_campo_administrador_modo_resolucao();
$html .= "<div class='classe_div_principal_pagina'>";
$html .= $campo_widget_meio;
$html .= constroe_conteudo();
$html .= "</div>";
$html .= $campo_rodape;
$html .= "</div>";
$html .= "</body>";
$html .= $dependencia[3];
$html .= $dependencia[4];
$html .= constroe_dependencias_timer();
$html .= scripts_js_carregar_onload();
$html .= carregar_atualizacoes_jquery();
$html .= carregar_atualizacoes_jquery_longo();
$html .= constroe_paginadores_javascript();
$html .= carregar_header_redes_sociais();
$html .= "</html>";
$html = remove_linhas_branco($html);
return $html;
};
function retorna_meta_dados_pagina(){
global $meta_descreve;
global $meta_palavras_chave;
$idpost = retorne_idpost_request();
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
$dados = retorne_dados_query($query);
if($dados["id"] == null){
	    $meta_descreve = $dados_sobre_site["descricao"];
    $meta_palavras_chave = $dados_sobre_site["palavras"];
        $html .= "<meta name='description' content='$meta_descreve'>";
    $html .= "<meta name='keywords' content='$meta_palavras_chave'>";
}else{
        $conteudo = substr($dados["conteudo"], 0, CONFIG_TAMANHO_DESCRICAO_PAGINA);
		$meta_descreve = converte_html_texto($conteudo);
		$array_chaves = explode(" ", $meta_descreve);
		$array_chaves = array_unique($array_chaves);
	    foreach($array_chaves as $valor){
				$valor = trim($valor);
				$valor = acento_para_html($valor);
				if(strlen($valor) >= 3){
					    $valor = str_replace(",", null, $valor);
		    $valor = str_replace(".", null, $valor);
		    $valor = str_replace("(", null, $valor);
		    $valor = str_replace(")", null, $valor);
		    $valor = str_replace("[", null, $valor);
		    $valor = str_replace("]", null, $valor);
					    $keywords .= $valor.", ";
		};
	};
        $html .= "<meta name='description' content='$meta_descreve'>";
    $html .= "<meta name='keywords' content='$keywords'>";
};
return $html;
};
function retorna_titulo_pagina(){
global $idioma;
$dados_sobre_site = retorne_dados_sobre_site();
switch(retorne_href_get()){
	case $idioma[31]:
	$titulo_pagina = $idioma[19]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[32]:
	$titulo_pagina = $idioma[47]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[33]:
	$titulo_pagina = $idioma[21]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[34]:
	$titulo_pagina = $idioma[22]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[35]:
	$titulo_pagina = $idioma[23]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[36]:
	$titulo_pagina = $idioma[24]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[37]:
	$titulo_pagina = $idioma[25]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[38]:
	$titulo_pagina = $idioma[26]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[39]:
	$titulo_pagina = $idioma[27]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[40]:
	$titulo_pagina = $idioma[28]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[73]:
	$titulo_pagina = $idioma[22]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[74]:
	$titulo_pagina = $idioma[23]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[77]:
	$titulo_pagina = $idioma[26]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[78]:
	$titulo_pagina = $idioma[27]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[79]:
	$titulo_pagina = $idioma[28]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[81]:
	$titulo_pagina = $idioma[30]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[41]:
	$titulo_pagina = $idioma[132]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[224]:
	$titulo_pagina = $idioma[222]." - ".$dados_sobre_site["nome"];
	break;
	case $idioma[42]:
	$titulo_pagina = $idioma[82]." - ".$dados_sobre_site["nome"];
	break;
	default:
	$titulo_pagina = $dados_sobre_site["nome"];
};
if(retorne_idpost_request() != null){
		$titulo_pagina = retorna_titulo_postagem_idpost(retorne_idpost_request())." - ".$dados_sobre_site["nome"];;
};
return $titulo_pagina;
};
function scripts_js_carregar_onload(){
$html .= "
\n
<script>
";
if(retorne_numero_imagens_slideshow() != 0){
		$html .= "
	\n
	carregar_slideshow();
	\n
	";
};
if(retorne_usuario_logado() == true){
		$html .= "
	\n
    constroe_lista_usuarios_chat();
    \n
	";
};
$html .= "
detecta_resolucao_pagina();
\n
</script>
\n
";
return $html;
};
function comando_executa($query){
if($query{strlen($query) - 1} != ";"){
		$query .= ";";
};
if($query != null){
		$comando = query_executa($query);
}else{
		return null;
};
return $comando;
};
function plugin_conexao($conectar = true){
if($_SESSION["CONEXAO_MYSQLI"] != null){
		if($conectar == true){
				return null;
	}else{
				mysqli_close($_SESSION["CONEXAO_MYSQLI"]);
				$_SESSION["CONEXAO_MYSQLI"] = null;
				return null;		
	};
};
if($conectar == true and $_SESSION["CONEXAO_MYSQLI"] == null){
        $_SESSION["CONEXAO_MYSQLI"] = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, SENHA_MYSQL);
		mysqli_select_db($_SESSION["CONEXAO_MYSQLI"], BANCO_DADOS);
};
};
function query_executa($query){
if($query == null){
		return null;
};
plugin_conexao(true);
return mysqli_query($_SESSION["CONEXAO_MYSQLI"], $query);
};
function retorne_dados_comando($comando){
return @mysqli_fetch_array($comando, MYSQLI_ASSOC);
};
function retorne_dados_query($query){
$comando = comando_executa($query);
$dados = @mysqli_fetch_array($comando, MYSQLI_ASSOC);
return $dados;
};
function retorne_numero_linhas_comando($comando){
if($comando == null){
		return 0;
};
return @mysqli_num_rows($comando);
};
function seleciona_banco($nome_banco){
mysqli_select_db($_SESSION["CONEXAO_MYSQLI"], $nome_banco);
};
function constroe_navegacao_lateral(){
global $idioma;
global $requeste;
if(CONFIG_EXIBE_MENUS_NAVEGACAO_LATERAL == false){
        return null;
};
$url_pagina_inicial = PAGINA_INICIAL;
$tabela = TABELA_CATEGORIAS;
$query = "select *from $tabela order by id asc;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = retorne_dados_comando($comando);
$id = $dados['id'];
$categoria = $dados['categoria'];
if($id != null){
		$numero_itens_categorias = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria));
		$html .= "<a href='$url_pagina_inicial?$requeste[3]=$categoria' title='$categoria'>$categoria - $numero_itens_categorias</a>";
};
};
$html = "
<div class='classe_div_navegacao_lateral'>
<div class='classe_div_navegacao_lateral_titulo'>$idioma[185]</div>
$html
</div>";
return $html;
};
function constroe_paginadores_javascript(){
if(USAR_PAGINADOR_NUMERICO == true){
	    return null;
};
$html = "
<!-- pagina ao carregar a pagina -->
<script language='javascript'>
$(document).ready(function(){
carrega_publicacoes_miniatura();
});
</script>
<!-- --------------------------- -->
<!-- evento ao atingir o bottom da pagina -->
<script language='javascript'>
$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {
carrega_publicacoes_miniatura();
};
});
<!-- --------------------------- -->
</script>
";
return $html;
};
function constroe_paginadores_numericos(){
global $requeste;
global $url_pagina_href;
global $idioma;
if(retorne_numero_publicacoes() <= CONFIG_LIMIT_PUBLICACOES){
        return null;
};
$tipo_post = retorna_tipo_post_request();
$url_pagina_inicial = $url_pagina_href."$requeste[9]=$tipo_post&";
$tabela = TABELA_PUBLICACOES;
$termo_pesquisa = retorne_termo_pesquisa();
$contador_avanco = remove_html($_REQUEST[$requeste[8]]);
$categoria = retorne_categoria_request();
if($termo_pesquisa == null){
    	if($categoria == null){
		        $query = "select *from $tabela where tipo_post='$tipo_post';";
	}else{
		        $query = "select *from $tabela where tipo_post='$tipo_post' and $requeste[3]='$categoria';";
	};
}else{
	    $query = "select *from $tabela where (titulo like '%$termo_pesquisa%' or conteudo like '%$termo_pesquisa%') and tipo_post='$tipo_post';";
};
$numero_linhas = retorne_numero_linhas_query($query);
if(($numero_linhas * 2) <= CONFIG_LIMIT_PUBLICACOES){
		return null;
};
$numero_paginas = ($numero_linhas / CONFIG_LIMIT_PUBLICACOES);
if(is_float($numero_paginas) == true){
	    $numero_paginas = round($numero_paginas);
};
$contador = $contador_avanco;
$proxima_pagina = ($contador_avanco + CONFIG_NUMERO_PAGINAS_TROCA);
$numero_paginas = $proxima_pagina;
$contador -= CONFIG_LIMIT_PUBLICACOES;
for($contador == $contador; $contador <= $numero_paginas; $contador++){
		if(($contador * CONFIG_LIMIT_PUBLICACOES) > $numero_linhas){
	    	    break;
    };
	    $url_pagina = $url_pagina_inicial."$requeste[8]=$contador&$requeste[1]=$termo_pesquisa&$requeste[3]=$categoria";
		$texto_link = $contador + 1;
		if($contador == $contador_avanco){
				$classe_link = "link_paginacao_selecionado";
	}else{
				$classe_link = "link_paginacao";
	};
	if($contador >= 0){
				$html .= "
		<a href='$url_pagina' title='$texto_link' class='$classe_link'>$texto_link</a>
		";
	};
};
$html = "
<div class='classe_campo_paginacao_numerica'>$html</div>
";
return $html;
};
function campo_pesquisa(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_INICIAL;
$html = "
<div class='classe_div_pesquisa'>
<div class='classe_div_pesquisa_campos'>
<form action='$url_formulario' method='get'>
<input type='text' name='$requeste[1]' placeholder='$idioma[148]' value=''>
</form>
</div>
</div>
";
return $html;
};
function retorne_termo_pesquisa(){
global $requeste;
return remove_html($_REQUEST[$requeste[1]]);
};
function atualizar_publicacao(){
global $requeste;
$idpost = retorne_idpost_request();
$titulo = trim(remove_html($_REQUEST['titulo']));
$conteudo = htmlentities($_REQUEST['conteudo']);
$categoria_nome = remove_html($_REQUEST['categoria_postagem']);
$tipo_post = remove_html($_REQUEST[$requeste[9]]);
if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
        $dados_categoria = retorne_dados_categoria($categoria_nome);
		$categoria_id = $dados_categoria["id"];
	$categoria_nome = $dados_categoria["categoria"];
};
$tabela = TABELA_PUBLICACOES;
if($idpost == null or retorne_usuario_administrador() == false){
        return null;
};
upload_imagens_album();
$data = data_atual();
$query = "update $tabela set titulo='$titulo', conteudo='$conteudo', categoria_nome='$categoria_nome', categoria_id='$categoria_id', tipo_post='$tipo_post', data='$data' where id='$idpost';";
comando_executa($query);
salvar_url_amigavel($titulo, $idpost, false);
$url_redirecionar = PAGINA_INICIAL."?$requeste[4]=$idpost";
chama_pagina_especifica($url_redirecionar);
};
function campo_opcoes_publicacao($dados){
global $idioma;
if(retorne_usuario_administrador() == false){
		return null;
};
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$titulo = $dados['titulo'];
$conteudo = $dados['conteudo'];
$idalbum = $dados['idalbum'];
$data = $dados['data'];
$campo_excluir = "
$idioma[111]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_publicacao($id);'>
";
$campo_excluir = janela_mensagem_dialogo($idioma[111], $campo_excluir, "id_dialogo_excluir_publicacao_$id");
$imagem_servidor[0] = retorne_imagem_servidor(16);
$codigo_html = "
<div class='classe_div_opcoes_publicacao'>
<div onclick='dialogo_excluir_publicacao($id);'>$imagem_servidor[0]</div>
</div>
$campo_excluir
";
return $codigo_html;
};
function carrega_publicacoes_miniatura(){
global $idioma;
global $requeste;
$url_pagina_inicial = PAGINA_INICIAL;
$tabela = TABELA_PUBLICACOES;
$limit = retorne_limit();
$termo_pesquisa = retorne_termo_pesquisa();
$categoria = retorne_categoria_request();
$tipo_post = retorna_tipo_post_request();
if($termo_pesquisa != null){
		$query = "select *from $tabela where tipo_post='$tipo_post' and (titulo like '%$termo_pesquisa%' or conteudo like '%$termo_pesquisa%') order by id desc $limit;";
}else{
		if($categoria == null){
				$query = "select *from $tabela where tipo_post='$tipo_post' order by id desc $limit;";
	}else{
				$query = "select *from $tabela where categoria_nome='$categoria' and tipo_post='$tipo_post' order by id desc $limit;";
	};
};
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
		return null;
};
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados['id'];
	$idusuario = $dados['idusuario'];
	$titulo = $dados['titulo'];
	$conteudo = $dados['conteudo'];
	$idalbum = $dados['idalbum'];
	$data = converte_data_amigavel($dados['data']);
	$categoria_nome = $dados['categoria_nome'];
	$categoria_id = $dados["categoria_id"];
		if($categoria_id != null){
				$dados_categoria = retorne_dados_categoria($categoria_id);
				$cor_categoria = $dados_categoria["cor"];
	};
		$conteudo = converte_codigos_sistema($conteudo, false);
		if(strlen($conteudo) > CONFIG_TAMANHO_DESCRICAO_MINIATURA_PUBLICACAO){
				$conteudo = substr($conteudo, 0, CONFIG_TAMANHO_DESCRICAO_MINIATURA_PUBLICACAO)."..."	;
	};
		if(CONFIG_EXIBE_LINK_LEIA_MAIS == true){
				$link_saiba_mais = constroe_link_publicacao_idpost($id, $idioma[164], $idioma[164]);
				$link_saiba_mais = "
		<div class='classe_div_leia_mais_conteudo'>$link_saiba_mais</div>
		";
	};
		$titulo_link = retorne_url_amigavel_publicacao($dados, true);
		$url_imagem_album = retorne_ultima_imagem_idalbum($idalbum, IMAGEM_GRANDE_PUBLICACAO_MINIATURA);
		if($url_imagem_album != null){
				$imagem_post = "<img src='$url_imagem_album' title='$titulo'>";
				$imagem_post = constroe_link_publicacao_idpost($id, $titulo, $imagem_post);
	};
		if($id != null){
				$conteudo = html_entity_decode($conteudo);
		$conteudo = strip_tags($conteudo);
				if(CONFIG_EXIBE_DESCRICAO_MINIATURA_POST == true){
						$conteudo_post = "
			<div class='classe_publicacao_miniatura_conteudo_texto'>
			$conteudo
			</div>
			";
		};
				if($imagem_post != null){
						$campo_imagem = "
			<div class='classe_publicacao_miniatura_imagem'>
			$imagem_post 
			</div>
			";
		};
				if(CONFIG_DATA_TITULO_PUBLICACAO == true){
						$campo_titulo = "
			<div class='classe_publicacao_miniatura_topo'>
			<div class='classe_publicacao_miniatura_topo_data'>$data</div>
			<div class='classe_publicacao_miniatura_titulo'>$titulo_link</div>
			</div>
			";
		}else{
						$campo_titulo = "
			<div class='classe_publicacao_miniatura_topo'>
			<div class='classe_publicacao_miniatura_titulo'>$titulo_link</div>
			</div>
			";
		};
				$numero_itens_categoria = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria_nome));
				if(CONFIG_EXIBE_CATEGORIA_MINIATURA == true and $categoria_nome != null){
						$categoria_nome_codificado = urlencode($categoria_nome);
						$categoria_nome_codificado = "<a href='$url_pagina_inicial?$requeste[3]=$categoria_nome_codificado' title='$idioma[192]'>$categoria_nome - $numero_itens_categoria</a>";
						if($cor_categoria != null){
								$classe_cor[0] = "
				style='background-color: $cor_categoria;'
				";
			};
						$campo_categoria = "
			<div class='classe_div_categoria_subtitulo' $classe_cor[0]>
			$categoria_nome_codificado
			</div>
			";
		};
				if($url_imagem_album == null){
						$campo_imagem = null;
		};
				$campo_relacionados = constroe_publicacoes_miniatura_relacionadas($categoria_nome, $id);
				if(CONFIG_SOCIAL_PUBLICACAO_MINIATURA == true){
						$campo_compartilhar[0] = campo_rede_social(retorne_url_publicacao($id), false);
		};
				if(CONFIG_EXIBE_WIDGET_ENTRE_POSTS == true){
						$widget_post = constroe_widget_postagem(true);
		};
				$codigo_html .= "
		<div class='classe_publicacao_miniatura animated zoomInUp'>
		<div class='classe_publicacao_miniatura_conteudo'>
		$campo_titulo
		$campo_categoria
		$campo_imagem
		$conteudo_post
		$link_saiba_mais
		</div>
		$widget_post
		$campo_compartilhar[0]
		$campo_relacionados
		</div>
		";	
};
	};
return $codigo_html;
};
function constroe_campo_adicionar_imagens_publicacao(){
global $idioma;
global $requeste;
$imagem_servidor[0] = retorne_imagem_servidor(33);
$html = "
<div class='classe_div_publicar_imagens'>
<input type='hidden' name='$requeste[0]' value='3'>
<input type='file' name='fotos[]' id='elemento_file_campo_publicar' class='campo_file_upload' multiple onchange='visualizar_imagens_upload_postagem();'>
<div class='classe_div_publicar_imagens_div' onclick='seleciona_imagens_publicacao_usuario();'>
$imagem_servidor[0]
</div>
<div class='classe_div_imagens_pre_publicacao' id='div_imagens_pre_publicacao'></div>
</div>
";
return $html;
};
function constroe_campo_ckeditor($conteudo, $nome, $idcampo){
if($idcampo == null){
	    $idcampo = md5("campo_ckeditor_".$nome.retorne_idcampo_md5());
};
if($nome == null){
	    $nome = md5("nome_ckeditor_".retorne_idcampo_md5());
};
$altura_ckeditor = CONFIG_ALTURA_CKEDITOR;
$codigo_html = "
<textarea cols='10' rows='10' placeholder='$idioma[44]' id='$idcampo' name='$nome'>$conteudo</textarea>
<script>
CKEDITOR.replace('$idcampo',{
    height: $altura_ckeditor
});
</script>
";
return $codigo_html;
};
function constroe_campo_conteudo_postagem(){
global $idioma;
global $requeste;
$url_pagina_inicial = PAGINA_INICIAL;
$idpost = retorne_idpost_request();
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
$dados = retorne_dados_query($query);
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$titulo = $dados['titulo'];
$conteudo = $dados['conteudo'];
$idalbum = $dados['idalbum'];
$data = converte_data_amigavel($dados['data']);
$categoria_nome = $dados["categoria_nome"];
$categoria_id = $dados["categoria_id"];
if($id == null){
        return null;
};
if($categoria_id != null){
		$dados_categoria = retorne_dados_categoria($categoria_id);
		$cor_categoria = $dados_categoria["cor"];
};
$imagens = constroe_imagens_publicacao($idalbum);
$campo_opcoes = campo_opcoes_publicacao($dados);
$usuario_administrador = retorne_usuario_administrador();
if($idusuario == retorne_idusuario_logado() and retorne_usuario_logado() == true){
		$usuario_administrador = true;
};
if($usuario_administrador == true){
		$campo_titulo = "
	<input type='text' value='$titulo' name='titulo' placeholder='$idioma[43]' id='id_publicacao_titulo_$id'>
	";
		$campo_conteudo = constroe_campo_ckeditor($conteudo, "conteudo", "id_publicacao_conteudo_$id");
		$campo_upload_imagens .= $imagens;
	$campo_upload_imagens .= constroe_campo_adicionar_imagens_publicacao();
		$idcampo[0] = md5("id_campo_select_atualizar_publicacao_$id");
		if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
				$campo_categorias_admin = campo_categorias_select($categoria_id, $idcampo[0]);
	}else{
				$campo_categorias_admin = campo_categorias_select($categoria_nome, $idcampo[0]);
	};
		$campos_ocultos = "
	<input type='hidden' name='$requeste[0]' value='25'>
	<input type='hidden' name='$requeste[4]' value='$id'>
	";
		if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
				$campo_salvar = "
		<div class='classe_div_atualizar_publicacao_salvar'>
		<input type='submit' value='$idioma[112]'>
		</div>
		";
	}else{
				$campo_salvar = "
		<div class='classe_div_atualizar_publicacao_salvar'>
		<input type='button' value='$idioma[112]' onclick='atualizar_publicacao(\"$id\", \"$idcampo[0]\");'>
		</div>
		";
	};
}else{
		$conteudo = html_entity_decode($conteudo);
	$conteudo = converte_url_video_youtube($conteudo);
	$conteudo = converte_codigos_sistema($conteudo, true);
		if(CONFIG_LINKA_TITULO_PUBLICACAO == true){
				$campo_titulo = retorne_url_amigavel_publicacao($dados, true);
	}else{
				$campo_titulo = $titulo;
	};
		$campo_conteudo = $conteudo;
		$campo_upload_imagens = $imagens;
};
if($usuario_administrador == false){
		$campo_compartilhar[0] = campo_rede_social(null, true);
		$numero_itens_categoria = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria_nome));
		$categoria_nome_codificado = urlencode($categoria_nome);
		$link[0] = "<a href='$url_pagina_inicial?$requeste[3]=$categoria_nome_codificado' title='$idioma[192]'>$categoria_nome - $numero_itens_categoria</a>";
		if($categoria_nome != null){
				if($cor_categoria != null){
						$classe_cor[0] = "
			style='background-color: $cor_categoria;'
			";
		};
				$campo_categorias = "
		<div class='classe_div_categoria_postagem' $classe_cor[0]>
		$link[0]
		</div>
		";
	};
		$classe[0] = "classe_topo_publicacao_usuario";
}else{
		$classe[0] = "classe_opcoes_publicar";
};
$campo_autor = constroe_campo_autor_publicacao($idusuario);
$campo_imagens_upload_publicacao = "
<div class='classe_imagens_postagem'>$campo_upload_imagens</div>
";
if(CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true and $usuario_administrador == true){
	    $campo_imagens_publicacao[0] = null;
	$campo_imagens_publicacao[1] = $campo_imagens_upload_publicacao;
}else{
		$campo_imagens_publicacao[0] = $campo_imagens_upload_publicacao;
    $campo_imagens_publicacao[1] = null;
};
if(CONFIG_EXIBE_IMAGEM_CAPA_POST == false and $usuario_administrador == false){
		$campo_imagens_publicacao[0] = null;
};
$campo_tipo_publicacao = constroe_campo_tipo_publicacao($dados);
$campo_relacionados = constroe_publicacoes_miniatura_relacionadas($categoria_nome, $id);
if(CONFIG_EXIBE_WIDGET_POST == true){
		$widget_post = constroe_widget_postagem(true);
};
$html = "
<div class='classe_div_campo_postagem'>
<input type='hidden' name='$requeste[4]' value='$id'>
<input type='hidden' name='$requeste[6]' value='$idalbum'>
$campo_opcoes
<div class='$classe[0]'>
$campo_categorias_admin
$campo_tipo_publicacao
$imagens_topo
</div>
<div class='classe_div_campo_publicar_principal'>
<div class='classe_titulo_postagem'>
$campo_titulo
</div>
<div class='classe_conteudo_postagem'>
$campo_conteudo
</div>
$campo_imagens_publicacao[0]
$campo_imagens_publicacao[1]
$campo_salvar
</div>
<div class='classe_publicacao_miniatura_conteudo_data'>
$data
</div>
$widget_post
$campo_categorias
$campo_autor
$campo_relacionados
$campo_compartilhar[0]
</div>
";
if($usuario_administrador == true and CONFIG_ATUALIZAR_PUBLICACAO_VIA_FORMULARIO == true){
        $url_formulario = PAGINA_ACOES;
        $html = "
    <form action='$url_formulario' method='post' enctype='multipart/form-data'>
    $html
    $campos_ocultos
    </form>
    ";
};
return $html;
};
function constroe_campo_publicar(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_ACOES;
$campo_ckeditor = constroe_campo_ckeditor(null, "conteudo", null);
$campo_categorias = campo_categorias_select(null, null);
$campo_adiciona_imagens = constroe_campo_adicionar_imagens_publicacao();
$campo_tipo_publicacao = constroe_campo_tipo_publicacao(null);
$codigo_html = "
<div class='classe_div_campo_publicar'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>
<div class='classe_opcoes_publicar'>
$campo_categorias
$campo_tipo_publicacao
$campo_adiciona_imagens
</div>
<div class='classe_div_campo_publicar_principal'>
<div class='classe_div_campo_publicar_titulo'>
<input type='text' name='titulo' placeholder='$idioma[43]'>
</div>
<div class='classe_div_campo_publicar_conteudo'>
$campo_ckeditor
</div>
<div class='classe_div_campo_publicar_opcoes'>
<input type='submit' value='$idioma[45]'>
</div>
</div>
</form>
</div>
";
return $codigo_html;
};
function constroe_campo_tipo_publicacao($dados){
global $idioma;
global $requeste;
if(retorne_usuario_administrador() == false and retorne_usuario_colaborador() == false){
	    return null;
};
$tipo_post = $dados["tipo_post"];
$array_options = $idioma[56];
$array_valores = "1,2";
$nome_campo[0] = $requeste[9];
$idcampo[0] = "id_tipo_post_publicacao_pagina";
$campo_select = gerador_select_option_especial($array_options, $array_valores, $tipo_post, $nome_campo[0], $idcampo[0], null);
$imagem[0] = retorne_imagem_servidor(39);
$html = "
<div class='classe_campo_tipo_publicacao'>
<div class='classe_campo_tipo_publicacao_titulo'>$imagem[0]</div>
<div class='classe_campo_tipo_publicacao_select'>$campo_select</div>
</div>
";
return $html;
};
function constroe_imagens_publicacao($idalbum){
global $idioma;
$tabela = TABELA_IMAGENS_ALBUM;
$query = "select *from $tabela where idalbum='$idalbum' order by id desc;";
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$usuario_administrador = retorne_usuario_administrador();
$imagem_servidor[0] = retorne_imagem_servidor(16);
$imagem_servidor[1] = retorne_imagem_servidor(17);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados['id'];
	$url_imagem = $dados['url_imagem'];
	$conteudo = $dados['conteudo'];
	$idalbum = $dados['idalbum'];
		$conteudo = adiciona_quebra_linha($conteudo);
		$idpost = retorne_idpost_por_idalbum($idalbum);
		if($url_imagem != null){
				if($usuario_administrador == true){
						$classe_extra[0] = "classe_div_imagem_publicacao_logado";
						$conteudo = str_replace("<br>", "&#13;", $conteudo);
						$campo_dialogo_excluir = "
			$idioma[114]
			<br>
			<br>
			<input type='button' value='$idioma[101]' onclick='excluir_imagem_publicacao($id);'>
			";
						$campo_dialogo_excluir = janela_mensagem_dialogo($idioma[114], $campo_dialogo_excluir, "dialogo_excluir_imagem_publicacao_$id");
						$campo_gerenciar_imagem = "
			<div class='classe_div_imagem_publicacao_opcoes'>
			<span class='classe_span_opcao_publicacao' onclick='dialogo_excluir_imagem_publicacao($id);'>$imagem_servidor[0]</span>
			<span class='classe_span_opcao_publicacao' onclick='dialogo_editar_imagem_publicacao($id);'>$imagem_servidor[1]</span>
			</div>
			";
						$campo_descricao_imagem = "
			<div class='classe_div_campo_descricao_imagem_publicacao'>
			<textarea cols='10' rows='10' id='textarea_descricao_imagem_publicacao_$id'>$conteudo</textarea>
			<br>
			<br>
			<input type='button' value='$idioma[175]' onclick='salvar_descricao_imagem_publicacao($id);'>
			</div>
			";
						$campo_descricao_imagem = janela_mensagem_dialogo($idioma[174], $campo_descricao_imagem, "campo_descricao_imagem_$id");
			}else{
						$conteudo = converter_urls($conteudo);
						$campo_div_conteudo_imagem = "
			<div class='classe_div_conteudo_imagem'>$conteudo</div>
			";
		};
		$codigo_html .= "
	<div class='classe_div_imagem_publicacao $classe_extra[0]' id='div_imagem_publicacao_$id'>
	$campo_gerenciar_imagem
	<a class='fancybox' rel='group' href='$url_imagem'><img src='$url_imagem'></a>
	$campo_div_conteudo_imagem
	</div>
	$campo_descricao_imagem
	$campo_dialogo_excluir
	";
};
};
return $codigo_html;
};
function constroe_link_publicacao_idpost($id, $titulo, $conteudo){
global $requeste;
$url_pagina_inicial = retorne_url_amigavel_publicacao(retorne_dados_publicacao_idpost($id), false);
$codigo_html .= "<a href='$url_pagina_inicial' title='$titulo'>$conteudo</a>";
return $codigo_html;
};
function converte_codigos_sistema($conteudo, $modo){
if($modo == true){
        $conteudo = str_replace(CODIGO_SISTEMA_FORM_CONTATO, formulario_contato_usuario(), $conteudo);
    $conteudo = str_replace(CODIGO_SISTEMA_FORM_ORCAMENTO, formulario_orcamento_servico(), $conteudo);
}else{
        $conteudo = str_replace(CODIGO_SISTEMA_FORM_CONTATO, null, $conteudo);
	$conteudo = str_replace(CODIGO_SISTEMA_FORM_ORCAMENTO, null, $conteudo);
};
return $conteudo;
};
		function excluir_imagem_publicacao(){
				$tabela = TABELA_IMAGENS_ALBUM;
				$id = remove_html($_REQUEST['id']);
				if($id == null or retorne_usuario_administrador() == false){
						return null;
		};
				$query[0] = "select *from $tabela where id='$id';";
		$query[1] = "delete from $tabela where id='$id';";
				$dados = retorne_dados_query($query[0]);
		$pasta_usuario = retorne_pasta_usuario($dados['idusuario'], 2, true);
		$url_imagem = $pasta_usuario.basename($dados['url_imagem']);
	$url_imagem_miniatura = $pasta_usuario.basename($dados['url_imagem_miniatura']);
		exclui_arquivo_unico($url_imagem);
	exclui_arquivo_unico($url_imagem_miniatura);
		comando_executa($query[1]);
	};
function excluir_publicacao(){
if(retorne_usuario_administrador() == false){
		return null;
};
$tabela[0] = TABELA_PUBLICACOES;
$tabela[1] = TABELA_IMAGENS_ALBUM;
$idpost = retorne_idpost_request();
$query[0] = "select *from $tabela[0] where id='$idpost';";
$dados = retorne_dados_query($query[0]);
$idusuario = $dados['idusuario'];
$idalbum = $dados['idalbum'];
$query[1] = "select *from $tabela[1] where idalbum='$idalbum';";
$comando = comando_executa($query[1]);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
$pasta_usuario = retorne_pasta_usuario($idusuario, 2, true);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$url_imagem = $pasta_usuario.basename($dados['url_imagem']);
	$url_imagem_miniatura = $pasta_usuario.basename($dados['url_imagem_miniatura']);
		exclui_arquivo_unico($url_imagem);
	exclui_arquivo_unico($url_imagem_miniatura);
};
$query[0] = "delete from $tabela[0] where id='$idpost';";
$query[1] = "delete from $tabela[1] where idalbum='$idalbum';";
comando_executa($query[0]);
comando_executa($query[1]);
deleta_url_amigavel_idpost($idpost);
};
function publicar_conteudo(){
global $requeste;
global $idioma;
$titulo = trim(remove_html($_REQUEST['titulo']));
$conteudo = htmlentities($_REQUEST['conteudo']);
$categoria_nome = remove_html($_REQUEST['categoria_nome']);
$categoria_id = remove_html($_REQUEST['categoria_id']);
$tipo_post = remove_html($_REQUEST[$requeste[9]]);
$_SESSION[$requeste[6]] = null;
if($titulo == null){
		$titulo = $idioma[92]." ".retorne_numero_publicacoes();
};
$idusuario = retorne_idusuario_logado();
$tabela = TABELA_PUBLICACOES;
$data = data_atual();
$idalbum = upload_imagens_album();
$query = "insert into $tabela values(null ,'$idusuario', '$titulo', '$conteudo', '$idalbum', '$categoria_nome', '$categoria_id', '$tipo_post', '$data');";
comando_executa($query);
salvar_url_amigavel($titulo, retorne_id_ultima_publicacao(), true);
};
function retorna_tipo_post_request(){
global $requeste;
$tipo_post = remove_html($_REQUEST[$requeste[9]]);
if($tipo_post == null or $tipo_post < 0 or is_numeric($tipo_post) == false){
	    $tipo_post = 1;
};
return $tipo_post;
};
function retorna_titulo_postagem_idpost($idpost){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
$dados = retorne_dados_query($query);
return $dados['titulo'];
};
function retorne_dados_publicacao_idpost($idpost){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
return retorne_dados_query($query);
};
function retorne_idalbum_idpost($idpost){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where id='$idpost';";
$dados_query = retorne_dados_query($query);
return $dados_query["idalbum"];
};
function retorne_idpost_amigavel(){
$geturl = explode('/', $_SERVER['REQUEST_URI']);
$titulo_amigavel = $geturl[1];
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;
$query = "select *from $tabela where url_amigavel='$titulo_amigavel';";
$dados = retorne_dados_query($query);
return $dados["id_post"];
};
function retorne_idpost_por_idalbum($idalbum){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela where idalbum='$idalbum';";
$dados = retorne_dados_query($query);
return $dados['id'];
};
function retorne_idpost_request(){
global $requeste;
if(retorne_idpost_amigavel() != null){
		return retorne_idpost_amigavel();
}else{
		return remove_html($_REQUEST[$requeste[4]]);
};
};
function retorne_id_ultima_publicacao(){
$tabela = TABELA_PUBLICACOES;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario' order by id desc limit 1;";
$dados = retorne_dados_query($query);
return $dados["id"];
};
function retorne_numero_publicacoes(){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela;";
return retorne_numero_linhas_query($query);
};
function retorne_ultima_imagem_idalbum($idalbum, $modo){
$tabela = TABELA_IMAGENS_ALBUM;
$query = "select *from $tabela where idalbum='$idalbum' order by id desc limit 1;";
$dados = retorne_dados_query($query);
if($modo == true){
		return $dados['url_imagem'];
}else{
		return $dados['url_imagem_miniatura'];
};
};
function retorne_url_publicacao($id){
global $requeste;
$url_pagina_inicial = URL_INDEX_HOME;
$html = "$url_pagina_inicial?$requeste[4]=$id";
return $html;
};
function salvar_descricao_imagem_publicacao(){
$tabela = TABELA_IMAGENS_ALBUM;
$conteudo = remove_html($_REQUEST['conteudo']);
$id = remove_html($_REQUEST['id']);
$query = "update $tabela set conteudo='$conteudo' where id='$id';";
comando_executa($query);
};
function constroe_publicacoes_miniatura_relacionadas($categoria, $idpost){
global $idioma;
if(CONFIG_PERMITE_POSTAGENS_RELACIONADAS == false){
	    return null;
};
if($_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] == true){
		$ordernar = "order by id asc";
		$_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] = false;
}else{
		$ordernar = "order by id desc";
		$_SESSION[CONFIG_SESSAO_MODO_RELACIONADOS_ORDERNAR] = true;	
};
$tabela = TABELA_PUBLICACOES;
$limit = "limit ".CONFIG_LIMIT_RELACIONADOS;
$query = "select *from $tabela where categoria_nome like '%$categoria%' and id !='$idpost' $ordernar $limit;";
$comando = comando_executa($query);
$linhas = retorne_numero_linhas_comando($comando);
if($linhas == 0){
		return null;
};
$contador = 0;
for($contador == $contador; $contador <= $linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados["id"];
    $titulo = $dados["titulo"];
    $conteudo = $dados["conteudo"];
    $idalbum = $dados["idalbum"];
    	if($id != null){
				$imagem[0] = retorne_ultima_imagem_idalbum($idalbum, false);
				if($imagem[0] != null){
						$imagem[0] = "<img src='$imagem[0]' title='$titulo' alt='$titulo'>";
		}else{
						$imagem[0] = $titulo;
		};
				$imagem[0] = constroe_link_publicacao_idpost($id, $titulo, $imagem[0]);
				$publicacao .= "
		<div class='classe_publicacao_miniatura_relacionado'>
		<div class='classe_publicacao_miniatura_relacionado_imagem'>
		$imagem[0]
		</div>
		</div>
		";
	};
};
$html = "
<div class='classe_publicacoes_miniatura_relacionadas'>
<div class='classe_publicacoes_miniatura_relacionadas_titulo'>
$idioma[68]
</div>
<div class='classe_publicacoes_miniatura_relacionadas_conteudo'>
$publicacao
</div>
</div>
";
return $html;
};
function executador_querys($querys_array){
foreach($querys_array as $query_executar){
		comando_executa($query_executar);
};
};
function retorne_contador_query(){
return remove_html($_REQUEST['avanco_contador']);
};
function retorne_limit(){
global $requeste;
$contador_avanco = remove_html($_REQUEST[$requeste[8]]);
if($contador_avanco == null){
        $contador_avanco = 0;
};
if(USAR_PAGINADOR_NUMERICO == true){
	    $contador_inicio = $contador_avanco * CONFIG_LIMIT_PUBLICACOES;
}else{
		$contador_inicio = $contador_avanco;
};
$contador_fim = CONFIG_LIMIT_PUBLICACOES;
$limit = "limit $contador_inicio, $contador_fim";
return $limit;
};
function retorne_limit_imagens_album(){
$contador_avanco = remove_html($_REQUEST['contador_avanco_conteudo']);
if($contador_avanco == null){
		$contador_avanco = 0;
};
$contador_inicio = $contador_avanco;
$contador_fim = CONFIG_LIMIT_IMAGENS_ALBUM;
$limit = "limit $contador_inicio, $contador_fim";
return $limit;
};
function retorne_limit_slideshow(){
$contador_avanco = remove_html($_REQUEST['avanco_contador']);
if($contador_avanco == null){
		$contador_avanco = 0;
};
$contador_inicio = $contador_avanco;
$contador_fim = 1;
$limit = "limit $contador_inicio, $contador_fim";
return $limit;
};
function retorne_numero_linhas_query($query){
$comando = comando_executa($query);
return retorne_numero_linhas_comando($comando);
};
function carregar_atualizacoes_jquery(){
global $idioma;
$tempo_timer = CONFIG_TIMER;
$campo_conexao = "
\n
atualiza_conexao_usuario();
\n
";
$campo_chat = "
\n
carrega_atualizacoes_chat();
\n
";
$html .= "
<script>
\n
var variavelTempoAtualizador = setInterval(function(){ AtualizadorTimer() }, $tempo_timer);
\n
function AtualizadorTimer() {
\n
carregar_atualizacoes_jquery();
\n
};
\n
\n
function carregar_atualizacoes_jquery(){
\n
$campo_conexao
$campo_chat
detecta_resolucao_pagina();
\n
\n
};
\n
</script>
\n
";
return $html;
};
function carregar_atualizacoes_jquery_longo(){
global $idioma;
if(retorne_usuario_logado() == false){
};
$tempo_timer = CONFIG_TIMER_LONGO;
if(retorne_usuario_logado() == true){
        $campo_chat = "
    \n
    constroe_lista_usuarios_chat();
    \n
    usuario_online_offline_chat();
    \n
    ";
};
$html .= "
<script>
\n
var variavelTempoAtualizador_longo = setInterval(function(){ AtualizadorTimerLongo() }, $tempo_timer);
\n
function AtualizadorTimerLongo() {
\n
carregar_atualizacoes_jquery_longo();
\n
};
\n
\n
function carregar_atualizacoes_jquery_longo(){
\n
$campo_chat
\n
};
\n
</script>
\n
";
return $html;
};
function carrega_recursos_cabecalho(){
$html .= fancybox();
$html .= jcrop();
$html .= ckeditor();
return $html;
};
function ckeditor(){
$arquivo_carregar[0] = "<script type='text/javascript' src='".PASTA_RECURSOS."ckeditor/ckeditor.js'></script>";
$html = "
$arquivo_carregar[0]
";
return $html;
};
function fancybox(){
$pasta_recurso = PASTA_RECURSOS."fancybox/";
$script[0] = $pasta_recurso."jquery.fancybox.css";
$script[1] = $pasta_recurso."jquery.fancybox.js";
$html .= "<link rel='stylesheet' href='$script[0]' type='text/css' media='screen'/>";
$html .= "<script type='text/javascript' src='$script[1]'></script>";
$html .= "\n";
$html .= "<script type='text/javascript'>";
$html .= "$(document).ready(function(){";
$html .= "$('.fancybox').fancybox();";
$html .= "});";
$html .= "</script>";
$html .= "\n";
return $html;
};
		function jcrop(){
				if(retorne_usuario_logado() == false){
						return null;
		};
				$pasta_recurso = PASTA_RECURSOS."jcrop/";
				$script[0] = $pasta_recurso."jquery.Jcrop.min.css";
		$script[1] = $pasta_recurso."jquery.color.js";
		$script[2] = $pasta_recurso."jquery.Jcrop.min.js";
		$campo_script = "
		<script language='javascript'>
		$(function(){
	$('#cropbox').Jcrop({aspectRatio: 0.75, onSelect: updateCoords, boxWidth: 310, boxHeight: 310});
	});
	function updateCoords(c){
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
	};
	function checkCoords(){
	if(document.getElementById('w').value.length == 0){
	return false;
	};
	};
	</script>
	";
		$html = "
	\n
	<link rel='stylesheet' href='$script[0]' type='text/css' media='screen'/>
	\n
	<script type='text/javascript' src='$script[1]'></script>
	\n
	<script type='text/javascript' src='$script[2]'></script>
	\n
	$campo_script
	\n
	";
		return $html;
	};
function campo_disqus(){
global $idioma;
if(ID_DISQUS == null){
        return null;
};
$id_disqus = ID_DISQUS;
$id_disqus = "http-$id_disqus-com.disqus.com/embed.js";
$html = "
<div id=\"disqus_thread\"></div>
<script>
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//$id_disqus.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\" rel=\"nofollow\">$idioma[67]</a></noscript>
";
return $html;
};
function campo_rede_social($url, $modo){
if(CONFIG_PERMITE_SOCIAL == false or retorne_usuario_administrador() == true){
	    return null;
};
if($url == null){
        $url_atual = retorne_url_atual();
}else{
	    $url_atual = $url;
};
$campo[0] = "
<div class='classe_div_separa_sessao_rede_social'>
<div class='fb-comments' data-width='100%' data-href='$url_atual' data-numposts='5'></div>
</div>
";
$campo[1] = campo_disqus();
$campo[2] = "
<div class='classe_div_separa_sessao_rede_social'>
<a class='twitter-share-button' href='$url_atual'>
Tweet
</a>
</div>
";
$campo[3] = "
<div class='classe_div_separa_sessao_rede_social'>
<div class='fb-share-button' data-href='$url_atual' data-layout='button_count'></div>
</div>
";
if($modo == false){
		$campo[1] = null;
	$campo[0] = null;
};
$html = "
<div class='classe_div_compartilhar'>
$campo[3]
$campo[2]
$campo[0]
$campo[1]
</div>
";
return $html;
};
function carregar_header_redes_sociais(){
if(CONFIG_PERMITE_SOCIAL == false or retorne_usuario_administrador() == true){
	    return null;
};
$codigo_facebook = "
<div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
";
$codigo_twitter = "
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = \"https://platform.twitter.com/widgets.js\";
  fjs.parentNode.insertBefore(js, fjs);
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
  return t;
}(document, \"script\", \"twitter-wjs\"));</script>
";
$html = "
$codigo_facebook
$codigo_twitter
";
return $html;
};
function detecta_resolucao_pagina(){
$largura_nova = remove_html($_REQUEST['largura']);
if($largura_nova < TAMANHO_RESOLUCAO_PADRAO){
		$_SESSION[USAR_RESOLUCAO_SISTEMA] = true;
}else{
		$_SESSION[USAR_RESOLUCAO_SISTEMA] = false;
};
if($_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] != $largura_nova){
	    $_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = $largura_nova;
		return 1;
}else{
		return -1;
};
};
function retorna_usar_resolucao(){
if(CONFIG_SIMULA_MOBILE == true){
		return true;
};
return $_SESSION[USAR_RESOLUCAO_SISTEMA];
};
function constroe_editar_rodape(){
global $idioma;
global $requeste;
if(retorne_usuario_administrador() == false){
		return null;	
};
$tabela = TABELA_RODAPE;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$conteudo_1 = $dados["conteudo_1"];
$conteudo_2 = $dados["conteudo_2"];
$conteudo_3 = $dados["conteudo_3"];
$campo_editor[0] = constroe_campo_ckeditor($conteudo_1, "campo_rodape_1", null);
$campo_editor[1] = constroe_campo_ckeditor($conteudo_2, "campo_rodape_2", null);
$campo_editor[2] = constroe_campo_ckeditor($conteudo_3, "campo_rodape_3", null);
$url_formulario = PAGINA_ACOES;
$html = "
<form action='$url_formulario' method='post'>
<div class='classe_div_campo_editar_rodape'>$campo_editor[0]</div>
<div class='classe_div_campo_editar_rodape'>$campo_editor[1]</div>
<div class='classe_div_campo_editar_rodape'>$campo_editor[2]</div>
<div class='classe_div_campo_editar_rodape_salvar'>
<input type='submit' value='$idioma[57]'>
<input type='hidden' name='$requeste[0]' value='15'>
</div>
</form>
";
return $html;
};
function editar_mensagem_subrodape(){
global $idioma;
$tabela = TABELA_SUBRODAPE;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$idcampo[0] = md5("campo_editar_mensagem_subrodape".data_atual());
$campo_editor = constroe_campo_ckeditor($dados["conteudo"], null, $idcampo[0]);
$html = "
<div class='classe_editar_mensagem_subrodape'>
<div class='classe_editar_mensagem_subrodape_editor'>
$campo_editor
</div>
<div class='classe_editar_mensagem_subrodape_salvar'>
<input type='button' value='$idioma[57]' onclick='salvar_subrodape(\"$idcampo[0]\");'>
</div>
</div>
";
return $html;
};
function mensagem_subrodape(){
global $idioma;
$tabela = TABELA_SUBRODAPE;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
if($dados["conteudo"] == null){
        return null;
};
$html = constroe_div_especial_1(html_entity_decode($dados["conteudo"]));
return $html;
};
function salvar_rodape(){
global $pagina_href;
$tabela = TABELA_RODAPE;
$data = data_atual();
$campo_rodape_1 = htmlentities($_REQUEST["campo_rodape_1"]);
$campo_rodape_2 = htmlentities($_REQUEST["campo_rodape_2"]);
$campo_rodape_3 = htmlentities($_REQUEST["campo_rodape_3"]);
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$campo_rodape_1', '$campo_rodape_2', '$campo_rodape_3', '$data');";
executador_querys($query);
chama_pagina_especifica($pagina_href[7]);
};
function salvar_subrodape(){
global $pagina_href;
$tabela = TABELA_SUBRODAPE;
$data = data_atual();
$conteudo = htmlentities($_REQUEST["conteudo"]);
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data');";
executador_querys($query);
};
function rotacionar_imagem($jpgFile, $thumbFile, $width) {
$dados_imagem = getimagesize($jpgFile);
switch($dados_imagem['mime']){
    case 'image/jpeg':
    $image_create_func = 'imagecreatefromjpeg';
    break;
    case 'image/png':
    $image_create_func = 'imagecreatefrompng';
    break;
    case 'image/gif':
    $image_create_func = 'imagecreatefromgif';
    break;
	default:
	$image_create_func = 'imagecreatefromjpeg';
};
$exif = exif_read_data($jpgFile);
list($width_orig, $height_orig) = getimagesize($jpgFile);
$height = (int)(($width / $width_orig) * $height_orig);
$image_p = imagecreatetruecolor($width, $height);
$image = $image_create_func($jpgFile);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
switch($exif['Orientation']){
    case 3:
        $image_p = imagerotate($image_p, 180, 0);
        break;
    case 6:
        $image_p = imagerotate($image_p, -90, 0);
        break;
    case 8:
        $image_p = imagerotate($image_p, 90, 0);
        break;
};
imagejpeg($image_p, $thumbFile, 100);
};
function retorne_email_cookie(){
return retorne_valor_cookie(CONFIG_NOME_COOKIE_EMAIL);
};
function retorne_senha_cookie(){
return retorne_valor_cookie(CONFIG_NOME_COOKIE_SENHA);
};
function retorne_valor_cookie($nome_cookie){
return $_COOKIE[$nome_cookie];
};
function salvar_cookies($email, $senha, $limpa){
$tempo_vida = time() + (COOKIES_DIAS_EXISTE * 24 * 3600);
setcookie(CONFIG_NOME_COOKIE_EMAIL, $email, $tempo_vida, "/");
setcookie(CONFIG_NOME_COOKIE_SENHA, $senha, $tempo_vida, "/");
$_SESSION[CONFIG_NOME_COOKIE_EMAIL] = $email;
$_SESSION[CONFIG_NOME_COOKIE_SENHA] = $senha;
if($limpa == true){
        $_SESSION = array();
        @session_destroy();
};
};
function atualizar_descricao_imagem_slideshow(){
$id = remove_html($_REQUEST['id']);
$comentario = htmlentities($_REQUEST['comentario']);
$url = htmlentities($_REQUEST['url']);
if($id == null){
        return null;
};
$tabela = TABELA_SLIDESHOW;
$query = "update $tabela set comentario='$comentario', url='$url' where id='$id';";
comando_executa($query);
};
function carregar_slideshow(){
global $idioma;
$tabela = TABELA_SLIDESHOW;
$usuario_administrador = retorne_usuario_administrador();
$limit = retorne_limit_slideshow();
$query = "select *from $tabela order by id desc $limit";
$dados = retorne_dados_query($query);
$id = $dados['id'];
$url_imagem = $dados['url_imagem'];
$comentario = $dados['comentario'];
$data = converte_data_amigavel($dados['data']);
$url = $dados['url'];
$imagem_servidor[0] = retorne_imagem_servidor(16);
if($usuario_administrador == true){
		$campo_excluir_imagem = "
	$idioma[115]
	<br>
	<br>
	<input type='button' value='$idioma[101]' onclick='excluir_imagem_slideshow($id);'>
	";
		$campo_excluir_imagem = janela_mensagem_dialogo($idioma[114], $campo_excluir_imagem, "dialogo_excluir_imagem_slideshow_$id");
		$campo_excluir_imagem .= "
	<div class='classe_div_campo_excluir_imagem_slideshow' onclick='pausar_slideshow(1), dialogo_excluir_imagem_slideshow($id);'>
	$imagem_servidor[0]
	</div>
	";
		$campo_adicionar_url = constroe_campo_adicionar_url_slideshow($dados);
		$comentario = "
	<div class='classe_div_editar_descricao_img_slideshow'>
	<textarea cols='10' rows='10' placeholder='$idioma[54]' id='id_campo_comentario_imagem_slideshow' onkeyup='atualizar_descricao_imagem_slideshow($id);'>$comentario</textarea>
	</div>
	$campo_adicionar_url
	$campo_excluir_imagem
	";
}else{
		if($comentario != null){
				$data = "
		<span class='classe_span_data_slideshow'>
		$data
		</span>
		";
				if($url != null){
						$campo_link = "
			<a href='$url'>$idioma[164]</a>
			";
						$campo_link = "
			<span class='classe_span_link_slideshow'>
			$campo_link
			</span>
			";
		};
				$comentario = "
		$data
		<span class='classe_span_comentario_slideshow fade-in two'>
		$comentario
		</span>
		$campo_link
		";
	};
};
$imagem_slide = "
<div class='animated slideInLeft'>
<a class='fancybox fade-in one' rel='group' href='$url_imagem'>
<img src='$url_imagem'>
</a>
</div>
";
if($id != null){
	$dados_retorno['imagem'] = $imagem_slide;
	$dados_retorno['comentario'] = html_entity_decode($comentario);
}else{
	$dados_retorno['imagem'] = -1;
	$dados_retorno['comentario'] = -1;
};
return json_encode($dados_retorno);
};
function constroe_campo_adicionar_url_slideshow($dados){
global $idioma;
$id = $dados['id'];
$url = $dados['url'];
if($id == null){
		return null;
};
$funcao[0] = "atualizar_descricao_imagem_slideshow($id);";
$evento[0] = "onclick='$funcao[0]'";
$html = "
<div class='classe_url_slideshow'>
<div class='classe_url_slideshow_separa_1'>
<input type='text' id='id_campo_url_imagem_slideshow' value='$url' placeholder='$idioma[87]'>
</div>
<div class='classe_url_slideshow_separa_2'>
<input type='button' value='$idioma[57]' $evento[0]>
</div>
</div>
";
return $html;
};
function constroe_criar_slideshow(){
global $idioma;
$imagem[0] = retorne_imagem_servidor(1);
$formulario_upload = constroe_formulario_barra_progresso(PAGINA_ACOES, "id_formulario_upload_imagem_slideshow", "fotos[]", PAGINA_ID4, true, 1);
$html = "
<div class='classe_div_criar_slideshow'>
<div class='classe_div_criar_slideshow_descreve'>
<div>
$imagem[0]
</div>
<div>
$idioma[49]
</div>
</div>
$formulario_upload
</div>
";
return $html;
};
function constroe_slide_show(){
global $idioma;
if(retorne_href_get() == $idioma[4]){
		return null;
};
if(retorne_numero_imagens_slideshow() == 0){
		return null;
};
if(retorne_usuario_administrador() == true){
		$classe_div[0] = "classe_div_slide_show_comentario_admin";
}else{
		$classe_div[0] = "classe_div_slide_show_comentario";
};
$imagem_sistema[0] = retorne_imagem_servidor(2);
$imagem_sistema[1] = retorne_imagem_servidor(3);
$campo_paginar = "
<div class='classe_paginar_slideshow'>
<div class='classe_paginar_slideshow_volta' onclick='avanca_slideshow(2);'>
$imagem_sistema[0]
</div>
<div class='classe_paginar_slideshow_avanca' onclick='avanca_slideshow(1);'>
$imagem_sistema[1]
</div>
</div>
";
$html = "
<div class='classe_principal_slideshow'>
<div class='classe_div_slide_show'>
<div class='classe_div_slide_show_imagem' id='id_div_slide_show_imagem' onclick='pausar_slideshow(1);'></div>
<div class='$classe_div[0]'>
<div class='classe_div_slide_show_comentario_div_2' id='id_div_slide_show_comentario' onclick='pausar_slideshow(1);'></div>
</div>
</div>
$campo_paginar
</div>
";
return $html;
};
		function excluir_imagem_slideshow(){
				$tabela = TABELA_SLIDESHOW;
				$id = remove_html($_REQUEST['id']);
				if($id == null or retorne_usuario_administrador() == false){
						return null;
		};
				$query[0] = "select *from $tabela where id='$id';";
		$query[1] = "delete from $tabela where id='$id';";
				$dados = retorne_dados_query($query[0]);
		$pasta_usuario = retorne_pasta_usuario($dados['idusuario'], 3, true);
		$url_imagem = $pasta_usuario.basename($dados['url_imagem']);
	$url_imagem_miniatura = $pasta_usuario.basename($dados['url_imagem_miniatura']);
		exclui_arquivo_unico($url_imagem);
	exclui_arquivo_unico($url_imagem_miniatura);
		comando_executa($query[1]);
	};
function retorne_numero_imagens_slideshow(){
$tabela = TABELA_SLIDESHOW;
$query = "select *from $tabela;";
return retorne_numero_linhas_query($query);
};
function upload_imagens_slideshow(){
upload_imagens_usuario_comentario(TABELA_SLIDESHOW, null, null, 3);
};
function constroe_editar_sobre_site(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_ACOES;
$dados = retorne_dados_sobre_site();
$nome = $dados["nome"];
$descricao = $dados["descricao"];
$palavras = $dados["palavras"];
$autor = $dados["autor"];
$email_contato = $dados["email_contato"];
$copyright = $dados["copyright"];
$html = "
<div class='classe_campo_editar_sobre_site'>
<form action='$url_formulario' method='post'>
<input type='hidden' name='$requeste[0]' value='59'>
<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='nome' placeholder='$idioma[0]'>$nome</textarea>
</div>
<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='descricao' placeholder='$idioma[1]'>$descricao</textarea>
</div>
<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='palavras' placeholder='$idioma[8]'>$palavras</textarea>
</div>
<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$autor' name='autor' placeholder='$idioma[9]'>
</div>
<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$email_contato' name='email_contato' placeholder='$idioma[16]'>
</div>
<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$copyright' name='copyright' placeholder='$idioma[121]'>
</div>
<div class='classe_campo_editar_sobre_site_salvar'>
<input type='submit' value='$idioma[57]'>
</div>
</form>
</div>
";
return $html;
};
function retorne_dados_sobre_site(){
$tabela = TABELA_SOBRE_SITE;
$query = "select *from $tabela;";
return retorne_dados_query($query);
};
function salvar_sobre_site(){
global $pagina_href;
$nome = remove_html($_REQUEST["nome"]);
$descricao = remove_html($_REQUEST["descricao"]);
$palavras = remove_html($_REQUEST["palavras"]);
$autor = remove_html($_REQUEST["autor"]);
$email_contato = remove_html($_REQUEST["email_contato"]);
$copyright = remove_html($_REQUEST["copyright"]);
$data = data_atual();
$tabela = TABELA_SOBRE_SITE;
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$nome', '$descricao', '$palavras', '$autor', '$email_contato', '$copyright', '$data');";
executador_querys($query);
chama_pagina_especifica($pagina_href[30]);
};
function constroe_ultimas_publicacoes_miniatura(){
global $idioma;
if(CONFIG_EXIBE_CAMPO_NOVIDADES == false){
		return null;
};
$ordernar = "order by id desc";
$tabela = TABELA_PUBLICACOES;
$categoria = retorne_categoria_publicacao(retorne_idpost_request());
$limit = "limit ".CONFIG_LIMIT_ULTIMAS_NOVIDADES_MINIATURA;
$query = "select *from $tabela where categoria_nome like '%$categoria%' and id !='$idpost' $ordernar $limit;";
$comando = comando_executa($query);
$linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
for($contador == $contador; $contador <= $linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados["id"];
    $titulo = $dados["titulo"];
    $conteudo = $dados["conteudo"];
    $idalbum = $dados["idalbum"];
    	if($id != null){
				$imagem[0] = retorne_ultima_imagem_idalbum($idalbum, false);
		$imagem[0] = "<img src='$imagem[0]' title='$titulo' alt='$titulo'>";
				$imagem[0] = constroe_link_publicacao_idpost($id, $titulo, $imagem[0]);
				$publicacao .= "
		<div class='classe_publicacao_miniatura_novidades'>
		<div class='classe_publicacao_miniatura_novidades_imagem'>
		$imagem[0]
		</div>
		</div>
		";
	};
};
$html = "
<div class='classe_publicacoes_miniatura_novidades'>
<div class='classe_publicacoes_miniatura_novidades_titulo'>
$idioma[69]
</div>
<div class='classe_publicacoes_miniatura_novidades_conteudo'>
$publicacao
</div>
</div>
";
return $html;
};
function retorne_idalbum_post(){
global $requeste;
if(retorne_idpost_request() == null){
		return remove_html($_REQUEST[$requeste[6]]);    
}else{
        return retorne_idalbum_idpost(retorne_idpost_request());
};
};
		function retorne_numero_array_post_imagens(){
				$contador = 0;
				foreach($_FILES['fotos']['tmp_name'] as $nome){
						if($nome != null){
								$contador++;
			};
		};
				return $contador;
	};
		class SimpleImage{
		var $image;
		var $image_type;
		function load($filename){
			$image_info = getimagesize($filename);
			$this->image_type = $image_info[2];
			if($this->image_type == IMAGETYPE_JPEG){
				$this->image = imagecreatefromjpeg($filename);
				}elseif($this->image_type == IMAGETYPE_GIF){
				$this->image = imagecreatefromgif($filename);
				}elseif($this->image_type == IMAGETYPE_PNG){
				$this->image = imagecreatefrompng($filename);
			}
		}
		function save($filename, $image_type=IMAGETYPE_JPEG, $compression=100, $permissions=null){
			if($image_type == IMAGETYPE_JPEG){
				imagejpeg($this->image,$filename,$compression);
				}elseif($image_type == IMAGETYPE_GIF){
				imagegif($this->image,$filename);
				}elseif($image_type == IMAGETYPE_PNG){
				imagepng($this->image,$filename);
			}
			if($permissions != null){
				chmod($filename,$permissions);
			}
		}
		function output($image_type=IMAGETYPE_JPEG){
			if($image_type == IMAGETYPE_JPEG){
				imagejpeg($this->image);
				}elseif($image_type == IMAGETYPE_GIF){
				imagegif($this->image);
				}elseif($image_type == IMAGETYPE_PNG){
				imagepng($this->image);
			}
		}
		function getWidth(){
			return imagesx($this->image);
		}
		function getHeight(){
			return imagesy($this->image);
		}
		function resizeToHeight($height){
			$ratio = $height / $this->getHeight();
			$width = $this->getWidth() * $ratio;
			$this->resize($width,$height);
		}
		function resizeToWidth($width){
			$ratio = $width / $this->getWidth();
			$height = $this->getheight() * $ratio;
			$this->resize($width,$height);
		}
		function scale($scale){
			$width = $this->getWidth() * $scale/100;
			$height = $this->getheight() * $scale/100;
			$this->resize($width,$height);
		}
	function resize($width,$height){
	$new_image = imagecreatetruecolor($width, $height);
	imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
	$this->image = $new_image;
	}
	};
		function upload_imagem_perfil(){
				if($_FILES['foto']['tmp_name'] == null){
						return null;
		};
				$dados_sessao = dados_perfil_usuario(retorne_idusuario_logado());
				$idusuario_logado = retorne_idusuario_logado();
				$pasta_upload_root = retorne_pasta_usuario($idusuario_logado, 1, true);
		$pasta_upload_servidor = retorne_pasta_usuario($idusuario_logado, 1, false);
				$url_imagem = upload_imagem_unica($pasta_upload_root, TAMANHO_ESCALA_IMG_PERFIL, TAMANHO_ESCALA_IMG_PERFIL_MINIATURA, $pasta_upload_servidor, true);
		$url_imagem_normal = $url_imagem['normal'];
	$url_imagem_normal_miniatura = $url_imagem['miniatura'];
	$url_imagem_normal_root = $url_imagem['normal_root'];
	$url_imagem_normal_miniatura_root = $url_imagem['miniatura_root'];
		$tabela = TABELA_PERFIL;
		$idusuario_logado = retorne_idusuario_logado();
		$campos .= "url_imagem_perfil='$url_imagem_normal', ";
	$campos .= "url_imagem_perfil_miniatura='$url_imagem_normal_miniatura', ";
	$campos .= "url_imagem_perfil_root='$url_imagem_normal_root', ";
	$campos .= "url_imagem_perfil_miniatura_root='$url_imagem_normal_miniatura_root'";
		$query = "update $tabela set $campos where idusuario='$idusuario_logado';";
		comando_executa($query);
		$url_imagem_perfil_root = $dados_sessao['url_imagem_perfil_root'];
	$url_imagem_perfil_miniatura_root = $dados_sessao['url_imagem_perfil_miniatura_root'];
		exclui_arquivo_unico($url_imagem_perfil_root);
	exclui_arquivo_unico($url_imagem_perfil_miniatura_root);
	};
function upload_imagem_unica($pasta_upload, $novo_tamanho_imagem, $novo_tamanho_imagem_miniatura, $host_retorno, $upload_miniatura){
				$data_atual = data_atual();
				$fotos = $_FILES['foto'];
				$extensoes_disponiveis[] = ".jpeg";
		$extensoes_disponiveis[] = ".jpg";
		$extensoes_disponiveis[] = ".png";
		$extensoes_disponiveis[] = ".gif";
		$extensoes_disponiveis[] = ".bmp";
				$nome_imagem = $fotos['tmp_name'];
		$nome_imagem_real = $fotos['name'];
				$image_info = getimagesize($_FILES["foto"]["tmp_name"]);
		$largura_imagem = $image_info[0];
		$altura_imagem = $image_info[1];
				$extensao_imagem = ".".converte_minusculo(pathinfo($nome_imagem_real, PATHINFO_EXTENSION));
				$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem;
		$nome_imagem_final_miniatura = md5($nome_imagem_real.$data_atual.$data_atual).$extensao_imagem;
				$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final;
		$endereco_final_salvar_imagem_miniatura = $pasta_upload.$nome_imagem_final_miniatura;
				$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem);
				if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
						$image = new SimpleImage();
			$image->load($nome_imagem);
						if($largura_imagem > $novo_tamanho_imagem){
				$image->resizeToWidth($novo_tamanho_imagem);
			};
						$image->save($endereco_final_salvar_imagem);
						if($upload_miniatura == true){
								$image = new SimpleImage();
				$image->load($nome_imagem);
								if($largura_imagem > $novo_tamanho_imagem_miniatura){
										$image->resizeToWidth($novo_tamanho_imagem_miniatura);
				};
								$image->save($endereco_final_salvar_imagem_miniatura);
			};
						$retorno['normal'] = $host_retorno.$nome_imagem_final;
			$retorno['miniatura'] = $host_retorno.$nome_imagem_final_miniatura;
			$retorno['normal_root'] = $endereco_final_salvar_imagem;
			$retorno['miniatura_root'] = $endereco_final_salvar_imagem_miniatura;
						return $retorno;
			};
};
		function upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload, $novo_tamanho_imagem, $novo_tamanho_imagem_miniatura, $host_retorno, $upload_miniatura){
		list($largura_padrao, $altura_padrao) = getimagesize($nome_imagem);
		rotacionar_imagem($nome_imagem, $nome_imagem, $largura_padrao);
				$data_atual = data_atual();
				$extensoes_disponiveis[] = ".jpeg";
		$extensoes_disponiveis[] = ".jpg";
		$extensoes_disponiveis[] = ".png";
		$extensoes_disponiveis[] = ".gif";
		$extensoes_disponiveis[] = ".bmp";
				$image_info = getimagesize($nome_imagem);
		$largura_imagem = $image_info[0];
		$altura_imagem = $image_info[1];
				$extensao_imagem = ".".converte_minusculo(pathinfo($nome_imagem_real, PATHINFO_EXTENSION));
				$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem;
		$nome_imagem_final_miniatura = md5($nome_imagem_real.$data_atual.$data_atual).$extensao_imagem;
				$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final;
		$endereco_final_salvar_imagem_miniatura = $pasta_upload.$nome_imagem_final_miniatura;
				$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem);
				if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
						$image = new SimpleImage();
			$image->load($nome_imagem);
						if($largura_imagem > $novo_tamanho_imagem){
				$image->resizeToWidth($novo_tamanho_imagem);
			};
						$image->save($endereco_final_salvar_imagem);
						if($upload_miniatura == true){
				$image = new SimpleImage();
				$image->load($nome_imagem);
								if($largura_imagem > $novo_tamanho_imagem_miniatura){
					$image->resizeToWidth($novo_tamanho_imagem_miniatura);
				};
								$image->save($endereco_final_salvar_imagem_miniatura);
				};
								$retorno['normal'] = $host_retorno.$nome_imagem_final;
				$retorno['miniatura'] = $host_retorno.$nome_imagem_final_miniatura;
				$retorno['normal_root'] = $endereco_final_salvar_imagem;
				$retorno['miniatura_root'] = $endereco_final_salvar_imagem_miniatura;
								return $retorno;
				};
				};
function upload_imagens_album(){
global $requeste;
$tabela = TABELA_IMAGENS_ALBUM;
$numero_imagens = retorne_numero_array_post_imagens();
$idalbum = retorne_idalbum_post();
$idusuario = retorne_idusuario_logado();
$data_atual = data_atual();
$idpost = retorne_idpost_request();
if($idalbum == null){
		$idalbum = retorne_idalbum_aleatorio();
};
$pasta_upload_root = retorne_pasta_usuario($idusuario, 2, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario, 2, false);
$fotos = $_FILES['fotos'];
$contador = 0;
for($contador == $contador; $contador <= $numero_imagens; $contador++){
		$nome_imagem = $fotos['tmp_name'][$contador];
	$nome_imagem_real = $fotos['name'][$contador]; 
if($nome_imagem != null){
		$dados_imagem = upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload_root, ESCALA_IMAGEM_ALBUM, ESCALA_IMAGEM_ALBUM_MINIATURA, $pasta_upload_servidor, true);
};
if($nome_imagem != null){
		$url_imagem = $dados_imagem['normal'];
	$url_imagem_miniatura = $dados_imagem['miniatura'];
		$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$url_imagem', '$url_imagem_miniatura', '', '$data_atual');";
		comando_executa($query);
};
};
return $idalbum;
};
function upload_imagens_galeria(){
global $requeste;
$idusuario = retorne_idusuario_logado();
$data_atual = data_atual();
if(retorne_idalbum_post() == null){
        $idalbum = md5($idusuario.data_atual());
}else{
		$idalbum = retorne_idalbum_post();
};
$pasta_upload_root = retorne_pasta_usuario($idusuario, 2, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario, 2, false);
$fotos = $_FILES['fotos'];
$numero_imagens = retorne_numero_array_post_imagens();
$contador = 0;
for($contador == $contador; $contador <= $numero_imagens; $contador++){
 $nome_imagem = $fotos['tmp_name'][$contador];
$nome_imagem_real = $fotos['name'][$contador]; 
if($nome_imagem != null){
$dados_imagem = upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload_root, ESCALA_IMAGEM_ALBUM, ESCALA_IMAGEM_ALBUM_MINIATURA, $pasta_upload_servidor, true);
};
if($nome_imagem != null){
$url_imagem = $dados_imagem['normal'];
$url_imagem_miniatura = $dados_imagem['miniatura'];
$tabela = TABELA_IMAGENS_ALBUM;
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$url_imagem', '$url_imagem_miniatura', '', '$data_atual');";
comando_executa($query);
};
};
return $idalbum;
};
function upload_imagens_usuario_comentario($tabela, $idalbum, $comentario, $tipo_pasta){
$idusuario = retorne_idusuario_logado();
$data_atual = data_atual();
if($idalbum == null){
        $idalbum = retorne_idalbum_aleatorio();
};
$pasta_upload_root = retorne_pasta_usuario($idusuario, $tipo_pasta, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario, $tipo_pasta, false);
$fotos = $_FILES['fotos'];
$numero_imagens = retorne_numero_array_post_imagens();
if($numero_imagens == 0){
return null;
};
$contador = 0;
switch($tipo_pasta){
    case 3:
    $escala_imagem_normal = ESCALA_IMAGEM_SLIDESHOW;
    $escala_imagem_miniatura = null;
	$upload_miniatura = false;
    break;
    default:
    $escala_imagem_normal = ESCALA_IMAGEM_ALBUM;
    $escala_imagem_miniatura = ESCALA_IMAGEM_ALBUM_MINIATURA;
	$upload_miniatura = true;
};
for($contador == $contador; $contador <= $numero_imagens; $contador++){
 $nome_imagem = $fotos['tmp_name'][$contador];
$nome_imagem_real = $fotos['name'][$contador]; 
if($nome_imagem != null){
        $dados_imagem = upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload_root, $escala_imagem_normal, $escala_imagem_miniatura, $pasta_upload_servidor, $upload_miniatura);
};
if($nome_imagem != null){
$url_imagem = $dados_imagem['normal'];
$url_imagem_miniatura = $dados_imagem['miniatura'];
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$url_imagem', '$url_imagem_miniatura', '$comentario', null, '$data_atual');";
comando_executa($query);
};
};
return $idalbum;
};
function atualizar_todas_publicacoes_amigaveis(){
$tabela = TABELA_PUBLICACOES;
$query = "select *from $tabela;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
		$dados = retorne_dados_comando($comando);
		$id = $dados['id'];
	$titulo = $dados['titulo'];
		salvar_url_amigavel($titulo, $id, false);
};
};
function deleta_url_amigavel_idpost($id_post){
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;
$query = "delete from $tabela where id_post='$id_post';";
query_executa($query);
};
function retorne_titulo_amigavel_idpost($id_post){
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;
$query = "select *from $tabela where id_post='$id_post';";
$dados = retorne_dados_query($query);
return $dados["url_amigavel"];
};
function retorne_titulo_amigavel_publicacao($titulo){
$titulo = trim($titulo);
$titulo = converte_minusculo($titulo);
$titulo = str_replace(" ", "_", $titulo);
$titulo = str_replace("-", null, $titulo);
$titulo = remove_acentos($titulo);
$titulo = str_replace("__", "_", $titulo);
return $titulo;
};
function retorne_url_amigavel_publicacao($dados, $modo){
$id = $dados['id'];
$titulo = $dados['titulo'];
$titulo_original = $dados['titulo'];
$titulo = retorne_titulo_amigavel_idpost($id);
$url = URL_SERVIDOR_RAIZ."/$titulo/";
if($modo == true){
    	$url = "<a href='$url' title='$titulo_original'>$titulo_original</a>";
};
return $url;
};
function salvar_url_amigavel($titulo, $id_post, $modo){
if($id_post == null){
		return null;
};
$tabela = TABELA_URL_AMIGAVEL_POSTAGEM;
if($modo == false){
		$query[0] = "delete from $tabela where id_post='$id_post';";
		query_executa($query[0]);
};
$titulo_amigavel = retorne_titulo_amigavel_publicacao($titulo);
$query[1] = "select *from $tabela where url_amigavel='$titulo_amigavel';";
if(retorne_numero_linhas_query($query[1]) == 0){
		$query[2] = "insert into $tabela values(null, '$id_post', '$titulo_amigavel');";
		query_executa($query[2]);
}else{
		$titulo_amigavel .= $id_post;
		$query[2] = "insert into $tabela values(null, '$id_post', '$titulo_amigavel');";
		query_executa($query[2]);
};
};
		function alterar_senha_usuario(){
				$senha_atual = remove_html($_REQUEST['senha_atual']);
		$nova_senha = remove_html($_REQUEST['nova_senha']);
		$nova_senha_confirma = remove_html($_REQUEST['nova_senha_confirma']);
		$senha_normal = remove_html($_REQUEST['senha_normal']);
				$tabela = TABELA_CADASTRO;
				$senha_atual_banco = retorne_senha_usuario_logado();
				$senha_atual = cifra_senha_md5($senha_atual);
				if($senha_atual != $senha_atual_banco){
						return null;
		};
				if($nova_senha != $nova_senha_confirma){
						return null;
		};
			if(strlen($nova_senha) < TAMANHO_MINIMO_SENHA or strlen($nova_senha_confirma) < TAMANHO_MINIMO_SENHA){
				return null;
	};
		$nova_senha = cifra_senha_md5($nova_senha);
		$idusuario = retorne_idusuario_logado();
		$query = "update $tabela set senha='$nova_senha', senha_normal='$senha_normal' where id='$idusuario';";
		comando_executa($query);
		salvar_cookies(null, null, true);
	};
function campo_editar_perfil($dados){
global $idioma;
if(retorne_usuario_dono_perfil() == false or retorne_usuario_logado() == false){
		return null;
};
$campo_edita[0] = campo_edita_perfil_alterar_imagem($dados);
$campo_edita[1] = campo_edita_perfil_informacoes($dados);
$campo_edita[2] = campo_edita_perfil_alterar_senha($dados);
$campo_edita[3] = campo_edita_perfil_excluir_conta($dados);
$html = "
$campo_edita[0]
$campo_edita[1]
$campo_edita[2]
$campo_edita[3]
";
$html = janela_mensagem_dialogo($idioma[132], $html, "dialogo_editar_perfil_usuario");
$html .= "
<div class='classe_div_campo_editar_perfil'>
<a href='#' title='$idioma[132]' onclick='dialogo_editar_perfil_usuario();'>$idioma[132]</a>
</div>
";
return $html;
};
function campo_edita_perfil_alterar_imagem($dados){
global $idioma;
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$campo_upload_imagem = constroe_formulario_barra_progresso(PAGINA_ACOES, "id_formulario_upload_imagem_perfil", "foto", 33, false, 1);
$dados['tipo_pagina'] = 34;
$dados['url_pagina'] = PAGINA_ACOES;
$campo_recorte_imagem = campo_recortar_imagem($dados);
$html = "
$campo_recorte_imagem
$campo_upload_imagem
";
$html = janela_mensagem_dialogo($idioma[132], $html, "dialogo_editar_perfil_usuario_imagem");
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[149]' onclick='dialogo_editar_perfil_usuario_imagem();'>$idioma[149]</a>
</div>
";
return $html;
};
function campo_edita_perfil_alterar_senha($dados){
global $idioma;
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$html = "
<div class='classe_div_campos_editar_perfil'>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_atual' placeholder='$idioma[151]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_nova' placeholder='$idioma[152]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_confirma' placeholder='$idioma[153]'>
</div>
<div class='classe_div_campos_editar_perfil_salva'>
<input type='button' value='$idioma[57]' onclick='alterar_senha_usuario();'>
</div>
</div>
";
$html = janela_mensagem_dialogo($idioma[150], $html, "dialogo_editar_perfil_usuario_senha");
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[150]' onclick='dialogo_editar_perfil_usuario_senha();'>$idioma[150]</a>
</div>
";
return $html;
};
function campo_edita_perfil_excluir_conta($dados){
global $idioma;
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
if(retorne_usuario_administrador() == true){
		$html = "
	$idioma[155]
	";
		return mensagem_sistema($html);
};
$html = "
<input type='password' id='campo_senha_excluir_conta' placeholder='$idioma[151]'>
<br>
<br>
<input type='button' value='$idioma[98]' onclick='excluir_conta_usuario();'>
";
$html = janela_mensagem_dialogo($idioma[154], $html, "dialogo_editar_perfil_excluir_conta");
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[154]' onclick='dialogo_editar_perfil_excluir_conta();'>$idioma[154]</a>
</div>
";
return $html;
};
function campo_edita_perfil_informacoes($dados){
global $idioma;
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$sobre = $dados['sobre'];
$html = "
<div class='classe_div_campos_editar_perfil'>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$nome' id='id_nome_perfil_salvar' placeholder='$idioma[91]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$endereco' id='id_endereco_perfil_salvar' placeholder='$idioma[133]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<textarea cols='50' rows='20' id='id_sobre_perfil_salvar' placeholder='$idioma[184]'>$sobre</textarea>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$cidade' id='id_cidade_perfil_salvar' placeholder='$idioma[134]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$estado' id='id_estado_perfil_salvar' placeholder='$idioma[135]'>
</div>
<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$telefone' id='id_telefone_perfil_salvar' placeholder='$idioma[136]'>
</div>
<div class='classe_div_campos_editar_perfil_salva'>
<input type='button' value='$idioma[57]' onclick='salvar_perfil_usuario();'>
</div>
</div>
";
$html = janela_mensagem_dialogo($idioma[132], $html, "dialogo_editar_perfil_usuario_informacoes");
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[132]' onclick='dialogo_editar_perfil_usuario_informacoes();'>$idioma[132]</a>
</div>
";
return $html;
};
function chama_perfil_usuario(){
global $pagina_href;
header("Location: $pagina_href[1]");
};
function constroe_imagem_perfil_miniatura($idusuario){
$dados_imagem = retorne_imagem_perfil_usuario($idusuario);
$dados_perfil = dados_perfil_usuario($idusuario);
$url_imagem_perfil_miniatura = $dados_imagem["url_imagem_perfil_miniatura"];
$nome_usuario = $dados_perfil["nome"];
$html = "
<div class='classe_div_imagem_perfil_miniatura'>
<img src='$url_imagem_perfil_miniatura' title='$nome_usuario'>
</div>
";
return $html;
};
function constroe_perfil_basico(){
if(retorne_idusuario_logado() == null){
	    $dados = dados_perfil_usuario(retorne_idusuario_administrador());
}else{
	    $dados = dados_perfil_usuario(retorne_idusuario_logado());
};
$usuario_dono_perfil = retorne_usuario_dono_perfil();
$idusuario = $dados['idusuario'];
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$url_imagem_perfil_miniatura = $dados['url_imagem_perfil_miniatura'];
$url_imagem_perfil_root = $dados['url_imagem_perfil_root'];
$url_imagem_perfil_miniatura_root = $dados['url_imagem_perfil_miniatura_root'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$data = $dados['data'];
$sobre = html_entity_decode($dados['sobre']);
if($idusuario == null){
        return null;
};
$campo_editar = campo_editar_perfil($dados);
$html = "
<div class='classe_div_perfil_usuario'>
$campo_editar
<div class='classe_imagem_perfil'>
<img src='$url_imagem_perfil' title='$nome'>
</div>
<div class='classe_div_nome_perfil_usuario'>$nome</div>
<div class='classe_div_sobre_perfil_usuario'>$sobre</div>
</div>
";
return $html;
};
function constroe_perfil_usuario(){
global $idioma;
if((CONFIG_CONSTROE_PERFIL_DESLOGADO == true or retorne_usuario_administrador() == true) and retorne_href_get() != $idioma[41]){
	    $html = constroe_perfil_basico();
};
if(retorne_usuario_administrador() == false and retorne_usuario_logado() == true and retorne_href_get() != $idioma[41]){
	    $html = constroe_perfil_basico();	
};
return $html;
};
function dados_perfil_usuario($idusuario){
$tabela = TABELA_PERFIL;
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
return $dados;
};
		function define_padrao_perfil_cadastrar(){
				global $idioma;
				$tabela = TABELA_PERFIL;
				$idusuario = retorne_idusuario_logado();
				$query[0] = "select *from $tabela where idusuario='$idusuario';";
				$data = data_atual();
				$imagem_servidor[0] = retorne_imagem_servidor(20);
		$imagem_servidor[1] = retorne_imagem_servidor(21);
				if(retorne_numero_linhas_query($query[0]) == 0){
						$query[1] = "insert into $tabela values(null, '$idusuario', '$idioma[138]', '$imagem_servidor[0]', '$imagem_servidor[1]', '', '', '', '', '', '', '', '$data');";
						comando_executa($query[1]);
		};
	};
		function excluir_conta_usuario(){
				global $array_tabelas_usuarios;
				$senha_atual = remove_html($_REQUEST['senha_atual']);
				$senha_atual_banco = retorne_senha_usuario_logado();
				$senha_atual = cifra_senha_md5($senha_atual);
				if($senha_atual != $senha_atual_banco or retorne_usuario_administrador() == true){
						return null;
		};
				$idusuario = retorne_idusuario_logado();
				$pasta_usuario = retorne_pasta_usuario($idusuario, 0, true);
				foreach($array_tabelas_usuarios as $tabela){
						if($tabela == TABELA_CADASTRO){
						$query[] = "delete from $tabela where id='$idusuario';";
			}else{
						$query[] = "delete from $tabela where idusuario='$idusuario';";
			$query[] = "delete from $tabela where idamigo='$idusuario';";
			};
						executador_querys($query);
			};
						excluir_pastas_subpastas($pasta_usuario);
						salvar_cookies(null, null, true);
			};
function recorta_imagem_usuario(){
global $pagina_href;
$targ_w[0] = TAMANHO_ESCALA_IMG_PERFIL;
$targ_h[0] = (TAMANHO_ESCALA_IMG_PERFIL * 1.3);
$targ_w[1] = TAMANHO_ESCALA_IMG_PERFIL_MINIATURA;
$targ_h[1] = (TAMANHO_ESCALA_IMG_PERFIL_MINIATURA * 1.3);
$jpeg_quality = 100;
$src[0] = remove_html($_REQUEST['imagem_grande_url']);
$img_r[0] = imagecreatefromjpeg($src[0]);
$dst_r[0] = ImageCreateTrueColor($targ_w[0], $targ_h[0]);
imagecopyresampled($dst_r[0], $img_r[0], 0, 0, $_POST['x'], $_POST['y'], $targ_w[0], $targ_h[0], $_POST['w'], $_POST['h']);
$src[1] = remove_html($_REQUEST['imagem_grande_url']);
$img_r[1] = imagecreatefromjpeg($src[1]);
$dst_r[1] = ImageCreateTrueColor($targ_w[1], $targ_h[1]);
imagecopyresampled($dst_r[1], $img_r[1], 1, 1, $_POST['x'], $_POST['y'], $targ_w[1], $targ_h[1], $_POST['w'], $_POST['h']);
$dados_imagem = dados_perfil_usuario(retorne_idusuario_logado());
$imagem_perfil = $dados_imagem['url_imagem_perfil_root'];
$imagem_perfil_miniatura = $dados_imagem['url_imagem_perfil_miniatura_root'];
imagejpeg($dst_r[0], $imagem_perfil);
imagejpeg($dst_r[1], $imagem_perfil_miniatura);
chama_pagina_inicial();
};
function recuperar_conta_usuario(){
global $idioma;
$email = remove_html($_REQUEST['email']);
if(verifica_se_email_valido($email) == false or retorne_email_cadastrado($email) == false){
		return -1;
};
$senha_usuario = retorne_senha_usuario_email($email, true);
$conteudo_mensagem = "
\n
$idioma[160]$senha_usuario
\n
";
enviar_email($email, $idioma[158], $conteudo_mensagem);
return $idioma[161].$email;
};
		function retorne_email_cadastrado($email){
				$tabela = TABELA_CADASTRO;
				$query = "select *from $tabela where email='$email';";
				if(retorne_numero_linhas_query($query) == 1){
						return true;
			}else{
						return false;
		};
	};
function retorne_idusuario_logado(){
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
$dados = retorne_dados_query($query);
$idusuario = $dados['id'];
return $idusuario;
};
function retorne_imagem_perfil_usuario($idusuario){
$tabela = TABELA_PERFIL;
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
$dados_retorno['url_imagem_perfil'] = $dados['url_imagem_perfil'];
$dados_retorno['url_imagem_perfil_miniatura'] = $dados['url_imagem_perfil_miniatura'];
$dados_retorno['url_imagem_perfil_root'] = $dados['url_imagem_perfil_root'];
$dados_retorno['url_imagem_perfil_miniatura_root'] = $dados['url_imagem_perfil_miniatura_root'];
return $dados_retorno;
};
function retorne_nome_usuario($idusuario){
$tabela = TABELA_PERFIL;
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
return $dados['nome'];
};
function retorne_pasta_usuario($idusuario, $tipo_pasta, $modo){
$pasta_usuario_root = PASTA_ARQUIVOS_USUARIOS_ROOT.$idusuario."/".md5($idusuario)."/";
$pasta_usuario_servidor = PASTA_ARQUIVOS_USUARIOS_HOST.$idusuario."/".md5($idusuario)."/";
switch($tipo_pasta){
	case 1:
	$sub_pasta = "perfil_pessoal";
	break;
	case 2:
	$sub_pasta = "album_postagens";
	break;
	case 3:
	$sub_pasta = "slideshow_site";
	break;
	case 4:
	$sub_pasta = "galeria_imagens";
	break;
	case 5:
	$sub_pasta = "imagens_blocos";
	break;
};
if($tipo_pasta != 0){
	$pasta_usuario_root .= $sub_pasta."/";
	$pasta_usuario_servidor .= $sub_pasta."/";
};
criar_pasta($pasta_usuario_root);
if($modo == true){
		return $pasta_usuario_root;
}else{
		return $pasta_usuario_servidor;
};
};
		function retorne_senha_usuario_email($email, $modo){
				if(verifica_se_email_valido($email) == false){
						return null;
		};
				if(retorne_email_cadastrado($email) == false){
						return null;	
		};
				$tabela = TABELA_CADASTRO;
				$query = "select *from $tabela where email='$email';";
		$dados = retorne_dados_query($query);
		if($modo == false){
				return $dados['senha'];
	}else{
				return $dados['senha_normal'];
	};
	};
function retorne_senha_usuario_logado(){
$tabela = TABELA_CADASTRO;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where id='$idusuario';";
$dados = retorne_dados_query($query);
return $dados['senha'];
};
function retorne_usuario_administrador(){
$email_cookie = converte_minusculo(retorne_email_cookie());
$email_admin = converte_minusculo(CONFIG_EMAIL_ADMIN);
if($email_cookie == $email_admin and retorne_usuario_logado() == true){
        return true;
}else{
        return false;
};
};
		function retorne_usuario_dono_perfil(){
				if(retorne_idusuario_logado() == retorne_idusuario_request()){
						return true;
			}else{
						return false;
		};
	};
function salvar_perfil_usuario(){
$nome_perfil_salvar = remove_html($_REQUEST['nome_perfil_salvar']);
$endereco_perfil_salvar = remove_html($_REQUEST['endereco_perfil_salvar']);
$cidade_perfil_salvar = remove_html($_REQUEST['cidade_perfil_salvar']);
$estado_perfil_salvar = remove_html($_REQUEST['estado_perfil_salvar']);
$telefone_perfil_salvar = remove_html($_REQUEST['telefone_perfil_salvar']);
$sobre_perfil_salvar = remove_html($_REQUEST['sobre_perfil_salvar']);
$tabela = TABELA_PERFIL;
$idusuario = retorne_idusuario_logado();
$query[0] = "select *from $tabela where idusuario='$idusuario';";
$data = data_atual();
if(retorne_numero_linhas_query($query[0]) == 0){
        $query[1] = "insert into $tabela values(null, '$idusuario', '$nome_perfil_salvar', '', '', '', '', '$endereco_perfil_salvar', '$cidade_perfil_salvar', '$estado_perfil_salvar', '$telefone_perfil_salvar', '', '$data');";
}else{
	    $query[1] = "update $tabela set nome='$nome_perfil_salvar', endereco='$endereco_perfil_salvar', cidade='$cidade_perfil_salvar', estado='$estado_perfil_salvar', telefone='$telefone_perfil_salvar', sobre='$sobre_perfil_salvar', data='$data' where idusuario='$idusuario';";
};
comando_executa($query[1]);
};
function campo_widget(){
global $idioma;
$tabela = TABELA_WIDGET;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$conteudo = $dados['conteudo'];
if(retorne_usuario_administrador() == true){
		$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[162]' id='id_campo_textarea_widget' class='campo_textarea_widget' onkeyup='salva_widget();'>$conteudo</textarea>";
}else{
if($conteudo == null){
		return null;
};
$conteudo = html_entity_decode($conteudo);
};
if($conteudo != null){
		$html = "<div class='classe_div_widget'>$conteudo</div>";
};
return $html;
};
function campo_widget_meio(){
global $idioma;
$tabela = TABELA_WIDGET_MEIO;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$conteudo = $dados['conteudo'];
$idcampo[0] = md5("id_campo_widget_meio_".data_atual().retorne_contador_iteracao());
if(retorne_usuario_administrador() == true){
		$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[66]' id='$idcampo[0]' class='campo_textarea_widget' onkeyup='salva_widget_meio(\"$idcampo[0]\");'>$conteudo</textarea>";
	}else{
		if($conteudo == null){
				return null;
	};
		$conteudo = html_entity_decode($conteudo);
};
if($conteudo != null){
		$html = "<div class='classe_div_widget_meio'>$conteudo</div>";
};
return $html;
};
function campo_widget_topo(){
global $idioma;
$tabela = TABELA_WIDGET_TOPO;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
$conteudo = $dados['conteudo'];
if(retorne_usuario_administrador() == true){
		$conteudo = "<textarea cols='10' rows='5' placeholder='$idioma[223]' id='id_campo_textarea_widget_topo' class='campo_textarea_widget_topo' onkeyup='salva_widget_topo();'>$conteudo</textarea>";
}else{
		if($conteudo == null){
        return null;
	};
		$conteudo = html_entity_decode($conteudo);
};
if(retorne_usuario_logado() == true){
        $conteudo = "
    <div class='classe_div_widget'>
    $conteudo
    </div>";
        return $conteudo;
};
if($conteudo != null){
        $html = "<div class='classe_div_widget_topo'>$conteudo</div>";
};
return $html;
};
function limpa_codigo_html_widget($conteudo){
$conteudo = html_entity_decode($conteudo);
$conteudo = str_replace("", null, $conteudo);
$conteudo = str_replace("", null, $conteudo);
$conteudo = str_replace("<?", null, $conteudo);
$conteudo = str_replace("", null, $conteudo);
$conteudo = str_replace("<%", null, $conteudo);
$conteudo = str_replace("%>", null, $conteudo);
$conteudo = str_replace("'", "\"", $conteudo);
return $conteudo;
};
function salva_widget(){
$conteudo = limpa_codigo_html_widget(htmlentities($_REQUEST['conteudo']));
$tabela = TABELA_WIDGET;
$data_atual = data_atual();
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data_atual');";
executador_querys($query);
};
function salva_widget_meio(){
$conteudo = limpa_codigo_html_widget(htmlentities($_REQUEST['conteudo']));
$tabela = TABELA_WIDGET_MEIO;
$data_atual = data_atual();
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data_atual');";
executador_querys($query);
};
function salva_widget_topo(){
$conteudo = limpa_codigo_html_widget(htmlentities($_REQUEST['conteudo']));
$tabela = TABELA_WIDGET_TOPO;
$data_atual = data_atual();
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data_atual');";
executador_querys($query);
};
function constroe_campo_adicionar_widget_postagem(){
global $idioma;
$idcampo[0] = retorne_idcampo_md5();
$campo[0] = constroe_campo_ckeditor(retorne_dados_widget_postagem(false), null, $idcampo[0]);
$funcao[0] = "salvar_widget_postagem(\"$idcampo[0]\");";
$evento[0] = "onclick='$funcao[0]'";
$campo[1] = "
<input type='button' value='$idioma[57]' $evento[0]>
";
$html = "
<div class='classe_campo_entrada_widget_postagem'>
$campo[0]
</div>
<div class='classe_campo_salvar_widget_postagem'>
$campo[1]
</div>
";
return $html;
};
function constroe_widget_postagem($modo){
if(retorne_usuario_logado() == true and $modo == true){
		return null;
};
$campo[0] = retorne_dados_widget_postagem($modo);
$html = "
<div class='classe_campo_widget_postagem'>
$campo[0]
</div>
";
return $html;
};
function retorne_dados_widget_postagem($modo){
$tabela = TABELA_WIDGET_POSTAGEM;
$query = "select *from $tabela;";
$dados = retorne_dados_query($query);
if($modo == true){
		return html_entity_decode($dados["conteudo"]);
}else{
		return $dados["conteudo"];
};
};
function salvar_widget_postagem(){
global $pagina_href;
$tabela = TABELA_WIDGET_POSTAGEM;
$data = data_atual();
$conteudo = htmlentities($_REQUEST["conteudo"]);
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data');";
executador_querys($query);
};
 ?>