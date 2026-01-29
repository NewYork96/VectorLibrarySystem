<?php

require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../src/DbConnection.php';

$db = new DbConnection();
$conn = $db->getConnection();

echo "success";

var_dump($envPath);