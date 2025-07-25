<div class="form-container">
    <h5 class="mb-4">
        <?= $edit_data ? '<i class="bi bi-pencil-square me-2"></i>Edit Data Absensi' : '<i class="bi bi-plus-circle me-2"></i>Tambah Data Absensi' ?>
    </h5>
    <form method="POST" action="index.php">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama"
                    value="<?= $edit_data ? $edit_data['nama'] : '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim"
                    value="<?= $edit_data ? $edit_data['nim'] : '' ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal"
                    value="<?= $edit_data ? $edit_data['tanggal'] : date('Y-m-d') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mata Kuliah</label>
                <select class="form-select" name="mata_kuliah" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <option value="Pemrograman Web" <?= $edit_data && $edit_data['mata_kuliah'] == 'Pemrograman Web' ? 'selected' : '' ?>>Pemrograman Web</option>
                    <option value="Basis Data" <?= $edit_data && $edit_data['mata_kuliah'] == 'Basis Data' ? 'selected' : '' ?>>Basis Data</option>
                    <option value="Algoritma" <?= $edit_data && $edit_data['mata_kuliah'] == 'Algoritma' ? 'selected' : '' ?>>Algoritma</option>
                    <option value="Jaringan Komputer" <?= $edit_data && $edit_data['mata_kuliah'] == 'Jaringan Komputer' ? 'selected' : '' ?>>Jaringan Komputer</option>
                    <option value="Kecerdasan Buatan" <?= $edit_data && $edit_data['mata_kuliah'] == 'Kecerdasan Buatan' ? 'selected' : '' ?>>Kecerdasan Buatan</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Status Kehadiran</label>
            <div class="d-flex flex-wrap gap-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Hadir" id="hadir"
                        <?= $edit_data && $edit_data['status'] == 'Hadir' ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="hadir">
                        <span class="status-badge badge-hadir">Hadir</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Izin" id="izin"
                        <?= $edit_data && $edit_data['status'] == 'Izin' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="izin">
                        <span class="status-badge badge-izin">Izin</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Sakit" id="sakit"
                        <?= $edit_data && $edit_data['status'] == 'Sakit' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="sakit">
                        <span class="status-badge badge-sakit">Sakit</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Alpa" id="alpa"
                        <?= $edit_data && $edit_data['status'] == 'Alpa' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="alpa">
                        <span class="status-badge badge-alpa">Alpa</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <?php if ($edit_data): ?>
                <button type="submit" name="update" class="btn btn-primary px-4">
                    <i class="bi bi-check-circle me-1"></i> Update
                </button>
                <a href="index.php" class="btn btn-outline-secondary ms-2">
                    Batal
                </a>
            <?php else: ?>
                <button type="submit" name="create" class="btn btn-primary px-4">
                    <i class="bi bi-plus-circle me-1"></i> Tambah
                </button>
            <?php endif; ?>
        </div>
    </form>
</div>