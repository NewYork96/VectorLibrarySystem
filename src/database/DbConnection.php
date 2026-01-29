<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once __DIR__ . '/../../config/env.php';
    class DbConnection {

        public $conn;

        public function __construct () {
                
            $serverName = $_ENV['DB_HOST'];
            $connectionInfo = [
            "Database" => $_ENV['DB_NAME'],
            "UID" => $_ENV['DB_USER'],
            "PWD" => $_ENV['DB_PASS'],
            "TrustServerCertificate" => true
            ];
            
            $this->conn = sqlsrv_connect($serverName, $connectionInfo);
        }

            public function getConnection()
            {
                return $this->conn;
            }

        public function disconnect() {
            
            $closeConnection = sqlsrv_close($this->conn);

            return $closeConnection;
        }
    }