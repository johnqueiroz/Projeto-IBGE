<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
session_name("teste");
session_start();



?>
<html>
    <head>
       <!-- Cabeçalho da página -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

             <title>Sistemas de arquivo IBGE</title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

             <link rel="stylesheet" href="estilo.css" type="text/css">


             <link rel="icon" type="imagem/png" href="favicon-96x96.png" />



             
             <script type="text/javascript">



   // Validações feitas em javascript para os forumários de cadastramento dos servidores.

              function validar(){
                var inputNomeServidor = form_servidor.inputNomeServidor.value;
                var inputEmail = form_servidor.inputEmail.value;
                var inputFuncao = form_servidor.inputFuncao.value;
                var inputTelfone = form_servidor.inputTelfone.value;
                var inputLocalidade = form_servidor.inputLocalidade.value;
                
                  if(inputNomeServidor ==""){
                    alert('Preencha o campo Nome.');
                    form_servidor.inputNomeServidor.focus();
                    return false;
                    
                  }
                  if(inputEmail ==""){
                    alert('Preencha o campo Email.');
                    form_servidor.inputEmail.focus();
                    return false;
                  }
                  if(inputFuncao == "Escolher"){
                    form_servidor.inputFuncao.focus();
                    alert('Escolha uma função');
                    return false;
                  }
                  if(inputTelfone ==""){
                    alert('Preencha o campo Telefone.');
                    form_servidor.inputTelfone.focus();
                    return false;

               }
                 if(inputLocalidade == "Escolher"){
                      alert('Escolha uma área');
                      form_servidor.inputLocalidade.focus();
                      return false;
                    }

              }   


          </script>






    </head>

<body>
  
        <div class="container">
               
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                  <!-- Div com container para usar um certo tamanho da tela e dentro tem a navbar que é a parte azul da tela com os menus de cadastramento, busca e gereciamento e sair -->

            <a class="navbar-brand" href="buscas.html" style="color: aliceblue;" >Sistema de Controle de Equipamento</a>

            <div class= "collapse navbar-collapse" id="navbarSite">
              <ul class="navbar-nav ml-auto">
      

                  
                   
                <li class="nav-item">
                  <a class="nav-link" href="buscas.html" style="color: aliceblue;">Busca</a>
              </li>
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
  
                                <a href="gerenciamento_coordenadores.php">    <input type="submit" value="Coordenadores" class="dropdown-item"></a>
                              
                              
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
                            <a class="nav-link" href="index.php" style="color: aliceblue;">Sair</a>
                        </li>
              </ul>

          </div>

         

       
       

      </nav>
        <br>

                <div id="cadastro">
                        Cadastro Servidor
                </div>
<br>
                <nav>


                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-servidor-tab" data-toggle="tab" href="#nav-servidor" role="tab"
                      aria-controls="nav-servidor" aria-selected="true">Servidor </a>
            
                  </div>
              
                </nav>
         
               
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-servidor" role="tabpanel" aria-labelledby="nav-servidor-tab">
                    <div>
<!-- Formulário de cadastro de servidor -->
                      <form id="formCard" name="form_servidor" action="Cadastro_servidor.php" method="POST">

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="inputNomeServidor">Nome</label>
                          <input name="Nome_servidor" autocomplete="off" type="text" class="form-control" id="inputNomeServidor" placeholder="Ex.: Seu Nome Aqui">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="inputSiape">Siape/Matricula (opcional)</label>
                          <input name="Siape" autocomplete="off" type="number" class="form-control" id="inputSiape" placeholder="Ex.: 12345678">
                        </div>

                      </div>

                      <div class="form-row">

                      <div class="form-group col-md-6">
                        <label for="inputEmail">E-mail</label>
                        <input name="Email" autocomplete="off" type="email" class="form-control" id="inputEmail" placeholder="Ex.: seu.email@ibge.gov.br">
                      </div>

                      
                        <div class="form-group col-md-6">
                         <label for="inputTelfone">Telefone</label>
                         <input name="telefone" autocomplete="off" type="text" class="form-control" id="inputTelfone" placeholder="Ex.: 8399999-9999">
                        </div>
                      </div>
               <div class="form-row">
                        <div class="form-group col-md-6">
                         <label for="inputFuncao">Escolher função</label>
                         <select name="escolherfuncao" id="inputFuncao" class="form-control">
                           <option selected>Escolher</option>
                           <?php  
                             /* Código que trás o select de funções, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                             $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                            $mostra_funcoes = "SELECT * FROM funcoes ORDER BY nome_funcao ASC";

                            $mostra_funcoes = mysqli_query($conexao, $mostra_funcoes);

                            while($row_mostra_funcoes = mysqli_fetch_assoc($mostra_funcoes)){
                              ?>

                              <option value="<?php echo $row_mostra_funcoes['ID_funcao']; ?>"><?php echo $row_mostra_funcoes ['nome_funcao']; ?>
                              </option> <?php

                            }
                            ?>
                            
                         </select>
                        </div>


                        <div class="form-group col-md-6">
                        <label for="inputLocalidade"> Escolher área</label>
                        <select name="escolherArea" id="inputLocalidade" class="form-control">
                        <option selected>Escolher</option>
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
                                          $_SESSION ['ID_area'] = $_GET["ID_area"];
                            }
                            ?>
                        
                        
                        
                        </select>
                        
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                         <label for="inputSubarea">Escolher Subárea</label>
                         <select name="escolherSubarea" id="inputSubarea" class="form-control">
                           <option>Escolher</option>
                           <?php  
  /* Código que trás o select das subáres, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                             $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                            $mostra_subarea = "SELECT * FROM localidade_subarea ORDER BY nome ASC";

                            $mostra_subarea = mysqli_query($conexao, $mostra_subarea);

                            while($row_mostra_subarea = mysqli_fetch_assoc($mostra_subarea)){
                              ?>

                              <option value="<?php if($row_mostra_subarea['ID_area'] == $_SESSION['ID_area']){ echo $row_mostra_subarea ['ID_subarea'];} ?>">   

                               <?php echo $row_mostra_subarea ['nome']; }?>

                              </option> 
                            
                         </select>
                        </div>


                        <div class="form-group col-md-6">
                        <label for="inputPosto"> Escolher Posto</label>
                        <select name="escolherPosto" id="inputPosto" class="form-control">
                        <option selected>Escolher</option>
                        <?php  
                          /* Código que trás o select dos postos de coleta, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                             $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                            $mostra_posto = "SELECT * FROM localidade_posto_de_coleta ORDER BY nome ASC";

                            $mostra_posto = mysqli_query($conexao, $mostra_posto);

                            while($row_mostra_posto = mysqli_fetch_assoc($mostra_posto)){
                              ?>

                              <option value="<?php echo $row_mostra_posto['ID_posto']; ?>"><?php echo $row_mostra_posto ['nome']; ?>
                              </option> <?php

                            }


                            
                            ?>
                        
                        
                        
                        </select>
                        
                        </div>
                        </div>

                        <input type="submit" onclick="return validar()" value="Cadastrar" class="btn btn-primary">

                 
                           
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