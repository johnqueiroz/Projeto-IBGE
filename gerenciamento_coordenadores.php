<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
session_name("teste");
session_start();

?>

<html>
    <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

             <title>Sistemas de arquivo IBGE</title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

             <link rel="stylesheet" href="estilo.css" type="text/css">

             <link rel="icon" type="imagem/png" href="favicon-96x96.png" />


    </head>

<body>
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                    

            <a class="navbar-brand" href="buscas.html" style="color: aliceblue;" >Sistema de Controle de Equipamento</a>

            <div class= "collapse navbar-collapse" id="navbarSite">
              <ul class="navbar-nav ml-auto">
      

                  
                   

                  <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contato
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">(83)9 998341257</button>
                                <button class="dropdown-item" type="button">(83)9 996112880</button>
                                <button class="dropdown-item" type="button" href="#">Central de atendimento </button>
                              </div>
                              
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gerenciamento
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                <a href="gerenciamento_equipamento.php">    <input type="submit" value="Equipamentos" class="dropdown-item"></a>
                 
                              <a href="gerenciamento_localidade.php">  <input type="submit" value="Localidades" class="dropdown-item"></a>

                              <a href="gerenciamento_coordenadores.php">    <input type="submit" value="Servidores" class="dropdown-item"></a>
                              
                              
                              </div>
                              </div>
                            <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Cadastros
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <a href="cadastroEquipamentos.php">    <button class="dropdown-item" type="button">Equipamentos</button></a>
                            <a href="cadastroLocalidade.php">  <button class="dropdown-item" type="button">Localidades</button></a>
                            <a href="CadastroServidor.php">    <button class="dropdown-item" type="button" >Servidores</button></a>
                           
                            
                            </div>
                            </div>
                          <li class="nav-item">
                            <a class="nav-link" href="index.html" style="color: aliceblue;">Sair</a>
                        </li>
              </ul>

          </div>

         

       
       

      </nav>
              <br>

       <br>
       <br>

       <nav>


<div class="nav nav-tabs" id="nav-tab" role="tablist">
  <a class="nav-item nav-link active" id="nav-gerenciamento_servidores-tab" data-toggle="tab" href="#nav-gerenciamento_servidores" role="tab"
    aria-controls="nav-gerenciamento_servidores" aria-selected="true">Gerenciamento Servidores </a>

</div>

</nav>



        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-gerenciamento_servidores" role="tabpanel" aria-labelledby="nav-gerenciamento_servidores-tab">
                            <div>
      
                              <form id="formCard_gerenciamento_servidores" name="form_gerenciamento_servidores" action="gerenciamento_servidores.php" method="POST">

<br>                                           
                            <div class="form-row">
                            <div class="form-group col-md-6 ">
                                        <label for="nome_servidor">Nome</label>
                                        <input name="nome_servidor" autocomplete="off" type="text" class="form-control" id="nome_servidor" placeholder="Ex.: Maria José Silva Santos">
                            </div>

                            <div class="form-group col-md-6">             
                                        <label for="siape_servidor">Siape</label>
                                        <input name="siape_servidor" autocomplete="off" type="number" class="form-control" id="siape_servidor" placeholder="6843616">
                                        </div>
                            </div>

                          <div class="form-row">
                          <div class="form-group col-md-6">
                                  <label for="telefone_servidor">Telefone</label>
                                  <input name="telefone_servidor" id="telefone_servidor" type="text" class="form-control" placeholder="83 987984162">   
                           </div>


                          <div class="form-group col-md-6">
                              <label for="email_servidor">E-mail</label>
                              <input name="email_servidor" id="email_servidor" type="text" class="form-control" placeholder="ibge@ibge.gov.br">

                          </div>
                          </div>

                          <div class="form-row">
                          <div class="form-group col-md-6">                                        
                                <label for="funcao_servidor">Função</label>
                                <select name="funcao_servidor" id="funcao_servidor" class="form-control">

                                <option selected value="">Escolher</option>
                                  <?php  
                                    /* Código que trás o select das áreas, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                          a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                      $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
                                      $mostra_funcao_servidor = "SELECT * FROM funcoes ORDER BY nome_funcao ASC";
                                      $mostra_funcao_servidor = mysqli_query($conexao, $mostra_funcao_servidor);

                                      while($row_mostra_funcao_servidor = mysqli_fetch_assoc($mostra_funcao_servidor)){
                                        ?>
                                        <option value="<?php echo $row_mostra_funcao_servidor['ID_funcao']; ?>"><?php echo $row_mostra_funcao_servidor ['nome_funcao']; ?>
                                        </option> <?php                                                
                                      }
                                      ?> 
                                  </select>
                          </div>

                                      <div class="form-goup col-md-6">
                                      <label for="area_servidor">Área</label>
                                <select name="area_servidor" id="area_servidor" class="form-control">

                                <option selected value="">Escolher</option>
                                  <?php  
                                    /* Código que trás o select das áreas, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                          a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                      $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
                                      $mostra_area = "SELECT * FROM localidade_area ORDER BY nome ASC";
                                      $mostra_area = mysqli_query($conexao, $mostra_area);

                                      while($row_mostra_area = mysqli_fetch_assoc($mostra_area)){
                                        ?>
                                        <option value="<?php echo $row_mostra_area['ID_area']; ?>"><?php echo $row_mostra_area ['nome']; ?>
                                        </option> <?php                                                
                                      }
                                      ?> 
                                  </select>
                                      </div>
                          </div>
                                       
                                        <input type="submit"  value="Buscar" class="btn btn-primary">                                 
                         </form>

                        </div>
                        </div> 
                        </div>



        
    </div>
        

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </body>
</html>