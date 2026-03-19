<?php
require_once '../includes/db_connect.php';
include 'includes/header.php';

// Handle delete
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$deleteId]);
    header("Location: contact_messages.php?deleted=1");
    exit();
}

// Fetch messages
$messages = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Messages | Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .table-wrapper {
      max-height: 85vh;
      overflow-y: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-4">📬 Contact Messages</h2>

    <?php if (isset($_GET['deleted'])): ?>
      <div class="alert alert-success">✅ Message deleted successfully.</div>
    <?php endif; ?>

    <?php if (count($messages) === 0): ?>
      <div class="alert alert-info">No messages submitted yet.</div>
    <?php else: ?>
      <div class="table-responsive table-wrapper">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($messages as $i => $msg): ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($msg['name']) ?></td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= htmlspecialchars($msg['phone']) ?: '-' ?></td>
                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                <td><?= date("d M, Y h:i A", strtotime($msg['submitted_at'])) ?></td>
                <td>
                  <a href="?delete=<?= $msg['id'] ?>"
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
