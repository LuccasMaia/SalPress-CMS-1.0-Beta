<?php
	
	// constroe o campo de administrador no modo de resolucao
	function constroe_campo_administrador_modo_resolucao(){
		
		// globals
		global $idioma;
		global $pagina_href;
		
		// valida usuario administrador
		if(retorne_usuario_administrador() == false or retorna_usar_resolucao() == false){
			
			// retorno nulo
			return null;
			
		};
		
		// imagens de servidor
		$imagem_servidor[0] = retorne_imagem_servidor(6);
		$imagem_servidor[1] = retorne_imagem_servidor(7);
		
		// links
		$link[0] = "<a href='$pagina_href[3]'>$imagem_servidor[0]</a>";
		$link[1] = "<a href='$pagina_href[4]'>$imagem_servidor[1]</a>";
		
		// codigo html
		$html = "
		<div class='classe_div_campo_administrador_resolucao'>
		
		<div class='classe_div_campo_administrador_resolucao_div'>$link[0]</div>
		<div class='classe_div_campo_administrador_resolucao_div'>$link[1]</div>
		
		</div>
		";
		
		// retorno
		return $html;
		
	};
	
	?>	