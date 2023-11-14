<?php

require_once __DIR__ . '/../../BD/conexao.php';


class user extends Conexao{

    public object $conn;
    public array $formData;

    public function inserirUser(): bool{

        $this->conn = $this->conectarBD();
        
        $query_inserirUser = "INSERT INTO `user`(`nomeServidor`, 
        `siapeServidor`, 
        `emailServidor`, 
        `funcaoServidor`, 
        `areaServidor`,
        `senha`) 
        VALUES
        (:nomeServidor, :siapeServidor, :emailServidor, :funcaoServidor, :areaServidor, :senha)";
        $cadastrarUser = $this->conn->prepare($query_inserirUser);

        $cadastrarUser->bindParam(':nomeServidor', $this->formData['nomeServidor'], PDO::PARAM_STR);
        $cadastrarUser->bindParam(':siapeServidor', $this->formData['siapeServidor'], PDO::PARAM_STR);
        $cadastrarUser->bindParam(':emailServidor', $this->formData['emailServidor'], PDO::PARAM_STR);
        $cadastrarUser->bindParam(':funcaoServidor', $this->formData['funcaoServidor'], PDO::PARAM_STR);
        $cadastrarUser->bindParam(':areaServidor', $this->formData['areaServidor'], PDO::PARAM_STR);
        
        
        $senha_cript = password_hash( $this->formData['senha'], PASSWORD_DEFAULT);
        $cadastrarUser->bindParam(':senha', $senha_cript);
    
        $cadastrarUser->execute();

        if ($cadastrarUser->rowCount()){
            return true;
        }else{
            return false;
        }
    }


    public function verificarConta(): bool
    {
        $this->conn = $this->conectarBD();
        $query_verificar = "SELECT emailServidor, senha FROM user WHERE emailServidor =:emailServidor LIMIT 1";
        $verificar_entrada = $this->conn->prepare($query_verificar);

        $verificar_entrada->bindParam(':emailServidor', $this->formData['emailServidor'], PDO::PARAM_STR);
        
        try {
            $verificar_entrada->execute();
            $retorno = $verificar_entrada->fetch(PDO::FETCH_ASSOC);
            
            if ($retorno !== false && isset($retorno['senha']) && password_verify($this->formData['senha'], $retorno['senha'])) {
                return true;
            } else {
                // Trate o caso em que a condição acima não é atendida
                return false;
            }
        } catch (PDOException $erro) {
            // Trate a exceção do PDO
            //echo $erro->getMessage();
            return false;
        }
          
    }

    public function coletarDadosUser(){

        $this->conn = $this->conectarBD();


        $userEmail = $_SESSION['userEmail'];

        $query = "SELECT IdServidor, 
        nomeServidor, 
        siapeServidor
        FROM user WHERE emailServidor = '$userEmail' LIMIT 1";
        
        
        $prepararQuery = $this->conn->prepare($query);
       /* echo $userEmail;
        $prepararQuery->bindParam(':emailServidor', $userEmail, PDO::PARAM_STR);*/
        
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetch(PDO::FETCH_ASSOC);
        }
    }

}