<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../database/DbConnection.php';

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

    public function getAll() {
        $query = "SELECT * FROM Books ORDER BY publishYear ASC";
        return sqlsrv_query($this->db, $query);
    }

    public function create($title, $author, $publishYear) {
        $query= "INSERT INTO Books (title, author, publishYear) VALUES (?, ?, ?)";
        $params = [&$title, &$author, &$publishYear];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);

    }

    public function update($id, $title, $author, $publishYear) {
        $query= "UPDATE Books SET title = ?, author = ?, publishYear = ?, isAvailable = ? WHERE id = ?";
        $params = [&$title, &$author, &$publishYear, &$id];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);
    }

    public function delete($id) {
        $query= "DELETE FROM Books WHERE id = $id";
        $params = [$id];
        $stmt = sqlsrv_prepare($this->db, $query,  $params);
        return sqlsrv_execute($stmt);
    }
/*
    public function toggleComplete($id) {
        // Lekérjük az aktuális státuszt
        $stmt = $this->db->prepare("SELECT isAvailable FROM tasks WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

        if ($result) {
            $newStatus = $result['isAvailable'] ? 0 : 1;
            $updateStmt = $this->db->prepare("UPDATE tasks SET isAvailable = :isAvailable WHERE id = :id");
            $updateStmt->bindValue(':isAvailable', $newStatus, SQLITE3_INTEGER);
            $updateStmt->bindValue(':id', $id, SQLITE3_INTEGER);
            return $updateStmt->execute() !== false;
        }
        return false;
     }
        */
}

?>