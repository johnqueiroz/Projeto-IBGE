<?php
session_start();

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login ou qualquer outra página desejada
header("Location: login/entrada.php");
exit();
?>