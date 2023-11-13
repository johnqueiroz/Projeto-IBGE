<?php
// Essa página só deve aparecer caso o usuário esteja logado
// Dessa forma inicia a sessão para verficação
session_start();

// Verificar se o usuário está logado ou não
if (!isset($_SESSION['userEmail'])) {
// Redirecionar para a página de login caso não esteja
    header("Location: entrada.php");
    exit();
}
?>

<html>
    <head>
             <title>Sistemas de arquivo IBGE</title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
             <link rel="stylesheet" href="../css/estilo.css" type="text/css">
             <link rel="shortcut icon" href="../../images/favicon.ico">
             <link rel="icon" href="images/IBGE.png"/>
    </head>

<body>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
require_once '../Users/Cadastros/user.php';

$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();

?>

    <div class="container">
        <div class="logoIbge">
            <img src="../images/IBGE.png" alt="Logo do IBGE">
        </div>
          
        <div class="fotoPerfil">
            <img src="../images/profilePic.jpeg" alt="Foto de perfil">
        </div>

        <div class="rodapeLogin">
            <a href="#" class="login"><b>Continuar como <?php echo $dadosUsuario['nomeServidor'];?></b></a></br>
            <div class="trocarConta">
              <p><b>Não é <?php echo $dadosUsuario['nomeServidor'];?>?</b> <a href="../logout.php" class="link">Trocar de conta</a> ou <a href="../Users/Cadastros/cadastroUser.php" class="link">Criar conta</a>
            </div>
            
        </div>
    </div>

 
    
</body>
</html>