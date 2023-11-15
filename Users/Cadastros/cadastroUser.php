<html>
    <head>
             <title>Cadastro de servidores</title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
             <link rel="stylesheet" href="../../css/estilo.css" type="text/css">
             <link rel="stylesheet" href="../../css/estiloCadServ.css" type="text/css">
             <link rel="shortcut icon" href="../../images/favicon.ico">
    </head>

<body>
<?php
    
include_once '../../funcoesSelect/selects.php';
include_once 'user.php';

    // Começo destruindo a sessão para garantir que não há nenhum dado ao criar o usuário
    session_start();

    // Destroi todas as variáveis de sessão
    $_SESSION = array();
            
    // Destroi a sessão
    session_destroy();

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($formData['infoUser'])){
        $createUser = new user();
        $createUser->formData = $formData;
        $cadastroUser = $createUser->inserirUser();
    
        if($cadastroUser){
            header("Location: ../../login/index.php");
            exit();
        }else{
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado!</p>";
        }
    }


    $consultaSelects = new selects();
    $areas = $consultaSelects->listarDados('area', 'nomeArea');
    $funcoes = $consultaSelects->listarDados('funcao', 'nomeFuncao');

    ?>

    <div class="container">
        <div class="logoIbge">
           <a href="../../login/index.php"> <img src="../../images/IBGE.png" alt="Logo do IBGE"></a>
        </div>

        <br>

        <form action="" name="criarUser" method= "POST">
            <div class="camposServ">
                <label for="nomeServidor"></label>
                <input type="text" class="inputCadServ" name="nomeServidor" id="nomeServidor" placeholder="Nome do servidor" required><br>
            </div>

            <div class="camposServ">
                <label for="siapeServidor"></label>
                <input type="number"  class="inputCadServ" name="siapeServidor" id="siapeServidor" placeholder="Ex: 344125" required><br>
            </div>

            <div class="camposServ">
                <label for="emailServidor"></label>
                <input type="email"  class="inputCadServ" name="emailServidor" id="emailServidor" placeholder="E-mail do servidor" required><br>
            </div>

            <div class="camposServ">
                <label for="funcaoServidor"></label>
                <select class="inputCadServ" name="funcaoServidor" id="funcaoServidor" required><br>

                <?php
                    foreach ($funcoes as $funcao) {
                        echo '<option value="' . $funcao['idFuncao'] . '">' . $funcao['nomeFuncao'] . '</option>';
                    }
                ?>

                </select>
            </div>

            <div class="camposServ">
                <label for="areaServidor"></label>
                <select class="inputCadServ" name="areaServidor" id="areaServidor" required><br>

                <?php
                    foreach ($areas as $area) {
                        echo '<option value="' . $area['Id'] . '">' . $area['nomeArea'] . '</option>';
                    }
                ?>

                </select>
            </div>

            <div class="camposServ">
                <label for="senha"></label>
                <input type="password"  class="inputCadServ" name="senha" id="senha" placeholder="Senha" required><br>
            </div>

            <button type="submit" name="infoUser"  class="button-content" value="Cadastrar">Cadastrar</button>
                
        </form>
    </div>

 
    
</body>
</html>