<?php
session_start();
require_once '../includes/db_connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Safely get POST data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($email === '' || $password === '') {
        $error = "Please enter both email and password.";
    } else {
        // Prepare and execute query to fetch admin by email
        $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin) {
            // Verify password hash
            if (password_verify($password, $admin['password_hash'])) {
                // Password correct, set session and redirect
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_email'] = $admin['email'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login | Scoopy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <style>
    body {
      background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      width: 480px;
      text-align: center;
    }
    .login-container h2 {
      margin-bottom: 1.5rem;
      font-weight: 700;
      color: #333;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn-primary {
      border-radius: 8px;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
    }
    .error-msg {
      color: #dc3545;
      margin-bottom: 1rem;
      font-weight: 500;
    }
    .brand-logo {
      font-size: 2rem;
      font-weight: 700;
      color: #0d6efd;
      margin-bottom: 1rem;
      user-select: none;
      letter-spacing: 2px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="brand-logo">
  <img src="assets/admin_logo/logo.png" alt="Scoopy Logo" style="width: 150px; user-select: none;" />
</div>
    <h2>Frederiksberg Ishus</h2>

    <?php if ($error): ?>
      <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3 text-start">
        <label for="email" class="form-label">Email address</label>
        <input
          type="email"
          id="email"
          name="email"
          class="form-control"
          placeholder="admin@example.com"
          required
          value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"
        />
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          class="form-control"
          placeholder="Enter your password"
          required
        />
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>
</html>
