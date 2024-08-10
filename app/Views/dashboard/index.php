<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard_style.css'); ?>">
    <style>
        /* dashboard_style.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
        }

        .card-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            text-align: center;
        }

        .card h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .card p {
            font-size: 2rem;
            color: #666;
        }
    </style>

     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .profile-header {
            background: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .profile-content {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-content h1 {
            margin-top: 0;
        }
        .profile-content table {
            width: 100%;
            border-collapse: collapse;
        }
        .profile-content table th, .profile-content table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .profile-content table th {
            background: #f4f4f4;
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
            margin: 10px 0;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php echo $this->include('dashboard/navbar'); ?>
    <main>
        <div class="overview">
            <h1>Welcome to the Dashboard</h1>
            <p>Welcome, <?= session()->get('user_name'); ?></p>
        </div>

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

        <div class="card-container">
            <div class="card">
                <h2>Total Kos</h2>
                <p> <?= $totalKos; ?></p>
            </div>
            <div class="card">
                <h2>Total Kamar</h2>
                <p> <?= $totalKamar ?> </p>
            </div>
            <div class="card">
                <h2>Total Pendapatan</h2>
                <p> Rp.<?= $pendapatan ?>
                <p>
            </div>
        </div>
    </main>

</body>

</html>