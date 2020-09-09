<?php 

session_name("teste");
 session_start();



// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
		//recebe todos os parametros do GET
	//recebe todos os parametros do GET
	$parametrosGET = $_SERVER['QUERY_STRING'];
echo $parametrosGET;
	//converte os parametros em array
	parse_str($parametrosGET, $parametros);

	//recupera o tipo passado pelo GET
	$tipo = $parametros['localidade2'];
	$status = $parametros['status2'];
	
	if($tipo != ""){
		foreach ($parametros['ID_equipamento'] as &$id) {
		$query = "UPDATE `equipamento` SET `ID_area`=".$tipo." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);
		
		}
		//texto de resposta
		echo "Alteraçao do tipo realizada com sucesso.";
	}
  
	if($status != ""){
		foreach ($parametros['ID_equipamento'] as &$id) {
		$query = "UPDATE `equipamento` SET `ID_status`=".$status." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);
		
		}
		//texto de resposta
		echo "Alteraçao do status realizada com sucesso.";
	}
	?>
