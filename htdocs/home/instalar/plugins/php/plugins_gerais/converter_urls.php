<?php

// converte todas as urls, links, videos etc
function converter_urls($conteudo_post){

// converte url em video do youtube
$conteudo_post = converte_url_video_youtube($conteudo_post);

// converte url em link
$conteudo_post = converte_url_link($conteudo_post);

// retorno
return $conteudo_post; // retorno

};

?>