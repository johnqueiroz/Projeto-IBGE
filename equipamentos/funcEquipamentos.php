<?php

require_once __DIR__ . '/../BD/conexao.php';


class funcEquipamentos extends Conexao{

    public object $conn;

    private string $IdServidor;
    
    public function coletarDadosEquipamentos(){

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
       
        $prepararQuery->bindParam(':IdServidor', $IdServidor, PDO::PARAM_STR);
        
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetch(PDO::FETCH_ASSOC);
        }
    }

}