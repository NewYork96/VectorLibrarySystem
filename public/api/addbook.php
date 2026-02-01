<?php
require_once __DIR__ . '/../../src/controllers/bookController.php';


$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$publishYear = $_POST['publishYear'] ?? '';

$controller = new BookController();
$success = $controller->addbook($title, $author, $publishYear);

echo json_encode(['success' => $success]);