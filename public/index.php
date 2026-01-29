<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/database/DbConnection.php';
//require_once __DIR__ . '/../src/models/Book.php';
require_once __DIR__ . '/../src/controllers/booksController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = (new DbConnection())->getConnection();

echo "success";

$BC = new BooksController();

$list = $BC->getbooks();

var_dump($list);