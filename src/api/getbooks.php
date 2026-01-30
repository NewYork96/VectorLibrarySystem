<?php
require_once __DIR__ . '/../controllers/bookController.php';

$controller = new BookController();
$books = $controller->getbooks();

echo json_encode($books);
