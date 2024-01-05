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
    <title>IBGE - dashboard</title>
</head>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
include_once '../Users/Cadastros/user.php';
include_once '../equipamentos/funcEquipamentos.php';


$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();

$_SESSION['IdServidor'] = $dadosUsuario['IdServidor'];

$createEquip = new funcEquipamentos();
$dadosEquipamento = $createEquip->coletarQuantEquipamentos();


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
            <a href="dashboard.php" class="sidebar-nav active"><i class="icon fa-solid fa-house"></i><span>Dashboard</span></a>

            <div class="sidebar-dropdown">
                <a href="#" class="sidebar-nav">
                    <i class="icon fa-solid fa-rectangle-list"></i><span>Equipamentos</span>
                </a>
                <div class="dropdown-content-sidebar">
                    <a href="../listas/listarEqp.php"><i class="fa-solid fa-list"></i> Listagem Equipamentos</a>
                    <?php 
                    $statusAdministrador  = $createUser->verificarAdministrador($_SESSION['userEmail']);

                    if($statusAdministrador == 1){
                       echo '<a href="../cadastros/cadastros.php"> <i class="icon fa-solid fa-plus"></i> Cadastrar Equipamento</a>';
                    }    
                    ?>
                </div>
            </div>

            <a href="../listas/listarUser.php" class="sidebar-nav"><i class="icon fa-regular fa-id-badge"></i><span>Servidores</span></a>

            <a href="logout.php" class="sidebar-nav"><i class="icon fa-solid fa-arrow-right-from-bracket"></i><span>Sair</span></a>

        </div>
        <!-- Fim da Sidebar -->
        <!-- Inicio do conteudo do administrativo -->
        <div class="wrapper">
            <div class="row">

                <div class="box box-second">
                    <span class="fa-solid fa-truck-ramp-box"></span>
                    <span><b><?php echo $dadosEquipamento['totalEquipamentos']; ?></b></span>
                    <span><b>Equipamentos</b></span>
                </div>

                <div class="box box-third" onclick="abrirModal()">
                    <span class="fa-solid fa-triangle-exclamation fa-2xl"></span>
                    <span id="quantidadeLembretes"><b>0</b></span>
                    <span><b>Lembrete</b></span>
                </div>

                <div class="box box-fourth">
                    <span class="fa-solid fa-triangle-exclamation"></span>
                    <span><b><?php echo $dadosEquipamento['quantidadeStatus2'] + $dadosEquipamento['quantidadeStatus3'];?></b></span>
                    <span><b>Equipamentos em alerta</b></span>
                </div>
            </div>

        </div>
        <!-- Fim do conteudo do administrativo -->
    </div>
    <!-- Fim Conteudo -->



    <dialog class="modal-lembrete">
        <div class="lembretes-dentro-modal">

            <h2 class="titleModal">Lembretes</h2>

            <input type="text" name="lembrete" id="lembrete" placeholder="Digite algum lembrete" size="70">

            <button onclick="adicionar()" name="infoLembrete" class="adicionar">Adicione um lembrete</button>

            <ul id="lista-lembrete">
                
            </ul>
        </div>
    </dialog>

    <script src="../js/inatividade.js"></script>
    <script src="../js/modal.js"></script>
    <script src="../js/index.js"></script>

</body>


</html>