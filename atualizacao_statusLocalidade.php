<?php 

session_name("teste");
 session_start();



// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
		//recebe todos os parametros do GET
		$parametrosGET = $_SERVER['QUERY_STRING'];

		//converte os parametros em array
		parse_str($parametrosGET, $parametros);
	
		//recupera o tipo passado pelo GET
		$localidade_geral = $parametros['Troca_area'];
		$status_geral = $parametros['Status_troca'];
		
		if($localidade_geral != ""){
			foreach ($parametros['ID_equipamento'] as &$id) {
			$query = "UPDATE `equipamento` SET `ID_localidade`=".$localidade_geral." WHERE id=".$id;
		
			// executa a query
			mysqli_query($conexao, $query);
			
			}
			//texto de resposta
			echo "Alteraçao do tipo realizada com sucesso.";
		}
	  
		if($status_geral != ""){
			foreach ($parametros['ID_equipamento'] as &$id) {
			$query = "UPDATE `equipamento` SET `ID_status`=".$status_geral." WHERE id=".$id;
		
			// executa a query
			mysqli_query($conexao, $query);
			
			}
			//texto de resposta
			echo "Alteraçao do status realizada com sucesso.";
        }
        
?>