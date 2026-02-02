<?php

require_once __DIR__ . '/../../src/controllers/bookcontroller.php';

// A klienstől kapott értékek mentése változóba, illetve üres string beállítása, ha nem érkezik semmi nem érkezik
$id = $_POST['id'] ?? '';

//A kapott adatok átadása a megfelelő BookController fn számára
$controller = new BookController();
$success = $controller->deletebook($id);

//Válasz küldése a kliens számára
echo json_encode(['success' => $success]);