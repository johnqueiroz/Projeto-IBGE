<?php


abstract class conexao{


    public string $host = 'localhost';
    public string $user = 'root';
    public string $password = "";
    public string $dbname = 'ibge';
    public int $port = 3306;
    public object $connect;

    
    public function conectarBD(){
        try{
            // Conexao com a porta
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->user, $this->password);

            return $this->connect;

        }catch(Execption $erro){
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador John Emerson');
        }
    }
    
     
}

