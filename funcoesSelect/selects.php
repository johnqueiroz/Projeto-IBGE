<?php
require_once __DIR__ . '/../BD/conexao.php';

class selects extends conexao {

    public function listarDados($tabela, $colunaOrdenacao) {
        try {
            $conexao = $this->conectarBD();
            $query = "SELECT * FROM $tabela ORDER BY $colunaOrdenacao ASC";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            die('Erro na consulta: ' . $erro->getMessage());
        }
    }
    
}