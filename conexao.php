<?php
$conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
?>



<div>      
        <?php
          $conexao = mysqli_connect("localhost", "root", "", "projeto_ibge");
          $sql = $conexao -> query("SELECT equipamento.patrimonio,  equipamento.numero_de_serie, equipamento.data_de_recebimento FROM equipamento WHERE $option");

          echo(' <table class="table table-hover" id="formCad">
            
            <thead>
              <tr>
                  <th scope="col">Patrimônio</th>
              
                  <th scope="col">Número de série</th>
                  <th scope="col">Data de recebimento</th>
                  
              </tr>
          </thead>');
          
          while($tabela = mysqli_fetch_array($sql)){
            echo('
            <tr>
              <td>'.$tabela['patrimonio'].'</td>
              
              <td>'.$tabela['numero_de_serie'].'</td>
              <td>'.$tabela['data_de_recebimento'].'</td>
             
           
              </tr>
            
            ');

          }

       
          ?>
          
      </div>