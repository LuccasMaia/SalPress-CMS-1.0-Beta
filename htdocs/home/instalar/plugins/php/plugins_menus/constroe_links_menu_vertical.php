<?php
	
	// constroe os links do menu vertical
	function constroe_links_menu_vertical($link){
		
		// listando links
		foreach($link as $link_url){
			
			// valida link de url
			if($link_url != null){
				
				// codigo html
				$html .= $link_url;
				
			};
			
		};
		
		// retorno
		return $html;
		
	};
	
?>