<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kos</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard_style.css'); ?>">
    <style>
        .add-new-container {
            margin-bottom: 20px;
            text-align: right;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-form,
        .del-form {
            text-decoration: none;
            display: inline-block;
            padding: 5px 10px;
            font-size: 16px;
            text-align: center;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .edit-form {
            background-color: #007bff;
        }

        .edit-form:hover {
            background-color: #0056b3;
        }

        .del-form {
            background-color: red;
        }

        .del-form:hover {
            background-color: darkred;
        }

        .edit-form a,
        .del-form a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <?= $this->include('dashboard/navbar'); ?>
    <main>
        <div class="overview">
            <h1>Daftar Kos</h1>
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
            <!-- Add New Button -->
            <div class="add-new-container">
                <a href="<?= site_url('tambah_kost') ?>" class="btn btn-primary"> + Add New</a>
            </div>
            <div class="card-container">
                <?php if (!empty($tempat_kos)) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kos</th>
                                <th>Jumlah Kamar</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; // Inisialisasi variabel $i 
                            ?>
                            <?php foreach ($tempat_kos as $kos) : ?>
                                <tr>
                                    <td><?= $i ?></td> <!-- Menampilkan nomor urut -->
                                    <td><?= esc($kos['nama_tempat_kos']) ?></td>
                                    <td><?= esc($kos['kamar']) ?></td>
                                    <td><?= esc($kos['alamat']) ?></td>
                                    <td><?= esc($kos['deskripsi']) ?></td>
                                    <td><?= esc(format_rupiah($kos['harga']))?></td>
                                    <td><?= esc($kos['status']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <div class="edit-form">
                                                <a href="<?= site_url('edit_kost/' . $kos['id']) ?>">Edit</a>
                                            </div>
                                            <div class="del-form">
                                                <a href="<?= site_url('delete_kost/' . $kos['id']) ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; // Increment variabel $i 
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No data available.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>