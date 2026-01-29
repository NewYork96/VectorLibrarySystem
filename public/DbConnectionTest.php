<?php
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../src/DbConnection.php';

$db = new DbConnection();
$conn = $db->getConnection();

if ($conn === false) {
    echo "Sikertelen";
}

else {
    echo "Siker";
}

$disconn = $db->disconnect();


if ($disconn === false) {
    echo "Sikertelen kijelentkezés";
}

else {
    echo "Sikeres kijelentkezés";
}
