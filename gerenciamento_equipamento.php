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
                            <a class="nav-link" href="index.html" style="color: aliceblue;">Sair</a>
                        </li>
              </ul>

          </div>

         

       
       

      </nav>
              <br>
                <div id="cadastro">
                        Gerenciamento Equipamentos

                </div>
       <br>
       <br>

       <nav>


<div class="nav nav-tabs" id="nav-tab" role="tablist">
  <a class="nav-item nav-link active" id="nav-gerenciamento_equipamento-tab" data-toggle="tab" href="#nav-gerenciamento_equipamento" role="tab"
    aria-controls="nav-gerenciamento_equipamento" aria-selected="true">Gerenciamento Equipamento </a>

</div>

</nav>



        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-gerenciamento_equipamento" role="tabpanel" aria-labelledby="nav-gerenciamento_equipamento-tab">
                            <div>
      
                              <form id="formCard_gerenciamento_equipamento" name="form_gerenciamento_equipamento" action="gerenciamento_equipamento_teste.php" method="POST">

<br>
                            

                            <div class="form-check">      

                            <input class="form-check-input" name="checkbox[]" onclick="desabilitar(this.checked)" type="checkbox" id="checkbox" value="selecionado" <?php
                                     if($_SESSION['checkbox'] == 'selecionado'){
                                       echo('checked');} //condicao que quando seleciona o checkbox uma vez ele permanece selecionado depois de enviar o formulario.
                                           ?>>  <label class="form-check-label" for="checkbox">
                                                  Selecione para item sem patrimônio
                                                </label>
                                            </div>

                                            
<br>
                            <div class="form-row">


                            <script type="text/javascript">
                                            function desabilitar(selecionado) {
                                              document.getElementById('inputserie').disabled = selecionado;
                                              document.getElementById('inputpatrimonio').disabled = selecionado;
                                              // funcao que desabilita o campo de numero de serie quando o checkbox é ativado
                                             
                                            }
                                          </script>





                            <div class="form-group col-md-6 ">
                                        <label for="inputserie">Número de série</label>
                                      <input name="serie" autocomplete="off" type="text" class="form-control" id="inputserie" placeholder="Ex.: 4A42685FH" <?php
                                
                                      if($_SESSION['checkbox'] == 'selecionado'){ // condicao que deixa o campo de numero de serie desabilitado caso o checkbox esteja selecionado, mesmo depois de enviar o formulario
                                        echo('disabled');}
                                      ?>>

                                     
                                        </div>
                            <div class="form-group col-md-6">             

                                        <label for="inputpatrimonio">Patrimônio</label>
                                      <input name="patrimonio" autocomplete="off" type="number" class="form-control" id="inputpatrimonio" placeholder="Ex.:598250" <?php
                                
                                if($_SESSION['checkbox'] == 'selecionado'){ // condicao que deixa o campo de numero de serie desabilitado caso o checkbox esteja selecionado, mesmo depois de enviar o formulario
                                  echo('disabled');}
                                ?>>
                                        </div>
                            </div>



                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputTipo">Tipo do equipamento</label>
                              <select name="tipo_equipamento_escolha" id="inputTipo" class="form-control">
                              <option value="">Escolher</option>

                                      <?php
                                      /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                                      a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                      $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                                      $result_tipo_equipamento = "SELECT * FROM tipo ORDER BY tipo_equipamento ASC";

                                      $result_tipo_equipamento = mysqli_query($conexao, $result_tipo_equipamento);

                                      while($row_tipo_equipamento = mysqli_fetch_assoc($result_tipo_equipamento) ) {
                                        ?>

                                        <option value="<?php echo $row_tipo_equipamento['ID_tipo']; ?>" ><?php echo $row_tipo_equipamento ['tipo_equipamento'];  ?>
                                        </option> <?php
                                        }

                                       
                                        

                                      ?>

                              </select>

                                      </div>


                                      <div class="form-group col-md-6">
                              <label for="inputStatus">Status do equipamento</label>
                              <select name="Status_equipamento" id="inputStatus" class="form-control">
                              <option value="">Escolher</option>

                                      <?php
                                      /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                                      a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                      $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                                      $result_status_equipamento = "SELECT * FROM status ORDER BY status ASC";

                                      $result_status_equipamento = mysqli_query($conexao, $result_status_equipamento);

                                      while($row_status_equipamento = mysqli_fetch_assoc($result_status_equipamento) ) {
                                        ?>

                                        <option value="<?php echo $row_status_equipamento['ID_status']; ?>"><?php echo $row_status_equipamento ['status'];  ?>
                                        </option> <?php
                                        }

                                       
                                        

                                      ?>

                              </select>

                                      </div>



                                      </div>

                                      <div class="form-group">
                                        
                                      <label for="inputLocalidade"> Escolher área</label>
                        <select name="escolherArea" id="inputLocalidade" class="form-control">
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