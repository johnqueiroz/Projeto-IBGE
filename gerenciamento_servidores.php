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
            function testeajax2(nome, siape, telefone, email, funcao, area, ID) { 
          
                document.getElementById("nome_servidor").value = nome;
                document.getElementById("siape").value = siape;
                document.getElementById("telefone_servidor").value = telefone;
                document.getElementById("email_servidor").value = email;
                document.getElementById("funcao_servidor").value = funcao;
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


        if(isset($_POST["nome_servidor"])){
          $nome_servidor =  $_POST["nome_servidor"];
        }else{
          $nome_servidor = "";
        }

        if(isset($_POST["siape_servidor"])){
          $siape_servidor =  $_POST["siape_servidor"];          
        }else{
          $siape_servidor = "";
        }

        if(isset($_POST["telefone_servidor"])){
          $telefone_servidor =  $_POST["telefone_servidor"];
        }else{
          $telefone_servidor = "";
        }

        if(isset($_POST["email_servidor"])){
          $email_servidor =  $_POST["email_servidor"];
         
        }else{
          $email_servidor = "";
        }

        if(isset($_POST["funcao_servidor"])){
          $funcao_servidor =  $_POST["funcao_servidor"];
          
        }else{
          $funcao_servidor = "";
        }
        if(isset($_POST["area_servidor"])){
            $area_servidor =  $_POST["area_servidor"];
            
          }else{
            $area_servidor = "";
          }

        $array = array(
          $nome_servidor,
          $siape_servidor,
          $telefone_servidor,
          $email_servidor,
          $funcao_servidor,
          $area_servidor
        );

        $i = 0;
        $aux = 0;
        $select = "SELECT * FROM servidor INNER JOIN funcoes on servidor.ID_funcao = funcoes.ID_funcao INNER JOIN localidade_area on servidor.ID_area = localidade_area.ID_area WHERE";
     
        foreach ($array as $value){
          if($value != ""){
            if($i == 0){
              $select = $select." servidor.nome = '$value'";
              $aux = 1;
              
            }
            if($i == 1){
              if($aux == 1){
                $select = $select." AND servidor.siape = '$value'";
              }else{
                $select = $select." servidor.siape = '$value'";
              }
              $aux = 1;
            }

            if($i == 2){
              if($aux == 1){
                $select = $select." AND servidor.telefone = '$value'";
              }else{
                $select = $select." servidor.telefone = '$value'";
              }
              $aux = 1;
            }          
            if($i == 3){
              if($aux == 1){
                $select = $select." AND servidor.email = '$value'";
              }else{
                $select = $select." servidor.email = '$value'";
              }
              $aux = 1;
            }
            if($i == 4){
              if($aux == 1){
                $select = $select." AND servidor.ID_funcao = '$value'";
              }else{
                $select = $select." servidor.ID_funcao = '$value'";
              }
              $aux = 1;
            }
            if($i == 5){
                if($aux == 1){
                  $select = $select." AND servidor.ID_area = '$value'";
                }else{
                  $select = $select." servidor.ID_area = '$value'";
                }
                $aux = 1;
              }
              

            
          }
          $i++;
        }
        
        

     

          $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
          $resultado_servidores = mysqli_query($conexao, $select);


         
    
          echo('<a id="bt_voltar" href="gerenciamento_coordenadores.php"> Voltar</a>');


?>
<p></p>
        		<div class="container theme-showcase" role="main">

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>                   
                    <th>Nome</th>
                    <th>Siape</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Função</th>
                    <th>Área</th>
                    <th>Editar</th>      
							</tr>
						</thead>
						<tbody>
							<?php while($rows_servidores = mysqli_fetch_assoc($resultado_servidores)){ ?>
								<tr>     
                      <td><?php echo $rows_servidores['nome'];?></td>
                      <td><?php echo $rows_servidores['siape'];?></td>
                      <td><?php echo $rows_servidores['telefone']; ?></td>
                      <td><?php echo $rows_servidores['email']; ?></td>
                      <td><?php echo $rows_servidores['nome_funcao']; ?></td>
                      <td><?php echo $rows_servidores['nome_area']; ?></td>
                      <td>           
                      <button type="button" onclick="testeajax(<?php echo $rows_servidores['nome'].','.$rows_servidores['siape'].','.$rows_servidores['telefone'].','.$rows_servidores['email'].','.$rows_servidores['ID_funcao'].','.$rows_servidores['ID_area']; ?>)" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button>
										
									</td>
                 
                </tr>


              <?php  } ?>

            </tbody>
            
					 </table>
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
				<form name="atualizacao_servidores" id="formCard" method="POST" action="atualizacao_servidores.php" enctype="multipart/form-data">

				  <div class="form-group">
              <label for="nome_servidor" class="control-label">Nome</label>
              <input name="nome_servidor" type="text" class="form-control" id="nome_servidor" value="">
          </div>
          
			<div class="form-group">
              <label for="Siape" class="control-label">Siape</label>
              <input name="Siape" type="number" class="form-control" id="Siape" value="">
          </div>

          <div class="form-group">
              <label for="telefone_servidor" class="control-label">Telefone</label>
              <input name="telefone_servidor" type="text" class="form-control" id="telefone_servidor" value="">
          </div>

          <div class="form-group">
              <label for="email_servidor" class="control-label">E-mail</label>
              <input name="email_servidor" type="text" class="form-control" id="email_servidor" value="">
          </div>


          <div class="form-group">                                        
                                <label for="funcao_servidor">Função</label>
                                <select name="funcao_servidor" id="funcao_servidor" class="form-control">

                                <option value="">Escolher</option>
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

          <div class="form-group">
                                        
                        <label for="inputLocalidade"> Escolher área</label>
                        <select name="escolherArea" id="localidade" class="form-control">
                        <option value="">Escolher</option>

                        <?php  
                          /* Código que trás o select das áreas, onde se inicia a conexao com o banco, depois cria o tipo de busca que será feita no banco e cria
                a variavel que junta a conexao com a busca e depois um laço de repetição para enquanto tiver dado no banco, continue buscando. */
                             $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
                             $mostra_area = "SELECT * FROM localidade_area ORDER BY nome_area ASC";
                             $mostra_area = mysqli_query($conexao, $mostra_area);
                             while($row_mostra_area = mysqli_fetch_assoc($mostra_area)){
                              ?>

                              <option value="<?php echo $row_mostra_area['ID_area']; ?>"><?php echo $row_mostra_area ['nome_area']; ?>
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
			var comboboxTipo = document.getElementById("localidade2");
			var comboboxStatus = document.getElementById("status2");
			
			//verifica se existem checkbox selecionados
			if(checkbox.length > 0){
				//array para armazenar os valores
				var val = [];
				src = "atualizacao_statusLocalidade.php?";
				//função each para pegar os selecionados
				checkbox.each(function(item){
					val.push($(this).val());
					src += "id[]=" + $(this).val() + "&"; //cria URL
				});
				
			} 
			pesquisa.value = src;
			document.getElementById("txtMensagem").innerHTML = "";
		}
		
		//Função com AJAX para chamar alteratipo.php via método GET 
		function alteraEquipamentos() {
			var pesquisa = document.getElementById("src");
			var tipo = document.getElementById("localidade2");
			var status = document.getElementById("status2");
			
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
				xmlhttp.open("GET",pesquisa.value+"tipo="+tipo.value+"&status="+status.value,true);
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