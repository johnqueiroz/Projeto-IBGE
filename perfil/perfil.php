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
    <title>Lista de equipamentos</title>

    <style>
    


    #profile-container {
            display: inline-block;
        }

        #profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            transition: filter 0.3s ease-in-out;
        }

        #edit-icon {
            position: absolute;
            top: 25%;
            left: 25%;
            transform: translate(-50%, -50%);
            opacity: 0;
            font-size: 24px;
            cursor: pointer;
            user-select: none;
            transition: opacity 0.3s ease-in-out;
        }

        #profile-container:hover #profile-image {
            filter: blur(5px);
        }

        #profile-container:hover #edit-icon {
            opacity: 1;
        }

        input[type="file"] {
            display: none;
        }
    </style>
</head>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
include_once '../Users/Cadastros/user.php';

$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();

$_SESSION['IdServidor'] = $dadosUsuario['IdServidor'];

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
            <a href="dashboard.php" class="sidebar-nav"><i class="icon fa-solid fa-house"></i><span>Dashboard</span></a>

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

        <div id="profile-container">
        <img id="profile-image" src="../images/profilePic.jpeg" alt="Foto de Perfil">
        <label for="file-input" id="edit-icon">✎</label>
        <input type="file" id="file-input" accept="image/*" onchange="showPreview(this)">
    </div>

    <script>
        function showPreview(input) {
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profile-image').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        function openFileInput() {
            document.getElementById('file-input').click();
        }
    </script>


    <script src="../js/index.js"></script>  
    <script src="../js/inatividade.js"></script>      
</body>


</html>        