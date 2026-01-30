<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Book.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book();
    }

    public function getbooks() {
        $result = $this->bookModel->getAll();
        $books = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $books[] = $row;
        }
        return $books;
    }

    public function addbook($title, $author, $publishYear, $isAvailable) {
        return $this->bookModel->create($title, $author, $publishYear, $isAvailable);
    }

    public function updatebook($id, $title, $author, $publishYear, $isAvailable) {
        return $this->bookModel->update($id, $title, $author, $publishYear, $isAvailable);
    }

    public function deletebook($id) {
        return $this->bookModel->delete($id);
    }
/*
    public function togglebookCompletion($id) {
        return $this->bookModel->toggleComplete($id);
    }*/
}
