<?php
	
// retorna o numero de usuarios online
function retorne_numero_usuarios_online(){

// tabela
$tabela = TABELA_CADASTRO;

// query
$query = "select *from $tabela;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de usuarios online
$numero_online = 0;

// numero de linhas de comando
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo usuarios
for($contador == $contador; $contador <= $numero_linhas; $contador++){
	
	// dados
	$dados = retorne_dados_comando($comando);
	
	// idusuario
	$idusuario = $dados['idusuario'];
	
	// valida idusuario
	if($idusuario != null){

		// valida usuario online
		if(retorne_usuario_online($idusuario) == true){
			
			// atualiza contador	
			$numero_online++;
			
		};

	};
	
};

// retorno
return $numero_online;

};
	
?>