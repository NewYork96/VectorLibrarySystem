<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = "127.0.0.1";  // próbáld localhost helyett
$conn = sqlsrv_connect($server, [
    "UID" => "sa",
    "PWD" => "P@ssw0rd",
    "Database" => "VectorWebShop",
    "TrustServerCertificate" => true
]);

if ($conn === false) {
    die('<pre>' . print_r(sqlsrv_errors(), true) . '</pre>');
}

echo "MSSQL kapcsolat OK";