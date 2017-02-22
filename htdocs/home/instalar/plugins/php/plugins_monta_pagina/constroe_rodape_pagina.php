<?php

// constroe o rodape da pagina
function constroe_rodape_pagina(){

// globals
global $idioma;

// valida usar resolucao
if(retorna_usar_resolucao() == true and CONFIG_EXIBE_RODAPE_MODO_RESOLUCAO == false){

    // retorno nulo	
    return null;
	
};

// dados de sobre site
$dados = retorne_dados_sobre_site();

// copyright de sistema
$copyright_sistema = $dados["copyright"];

// tabela
$tabela = TABELA_RODAPE;

// query
$query = "select *from $tabela;";

// dados de query
$dados = retorne_dados_query($query);

// separa os dados
$conteudo_1 = html_entity_decode($dados["conteudo_1"]);
$conteudo_2 = html_entity_decode($dados["conteudo_2"]);
$conteudo_3 = html_entity_decode($dados["conteudo_3"]);

// conteudo esquerdo
$conteudo[0] = "
<div class='classe_div_conteudo_rodape_separa_1'>
$conteudo_1
</div>
";

// conteudo meio
$conteudo[1] = "
<div class='classe_div_conteudo_rodape_separa_2'>
$conteudo_2
</div>
";

// conteudo direito
$conteudo[2] = "
<div class='classe_div_conteudo_rodape_separa_3'>
$conteudo_3
</div>
";

// desenvolvedor do sistema
$desenvolvedor = DESENVOLVEDOR_SISTEMA_RODAPE;

// codigo html
$html = "
<div class='div_rodape_pagina'>

$conteudo[0]
$conteudo[1]
$conteudo[2]

<div class='classe_div_conteudo_rodape_copyright'>$copyright_sistema</div>
<div class='classe_rodape_desenvolvedor'>$desenvolvedor</div>

</div>
";

// retorno
return $html;

};

?>