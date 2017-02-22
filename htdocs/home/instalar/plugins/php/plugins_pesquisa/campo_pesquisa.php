<?php

// campo de pesquisa
function campo_pesquisa(){

// globals
global $idioma;
global $requeste;

// url de formulario
$url_formulario = PAGINA_INICIAL;

// codigo html
$html = "
<div class='classe_div_pesquisa'>

<div class='classe_div_pesquisa_campos'>
<form action='$url_formulario' method='get'>
<input type='text' name='$requeste[1]' placeholder='$idioma[148]' value=''>
</form>
</div>

</div>
";

// retorno
return $html;

};

?>