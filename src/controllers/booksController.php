<?php

require_once __DIR__ . '/../models/Book.php';

class BooksController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book();
    }

    public function getbooks() {
        $result = $this->bookModel->getAll();
        $books = [];
        //while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        //    $books[] = $row;
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $books[] = $row;
        //}
        }
        return $books;
    }

    public function addbook($description, $deadline) {
        return $this->bookModel->create($description, $deadline);
    }

    public function updatebook($id, $description, $deadline) {
        return $this->bookModel->update($id, $description, $deadline);
    }

    public function deletebook($id) {
        return $this->bookModel->delete($id);
    }

    public function togglebookCompletion($id) {
        return $this->bookModel->toggleComplete($id);
    }
}
?>