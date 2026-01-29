<?php
    require_once(__DIR__ . '/../../config/env.php');

    class Init {

        public $conn;

        public function __construct () {
                
            $serverName = $_ENV['DB_HOST'];
            $connectionInfo = [
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
    }
