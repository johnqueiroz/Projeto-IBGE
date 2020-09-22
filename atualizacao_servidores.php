<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();



// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

	
	$nome_servidor = $_POST['nome_servidor'];
	$Siape = $_POST['Siape'];
    $telefone_servidor = $_POST['telefone_servidor'];
	$email_servidor = $_POST['email_servidor'];
	$funcao_servidor = $_POST['funcao_servidor'];
	$escolherArea = $_POST["escolherArea"];
    $id = $_POST["id"];



	$sql = "UPDATE servidor SET nome = '$nome_servidor', siape='$Siape', telefone =  '$telefone_servidor', email ='$email_servidor', ID_funcao = '$funcao_servidor', ID_area = '$escolherArea' WHERE ID_servidor = '$id'";
	echo ($sql);
	$resultado_servidores = mysqli_query($conexao, $sql);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "

			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projeto%20IBGE/gerenciamento_equipamento_teste.php'>
				
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
				
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Projeto%20IBGE/gerenciamento_equipamento_teste.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}


$conexao->close(); ?>



