<?php

$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');


echo'<script type="text/javascript">window.location = "dashboard.php"</script>';








if ($conexao->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
}
echo '<script type="text/javascript">javascript:history.back()</script>';
?>