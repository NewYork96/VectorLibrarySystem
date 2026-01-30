<?php
require_once __DIR__ . '/../../src/controllers/bookController.php';

//header('Content-Type: application/json; charset=utf-8');

$controller = new BookController();
$books = $controller->getbooks();

echo json_encode($books);
