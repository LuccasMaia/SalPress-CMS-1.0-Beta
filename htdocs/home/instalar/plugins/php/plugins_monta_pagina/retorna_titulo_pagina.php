<?php
	
// retorna o titulo da pagina
function retorna_titulo_pagina(){

// globals
global $idioma;

// dados de sobre site
$dados_sobre_site = retorne_dados_sobre_site();

// seleciona titulo
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

// retorna titulo de postagem
if(retorne_idpost_request() != null){

	// titulo de pagina
	$titulo_pagina = retorna_titulo_postagem_idpost(retorne_idpost_request())." - ".$dados_sobre_site["nome"];;
	
};

// retorno
return $titulo_pagina;

};

?>