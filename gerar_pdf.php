<?php
	//baixar a class mPDF no site http://www.mpdf1.com/mpdf/index.php
	//Descompactar o arquivo na pasta pdf
	include ('pdf/mpdf.php');

    $conexao = mysqli_connect('localhost', 'root', '', 'projeto_ibge');
	
	
	$result_usuario = "SELECT * FROM equipamento INNER JOIN tipo on equipamento.ID_tipo = tipo.ID_tipo INNER JOIN localidade_area ON equipamento.ID_area = localidade_area.ID_area INNER JOIN status on equipamento.ID_status = status.ID_status";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);	
	$rows_equipamentos = mysqli_fetch_assoc($resultado_usuario);	
	while($rows_equipamentos = mysqli_fetch_assoc($resultado_usuario)){ 
        
$html .= "Patrimonio: ".	$rows_equipamentos['patrimonio']. "<br>";
$html .= "Número de Série: ".	$rows_equipamentos['numero_de_serie']. "<br>";
$html .= "Tipo do equipamento: ".	$rows_equipamentos['tipo_equipamento']. "<br>";
$html .= "Status: ".	$rows_equipamentos['status']. "<br>";
$html .= "Data de recebimento: ".	$rows_equipamentos['data_de_recebimento']. "<br>";
$html .= "Área: ".	$rows_equipamentos['nome_area']. "<br><hr>";
	}
	
	$pagina = 
		"<html>
            <body>
            
           $html

				
			</body>
		</html>
		";

$arquivo = "Relatorio01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servidor
// D - Salva o arquivo no computador do usuário
?>