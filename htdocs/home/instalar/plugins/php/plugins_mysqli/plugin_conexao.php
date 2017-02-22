<?php

// plugin de conexao com o banco de dados
function plugin_conexao($conectar = true){

// valida se a variavel de conexao esta vazia
if($_SESSION["CONEXAO_MYSQLI"] != null){
	
	// valida se há uma conexão ativa
	if($conectar == true){

		// retorno nulo
		return null;
		
	}else{
		
		// fecha a conexão
		mysqli_close($_SESSION["CONEXAO_MYSQLI"]);
		
		// limpa a variavel de conexao
		$_SESSION["CONEXAO_MYSQLI"] = null;
		
		// retorno nulo
		return null;		

	};

};

// valida configuracao e conecta-se ao mysql
if($conectar == true and $_SESSION["CONEXAO_MYSQLI"] == null){

    // conecta-se ao mysql
    $_SESSION["CONEXAO_MYSQLI"] = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, SENHA_MYSQL);
    
	// agora seleciona o banco de dados
	mysqli_select_db($_SESSION["CONEXAO_MYSQLI"], BANCO_DADOS);

};

};

?>