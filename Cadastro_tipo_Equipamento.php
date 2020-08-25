<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

   //Faz retornar ao formulário de cadastro sem patrimonio depois enviar o formulário na página de cadastros.
 $_SESSION['formulario'] = 4;

// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$TipoEquipamento = $_POST["tipo"];


// recebe as informações que foram enviadas pelo formulário
$sql = "INSERT INTO tipo (tipo_equipamento) VALUES ('$TipoEquipamento')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}

$dados = $conexao ->query("SELECT * FROM tipo");

//envia para a página de cadastro de equipamentos
header('Location:http://localhost/cadastroEquipamentos.php');

?>