<?php

$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');

if(isset($_POST["Siape_entrada"]) && isset($_POST["senha_entrada"])){
    $Siape_entrada = $_POST["Siape_entrada"];
    $senha = $_POST["senha_entrada"];

    $sql = mysqli_query("SELECT * FROM ssi WHERE siape_ssi = '$Siape_entrada' AND senha_ssi = '$senha_entrada'");
    $num = mysqli_num_rows($sql);
echo'<script type="text/javascript">window.location = "cadastroEquipamentos.php"</script>';
}








if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
echo '<script type="text/javascript">javascript:history.back()</script>';
?>