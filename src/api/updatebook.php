<?php

require_once __DIR__ . '/../controllers/bookController.php';

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$publishYear = $_POST['publishYear'] ?? '';
$isAvailable = $_POST['isAvailable'] ?? '';

$controller = new BookController();
$success = $controller->updatebook($id, $title, $author, $publishYear, $isAvailable);

echo json_encode(['success' => $success]);