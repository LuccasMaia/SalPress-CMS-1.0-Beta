<?php
	
// retorna conteudo de arquivo
function retorna_conteudo_arquivo($endereco_arquivo){

// retorno
if($endereco_arquivo != null){

	// retorno com conteudo de arquivo
	return @file_get_contents($endereco_arquivo);

};
	
};
	
?>