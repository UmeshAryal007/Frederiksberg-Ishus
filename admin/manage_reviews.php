<?php
require_once '../includes/db_connect.php';
include 'includes/header.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->execute([$id]);
    $success = "Review deleted successfully.";
}

// Fetch all reviews
$reviews = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC")->fetchAll();
?>

<h2>Manage Customer Reviews</h2>

<?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>

<table class="table table-bordered">
  <thead class="table-light">
    <tr>
      <th>Customer</th>
      <th>Rating</th>
      <th>Comment</th>
      <th>Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reviews as $review): ?>
    <tr>
      <td><?= htmlspecialchars($review['customer_name']) ?></td>
      <td>
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <?= $i <= $review['rating'] ? '⭐' : '☆' ?>
        <?php endfor; ?>
      </td>
      <td><?= nl2br(htmlspecialchars($review['comment'])) ?></td>
      <td><?= $review['created_at'] ?></td>
      <td>
        <a href="?delete=<?= $review['id'] ?>" onclick="return confirm('Delete this review?')" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include 'includes/footer.php'; ?>
