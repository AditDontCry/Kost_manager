<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Home</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard_style.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>

<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="<?= base_url('css/images/logo.jpg'); ?>" alt="logo">
            <h2>Dashboard</h2>
        </div>
        <ul class="links">
            <li><span class="material-symbols-outlined">dashboard</span><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
            <h4>Kost</h4>
            <li><span class="material-symbols-outlined">
                    night_shelter
                </span> <a href="<?= site_url('list_kost'); ?>">Manage Kost</a></li>
            <hr>

            <h4>Account</h4>
            <li><span class="material-symbols-outlined">
                    manage_accounts
                </span><a href="<?= site_url('profile'); ?>">Profile</a></li>
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a href="<?= site_url('logout'); ?>">Logout</a></li>
        </ul>
    </aside>
</body>

</html>