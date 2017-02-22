<?php
	
	// constroe as conversas do chat
	function constroe_conversas_chat_dados($dados){
		
		// id de usuario logado
		$idusuario = retorne_idusuario_logado();
		
		// separa dados
		$id_tabela = $dados['id'];
		$idusuario_tabela = $dados['idusuario'];
		$idamigo_tabela = $dados['idamigo'];
		$mensagem_tabela = $dados['mensagem'];
		$data_tabela = $dados['data'];
		$idusuario_enviou = $dados['idusuario_enviou'];
		
		// retorno nulo
		if($id_tabela == null){
			
			// retorno nulo
			return null;
			
		};
		
		// escolhendo estilo de classe
		if($idusuario_enviou == $idusuario){
			
			$classe_div_imagem_perfil = "classe_div_imagem_perfil_1";
			$classe_mensagem_chat = "classe_mensagem_chat_1";
			
			}else{
			
			$classe_div_imagem_perfil = "classe_div_imagem_perfil_2";
			$classe_mensagem_chat = "classe_mensagem_chat_2";
			
		};
		
		// data atual
	$data_tabela = converte_data_amigavel($data_tabela);
	
	// nome do usuario
	$nome_usuario = retorne_nome_usuario($idusuario_enviou);
	
	// dados de imagem
	$dados_imagem = retorne_imagem_perfil_usuario($idusuario_enviou);
	
	// separa dados de imagem
	$url_imagem_perfil_miniatura = $dados_imagem['url_imagem_perfil_miniatura'];
	
	// imagem de perfil
	$imagem_perfil = "<img src='$url_imagem_perfil_miniatura' title='$data_tabela'>";
	
	// converte pra links e videos
	$mensagem_tabela = converter_urls($mensagem_tabela);
	
	// constroe mensagem
	$html .= "<div class='classe_div_mensagem_recebida'>";
	$html .= "<div class='$classe_div_imagem_perfil'>";
	$html .= $imagem_perfil;
	$html .= "</div>";
	$html .= "<div class='$classe_mensagem_chat'>";
	$html .= $mensagem_tabela;
	$html .= "</div>";
	$html .= "</div>";
	
	// retorno
	return $html;
	
	};
	
	?>	