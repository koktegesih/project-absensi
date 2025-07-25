<?php
require_once './models/AbsensiModel.php';

class AbsensiController
{
    private $model;

    public function __construct()
    {
        $this->model = new AbsensiModel();
    }

    public function index()
    {
        $absensi = $this->model->getAllAbsensi();
        $statistik = $this->model->getStatistik();
        $edit_data = isset($_GET['edit']) ? $this->model->getAbsensiById($_GET['edit']) : null;

        require_once './views/dashboard.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'tanggal' => $_POST['tanggal'],
                'mata_kuliah' => $_POST['mata_kuliah'],
                'status' => $_POST['status']
            ];

            if ($this->model->tambahAbsensi($data)) {
                header("Location: index.php?status=success&message=Data berhasil ditambahkan");
            } else {
                header("Location: index.php?status=error&message=Gagal menambahkan data");
            }
            exit();
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $data = [
                'id' => $_POST['id'],
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'tanggal' => $_POST['tanggal'],
                'mata_kuliah' => $_POST['mata_kuliah'],
                'status' => $_POST['status']
            ];

            if ($this->model->updateAbsensi($data)) {
                header("Location: index.php?status=success&message=Data berhasil diupdate");
            } else {
                header("Location: index.php?status=error&message=Gagal mengupdate data");
            }
            exit();
        }
    }

    public function delete()
    {
        if (isset($_GET['delete'])) {
            if ($this->model->deleteAbsensi($_GET['delete'])) {
                header("Location: index.php?status=success&message=Data berhasil dihapus");
            } else {
                header("Location: index.php?status=error&message=Gagal menghapus data");
            }
            exit();
        }
    }
}
