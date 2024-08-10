<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kos</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard_style.css') ?>">
</head>
<body>
    <?= $this->include('dashboard/navbar'); ?>

    <main>
        <div class="overview">
            <h1>Tambah Kos</h1>

            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('tambah_kost') ?>" method="post">
                <?= csrf_field() ?>

                <div class="input-field">
                    <label for="nama_tempat_kos">Nama Tempat Kos:</label>
                    <input type="text" id="nama_tempat_kos" name="nama_tempat_kos" value="<?= old('nama_tempat_kos') ?>" required>
                </div>

                <div class="input-field">
                    <label for="harga">Jumlah Kamar:</label>
                    <input type="text" id="kamar" name="kamar" value="<?= old('kamar') ?>" required>
                </div>

                <div class="input-field">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" value="<?= old('alamat') ?>" required>
                </div>

                <div class="input-field">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi"><?= old('deskripsi') ?></textarea>
                </div>

                <div class="input-field">
                    <label for="harga">Harga:</label>
                    <input type="text" id="harga" name="harga" value="<?= old('harga') ?>" required>
                </div>

                <div class="input-field">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="Tersedia" <?= old('status') == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                        <option value="Tidak Tersedia" <?= old('status') == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
                    </select>
                </div>

                <button type="submit">Tambah</button>
            </form>
        </div>
    </main>
</body>
</html>
