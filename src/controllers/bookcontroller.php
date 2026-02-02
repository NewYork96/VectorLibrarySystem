<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book();
    }

    //könyvadatok bekérése a modelltől
    public function getbooks() {
        $result = $this->bookModel->getAll();
        $books = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $books[] = $row;
        }
        return $books;
    }

    //létrehzott könyv adatainak továbbítása a model felé
    public function addbook($title, $author, $publishYear) {
        return $this->bookModel->create($title, $author, $publishYear);
    }

    //modosított könyvadatok továbbítása a model felé
    public function updatebook($id, $title, $author, $publishYear, $isAvailable) {
        return $this->bookModel->update($id, $title, $author, $publishYear, $isAvailable);
    }
    
    //módosítani kívánt könyv id továbbítása a model felé
    public function deletebook($id) {
        return $this->bookModel->delete($id);
    }
}
