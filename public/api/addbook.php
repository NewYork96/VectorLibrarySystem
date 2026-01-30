<?php
require_once __DIR__ . '/../../src/controllers/bookController.php';


$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$publishYear = $_POST['publishYear'] ?? '';
$isAvailable = $_POST['isAvailable'] ?? '';

$controller = new BookController();
$success = $controller->addbook($title, $author, $publishYear, $isAvailable);

echo json_encode(['success' => $success]);