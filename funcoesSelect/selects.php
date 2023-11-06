<?php
require_once '../../BD/Conexao.php';

class selects extends conexao {

    public function listarAreas() {
        try {
            $conexao = $this->conectarBD();
            $query = 'SELECT * FROM area ORDER BY nomeArea ASC';
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            die('Erro na consulta: ' . $erro->getMessage());
        }
    }



    public function listarFuncoes() {
        try {
            $conexao = $this->conectarBD();
            $query = 'SELECT * FROM funcao ORDER BY nomeFuncao ASC';
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            die('Erro na consulta: ' . $erro->getMessage());
        }
    }
}