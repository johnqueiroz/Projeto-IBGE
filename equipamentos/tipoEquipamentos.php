<?php

require_once __DIR__ . '/../BD/conexao.php';


class tipoEquipamentos extends Conexao{

    public object $conn;
    
    public function cadastrarTipoEqp(){

        $this->conn = $this->conectarBD();

        $query = "INSERT INTO `tipoequipamento` (`tipo`) VALUES (:tipo)";
        
        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':tipo', $this->formData['tipo'], PDO::PARAM_STR);
        
        try{
            $prepararQuery->execute();
            $rowCount = $prepararQuery->rowCount();
            return $rowCount; 
        } // Retorna o número de linhas afetadas pela deleção
        catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }
}