<?php
    class transacoesModel{
        private $db;
        public function __construct($db){
            $this->db = $db;
        }

        public function adicionarTransacao($nome, $valor, $tipo, $data){
            $stmt = $this->db->prepare("INSERT INTO transacoes (nome, valor, tipo, data) VALUES (:nome, :valor, :tipo, :data)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':data', $data);
            return $stmt->execute();
        }

        public function listarTransacoes(){
            // $db->query("SELECT * FROM transacoes ORDER BY data DESC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
            $stmt = $this->db->query("SELECT * FROM transacoes ORDER BY data DESC, id DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // remover transacao
        public function removerTransacao($id){
            // $stmt = $db->prepare("DELETE FROM transacoes WHERE id = ?");
            // $stmt->execute([$_GET['remover']]);
            $stmt = $this->db->prepare("DELETE FROM transacoes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        public function createTableIfNotExists(){
            // Cria a tabela se não existir
            $this->db->exec("CREATE TABLE IF NOT EXISTS transacoes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                valor REAL NOT NULL,
                tipo TEXT CHECK(tipo IN ('entrada','saida')) NOT NULL,
                data TEXT NOT NULL
            )");
        }

    }

?>

