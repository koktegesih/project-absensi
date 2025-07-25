<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'absensi_mahasiswa';
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }

        $this->createTable();
    }

    private function createTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS absensi (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(100) NOT NULL,
            nim VARCHAR(20) NOT NULL,
            tanggal DATE NOT NULL,
            mata_kuliah VARCHAR(100) NOT NULL,
            status ENUM('Hadir', 'Izin', 'Sakit', 'Alpa') NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if (!$this->connection->query($query)) {
            die("Error membuat tabel: " . $this->connection->error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
