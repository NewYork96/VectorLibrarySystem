<?php
require_once __DIR__ . '/../database/dbconnection.php';

class Book {
    private $db;
    public $id;
    public $author;
    public $publishYear;
    public $isAvailable;

    public function __construct($id = null, $author = '', $publishYear = '', $isAvailable = 1) {
        $this->id = $id;
        $this->author = $author;
        $this->publishYear = $publishYear;
        $this->isAvailable = $isAvailable;
        $this->db = (new DbConnection())->getConnection();
    }
    
    //könyvek adatainak lekérdezése
    public function getAll() {
        $query = "SELECT * FROM Books ORDER BY title ASC";
        return sqlsrv_query($this->db, $query);
    }
    //új könyve mentése adatbázisba
    public function create($title, $author, $publishYear) {
        $query= "INSERT INTO Books (title, author, publishYear) VALUES (?, ?, ?)";
        $params = [&$title, &$author, &$publishYear];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);

    }

    //könyv adatainak módosítása az adatbázisban
    public function update($id, $title, $author, $publishYear, $isAvailable) {
        $query= "UPDATE Books SET title = ?, author = ?, publishYear = ?, isAvailable = ? WHERE id = ?";
        $params = [$title, $author, $publishYear, $isAvailable, $id];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);
    }

    //könyv törlése adatbázisból
    public function delete($id) {
        $query= "DELETE FROM Books WHERE id = $id";
        $params = [$id];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);
    }
}

?>