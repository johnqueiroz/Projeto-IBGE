<html>
    <head>
            <title>Sistemas de arquivo IBGE - Login</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link rel="stylesheet" href="../css/estiloLoginServ.css" type="text/css">
    
    </head>

<body>

    <?php

        require_once '../Users/Cadastros/user.php';
        
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($formData['loginUser'])){
            $createUser = new user();
            $createUser->formData = $formData;
            $loginUser = $createUser->verificarConta();

            if($loginUser){
                session_start();
                $_SESSION['userEmail'] = $formData["emailServidor"];

                //TODO Enviar para uma página inicial
            }else{
                echo "<p style='color: #f00;'>Erro: Usuário não cadastrado!</p>";
                //TODO Criar um alert dizendo que senha ou email estão errados
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

        </form>    
    </div>
    
    </body>
</html>