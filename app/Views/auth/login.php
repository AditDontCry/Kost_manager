<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div class="wrapper">
    <form action="<?= site_url('auth/authenticate') ?>" method="post">
      <h2>Login</h2>
      <?php if (session()->getFlashdata('errors')): ?>
        <div class="errors">
          <?= session()->getFlashdata('errors') ?>
        </div>
      <?php endif; ?>
      <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember" name="remember">
          <p>Remember me</p>
        </label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="<?= site_url('register') ?>">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
