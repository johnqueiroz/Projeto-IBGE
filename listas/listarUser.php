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
    <link rel="stylesheet" href="../css/listar.css" type="text/css">

    <title>Lista de servidores</title>
    
</head>

<?php
// Faz uso da classe de usuário para coletar os dados de usuário para utilizar o nome na página
include_once '../Users/Cadastros/user.php';

$createUser = new user();
$dadosUsuario = $createUser->coletarDadosUser();

$dadosUsuarioLista =  $createUser->coletarUsers();
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
    
        <div class="wrapper">
            <div class="row">

                <table class="table-list">
                    <thead class="list-head">
                        <tr>
                            <th class="list-head-content table-sm-none">Nome</th>
                            <th class="list-head-content">Siape</th>
                            <th class="list-head-content table-sm-none">E-mail</th>                            
                            <th class="list-head-content">Telefone</th>
                            <th class="list-head-content">Função</th>
                            <th class="list-head-content table-md-none">Administrador</th>
                            <th class="list-head-content table-md-none">Área</th>
                            <th class="list-head-content table-md-none">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="list-body">
                        <?php foreach ($dadosUsuarioLista as $servidor): ?>
                            <tr>
                                <td class="list-body-content table-sm-none"><?php echo $servidor['nomeServidor']; ?></td>
                                <td class="list-body-content"><?php echo $servidor['siapeServidor']; ?></td>
                                <td class="list-body-content table-sm-none"><?php echo $servidor['emailServidor']; ?></td>
                                <td class="list-body-content"><?php echo $servidor['telefoneServidor']; ?></td>
                                <td class="list-body-content"><?php echo $servidor['nomeFuncao']; ?></td>
                                <td class="list-body-content"><?php if($servidor['administrador'] == 1){echo "Sim";}else{echo "Não";} ?></td>
                                <td class="list-body-content table-md-none"><?php echo $servidor['nomeArea']; ?></td>
                                <td class="list-body-content">                                
                                <a href="../edicao/editarUser.php?IdServidor=<?php echo $servidor['IdServidor']; ?>">
    <i class="icon fa-solid fa-pen-to-square fa-2xl"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>
    <script src="../js/inatividade.js"></script>       
</body>


</html>        