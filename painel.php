<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Servidores', 'Quantidade'],
          <?php
          $conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
          $sql ="SELECT * from equipamento";
          $buscar = mysqli_query($conexao, $sql);
          while($dados = mysqli_fetch_array($buscar)){
            $ID = $dados['data_de_recebimento'];
            $patrimonio = $dados['ID_equipamento'];
          
?>
          ['<?php echo $ID ?>', <?php echo $patrimonio ?> ],
        <?php }?>
        
        ]);

        var options = {
          title: 'Quantidade de equipamento por data',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipo de equipamento', 'Quantidade'],

          <?php
          $conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
          $sql ="SELECT distinct * from equipamento INNER JOIN tipo on equipamento.ID_tipo = tipo.ID_tipo";
          $buscar = mysqli_query($conexao, $sql);
          while($dados = mysqli_fetch_array($buscar)){
            $ID = $dados['tipo_equipamento'];
            $patrimonio = $dados['ID_equipamento'];
          
?>
          ['<?php echo $ID ?>', <?php echo $patrimonio ?> ],
        <?php }?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

    <div class="container-fluid">
         <div class="row"> 
            <div class="col-md-8">
                 <div id="curve_chart" ></div>
            </div>
                  <div class="col-md-4">
                     <div id="piechart"></div>
                  </div>
         </div>  
  </div>

  </body>
</html>
