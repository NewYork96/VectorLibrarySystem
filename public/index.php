<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/models/Book.php';
require_once __DIR__ . '/../src/controllers/bookController.php';

$B = new Book();

$B->delete(7);

$BC = new BookController();

$BC->deletebook(6);

$list = $BC->getbooks();
var_dump($list);
