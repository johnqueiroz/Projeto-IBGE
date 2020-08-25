<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();



// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

	
	$patrimonio = mysqli_real_escape_string($conexao, $_POST['patrimonio']);
	$numero_de_serie = mysqli_real_escape_string($conexao, $_POST['serie']);
    $Tipo_equipamento = mysqli_real_escape_string($conexao, $_POST['tipo_equipamento_escolha']);
	$status = mysqli_real_escape_string($conexao, $_POST['Status_equipamento']);
	$area = mysqli_real_escape_string($conexao, $_POST['escolherArea']);
	$ID_equipamento = mysqli_real_escape_string($conexao, $_POST["id"]);

	
	echo "$patrimonio - $numero_de_serie - $Tipo_equipamento - $status ";
	$sql = "UPDATE equipamento SET patrimonio = '$patrimonio', numero_de_serie='$numero_de_serie', ID_tipo =  '$Tipo_equipamento', ID_status ='$status', ID_area = '$area' WHERE ID_equipamento = '$ID_equipamento'";
	echo ($sql);
	$resultado_equipamentos = mysqli_query($conexao, $sql);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		/*if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/gerenciamento_equipamento_teste.php'>
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/gerenciamento_equipamento_teste.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";	
		}*/?>
	</body>
</html>
<?php

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}


$conexao->close(); ?>



