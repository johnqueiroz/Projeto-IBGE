<?php
// Essa página só deve aparecer caso o usuário esteja logado
// Dessa forma inicia a sessão para verficação
session_start();

// Verificar se o usuário está logado ou não
if (!isset($_SESSION['userEmail'])) {
// Redirecionar para a página de login caso não esteja
    header("Location: ../login/entrada.php");
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
    <title>Cadastro de equipamentos</title>
    
</head>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
include_once '../Users/Cadastros/user.php';
include_once '../funcoesSelect/selects.php';
include_once '../equipamentos/funcEquipamentos.php';
include_once '../equipamentos/tipoEquipamentos.php';

$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();

$createEquip = new funcEquipamentos();
$_SESSION['IdServidor'] = $dadosUsuario['IdServidor'];

$consultaSelects = new selects();
$areas = $consultaSelects->listarDados('area', 'nomeArea');
$tiposEqp = $consultaSelects->listarDados('tipoequipamento', 'tipo');
$status = $consultaSelects->listarDados('statusequipamento', 'status');
$servidores = $consultaSelects->listarDados('user', 'nomeServidor');

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if(!empty($formData['CadastrarEqp'])){

    $createEquip->formData = $formData;
    $cadastrarEqp = $createEquip->CadastrarEqp($_SESSION['IdServidor']);

    if($cadastrarEqp){
        header("Location: ../listas/listarEqp.php");
        exit();
    }else{
        echo "<p style='color: #f00;'>Erro: Equipamento não cadastrado!</p>";
    }
}

$createTipo = new tipoEquipamentos();
if(!empty($formData['CadastrarTipo'])){

    $createTipo->formData = $formData;
    $cadastrarTipo = $createTipo->cadastrarTipoEqp();

    if($cadastrarTipo){
        header("Location: cadastros.php");
        exit();
    }else{
        echo "<p style='color: #f00;'>Erro: Tipo de equipamento não cadastrado!</p>";
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
                    <a href="#" class="sidebar-nav active">
                        <i class="icon fa-solid fa-rectangle-list"></i><span>Equipamentos</span>
                    </a>
                    <div class="dropdown-content-sidebar">
                        <a href="../listas/listarEqp.php"><i class="fa-solid fa-list"></i> Listagem Equipamentos</a>
                        <a href="../cadastros/cadastros.php"> <i class="icon fa-solid fa-plus"></i> Cadastrar Equipamento</a>
                    </div>
            </div>

            <a href="../auxiliar/logout.php" class="sidebar-nav"><i class="icon fa-solid fa-arrow-right-from-bracket"></i><span>Sair</span></a>

        </div>



        <ul class="nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-target="#home-tab-pane" onclick="showTab('home-tab-pane')" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Cadastro de equipamentos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-target="#profile-tab-pane" onclick="showTab('profile-tab-pane')" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Cadastro de tipo de equipamento</button>
            </li>
<hr>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane active" id="home-tab-pane" role="tabpanel">
                    
                    <div class="conteinerForm">

                        <form action="" name="CriarEqp" method= "POST" class="formField">
                            <div class="input-field">
                                <input type="number" name="patrimonio" placeholder="Patrimônio" class="input" value="">
                            </div>

                            <div class="input-field">
                                <input type="text"name="numero_de_serie" placeholder="Número de série" class="input" value="">
                            </div>

                            <div class="input-field">
                                <select class="input" name="IdTipo">
                                    <?php foreach ($tiposEqp as $tipo) { ?>
                                        <?php
                                        $selected = ($tipo['idTipoEquipamento'] == $dadosEquipamento['tipo']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $tipo['idTipoEquipamento']; ?>" <?php echo $selected; ?>>
                                            <?php echo $tipo['tipo']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="input-field">
                                <select class="input" name="IdArea">
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
                                <select class="input" name="IdStatus">
                                    <?php foreach ($status as $item) { ?>
                                        <?php
                                        $selected = ($item['idStatusEquipamento'] == $dadosEquipamento['IdStatus']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $item['idStatusEquipamento']; ?>" <?php echo $selected; ?>>
                                            <?php echo $item['status']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="input-field">
                                <input type="hidden" name="dataMovimentacao" class="input" value="<?php

                                    $dataAtual = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
                                    $dataFormatada = $dataAtual->format('d/m/Y');

                                    echo $dataFormatada;
                                ?>">
                            </div>

                            <div class="buttons">
                                <button type="submit" id="cadastrar" name="CadastrarEqp" value="Cadastrar"><b>Cadastrar</b></button>
                            </div>

                        </form>
                    </div>
                </div>


                



                <div class="tab-pane" id="profile-tab-pane" role="tabpanel">
                    <div class="conteinerForm">

                        <form action="" name="CriarTipo" method= "POST" class="formField">
                            <div class="input-field">
                                <input type="text" name="tipo" class="input" placeholder="Nome do equipamento" value="">
                            </div>

                            <div class="buttons">
                                <button type="submit" id="cadastrar" name="CadastrarTipo" value="Cadastrar"><b>Cadastrar</b></button>
                            </div>

                        </form>
                    </div>



                </div>
            </div>
        </ul>

    </div>
    <script src="../js/index.js"></script>  
    <script src="../js/tab.js"></script> 
    <script src="../js/inatividade.js"></script>      
</body>


</html>        