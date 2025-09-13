<?php
    class CadastroModel{
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function cadastrarUsuario($nome, $datan, $email, $senha) {
            $stmt = $this->db->prepare("INSERT INTO usuarios (nome, datan, email, senha) VALUES (:nome, :datan, :email, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':datan', $datan);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            // $stmt->bindParam(':senha', password_hash($senha, PASSWORD_BCRYPT));
            return $stmt->execute();
        }

        public function verificarEmail($email) {
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function createTableIfNotExists(){
            // Cria a tabela se não existir
            $this->db->exec("CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                datan TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                senha TEXT NOT NULL
            )");
        }
    }

