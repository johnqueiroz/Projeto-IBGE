<?php

// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

 
 //Faz retornar ao formulário de cadastro de área depois enviar o formulário na página de cadastros.
 $_SESSION['formulario_localidade'] = 1;

 // cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$NomeArea = $_POST["Nome_area"];
$_SESSION ['ID_area'] = $_GET["ID_area"];
// query de inserir dados no banco
$sql = "INSERT INTO localidade_area(nome) VALUES ('$NomeArea')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
$dados = $conexao ->query("SELECT * FROM localidade_area");

//envia para a página de cadastro de equipamentos.
header('Location:http://localhost/cadastroLocalidade.php');

?>