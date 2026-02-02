<?php
require_once __DIR__ . '/../../src/controllers/bookcontroller.php';

//Adatok lekérése a BookControllertől
$controller = new BookController();
$books = $controller->getbooks();

//Adatok továbbítása a kliens számára
echo json_encode($books);
