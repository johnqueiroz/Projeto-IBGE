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



    public function coletarDadosEquipamentos(){

        $this->conn = $this->conectarBD();


        $userEmail = $_SESSION['userEmail'];
        $IdServidor = $_SESSION['IdServidor'];


        $query = "SELECT 
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

}