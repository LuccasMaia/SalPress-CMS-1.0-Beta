<?php

// constroe o formulario com barra de progresso
function constroe_formulario_barra_progresso($url_envio, $id_formulario, $nome_file, $tipo_pagina, $multiplo, $tipo_arquivo){

// globals
global $idioma;
global $requeste;

// valida usuario logado
if(retorne_usuario_logado() == false){

    // retorno nulo
    return null;	
	
};

// numero que complementa o nome da funcao
// isto evita duas funcoes com o mesmo nome
// isto causaria erro se nao fosse usado!
$numero_nome_funcao = $tipo_pagina.$tipo_arquivo.$id_formulario;

// id de post
$idpost = retorne_idpost_request();

// id de album
$idalbum = retorne_idalbum_post();

// campos ocultos
$campos_ocultos = "
<input type='hidden' name='$requeste[4]' value='$idpost'>
<input type='hidden' name='$requeste[6]' value='$idalbum'>
";

// tipo de arquivo aceito
switch($tipo_arquivo){

	case 1:
	$tipo_arquivo = "accept='image/*'";
	$texto_botao_enviar = $idioma[48];
	break;

	case 2:
	$tipo_arquivo = "accept='audio/*'";
	$texto_botao_enviar = $idioma[50];
	break;

	case 3:
	$tipo_arquivo = "accept='video/*'";
	$texto_botao_enviar = $idioma[51];
	break;

};

// valida o tipo de pagina
switch($tipo_pagina){

    case 8:
	$texto_botao_enviar = $idioma[181];
    break;
	
};

// valida enviar multiplas imagens
if($multiplo == false){
	
	// texto de botao
	$texto_botao_enviar = $idioma[227];	
	
};

// id de campo de porcentagem
$id_porcentagem = md5("porcentagem".$numero_nome_funcao);
$id_campo_file = md5("campo_file".$numero_nome_funcao);
$id_div_progresso = md5("campo_div_progresso".$numero_nome_funcao);
$id_div_botao_upload = md5("campo_botao_upload".$numero_nome_funcao);

// valida usar multiplos arquivos
if($multiplo == true){

    // multiplos
    $multiplo = "multiple";
	
};

// campo formulario
$campo_formulario = "

<div class='classe_div_formulario_progresso'>
<form action='$url_envio' method='post' enctype='multipart/form-data' id='$id_formulario'>
<input type='file' id='$id_campo_file' name='$nome_file' onchange='simula_enviar_formulario_barra_progresso_$numero_nome_funcao();' $tipo_arquivo $multiplo>

<div class='classe_exibe_barra_progresso_formulario' id='$id_div_progresso'>
<progress value='0' max='100'></progress>
<span id='$id_porcentagem' class='classe_barra_progresso_formulario_span'>0%</span>
<input type='hidden' name='$requeste[0]' value='$tipo_pagina'>
$campos_ocultos
</div>

$campo_hidden_extra
<div class='classe_div_botao_upload_formulario_progresso' id='$id_div_botao_upload'>
<input type='button' value='$texto_botao_enviar' onclick='simula_clique_file_formulario_barra_progresso_$numero_nome_funcao();'>
</div>

</form> 
</div>

";

// campo script
$campo_script = "
<script language='javascript'>

$('#$id_formulario').ajaxForm({uploadProgress: function(event, position, total, percentComplete){
	
$('progress').attr('value',percentComplete);
$('#$id_porcentagem').html(percentComplete+'%');

}, success: function(data){

$('progress').attr('value','100');
$('#$id_porcentagem').html('100%');
$('pre').html(data);
location.reload();
}

});


// simula clique em campo file
function simula_clique_file_formulario_barra_progresso_$numero_nome_funcao(){

// simula clique
$('#' + '$id_campo_file').click();

};


// simular envio de dados
function simula_enviar_formulario_barra_progresso_$numero_nome_funcao(){

// simula envio
$('#$id_formulario').submit();

// exibe e oculta divs
document.getElementById('$id_div_progresso').style.display = 'inline';
document.getElementById('$id_div_botao_upload').style.display = 'none';

};


</script>
";

// codigo html
$html = "
$campo_formulario
$campo_script
";

// retorno
return $html;

};

?>