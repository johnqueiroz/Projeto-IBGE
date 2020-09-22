<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();



// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

	//recebe todos os parametros do GET
	$parametrosGET = $_SERVER['QUERY_STRING'];

	//converte os parametros em array
	parse_str($parametrosGET, $parametros);

	//recupera o tipo passado pelo GET
	$patrimonio = $parametros['patrimonio'];
	$serie = $parametros['serie'];
	$tipo = $parametros['tipo'];
	$status = $parametros['status'];
	$area = $parametros['area'];
	$id = $parametros['id'];
	$observacao = $parametros['observacao'];
	$data_distribuicao = $parametros['distribuicao'];
	
	if($tipo != ""){
		
		$query = "UPDATE `equipamento` SET `ID_tipo`= $tipo,  `numero_de_serie`= $serie, 'patrimonio' = $patrimonio, ID_status = $status, ID_area = $area WHERE 'ID_equipamento'= $id";
	
		// executa a query
		mysqli_query($conexao, $query);
		echo "teste";
	}
	if($patrimonio != ""){
		
		$query = "UPDATE `equipamento` SET `patrimonio`=".$patrimonio." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}
	if($serie != ""){
		
		$query = "UPDATE `equipamento` SET `numero_de_serie`=".$serie." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}
	if($status != ""){
		
		$query = "UPDATE `equipamento` SET `ID_status`=".$status." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}
	if($area != ""){
		
		$query = "UPDATE `equipamento` SET `ID_area`=".$area." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}
	if($observacao != ""){
		
		$query = "UPDATE `equipamento` SET `observacao`=".$observacao." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}
	if($data_distribuicao != ""){
		
		$query = "UPDATE `equipamento` SET `data_de_distribuicao`=".$data_distribuicao." WHERE ID_equipamento=".$id;
	
		// executa a query
		mysqli_query($conexao, $query);

	}

$conexao->close(); ?>



