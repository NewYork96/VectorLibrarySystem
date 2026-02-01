<?php

require_once __DIR__ . '/../../src/controllers/bookController.php';

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$publishYear = $_POST['publishYear'] ?? '';

$controller = new BookController();
$success = $controller->updatebook($id, $title, $author, $publishYear);

echo json_encode(['success' => $success]);