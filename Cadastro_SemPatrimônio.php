<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

  //Faz retornar ao formulário de cadastro sem patrimonio depois enviar o formulário na página de cadastros.
 $_SESSION['formulario'] = 2;
 
// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$quantidade = $_POST["quantidade"];
$data_recebimento = $_POST["data_recebimento"];
$TipoEquipamento = $_POST["tipo_equipamento_escolha"];


// query de inserir dados no banco
$sql = "INSERT INTO equipamento_sem_patrimonio(quantidade,data_recebimento, ID_tipo) VALUES ('$quantidade','$data_recebimento', '$TipoEquipamento')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
$dados = $conexao ->query("SELECT * FROM equipamento_sem_patrimonio");

//envia para a página de cadastro de equipamentos
header('Location:http://localhost/cadastroEquipamentos.php');

?>