<?php
    require_once __DIR__ . '/../../config/env.php';
    class DbConnection {

        public $conn;

        //kapcsolódás az adatbázishoz
        public function __construct () {
            //az .env fájlban szereplő adatok lekérése
            $serverName = $_ENV['DB_HOST'];
            $connectionInfo = [
            "Database" => $_ENV['DB_NAME'],
            "UID" => $_ENV['DB_USER'],
            "PWD" => $_ENV['DB_PASS'],
            "TrustServerCertificate" => true
            ];
            //kapcsolat létrehozása az .env file-ban szereplő adatokkal
            $this->conn = sqlsrv_connect($serverName, $connectionInfo);
        }
            //db kapcsolat meghívása
            public function getConnection()
            {
                return $this->conn;
            }
        
            //db kapcsolat bontása
        public function disconnect() {
            
            $closeConnection = sqlsrv_close($this->conn);

            return $closeConnection;
        }
    }