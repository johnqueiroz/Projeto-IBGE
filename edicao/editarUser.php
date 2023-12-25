<?php

session_start();

// Verificar se o usuário está logado ou não
if (!isset($_SESSION['userEmail'])) {
// Redirecionar para a página de login caso não esteja
    header("Location: ../login/entrada.php");
    exit();
}
// Se o ID do equipamento estiver definido na URL
if (!isset($_GET['IdServidor'])) {
    header("Location: ../listas/listarUser.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/estiloNavBar.css" type="text/css">
    <link rel="stylesheet" href="../css/estiloEditar.css" type="text/css">
    <title>Edição de servidor</title>
    
</head>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
include_once '../Users/Cadastros/user.php';
include_once '../funcoesSelect/selects.php';

$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();
$dadosUsuarioEditar = $createUser->coletarUserEditar($_GET['IdServidor']);

$_SESSION['IdServidor'] = $dadosUsuario['IdServidor'];


$consultaSelects = new selects();
$areas = $consultaSelects->listarDados('area', 'nomeArea');
$funcoes = $consultaSelects->listarDados('funcao', 'nomeFuncao');
$servidores = $consultaSelects->listarDados('user', 'nomeServidor');

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($formData['editarServ'])){

    $createUser->formData = $formData;
    $editarServ = $createUser->atualizarServ($_GET['IdServidor']);

    if($editarServ){
        header("Location: ../listas/listarUser.php");
        exit();
    }else{
        echo "<p style='color: #f00;'>Erro: Servidor não atualizado!</p>";
    }
}elseif(!empty($formData['deletarServ'])){
    $createUser->formData = $formData;
    $deletarServ = $createUser->deletarServ($_SESSION['IdServidor']);

    if($deletarServ){
        header("Location: ../listas/listarUser.php");
        exit();
    }else{
       echo "<script>alert('Erro: Servidor não deletado! O mesmo tem equipamentos relacionados ao seu nome.');</script>";
    }
}

?>

<body>
    <!-- Inicio Navbar -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="bars">
                <i class="fa-solid fa-bars fa-xl"></i>
            </div>
            <b><span class="logo">IBGE</span></b>
        </div>

        <div class="navbar-content">
            <div class="notification">
                
            </div>

            <div class="avatar">
                <img src="../images/profilePic.jpeg" alt="">
                <b><?php echo $dadosUsuario['nomeServidor'];?></b>
                <div class="dropdown-menu setting">
                    <div class="item">
                        <span class="fa-solid fa-user"></span> Perfil
                    </div>
                    <div class="item" onclick="encerrar()">
                        <span class="fa-solid fa-arrow-right-from-bracket"></span> Sair
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Fim Navbar -->

    <!-- Inicio Conteudo -->
    <div class="content">
        <!-- Inicio da Sidebar -->
        <div class="sidebar">

            <a href="../auxiliar/dashboard.php" class="sidebar-nav"><i class="icon fa-solid fa-house"></i><span>Dashboard</span></a>

            <div class="sidebar-dropdown">
                <a href="#" class="sidebar-nav">
                    <i class="icon fa-solid fa-rectangle-list"></i><span>Equipamentos</span>
                </a>
                <div class="dropdown-content-sidebar">
                    <a href="../listas/listarEqp.php"><i class="fa-solid fa-list"></i> Listagem Equipamentos</a>
                    <a href="../cadastros/cadastros.php"> <i class="icon fa-solid fa-plus"></i> Cadastrar Equipamento</a>
                </div>
            </div>

            <a href="../listas/listarUser.php" class="sidebar-nav active"><i class="icon fa-regular fa-id-badge"></i><span>Servidores</span></a>

            <a href="../auxiliar/logout.php" class="sidebar-nav"><i class="icon fa-solid fa-arrow-right-from-bracket"></i><span>Sair</span></a>

        </div>

        <div class="conteinerForm">

            <form action="" name="atualizarServ" method= "POST" class="formField">
                <div class="input-field">
                    <input type="text" name="novoNome" class="input" value="<?php echo $dadosUsuarioEditar['nomeServidor']; ?>">
                </div>

                <div class="input-field">
                    <input type="text"name="novoSiape" class="input" value="<?php echo $dadosUsuarioEditar['siapeServidor']; ?>">
                </div>

                <div class="input-field">
                    <input type="text" name="novoEmail" class="input" value="<?php echo $dadosUsuarioEditar['emailServidor']; ?>">
                </div>

                <div class="input-field">
                    <input type="text" name="novoTelefone" class="input" value="<?php echo $dadosUsuarioEditar['telefoneServidor']; ?>">
                </div>

                <div class="input-field">
                    <select class="input" name="novoFuncao">
                        <?php foreach ($funcoes as $item) { ?>
                            <?php
                            $selected = ($item['nomeFuncao'] == $dadosEquipamento['idFuncao']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $item['idFuncao']; ?>" <?php echo $selected; ?>>
                                <?php echo $item['nomeFuncao']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-field">
                    <select class="input" name="novoIdArea">
                        <?php foreach ($areas as $area) { ?>
                            <?php
                            $selected = ($area['Id'] == $dadosEquipamento['IdArea']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $area['Id']; ?>" <?php echo $selected; ?>>
                                <?php echo $area['nomeArea']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-field">
                <select name="novoAdministrador" class="input">
                    <option value="<?php  $dadosUsuarioEditar['administrador']; ?>" selected><?php if($dadosUsuarioEditar['administrador'] == 1){echo "Sim";}else{echo "Não";} ?></option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                </div>

                <div class="buttons">
                    <button type="submit" id="editar" name="editarServ" value="Editar"><b>Editar</b></button>

                    <button type="submit" id="deletar" name="deletarServ" value="Deletar"><b>Deletar</b></button>
                </div>

            </form>

        </div>
    </div>    


    <script src="../js/index.js"></script>  
    <script src="../js/inatividade.js"></script>      
</body>


</html>        
