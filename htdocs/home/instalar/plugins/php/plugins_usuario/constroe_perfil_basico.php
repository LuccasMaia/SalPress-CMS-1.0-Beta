<?php

// constroe o perfil basico
function constroe_perfil_basico(){

// dados do perfil
if(retorne_idusuario_logado() == null){
	
	// dados...
    $dados = dados_perfil_usuario(retorne_idusuario_administrador());
	
}else{
	
	
	// dados...
    $dados = dados_perfil_usuario(retorne_idusuario_logado());

};

// usuario dono do perfil
$usuario_dono_perfil = retorne_usuario_dono_perfil();

// separa dados
$idusuario = $dados['idusuario'];
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$url_imagem_perfil_miniatura = $dados['url_imagem_perfil_miniatura'];
$url_imagem_perfil_root = $dados['url_imagem_perfil_root'];
$url_imagem_perfil_miniatura_root = $dados['url_imagem_perfil_miniatura_root'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$data = $dados['data'];
$sobre = html_entity_decode($dados['sobre']);

// valida id de usuario
if($idusuario == null){

    // retorno nulo	
    return null;
	
};

// campo editar perfil
$campo_editar = campo_editar_perfil($dados);

// codigo html
$html = "
<div class='classe_div_perfil_usuario'>
$campo_editar
<div class='classe_imagem_perfil'>
<img src='$url_imagem_perfil' title='$nome'>
</div>
<div class='classe_div_nome_perfil_usuario'>$nome</div>
<div class='classe_div_sobre_perfil_usuario'>$sobre</div>
</div>
";

// retorno
return $html;

};

?>