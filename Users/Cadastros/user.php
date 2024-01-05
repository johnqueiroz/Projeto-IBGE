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
        $query_verificar = "SELECT emailServidor, senha, administrador FROM user WHERE emailServidor =:emailServidor LIMIT 1";
        $verificar_entrada = $this->conn->prepare($query_verificar);

        $verificar_entrada->bindParam(':emailServidor', $this->formData['emailServidor'], PDO::PARAM_STR);
        
        try {
            $verificar_entrada->execute();
            $retorno = $verificar_entrada->fetch(PDO::FETCH_ASSOC);
            
            if ($retorno !== false && isset($retorno['senha']) && password_verify($this->formData['senha'], $retorno['senha'])) {
                return true;
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


    public function coletarUsers(){

        $this->conn = $this->conectarBD();

        $query = "SELECT user.nomeServidor,
         user.IdServidor,
         user.administrador,
         user.siapeServidor,
         user.emailServidor,
         user.telefoneServidor, 
         func.nomeFuncao, 
         area.nomeArea 
         FROM user 
         INNER JOIN funcao AS func ON user.funcaoServidor = func.IdFuncao 
         INNER JOIN area ON user.areaServidor = area.Id";
        
        
        $prepararQuery = $this->conn->prepare($query);
      
        try{
            $prepararQuery->execute();
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }finally{
            return $prepararQuery->fetchAll(PDO::FETCH_ASSOC);
        }
    }


    public function coletarUserEditar($IdServidor){

        $this->conn = $this->conectarBD();


        $query = "SELECT user.nomeServidor,
         user.IdServidor,
         user.administrador,
         user.siapeServidor,
         user.emailServidor,
         user.telefoneServidor, 
         func.nomeFuncao, 
         area.nomeArea 
         FROM user 
         INNER JOIN funcao AS func ON user.funcaoServidor = func.IdFuncao 
         INNER JOIN area ON user.areaServidor = area.Id
         WHERE user.IdServidor = :IdServidor";
        
        
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



    public function atualizarServ($IdServidor){

        $this->conn = $this->conectarBD();
       
        $query = "UPDATE user
        SET
            administrador = :novoAdministrador,
            nomeServidor = :novoNome,
            siapeServidor = :novoSiape,
            emailServidor = :novoEmail,
            telefoneServidor = :novoTelefone,
            funcaoServidor = :novoFuncao,
            areaServidor = :novoIdArea
        WHERE
            user.IdServidor = :IdServidor";

        $prepararQuery = $this->conn->prepare($query);

        $prepararQuery->bindParam(':novoAdministrador', $this->formData['novoAdministrador'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoNome',  $this->formData['novoNome'], PDO::PARAM_STR);
        $prepararQuery->bindParam(':novoSiape',$this->formData['novoSiape'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoEmail', $this->formData['novoEmail'], PDO::PARAM_STR);
        $prepararQuery->bindParam(':novoTelefone', $this->formData['novoTelefone'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoFuncao', $this->formData['novoFuncao'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':novoIdArea', $this->formData['novoIdArea'], PDO::PARAM_INT);
        $prepararQuery->bindParam(':IdServidor', $IdServidor);

        try{
            $prepararQuery->execute();  // Execute a query para realmente deletar o registro
            $rowCount = $prepararQuery->rowCount();
            return $rowCount;  // Retorna o número de linhas afetadas pela deleção
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }


    public function deletarServ($IdServidor){

        $this->conn = $this->conectarBD();

        $query = "DELETE FROM user WHERE `user`.`IdServidor` = :IdServidor";

        $prepararQuery = $this->conn->prepare($query);
       
        $prepararQuery->bindParam(':IdServidor', $IdServidor, PDO::PARAM_INT);

        try{
            $prepararQuery->execute();  // Execute a query para realmente deletar o registro
            $rowCount = $prepararQuery->rowCount();
            return $rowCount;  // Retorna o número de linhas afetadas pela deleção
        }catch (PDOException $erro){
            $erro->getMessage();
        }
    }

    public function verificarAdministrador($emailServidor): int
    {
        $this->conn = $this->conectarBD();
        $query_verificar = "SELECT administrador FROM user WHERE emailServidor = :emailServidor LIMIT 1";
        $verificar_administrador = $this->conn->prepare($query_verificar);
    
        $verificar_administrador->bindParam(':emailServidor', $emailServidor, PDO::PARAM_STR);
        
        try {
            $verificar_administrador->execute();
            $retorno = $verificar_administrador->fetch(PDO::FETCH_ASSOC);
            
            if ($retorno !== false && isset($retorno['administrador'])) {
                return (int)$retorno['administrador'];
            } else {
                // Se o usuário não for encontrado ou não tiver um valor para 'administrador', retorne um valor padrão (pode ser 0, -1, ou outro valor que faça sentido em seu contexto)
                return 0;
            }
        } catch (PDOException $erro) {
            // Trate a exceção do PDO
            //echo $erro->getMessage();
            return 0; // ou outro valor padrão em caso de erro
        }
    }    

}