<?php
// Da continuidade a sessao que foi iniciada no index e possibilita a utilização das variaveis superglobais que foram iniciadas lá.
session_name("teste");
session_start();

?>


<html>
    <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/e42d0736e1.js" crossorigin="anonymous"></script>
            <script>
            function testeajax(patrimonio, serie, tipo, status, area, ID) { 
          
                document.getElementById("patrimonio").value = patrimonio;
                document.getElementById("serie").value = serie;
                document.getElementById("tipo").value = tipo;
                document.getElementById("status").value = status;
                document.getElementById("localidade").value = area;
                document.getElementById("id").value = ID;
              }
            
</script>
             <title>Sistemas de arquivo IBGE</title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
		         <meta name="viewport" content="width=device-width, initial-scale=1">
	
		         <link href="css/bootstrap.min.css" rel="stylesheet">
             <link rel="stylesheet" href="estilo.css" type="text/css">
             <link href="css/bootstrap.min.css" rel="stylesheet">
             <link rel="icon" type="imagem/png" href="favicon-96x96.png" />
             <style type="text/css">
                #bt_voltar{
               margin-left: 90%;
                    };

               #fixo{
                display:block;
                position:fixed;
               }
               .h4teste{
margin-left: 30%;
               }
              
               
</style>

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
                            <a class="nav-link" href="index.php" style="color: aliceblue;">Sair</a>
                        </li>
              </ul>

          </div>

         

       
       

      </nav>
              <br>

       <br>
       <br>
        <div>
                  
      <?php


        if(isset($_POST["serie"])){
          $serie =  $_POST["serie"];
        }else{
          $serie = "";
        }

        if(isset($_POST["patrimonio"])){
          $patrimonio =  $_POST["patrimonio"];          
        }else{
          $patrimonio = "";
        }

        if(isset($_POST["tipo_equipamento_escolha"])){
          $tipo_equipamento_escolha =  $_POST["tipo_equipamento_escolha"];
        }else{
          $tipo_equipamento_escolha = "";
        }

        if(isset($_POST["Status_equipamento"])){
          $Status_equipamento =  $_POST["Status_equipamento"];
         
        }else{
          $Status_equipamento = "";
        }

        if(isset($_POST["escolherArea"])){
          $escolherArea =  $_POST["escolherArea"];
          
        }else{
          $escolherArea = "";
        }

        $array = array(
          $serie,
          $patrimonio,
          $tipo_equipamento_escolha,
          $Status_equipamento,
          $escolherArea
        );

        $i = 0;
        $aux = 0;
        $select = "SELECT * FROM equipamento  INNER JOIN tipo on equipamento.ID_tipo = tipo.ID_tipo INNER JOIN status on equipamento.ID_status = status.ID_status INNER JOIN localidade_area ON equipamento.ID_area = localidade_area.ID_area WHERE";
     
        foreach ($array as $value){
          if($value != ""){
            if($i == 0){
              $select = $select." equipamento.numero_de_serie = '$value'";
              $aux = 1;
              
            }
            if($i == 1){
              if($aux == 1){
                $select = $select." AND equipamento.patrimonio = '$value'";
              }else{
                $select = $select." equipamento.patrimonio = '$value'";
              }
              $aux = 1;
            }

            if($i == 2){
              if($aux == 1){
                $select = $select." AND equipamento.ID_tipo = '$value'";
              }else{
                $select = $select." equipamento.ID_tipo = '$value'";
              }
              $aux = 1;
            }          
            if($i == 3){
              if($aux == 1){
                $select = $select." AND equipamento.ID_status = '$value'";
              }else{
                $select = $select." equipamento.ID_status = '$value'";
              }
              $aux = 1;
            }
            if($i == 4){
              if($aux == 1){
                $select = $select." AND equipamento.ID_area = '$value'";
              }else{
                $select = $select." equipamento.ID_area = '$value'";
              }
              $aux = 1;
            }
              

            
          }
          $i++;
        }
        
        

     

          $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
          $resultado_equipamentos = mysqli_query($conexao, $select);


         
    
          echo('<a id="bt_voltar" href="gerenciamento_equipamento.php"> Voltar</a>');

          $query = "";
          if($query != ""){
            $dados = mysqli_query($conexao, $query);
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
            // indice para o array de IDs
            $i = 0;
          }
         
?>
<p></p>
        		<div class="container theme-showcase" role="main">

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
                    
                    <th>Patrimônio</th>
                    <th>Número de série</th>
                    <th>Tipo de equipamento</th>
                    <th>Status do equipamento</th>
                    <th>Data de recebimento</th>
                    <th>Área</th>
                    <th>Editar</th>
                    <th></th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_equipamentos = mysqli_fetch_assoc($resultado_equipamentos)){ ?>
								<tr>
                  
                      <td><?php echo $rows_equipamentos['patrimonio'];?></td>
                      <td><?php echo $rows_equipamentos['numero_de_serie'];?></td>
                      <td><?php echo $rows_equipamentos['tipo_equipamento']; ?></td>
                      <td><?php echo $rows_equipamentos['status']; ?></td>
                      <td><?php echo $rows_equipamentos['data_de_recebimento']; ?></td>
                      <td><?php echo $rows_equipamentos['nome']; ?></td>
                      <td>
                  
                  <button type="button" onclick="testeajax(<?php echo $rows_equipamentos['patrimonio'].','.$rows_equipamentos['numero_de_serie'].','.$rows_equipamentos['ID_tipo'].','.$rows_equipamentos['ID_status'].','.$rows_equipamentos['ID_area'].','.$rows_equipamentos['ID_equipamento']; ?>)" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button>
										
									</td>
                  <td><input type="checkbox" name="mcheckbox[]" value=<?=$rows_equipamentos['ID_equipamento']?>></td>
                </tr>


              <?php  } ?>
							
              <tr>  
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" data-toggle="modal" data-target="#exampleModal2" onclick=verificarCheckBox()>Checkbox</a></td>
                    <td><a href="index.php">Voltar</a></td>
                    <td></td>

                </tr>
            </tbody>
            
					 </table>
				</div>
			</div>		
    </div>
    
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
           <div class="modal-body">
 
			<form name="LocalidadeStatus" id="formCard"  method="POST" action="atualizacao_statusLocalidade.php" enctype="multipart/form-data">
				<input type="hidden" name="src" id="src" value="">
        <div class="form-group">

                              <label for="inputStatus">Status do equipamento</label>
                              <select name="Status_troca" id="status_geral" class="form-control">
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
        

      <div class="form-group">
                                        
                                        <label for="inputLocalidade"> Escolher área</label>
                                        <select name="Troca_area" id="localidade_geral" class="form-control">
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
                          <button type="submit" class="btn btn-success" onclick=alteraEquipamentos()> Salvar </button>
                         <button type="button" class="btn btn-danger" onclick=recarrega()> Close</button>
      </form>
      

			<div id="txtMensagem">Aviso</div>

      </div>
        </div>
        </div>
		</div>
		
		

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
		
			  </div>
			  <div class="modal-body">
				<form name="atualizacao" id="formCard" method="POST" action="atualizacao_equipamento.php" enctype="multipart/form-data">
				  <div class="form-group">
              <label for="recipient-name" class="control-label">Patrimônio:</label>
              <input name="patrimonio" type="number" class="form-control" id="patrimonio" value="<?php echo($_SESSION['patrimonio']);?>">
          </div>
          
				  <div class="form-group">
              <label for="message-text" class="control-label">Número de Série:</label>
              <input name="serie" class="form-control" id="serie" value="">
          </div>

          <div class="form-group">

                              <label for="inputTipo">Tipo do equipamento</label>
                              <select name="tipo_equipamento_escolha" id="tipo" class="form-control">
                              <option value="">Escolher</option>

                                      <?php
                                      /* Código que trás o select de tipos de equipamentos, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                                      a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                                      $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
                                      $result_tipo_equipamento = "SELECT * FROM tipo ORDER BY tipo_equipamento ASC";
                                      $result_tipo_equipamento = mysqli_query($conexao, $result_tipo_equipamento);
                                      while($row_tipo_equipamento = mysqli_fetch_assoc($result_tipo_equipamento) ) {
                                        ?>
                                        <option value="<?php echo $row_tipo_equipamento['ID_tipo']; ?>" <?php /*if($row_tipo_equipamento['ID_tipo'] == $_SESSION['Tipo_equipamento']){
                                                  echo('selected'); // código que deixa selecionado o tipo que foi escolhido até que seja alterado manualmente, novamente.
                                              } */?>><?php echo $row_tipo_equipamento ['tipo_equipamento'];  ?>
                                        </option> <?php
                                        }                                                                        
                                      ?>

                              </select>

        </div>


        <div class="form-group">

                              <label for="inputStatus">Status do equipamento</label>
                              <select name="Status_equipamento" id="status" class="form-control">
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



                                    

          <div class="form-group">
                                        
                        <label for="inputLocalidade"> Escolher área</label>
                        <select name="escolherArea" id="localidade" class="form-control">
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

				<input name="id" type="hidden" class="form-control" id="id" value="">
				
				<button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
				<button type="submit" class="btn btn-success">Alterar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

    </div>
    </div>
    <script type="text/javascript">function recarrega(){
      location.reload();
    }
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function verificarCheckBox() {
			//seletor para os checkbox com name mcheckbox selecionados
			var checkbox = $('input:checkbox[name^=mcheckbox]:checked'); //cria um array com os checkbox selecionados
			var pesquisa = document.getElementById("src"); //input tipo hidden inserido no DIV do modal que irá armazenar a URL com os parâmetros do GET
			var src = "";
			var comboboxTipo = document.getElementById("localidade_geral");
			var comboboxStatus = document.getElementById("status_geral");
			
			//verifica se existem checkbox selecionados
			if(checkbox.length > 0){
				//array para armazenar os valores
				var val = [];
				src = "atualizacao_equipamento.php?";
				//função each para pegar os selecionados
				checkbox.each(function(item){
					val.push($(this).val());
					src += "ID_equipamento[]=" + $(this).val() + "&"; //cria URL
				});
				
			} 
			pesquisa.value = src;
			document.getElementById("txtMensagem").innerHTML = "";
		}
		
		//Função com AJAX para chamar alteratipo.php via método GET 
		function alteraEquipamentos() {
			var pesquisa = document.getElementById("src");
			var localidade = document.getElementById("localidade_geral");
			var status = document.getElementById("status_geral");
			
			if (pesquisa.value == "") {
				document.getElementById("txtMensagem").innerHTML = "Selecione um ou mais equipamentos para alterar.";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtMensagem").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET",pesquisa.value+"localidade_geral="+tipo.value+"&status_geral="+status.value,true);
				xmlhttp.send();
			}
			
		}

		//Função com AJAX para recarregar página via método GET 
		function recarrega() {
			location.reload();
		}
		
		</script>
	




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </body>
</html>