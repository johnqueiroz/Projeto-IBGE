<?php

require_once __DIR__ . '/../BD/conexao.php';


class funcLembretes extends Conexao{

    public object $conn;
    public array $formData;
    private string $IdServidor;

    public function inserirLembrete(): bool{

        $IdServidor = $_SESSION['IdServidor'];

        $this->conn = $this->conectarBD();
        
        $query_inserirLembrete = "INSERT INTO `lembretes`(`lembrete`, 
        `lembreteUserId`) 
        VALUES
        (:lembrete, :lembreteUserId)";
        $cadastrarLembrete = $this->conn->prepare($query_inserirUser);

        $cadastrarLembrete->bindParam(':lembrete', $this->formData['lembrete'], PDO::PARAM_STR);
        $cadastrarLembrete->bindParam(':lembreteUserId', $IdServidor, PDO::PARAM_INT);
    
        $cadastrarLembrete->execute();

        if ($cadastrarUser->rowCount()){
            return true;
        }else{
            return false;
        }
    }


    public function coletarLembrete(){

        $IdServidor = $_SESSION['IdServidor'];
        $this->conn = $this->conectarBD();

        $query = "SELECT * FROM lembretes WHERE ";

        $coletarLembrete = $this->conn>prepare($query);

        $coletarLembrete->bindParam(':lembreteUserId', $IdServidor, PDO::PARAM_INT);

        try{
            $coletarLembrete->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $coletarLembrete->fetch(PDO::FETCH_ASSOC);
        }

    }
}