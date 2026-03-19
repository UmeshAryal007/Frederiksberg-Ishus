<?php
require_once '../includes/db_connect.php';
include '../includes/header.php';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $rating = intval($_POST['rating']);
    $comment = trim($_POST['comment']);

    if ($name && $rating >= 1 && $rating <= 5) {
        // Since item_id is foreign key, pass NULL (shop-wide review)
        $stmt = $conn->prepare("INSERT INTO reviews (customer_name, item_id, rating, comment, is_shop_review, created_at) VALUES (?, NULL, ?, ?, 1, NOW())");
        $stmt->execute([$name, $rating, $comment]);

        $success = "🍨 Thank you! Your review has been submitted.";
    } else {
        $error = "⚠️ Please fill out all fields and select a valid rating.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Leave a Review | Scoopy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <style>
    .review-box {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 20px;
      padding: 40px;
      max-width: 550px;
      width: 80%;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
    }
    .form-label i {
      color: #ff4081;
      margin-right: 5px;
    }
    .btn-primary {
      background-color: #ff4081;
      border: none;
    }
    .btn-primary:hover {
      background-color: #e73370;
    }
  </style>
</head>
<body style="background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
  <div class="container" style="margin-top: 80px; margin-bottom: 100px;">
    <div class="review-box mx-auto shadow p-4 rounded" style="max-width: 600px;">
      <h2 class="text-center mb-4">🍦 Share Your Scoopy Experience</h2>

      <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" novalidate>
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person-circle"></i> Your Name</label>
          <input type="text" name="name" class="form-control" placeholder="E.g. Sarah" required>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="bi bi-star-fill"></i> Rating</label>
          <select name="rating" class="form-select" required>
            <option value="">-- Choose Stars --</option>
            <option value="5">⭐️⭐️⭐️⭐️⭐️ (Excellent)</option>
            <option value="4">⭐️⭐️⭐️⭐️ (Good)</option>
            <option value="3">⭐️⭐️⭐️ (Okay)</option>
            <option value="2">⭐️⭐️ (Poor)</option>
            <option value="1">⭐️ (Bad)</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="bi bi-chat-left-text"></i> Comment (optional)</label>
          <textarea name="comment" class="form-control" rows="4" placeholder="What did you like or dislike?"></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Review</button>
      </form>
    </div>
  </div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
