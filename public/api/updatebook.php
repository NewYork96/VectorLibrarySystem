<?php

require_once __DIR__ . '/../../src/controllers/bookcontroller.php';

// A klienstől kapott értékek mentése változóba, illetve üres string beállítása, ha nem érkezik semmi nem érkezik
$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$publishYear = $_POST['publishYear'] ?? '';
$isAvailable = $_POST['isAvailable'] ?? '';

//A kapott adatok átadása a megfelelő BookController fn számára
$controller = new BookController();
$success = $controller->updatebook($id, $title, $author, $publishYear, $isAvailable);

//Válasz küldése a kliens számára
echo json_encode(['success' => $success]);