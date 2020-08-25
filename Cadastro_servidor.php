<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
session_name("teste");
session_start();

// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

// recebe as informações que foram enviadas pelo formulário
$Nomeservidor = $_POST["Nome_servidor"];
$SiapeServidor = $_POST["Siape"];
$EmailServidor = $_POST["Email"];
$TelefoneServidor = $_POST["telefone"];
$FuncaoServidor = $_POST["escolherfuncao"];
$AreaServidor = $_POST["escolherArea"];


// query de inserir dados no banco
$sql = "INSERT INTO servidor(nome, siape, email, telefone, ID_funcao, ID_area) VALUES ('$Nomeservidor', '$SiapeServidor', '$EmailServidor', '$TelefoneServidor', '$FuncaoServidor', '$AreaServidor')";

if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}

$dados = $conexao ->query("SELECT * FROM servidor");


//envia para a página de cadastro de servidores.
header('Location:http://localhost/CadastroServidor.php');

?>