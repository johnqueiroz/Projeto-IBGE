<?php

// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

 //Faz retornar ao formulário de cadastro de subárea depois enviar o formulário na página de cadastros.
 $_SESSION['formulario_localidade'] = 2;

 // cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$NomeSubarea = $_POST["Nome_subarea"];
$AreaInserida = $_POST['id_area_da_subarea'];

// query de inserir dados no banco
$sql = "INSERT INTO localidade_subarea(nome, ID_area) VALUES ('$NomeSubarea', '$AreaInserida')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
$dados = $conexao ->query("SELECT * FROM localidade_subarea");

//envia para a página de cadastro de equipamentos.
header('Location:http://localhost/cadastroLocalidade.php');

?>