<?php

require_once __DIR__ . '/../controllers/bookController.php';

$id = $_POST['id'] ?? '';

$controller = new BookController();
$success = $controller->deletebook($id);

echo json_encode(['success' => $success]);