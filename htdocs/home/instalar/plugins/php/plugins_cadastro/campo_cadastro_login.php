<?php
	
	// campo de cadastro e login
	function campo_cadastro_login(){
		
		// globals
		global $idioma;
		global $pagina_href;
		
		// valida o usuario logado
		if(retorne_usuario_logado() == false){
			
			// codigo html
			$html = formulario_login();
			
			}else{
			
			// codigo html
			$html = "
			<div class='classe_div_campo_cadastro_login'>
			<a href='$pagina_href[2]' title='$idioma[15]'>$idioma[15]</a>
			</div>
			";
			
		};
		
	// retorno
	return $html;
	
	};
	
	?>	