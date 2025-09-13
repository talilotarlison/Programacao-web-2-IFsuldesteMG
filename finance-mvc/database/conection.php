<?php
    // Conexão com o banco de dados SQLite
    class Database {
        private static $instance = null;

        public static function getConnection() {
            if (self::$instance === null) {
                self::$instance = new PDO('sqlite:finance.db');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        }
    }

    // $db = new PDO('sqlite:finance.db');
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

