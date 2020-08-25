<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
 session_name("teste");
 session_start();

 //Faz retornar ao formulário de equipamento(com patrimonio) depois enviar o formulário na página de cadastros
 $_SESSION['formulario'] = 1;

// caso o checkbox esteja verificado, ele seta para que continue selecionado, e caso não esteja, ele continua não selecionado.
if(isset($_POST["checkbox"])) {
    $_SESSION['checkbox'] = $_POST["checkbox"][0];
   
}else{
    $_SESSION['checkbox'] = 'nulo';
}
// cria a conexao com o banco
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');



// caso exista numero de serie, o que foi enviado será cadastrado no banco, se não, envia "0".
if(isset($_POST["serie"])){
    $NumeroSerie = $_POST["serie"];
}else{
    $NumeroSerie = 0;
}

if(isset($_POST["area"])){
    $ID_area = 1;
    
}

if(isset($_POST["status"])){
    $ID_status = 1;
    
}

// recebe as informações que foram enviadas pelo formulário
$PatrimonioEqp = $_POST["patrimonio"];
$DataRecebimento = $_POST["data_recebimento"];
$TipoEquipamento = $_POST["tipo_equipamento_escolha"];

$_SESSION['ID_tipo'] = $TipoEquipamento;
$_SESSION['data_recebimento'] = $DataRecebimento;
// query de inserir dados no banco
$sql = "INSERT INTO equipamento(patrimonio, numero_de_serie, data_de_recebimento, ID_tipo, ID_area, ID_status ) VALUES ('$PatrimonioEqp', '$NumeroSerie', '$DataRecebimento', '$TipoEquipamento', '$ID_area', '$ID_status')";

$dados = mysqli_query($conexao, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conexao));

/*if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
*/

//envia para a página de cadastro de equipamentos.
header('Location:http://localhost/cadastroEquipamentos.php');

?>