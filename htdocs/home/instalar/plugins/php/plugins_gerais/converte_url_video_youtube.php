<?php

function converte_url_video_youtube($conteudo_post){

// retorno
return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<br><iframe width=\"100%\" height=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $conteudo_post);

};

?>