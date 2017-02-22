<?php
	
// retorna a imagem do servidor
function retorne_imagem_servidor($numero){

// globals
global $idioma;
global $pagina_href;
global $requeste;

// dados de sobre site
$dados = retorne_dados_sobre_site();

// numero da imagem
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

// valida apenas endereco
if($endereco == true){

	// retorno
	return PASTA_IMAGENS_SISTEMA."$numero.png";
	
};

// imagem
if($url_link == null){

	// imagem
	$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
	
}else{

	// imagem
	$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
	
	// verifica se ha um evento, se houver nao transforma em link
	if($evento == null){
	
	$imagem = "<a href='$url_link' title='$titulo'>$imagem</a>";
	
};

};

// retorno
return $imagem;

};

?>