<?php
    class LoginModel {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        // Cria a tabela de usuários se não existir
        public function createTableIfNotExists() {
            // Cria a tabela se não existir
            $this->db->exec("CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                datan TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                senha TEXT NOT NULL
            )");
        }

        // Adiciona um novo usuário
        public function verificarUsuario($email) {
            $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        }

        // Verifica se o e-mail já está registrado
        public function emailExiste($email) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        }
    }