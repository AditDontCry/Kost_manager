<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?= base_url('css/profile_style.css'); ?>">

    <style>
        /* Common styles for profile pages */
        .profile,
        .profile-edit {
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .profile-edit h1 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <?= $this->include('dashboard/navbar'); ?>
    <main>
        <div class="profile-edit">
            <h1>Edit Profile</h1>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <p><?= esc($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('update_profile') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="<?= esc($nama) ?>" required>
                </div>

                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?= esc($nomor_telepon) ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" required><?= esc($alamat) ?></textarea>
                </div>

                <button type="submit" class="btn-primary">Update Profile</button>
            </form>

            <a href="<?= site_url('profile') ?>" class="btn-primary" style="background-color: #721c24; margin-top: 10px;">Back to Profile</a>
        </div>
    </main>
</body>

</html>