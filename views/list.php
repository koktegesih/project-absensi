<div class="form-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Daftar Absensi Terbaru</h5>
        <span class="badge bg-primary">Total: <?= $statistik['total_absensi'] ?></span>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($absensi) > 0): ?>
                    <?php foreach ($absensi as $data): ?>
                        <tr>
                            <td>
                                <div><strong><?= $data['nama'] ?></strong></div>
                                <div class="small text-muted"><?= $data['mata_kuliah'] ?></div>
                            </td>
                            <td>
                                <?php 
                                    $badge_class = '';
                                    if ($data['status'] == 'Hadir') $badge_class = 'badge-hadir';
                                    if ($data['status'] == 'Izin') $badge_class = 'badge-izin';
                                    if ($data['status'] == 'Sakit') $badge_class = 'badge-sakit';
                                    if ($data['status'] == 'Alpa') $badge_class = 'badge-alpa';
                                ?>
                                <span class="status-badge <?= $badge_class ?>"><?= $data['status'] ?></span>
                            </td>
                            <td>
                                <a href="index.php?edit=<?= $data['id'] ?>" class="btn btn-sm btn-outline-primary action-btn">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="index.php?delete=<?= $data['id'] ?>" class="btn btn-sm btn-outline-danger action-btn" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="mt-2">Belum ada data absensi</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="small text-muted">Menampilkan <?= min(5, count($absensi)) ?> dari <?= count($absensi) ?> data</div>
        <a href="#" class="btn btn-sm btn-outline-primary">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</div>

<div class="form-container mt-4">
    <h5 class="mb-4">Ringkasan Mahasiswa</h5>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="small text-muted">Total Mahasiswa</div>
            <h4><?= $statistik['total_mahasiswa'] ?></h4>
        </div>
        <div>
            <div class="small text-muted">Kehadiran Rata-rata</div>
            <h4><?= $statistik['total_absensi'] > 0 ? round(($statistik['total_hadir'] / $statistik['total_absensi']) * 100) : 0 ?>%</h4>
        </div>
    </div>
    <div class="progress mb-4" style="height: 10px;">
        <div class="progress-bar bg-success" role="progressbar" 
            style="width: <?= $statistik['total_absensi'] > 0 ? ($statistik['total_hadir'] / $statistik['total_absensi']) * 100 : 0 ?>%" 
            aria-valuenow="<?= $statistik['total_absensi'] > 0 ? ($statistik['total_hadir'] / $statistik['total_absensi']) * 100 : 0 ?>" 
            aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-info" role="progressbar" 
            style="width: <?= $statistik['total_absensi'] > 0 ? ($statistik['total_izin'] / $statistik['total_absensi']) * 100 : 0 ?>%" 
            aria-valuenow="<?= $statistik['total_absensi'] > 0 ? ($statistik['total_izin'] / $statistik['total_absensi']) * 100 : 0 ?>" 
            aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-warning" role="progressbar" 
            style="width: <?= $statistik['total_absensi'] > 0 ? ($statistik['total_sakit'] / $statistik['total_absensi']) * 100 : 0 ?>%" 
            aria-valuenow="<?= $statistik['total_absensi'] > 0 ? ($statistik['total_sakit'] / $statistik['total_absensi']) * 100 : 0 ?>" 
            aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-danger" role="progressbar" 
            style="width: <?= $statistik['total_absensi'] > 0 ? ($statistik['total_alpa'] / $statistik['total_absensi']) * 100 : 0 ?>%" 
            aria-valuenow="<?= $statistik['total_absensi'] > 0 ? ($statistik['total_alpa'] / $statistik['total_absensi']) * 100 : 0 ?>" 
            aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <span class="badge bg-success">Hadir <?= $statistik['total_absensi'] > 0 ? round(($statistik['total_hadir'] / $statistik['total_absensi']) * 100) : 0 ?>%</span>
        <span class="badge bg-info">Izin <?= $statistik['total_absensi'] > 0 ? round(($statistik['total_izin'] / $statistik['total_absensi']) * 100) : 0 ?>%</span>
        <span class="badge bg-warning">Sakit <?= $statistik['total_absensi'] > 0 ? round(($statistik['total_sakit'] / $statistik['total_absensi']) * 100) : 0 ?>%</span>
        <span class="badge bg-danger">Alpa <?= $statistik['total_absensi'] > 0 ? round(($statistik['total_alpa'] / $statistik['total_absensi']) * 100) : 0 ?>%</span>
    </div>
</div>