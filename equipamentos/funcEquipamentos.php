<?php

require_once __DIR__ . '/../BD/conexao.php';


class funcEquipamentos extends Conexao{

    public object $conn;

    private string $IdServidor;
    
    public function coletarQuantEquipamentos(){

        $this->conn = $this->conectarBD();


        $userEmail = $_SESSION['userEmail'];
        $IdServidor = $_SESSION['IdServidor'];


        $query = "SELECT 
        COUNT(*) AS totalEquipamentos,
        SUM(CASE WHEN IdStatus = 2 THEN 1 ELSE 0 END) AS quantidadeStatus2,
        SUM(CASE WHEN iDStatus = 3 THEN 1 ELSE 0 END) AS quantidadeStatus3
    FROM 
        equipamentos 
    WHERE 
        IdServidor = :IdServidor";
        
        
        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':IdServidor', $IdServidor, PDO::PARAM_INT);
        
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetch(PDO::FETCH_ASSOC);
        }
    }



    public function coletarDadosEquipamentosServidor(){

        $this->conn = $this->conectarBD();


        $userEmail = $_SESSION['userEmail'];
        $IdServidor = $_SESSION['IdServidor'];


        $query = "SELECT
        eqp.idEquipamento,
        eqp.patrimonio,
        tipoeqp.tipo AS tipoEquipamento,
        area.nomeArea,
        statuseqp.status,
        user.nomeServidor,
        DATE_FORMAT(eqp.dataMovimentacao, '%d/%m/%Y') as dataMovimentacao
        FROM 
        equipamentos AS eqp 
        INNER JOIN
        tipoequipamento AS tipoeqp ON eqp.IdTipo = tipoeqp.idTipoEquipamento 
        INNER JOIN 
        area ON eqp.IdArea = area.Id
        INNER JOIN
        statusequipamento as statuseqp ON eqp.IdStatus = statuseqp.idStatusEquipamento 
        INNER JOIN 
        user ON eqp.IdServidor = user.IdServidor 
        WHERE eqp.IdServidor = :IdServidor";
        
        
        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':IdServidor', $IdServidor, PDO::PARAM_INT);
        
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetchAll(PDO::FETCH_ASSOC);
        }
    }


    public function coletarDadosEquipamentosEdicao($idEquipamento){

        $this->conn = $this->conectarBD();

        $query = "SELECT
        eqp.idEquipamento,
        eqp.patrimonio,
        eqp.numero_de_serie as numeroSerie,
        tipoeqp.tipo AS tipoEquipamento,
        area.nomeArea,
        statuseqp.status,
        user.nomeServidor,
        DATE_FORMAT(eqp.dataMovimentacao, '%d/%m/%Y') as dataMovimentacao
        FROM 
        equipamentos AS eqp 
        INNER JOIN
        tipoequipamento AS tipoeqp ON eqp.IdTipo = tipoeqp.idTipoEquipamento 
        INNER JOIN 
        area ON eqp.IdArea = area.Id
        INNER JOIN
        statusequipamento as statuseqp ON eqp.IdStatus = statuseqp.idStatusEquipamento 
        INNER JOIN 
        user ON eqp.IdServidor = user.IdServidor 
        WHERE eqp.idEquipamento = :idEquipamento";
        
        
        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':idEquipamento', $idEquipamento, PDO::PARAM_INT);
        
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetch(PDO::FETCH_ASSOC);
        }
    }


    public function atualizarEqp($idEquipamento){

        $this->conn = $this->conectarBD();
       
        $query = "UPDATE equipamentos
        SET
            patrimonio = :novoPatrimonio,
            numero_de_serie = :novoNumeroDeSerie,
            IdTipo = :novoIdTipo,
            IdArea = :novoIdArea,
            IdStatus = :novoIdStatus,
            IdServidor = :novoIdServidor,
            dataMovimentacao = :novaDataMovimentacao
        WHERE
            idEquipamento = :idEquipamento";
        $prepararQuery = $this->conn->prepare($query);

        $prepararQuery->bindParam(':novoPatrimonio',  $this->formData['novoPatrimonio'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoNumeroDeSerie',$this->formData['novoNumeroDeSerie'], PDO::PARAM_STR);
        $prepararQuery->bindParam(':novoIdTipo', $this->formData['novoIdTipo'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoIdArea', $this->formData['novoIdArea'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoIdStatus', $this->formData['novoIdStatus'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoIdServidor', $this->formData['novoIdServidor'], PDO::PARAM_STR);

        // Convertendo a data para o formato aceito pelo MySQL
        $dataFormatada = date("Y-m-d", strtotime(str_replace('/', '-', $this->formData['novaDataMovimentacao'])));
        $prepararQuery->bindParam(':novaDataMovimentacao', $dataFormatada, PDO::PARAM_STR);
        $prepararQuery->bindParam(':idEquipamento', $idEquipamento);


        echo $this->formData['novoPatrimonio'],"patrimonio -  ",
         $this->formData['novoNumeroDeSerie'], "NDS -", 
         $this->formData['novoIdTipo'], "IdTipo -", 
         $this->formData['novoIdArea'], "IdArea -",
         $this->formData['novoIdStatus'], "IdStatus -",
         $this->formData['novoIdServidor'], "IdServidor -",
         $dataFormatada, "data  -",
         $idEquipamento;
        try{
            $prepararQuery->execute();  // Execute a query para realmente deletar o registro
            $rowCount = $prepararQuery->rowCount();
            return $rowCount;  // Retorna o número de linhas afetadas pela deleção
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }


    public function deletarEqp($idEquipamento){

        $this->conn = $this->conectarBD();

        $query = "DELETE FROM equipamentos WHERE `equipamentos`.`idEquipamento` = :idEquipamento";

        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':idEquipamento', $idEquipamento, PDO::PARAM_INT);

        try{
            $prepararQuery->execute();  // Execute a query para realmente deletar o registro
            $rowCount = $prepararQuery->rowCount();
            return $rowCount;  // Retorna o número de linhas afetadas pela deleção
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }

}