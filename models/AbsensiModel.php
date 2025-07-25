<?php
require_once './config/database.php';

class AbsensiModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllAbsensi()
    {
        $result = $this->db->query("SELECT * FROM absensi ORDER BY tanggal DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAbsensiById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM absensi WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function tambahAbsensi($data)
    {
        $stmt = $this->db->prepare("INSERT INTO absensi (nama, nim, tanggal, mata_kuliah, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $data['nama'], $data['nim'], $data['tanggal'], $data['mata_kuliah'], $data['status']);
        return $stmt->execute();
    }

    public function updateAbsensi($data)
    {
        $stmt = $this->db->prepare("UPDATE absensi SET nama=?, nim=?, tanggal=?, mata_kuliah=?, status=? WHERE id=?");
        $stmt->bind_param("sssssi", $data['nama'], $data['nim'], $data['tanggal'], $data['mata_kuliah'], $data['status'], $data['id']);
        return $stmt->execute();
    }

    public function deleteAbsensi($id)
    {
        $stmt = $this->db->prepare("DELETE FROM absensi WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getStatistik()
    {
        return [
            'total_hadir' => $this->db->query("SELECT COUNT(*) FROM absensi WHERE status='Hadir'")->fetch_row()[0],
            'total_izin' => $this->db->query("SELECT COUNT(*) FROM absensi WHERE status='Izin'")->fetch_row()[0],
            'total_sakit' => $this->db->query("SELECT COUNT(*) FROM absensi WHERE status='Sakit'")->fetch_row()[0],
            'total_alpa' => $this->db->query("SELECT COUNT(*) FROM absensi WHERE status='Alpa'")->fetch_row()[0],
            'total_mahasiswa' => $this->db->query("SELECT COUNT(DISTINCT nim) FROM absensi")->fetch_row()[0],
            'total_absensi' => $this->db->query("SELECT COUNT(*) FROM absensi")->fetch_row()[0]
        ];
    }
}
