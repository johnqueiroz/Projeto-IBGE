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

   // Validações feitas em javascript para os forumários de cadastramento das áreas.

              function validar(){
                var inputArea = form_area.inputArea.value;
             


                  if(inputArea ==""){
                    alert('Preencha o campo Área.');
                    form_area.inputArea.focus();
                    return false;
                  }
              }
              function validar2(){
                var inputSubarea = form_subarea.inputSubarea.value;
                var inputAreaDaSubarea = form_subarea.inputAreaDaSubarea;


                  if(inputSubarea ==""){
                    alert('Preencha o campo Subárea.');
                    form_subarea.inputSubarea.focus();
                    return false;
                  }

                  if(inputAreaDaSubarea == "Escolher"){
                  alert('Selecione o campo da Área');
                  form_subarea.inputAreaDaSubarea.focus();
                  return false;
                  }
              }

              function validar3(){
                var inputPosto = form_posto.inputPosto.value;
                var inputSubareaDaArea = form_posto.inputSubareaDaArea;


                  if(inputPosto ==""){
                    alert('Preencha o campo Posto de Coleta.');
                    form_posto.inputPosto.focus();
                    return false;
                  }

                  if(inputSubareaDaArea == "Escolher"){
                  alert('Selecione o campo da Subárea');
                  form_posto.inputSubareaDaArea.focus();
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
                        Cadastro Localidades
                </div>
<br>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
<!-- Nav que contém a variavel de sessao para setar os formulários de localidade da área, subárea e posto de coleta, respectivamente.
     Quando clica eles entram no formulário escolhido -->

                    <a class="<?php if($_SESSION['formulario_localidade'] == 1){
                    echo($_SESSION['formulario_localidade']);
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-area-tab" data-toggle="tab" href="#nav-area" role="tab"
                      aria-controls="nav-area" aria-selected="true">Área </a>
              
                    <a class="<?php if($_SESSION['formulario_localidade'] == 2){
                    echo($_SESSION['formulario_localidade']);
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-subarea-tab" data-toggle="tab" href="#nav-subarea" role="tab"
                      aria-controls="nav-subarea" aria-selected="false">Subárea</a>

                      <a class="<?php if($_SESSION['formulario_localidade'] == 3){
                    echo($_SESSION['formulario_localidade']);
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-posto-tab" data-toggle="tab" href="#nav-posto" role="tab"
                      aria-controls="nav-posto" aria-selected="false">Posto de coleta</a>
              
                  </div>
              
                </nav>
         
              

                <div class="tab-content" id="nav-tabContent">

 <!-- Formulário de cadastro de área que será exibido na primeira entrada na página -->

                  <div class="<?php if($_SESSION['formulario_localidade'] == 1){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-area" role="tabpanel" aria-labelledby="nav-area-tab">

                    <div>
                      <form id="formCard" name="form_area" action="Cadastro_localidade.php" method="POST">

                        <div class="form-group">
                          <label for="inputArea">Nome da área</label>
                          <input name="Nome_area" autocomplete="off" type="text" class="form-control" id="inputArea" placeholder="Ex.: João Pessoa">
                        </div>
                    
                      <input type="submit" onclick="return validar()" class="btn btn-primary">
                    </form>
                  </div>
                 </div>

                

<!-- formulário de cadastro de subárea que é ativado quando clicado. -->

                 <div class="<?php if($_SESSION['formulario_localidade'] == 2){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-subarea" role="tabpanel" aria-labelledby="nav-subarea-tab">

                  <div>

                    <form id="formCard" name="form_subarea" action="Cadastro_subarea.php" method="POST">

                


                      <div class="form-row">

                      <div class="form-group col-md-6">
                    
                        <label for="inputSubarea">Subárea</label>
                        <input name="Nome_subarea" autocomplete="off" type="text" class="form-control" id="inputSubarea" placeholder="Ex.: Catolé do Rocha">
                      </div>

                      <div class="form-group col-md-6">


                        <label for="inputAreaDaSubarea">Área em que está inserida</label>
                       
                        <select name="id_area_da_subarea" id="id_area_da_subarea" class="form-control">
                        <option selected>Escolher</option>
                          <?php  
                          
                            /* Código que trás o select das áreas já existentes, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
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

                    <input type="submit" onclick="return validar2()" class="btn btn-primary">
                    </form>

                  </div>
                  </div>


                  <!-- formulário de cadastro de posto de coleta que é ativado quando clicado. -->

                  <div class="<?php if($_SESSION['formulario_localidade'] == 3){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-posto" role="tabpanel" aria-labelledby="nav-posto-tab">

                <div>

                  <form id="formCard" name="form_posto" action="Cadastro_posto.php" method="POST">




                    <div class="form-row">

                    <div class="form-group col-md-6">
                  
                      <label for="inputPosto">Posto de Coleta</label>
                      <input name="Nome_posto" autocomplete="off" type="text" class="form-control" id="inputPosto" placeholder="Ex.: Catolé do Rocha">
                    </div>

                    <div class="form-group col-md-6">


                      <label for="inputSubareaDaArea">Subárea em que está inserido</label>
                    
                      <select name="id_subarea_do_posto" id="id_subarea_do_posto" class="form-control">
                        <option selected>Escolher</option>
                        <?php  

  /* Código que trás o select de subáreas já existentes, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */

                          $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                        $mostra_subarea = "SELECT * FROM localidade_subarea ORDER BY nome ASC";

                        $mostra_subarea = mysqli_query($conexao, $mostra_subarea);

                        while($row_mostra_subarea = mysqli_fetch_assoc($mostra_subarea)){
                          ?>

                          <option value="<?php echo $row_mostra_subarea['ID_subarea']; ?>"><?php echo $row_mostra_subarea ['nome']; ?>
                          </option> <?php

                        }
                        ?>
                        
                      </select>
                      
                        
                      



                    </div>

                  </div>
                  <input type="submit" onclick="return validar3()" class="btn btn-primary">

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