<html>
    <head>
            <title>Sistemas de arquivo IBGE - Login</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link rel="stylesheet" href="../css/estiloLoginServ.css" type="text/css">
    
    </head>

<body>

<?php

// Utiliza a classe user para verificar a conta para entrar no sistema.
require_once '../Users/Cadastros/user.php';
        
// "Transforma" o formData em array para usar os dados separadamente. Os dados do formData
// vem do formulário através do "name" no "button"
$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Se o formData não for vazio, vai ser criado um novo usuário para verificar seus dados
if(!empty($formData['loginUser'])){
    $createUser = new user();
    $createUser->formData = $formData;
    $loginUser = $createUser->verificarConta();

// Caso o login seja bem sucedido, vai ser criada uma sessão e o email do servidor ficará salvo em uma variável de sessão
    if($loginUser){
        session_start();
        $_SESSION['userEmail'] = $formData["emailServidor"];

        echo "<script>window.location.href = '../auxiliar/dashboard.php';</script>";

        exit();
    }else {
        // Exibe o alerta usando JavaScript
        echo "<script>alert('Erro: Usuário não cadastrado! Email ou senha incorretos.');</script>";
    
        // Aguarda alguns segundos antes de redirecionar para a página de entrada
        echo "<script>setTimeout(function() { window.location.href = 'entrada.php'; }, 100);</script>";
    
        // Finaliza o script
        exit();
    }
    
}
        
?>

    <div class="container">
        <div class="logoIbge">
            <img src="../images/IBGE.png" alt="Logo do IBGE">
        </div>
        <form action="" name="loginUser" method= "POST">
            <div class="camposServ">
                    <label for="emailServidor"></label>
                    <input type="email"  class="inputLogin" name="emailServidor" id="emailServidor" placeholder="E-mail do servidor" required><br>
            </div>

            <div class="camposServ">
                    <label for="senha"></label>
                    <input type="password"  class="inputLogin" name="senha" id="senha" placeholder="Senha" required><br>
            </div>

            <button type="submit" name="loginUser"  class="button-content" value="Entrar">Entrar</button>

            <div>Ainda não tem uma conta? <a href="../Users/Cadastros/cadastroUser.php" class="link">Criar conta</a></div>

        </form>    
    </div>
    
    </body>
</html>