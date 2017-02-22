<?php

// carregar header redes sociais
function carregar_header_redes_sociais(){

// valida permite social
if(CONFIG_PERMITE_SOCIAL == false or retorne_usuario_administrador() == true){
	
	// retorno nulo
    return null;
	
};

// codigos do facebook
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

// codigo de twitter
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

// codigo html
$html = "
$codigo_facebook
$codigo_twitter
";

// retorno
return $html;

};

?>