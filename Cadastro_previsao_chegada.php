<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

 //Faz retornar ao formulário de previsao de chegada depois enviar o formulário na página de cadastros.
 $_SESSION['formulario'] = 3;
 
// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$quantidade_equipamentos = $_POST["Quantidade_equipamento2"];
$previsao_chegada = $_POST["previsao_chegada2"];
$TipoEquipamento = $_POST["tipo_equipamento_escolha2"];


// query de inserir dados no banco
$sql = "INSERT INTO equipamento_previsao(quantidade,data_prevista, ID_tipo) VALUES ('$quantidade_equipamentos','$previsao_chegada', '$TipoEquipamento')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
$dados = $conexao ->query("SELECT * FROM equipamento_previsao");

//envia para a página de cadastro de equipamentos.
header('Location:http://localhost/cadastroEquipamentos.php');

?>