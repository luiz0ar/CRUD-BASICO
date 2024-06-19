<?php
class Database {
    private $db_file = __DIR__ . '/../database/crud_php.db';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("sqlite:" . $this->db_file);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function createTables() {
        try {
            $this->conn = $this->getConnection();
            $query = "
                CREATE TABLE IF NOT EXISTS usuarios (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nome_completo TEXT NOT NULL,
                    email TEXT NOT NULL UNIQUE,
                    senha TEXT NOT NULL
                );
            ";
            $this->conn->exec($query);
        } catch(PDOException $exception) {
            echo "Error creating tables: " . $exception->getMessage();
        }
    }
}
?>
