<?php

    class Database {
        private $conn;

        public function __construct() {
            try {
                $this->conn = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", 
                    DB_USER, 
                    DB_PASS
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        public function getConnection() {
            return $this->conn;
        }
    }

?>