<?php

// campo rede social
function campo_rede_social($url, $modo){

// modo true e o modo completo
// modo false e o modo somente redes sociais

// valida permite social
if(CONFIG_PERMITE_SOCIAL == false or retorne_usuario_administrador() == true){
	
	// retorno nulo
    return null;
	
};

// valida a url
if($url == null){
	
    // url atual
    $url_atual = retorne_url_atual();

}else{
	
	// url atual
    $url_atual = $url;
	
};

// campo comentario de facebook
$campo[0] = "

<div class='classe_div_separa_sessao_rede_social'>
<div class='fb-comments' data-width='100%' data-href='$url_atual' data-numposts='5'></div>
</div>

";

// campo disqus
$campo[1] = campo_disqus();

// campo compartilhar twitter
$campo[2] = "

<div class='classe_div_separa_sessao_rede_social'>
<a class='twitter-share-button' href='$url_atual'>
Tweet
</a>
</div>

";

// campo compartilhar em facebook
$campo[3] = "

<div class='classe_div_separa_sessao_rede_social'>
<div class='fb-share-button' data-href='$url_atual' data-layout='button_count'></div>
</div>

";

// valida o modo
if($modo == false){

	// limpa campos
	$campo[1] = null;
	$campo[0] = null;

};

// codigo html
$html = "
<div class='classe_div_compartilhar'>
$campo[3]
$campo[2]
$campo[0]
$campo[1]
</div>
";

// retorno
return $html;

};

?>