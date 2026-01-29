<?php
require_once __DIR__ . '/../database/DbConnection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Book {
    private $db;
    public $id;
    public $author;
    public $publishYear;
    public $isAvailable;

    public function __construct($id = null, $author = '', $publishYear = '', $isAvailable = 0) {
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
/*
    public function create($author, $publishYear) {
        $stmt = $this->db->prepare("INSERT INTO tasks (author, publishYear) VALUES (:author, :publishYear)");
        $stmt->bindValue(':author', $author, SQLITE3_TEXT);
        $stmt->bindValue(':publishYear', $publishYear, SQLITE3_TEXT);
        return $stmt->execute() !== false;
    }

    public function update($id, $author, $publishYear) {
        $stmt = $this->db->prepare("UPDATE tasks SET author = :author, publishYear = :publishYear WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->bindValue(':author', $author, SQLITE3_TEXT);
        $stmt->bindValue(':publishYear', $publishYear, SQLITE3_TEXT);
        return $stmt->execute() !== false;
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        return $stmt->execute() !== false;
    }

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