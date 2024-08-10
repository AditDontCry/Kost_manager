<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        .profile h1,
        .profile-edit h1 {
            margin-bottom: 20px;
        }

        .profile-details p,
        .profile-edit .form-group {
            margin-bottom: 15px;
        }

        .profile-details p strong {
            display: inline-block;
            width: 150px;
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
        <div class="profile">
            <h1>Profile</h1>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <div class="profile-details">
                <p><strong>Nama:</strong> <?= esc($nama) ?></p>
                <p><strong>Nomor Telepon:</strong> <?= esc($nomor_telepon) ?></p>
                <p><strong>Alamat:</strong> <?= esc($alamat) ?></p>
            </div>
            <a href="<?= site_url('edit_profile') ?>" class="btn btn-primary">Edit Profile</a>
        </div>
    </main>
</body>

</html>