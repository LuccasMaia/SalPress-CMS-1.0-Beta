<?php

// funcao que converte link e imagem via url
function _funcao_converte_link_imagem_via_url($matches)

{ // preg_replace_callback() is passed one parameter: $matches.
    if (preg_match('/\.(?:jpe?g|png|gif)(?:$|[?#])/', $matches[0]))
    { // This is an image if path ends in .GIF, .PNG, .JPG or .JPEG.
        return '<p><img class="imagem_convertida_url" src="'. $matches[0] .'"></p>';
    } // Otherwise handle as NOT an image.
    return '<a target="_blank" href="'. $matches[0] .'">'. $matches[0] .'</a>';

	};

?>