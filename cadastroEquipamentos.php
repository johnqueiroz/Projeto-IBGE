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

             // Validações feitas em javascript para os forumários de cadastramento de equipamentos, equipamentos sem patrimonio, previsão de chegada e tipo de equipamento, respectivamente.

              function validar(){
                var inputData_recebimento = form_equipamentos.inputData_recebimento.value;
                var inputTipo = form_equipamentos.inputTipo.value;
                var inputpatrimonio = form_equipamentos.inputpatrimonio.value;
                var checkbox = form_equipamentos.checkbox.value;
                var inputserie = form_equipamentos.inputserie.value;
                var botaoteste = form_equipamentos.botaoteste.value;

                  if(inputData_recebimento ==""){
                    alert('Preencha o campo Data de recebimento.');
                    form_equipamentos.inputData_recebimento.focus();
                    return false;
                  }
                  if(inputTipo =="Escolher"){
                    alert('Escolha o campo tipo.');
                    form_equipamentos.inputTipo.focus();
                    return false;
                  }
                  if(inputpatrimonio == ""){
                    form_equipamentos.inputpatrimonio.focus();
                    alert('Preencha o campo Patrimônio');
                    return false;
                  } 
                  if(inputserie == "" ){
                    form_equipamentos.inputserie.focus();
                    return false;
                  }
                  if(checkbox == 0){
                    form_equipamentos.botaoteste.focus();
                    return false;
                  }
              }


              function validar2(){
                var inputData_recebimento = form_equipamentos_sem_patrimonio.inputData_recebimento.value;
                var inputTipo = form_equipamentos_sem_patrimonio.inputTipo.value;
                var inputQuantidade_sem_patrimonio = form_equipamentos_sem_patrimonio.inputQuantidade_sem_patrimonio.value;
              


                  if(inputData_recebimento ==""){
                    alert('Preencha o campo Data de recebimento.');
                    form_equipamentos_sem_patrimonio.inputData_recebimento.focus();
                    return false;
                  }
                  if(inputTipo =="Escolher"){
                    alert('Escolha o campo tipo.');
                    form_equipamentos_sem_patrimonio.inputTipo.focus();
                    return false;
                  }
                  if(inputQuantidade_sem_patrimonio == ""){
                    form_equipamentos_sem_patrimonio.inputQuantidade_sem_patrimonio.focus();
                    alert('Preencha o campo Quantidade');
                    return false;
                  }
                 
              }





              
              function validar3(){
                var inputTipo_equipamento = form_previsao_chegada.inputTipo_equipamento.value;
                var inputPrevisao_chegada = form_previsao_chegada.inputPrevisao_chegada.value;
                var inputQuantidade_equipamentos = form_previsao_chegada.inputQuantidade_equipamentos.value;
             

                  if(inputTipo_equipamento =="Escolher"){
                    alert('Preencha o campo Tipo de equipamento.');
                    form_previsao_chegada.inputTipo_equipamento.focus();
                    return false;
                  }
                  if(inputPrevisao_chegada ==""){
                    alert('Escolha o campo Previsão de chegada.');
                    form_previsao_chegada.inputPrevisao_chegada.focus();
                    return false;
                  }
                  if(inputQuantidade_equipamentos == ""){
                    form_previsao_chegada.inputQuantidade_equipamentos.focus();
                    alert('Preencha o campo Quantidade');
                    return false;
                  }
                
              }






              function validar4(){
                var inputTipo_de_equipamento = form_tipo_equipamentos.inputTipo_de_equipamento.value;
              
                  if(inputTipo_de_equipamento == ""){
                    form_tipo_equipamentos.inputTipo_de_equipamento.focus();
                    alert('Preencha o campo Tipo de equipamento');
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
                        Cadastro Equipamentos
                </div>
<br>
                <nav>

<!-- Nav que contém a variavel de sessao para setar os formulários de equipamento, equipamento sem patriônio, previsão de chegada e tipo de equipamento, respectivamente.
     Quando clica eles entram no formulário escolhido -->

                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                

                  <a class="<?php if($_SESSION['formulario'] == 1){
                    echo($_SESSION['formulario']);
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-equipamento-tab" data-toggle="tab" href="#nav-equipamento" role="tab"
                      aria-controls="nav-equipamento" aria-selected="true" >Equipamentos</a>
              
                      <a class="<?php if($_SESSION['formulario'] == 2){
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-equipamento_semPatrimonio-tab" data-toggle="tab" href= "#nav-equipamento_semPatrimonio" role="tab"
                      aria-controls="nav-equipamento_semPatrimonio" aria-selected="false">Equipamentos sem patrimônio</a>

                    <a class="<?php if($_SESSION['formulario'] == 3){
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?> "id="nav-previsao_chegada-tab" data-toggle="tab" href="#nav-previsao_chegada" role="tab"
                      aria-controls="nav-previsao_chegada" aria-selected="false">Previsão de chegada</a>
              
                      <a class="<?php if($_SESSION['formulario'] == 4){
                    echo('nav-item nav-link active');
                  } else{
                    echo('nav-item nav-link');
                  } ?>" id="nav-tipoEquipamento-tab" data-toggle="tab" href="#nav-tipoEquipamento" role="tab"
                      aria-controls="nav-tipoEquipamento" aria-selected="false">Tipo equipamento</a>




                  </div>
              
                </nav>
         
               
                <div class="tab-content" id="nav-tabContent">


                <!-- Formulário de cadastro de equipamentos que será exibido na primeira entrada na página -->
                
                                <div class="<?php if($_SESSION['formulario'] == 1){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-equipamento" role="tabpanel" aria-labelledby="nav-equipamento-tab">

                                      <div>

                                        <form id="formCard" name="form_equipamentos" action="Cadastro_Equipamento.php" method="POST">



                                        <div class="form-row">
                                        <div class="form-group col-md-6">

                                          <label for="inputData_recebimento">Data de recebimento</label>
                                          <input name="data_recebimento" type="date" value="<?php echo($_SESSION['data_recebimento'])?>" class="form-control" id="inputData_recebimento">
                                        </div>

                                        <div class="form-group col-md-6">
                                          <label for="inputTipo">Tipo do equipamento</label>
                                          <select name="tipo_equipamento_escolha" id="inputTipo" class="form-control">
                                            <option>Escolher</option>

                                            <?php
               /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                            $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                                            $result_tipo_equipamento = "SELECT * FROM tipo ORDER BY tipo_equipamento ASC";

                                            $result_tipo_equipamento = mysqli_query($conexao, $result_tipo_equipamento);

                                            while($row_tipo_equipamento = mysqli_fetch_assoc($result_tipo_equipamento) ) {
                                              ?>

                                              <option value="<?php echo $row_tipo_equipamento['ID_tipo']; ?>" <?php if($row_tipo_equipamento['ID_tipo'] == $_SESSION['ID_tipo']){
                                                  echo('selected'); // código que deixa selecionado o tipo que foi escolhido até que seja alterado manualmente, novamente.
                                              } ?>><?php echo $row_tipo_equipamento ['tipo_equipamento'];  ?>
                                              </option> <?php
                                              }
                                            ?>
                                            
                                          </select>
                                        </div>
                                        </div>
                                      <br>


                                      <script type="text/javascript">
                                            function desabilitar(selecionado) {
                                              document.getElementById('inputserie').disabled = selecionado;
                                              // funcao que desabilita o campo de numero de serie quando o checkbox é ativado
                                             
                                            }
                                          </script>



                                                          <div class="form-check">
                                                                  <input class="form-check-input" name="checkbox[]" onclick="desabilitar(this.checked)" type="checkbox" id="checkbox" value="selecionado" <?php
                                                                  if($_SESSION['checkbox'] == 'selecionado'){
                                                                  echo('checked');} //condicao que quando seleciona o checkbox uma vez ele permanece selecionado depois de enviar o formulario.
                                                                  ?>>
                                                                   <label class="form-check-label" for="checkbox">
                                                            Selecione para item sem número de série
                                                          </label>
                                            </div>
<br>
                                      <div class="form-row">
                                        
                                        <div class="form-group col-md-6 ">
                                        <label for="inputpatrimonio">Patrimônio</label>
                                      <input name="patrimonio" autocomplete="off" type="number" class="form-control" id="inputpatrimonio" placeholder="Ex.:598250">
                                        </div>
                                  
                                        <div class="form-group col-md-6 ">
                                        <label for="inputserie">Número de série</label>
                                      <input name="serie" autocomplete="off" type="text" class="form-control" id="inputserie" placeholder="Ex.: 4A42685FH" <?php
                                
                                      if($_SESSION['checkbox'] == 'selecionado'){ // condicao que deixa o campo de numero de serie desabilitado caso o checkbox esteja selecionado, mesmo depois de enviar o formulario
                                        echo('disabled');}
                                      ?>>

                                     
                                        </div>
                                       
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6 ">
                                      
                                      <input name="area" autocomplete="off" type="hidden" class="form-control" id="area">
                                        </div>
                                        <div class="form-group col-md-6 ">
                                      
                                      <input name="status" autocomplete="off" type="hidden" class="form-control" id="status">
                                        </div>
                                        </div>

                                        <input type="submit" id="botaoteste" onclick="return validar()" class="btn btn-primary">


                                       
                                      



                                        </form>

                                      </div>

                                        

                                      </div>

               





<!-- formulário de equipamento sem patrimonio que é ativado quando clicado. -->

                    <div class="<?php if($_SESSION['formulario'] == 2){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-equipamento_semPatrimonio" role="tabpanel" aria-labelledby="nav-equipamento_semPatrimonio-tab">

                    <div>

                      <form id="formCard2" name="form_equipamentos_sem_patrimonio" action="Cadastro_SemPatrimônio.php" method="POST">

                    

                      <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="inputData_recebimento">Data de recebimento</label>
                        <input name="data_recebimento" type="date" class="form-control" id="inputData_recebimento">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputTipo">Tipo do equipamento</label>
                        <select name="tipo_equipamento_escolha" id="inputTipo" class="form-control">
                          <option selected>Escolher</option>

                          <?php
                           /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                            
                          $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                          $result_tipo_equipamento = "SELECT * FROM tipo ORDER BY tipo_equipamento ASC";

                          $result_tipo_equipamento = mysqli_query($conexao, $result_tipo_equipamento);

                          while($row_tipo_equipamento = mysqli_fetch_assoc($result_tipo_equipamento) ) {
                            ?>

                            <option value="<?php echo $row_tipo_equipamento['ID_tipo']; ?>"><?php echo $row_tipo_equipamento ['tipo_equipamento']; ?>
                            </option> <?php
                            }
                          ?>
                          
                        </select>
                      </div>
                      </div>


                     
                      <div class="form-group ">
                      <label for="inputQuantidade_sem_patrimonio">Quantidade</label>
                     <input name="quantidade" type="number" autocomplete="off" class="form-control" id="inputQuantidade_sem_patrimonio" placeholder="Ex.: 10">
                      </div>

                      <input type="submit" onclick="return validar2()" class="btn btn-primary">

                          

                      </form>

                    </div>

                      

                    </div>












<!-- formulário de previsao de chegada que é ativado quando clicado -->
                    <div class="<?php if($_SESSION['formulario'] == 3){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-previsao_chegada" role="tabpanel" aria-labelledby="nav-previsao_chegada-tab">
                    <div>

                      <form id="formCard3" name="form_previsao_chegada" action="Cadastro_previsao_chegada.php" method="POST">

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          
                          <label for="inputTipo_equipamento">Tipo do equipamento</label>
                        <select name="tipo_equipamento_escolha2" id="inputTipo_equipamento" class="form-control">
                           <option selected>Escolher</option>

                           <?php
                             /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */

                           $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");

                           $result_tipo_equipamento = "SELECT * FROM tipo ORDER BY tipo_equipamento ASC";

                           $result_tipo_equipamento = mysqli_query($conexao, $result_tipo_equipamento);

                           while($row_tipo_equipamento = mysqli_fetch_assoc($result_tipo_equipamento) ) {
                             ?>

                             <option value="<?php echo $row_tipo_equipamento['ID_tipo']; ?>"><?php echo $row_tipo_equipamento ['tipo_equipamento']; ?>
                             </option> <?php
                            }
                          ?>
                          
                        </select>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="inputPrevisao_chegada2">Previsão de chegada</label>
                        <input name="previsao_chegada2" autocomplete="off" type="date" class="form-control" id="inputPrevisao_chegada" placeholder="Ex: 27/12/2021">
                      </div>
                      </div>

                        <div class="form-group">
                          <label for="inputQuantidade_equipamentos">Quantidade de equipamentos</label>
                          <input name="Quantidade_equipamento2" autocomplete="off" type="number" class="form-control" id="inputQuantidade_equipamentos" placeholder="Ex.: 10">
                        </div>

                     

                     
                    
                      <input type="submit" onclick="return validar3()" class="btn btn-primary">

                    </form>
                  </div>
                 </div>












<!-- formulário de tipo de equipamento que é ativado quando clicado -->
                 
                    <div class="<?php if($_SESSION['formulario'] == 4){
                    echo(' tab-pane fade show active');
                  } else{
                    echo(' tab-pane fade');
                  } ?>" id="nav-tipoEquipamento" role="tabpanel" aria-labelledby="nav-tipoEquipamento-tab">

                      <div>

                        <form id="formCard4" name="form_tipo_equipamentos" action="Cadastro_tipo_Equipamento.php" method="POST">

                       

                          <div class="form-group">
                            <label for="inputTipo_de_equipamento">Tipo de equipamento</label>
                            <input name="tipo" type="text" class="form-control" id="inputTipo_de_equipamento" placeholder="Ex.: DMC Quantum">
                          </div>
                        
                         

              
                        <input type="submit" onclick="return validar4()"  class="btn btn-primary">

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