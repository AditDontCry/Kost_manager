<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div class="wrapper">
    <form action="<?= site_url('auth/store') ?>" method="post">
      <h2>Register</h2>
      <?php if (session()->getFlashdata('errors')): ?>
        <div class="errors">
          <?= session()->getFlashdata('errors') ?>
        </div>
      <?php endif; ?>
      <div class="input-field">
        <input type="text" name="nama" required>
        <label>Enter your name</label>
      </div>
      <div class="input-field">
        <input type="email" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="input-field">
        <input type="text" name="nomor_telepon" required>
        <label>Enter your phone number</label>
      </div>
      <div class="input-field">
        <textarea name="alamat" required></textarea>
        <label>Enter your address</label>
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>Already have an account? <a href="<?= site_url('login') ?>">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
