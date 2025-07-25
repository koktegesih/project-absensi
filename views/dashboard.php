<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Absensi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 sidebar d-flex flex-column p-0">
                <div class="p-4">
                    <h4 class="mb-4"><i class="bi bi-journal-bookmark"></i> Absensi</h4>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-people"></i> Mahasiswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-calendar-check"></i> Absensi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-book"></i> Mata Kuliah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-graph-up"></i> Laporan
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a href="#" class="nav-link">
                                <i class="bi bi-gear"></i> Pengaturan
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto p-4 text-center">
                    <div class="text-muted small">© 2025 Sistem Absensi</div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9 p-4">
                <?php if (isset($_GET['status'])): ?>
                    <div class="alert alert-<?= $_GET['status'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                        <?= urldecode($_GET['message']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="dashboard-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-0"><i class="bi bi-journal-check me-2"></i>Dashboard Absensi Mahasiswa</h2>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <span class="me-3"><i class="bi bi-calendar me-1"></i> <?= date('d F Y') ?></span>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-bell"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-person-circle"></i> Admin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistik -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stat-card text-white p-4 card-hadir">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Hadir</h5>
                                    <h2><?= $statistik['total_hadir'] ?></h2>
                                    <div class="small">Mahasiswa</div>
                                </div>
                                <i class="bi bi-check-circle stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card text-white p-4 card-izin">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Izin</h5>
                                    <h2><?= $statistik['total_izin'] ?></h2>
                                    <div class="small">Mahasiswa</div>
                                </div>
                                <i class="bi bi-envelope-paper stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card text-white p-4 card-sakit">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Sakit</h5>
                                    <h2><?= $statistik['total_sakit'] ?></h2>
                                    <div class="small">Mahasiswa</div>
                                </div>
                                <i class="bi bi-activity stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card text-white p-4 card-alpa">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Alpa</h5>
                                    <h2><?= $statistik['total_alpa'] ?></h2>
                                    <div class="small">Mahasiswa</div>
                                </div>
                                <i class="bi bi-x-circle stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <!-- Grafik dan Form -->
                    <div class="col-lg-8">
                        <div class="chart-container">
                            <h5 class="mb-4">Statistik Kehadiran</h5>
                            <canvas id="attendanceChart"></canvas>
                        </div>

                        <?php require 'form.php'; ?>
                    </div>

                    <!-- Daftar Absensi -->
                    <div class="col-lg-4">
                        <?php require 'list.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="public/assets/js/script.js"></script>
    <script>
        // Data untuk grafik
        const statistikData = {
            hadir: <?= $statistik['total_hadir'] ?>,
            izin: <?= $statistik['total_izin'] ?>,
            sakit: <?= $statistik['total_sakit'] ?>,
            alpa: <?= $statistik['total_alpa'] ?>
        };
    </script>
</body>

</html>