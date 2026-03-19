<?php
require_once '../includes/db_connect.php';
include 'includes/header.php';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shop_name = $_POST['shop_name'];
    $currency_symbol = $_POST['currency_symbol'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $shop_hours = $_POST['shop_hours'];
    $about = $_POST['about'];

    $stmt = $conn->prepare("UPDATE settings SET shop_name=?, currency_symbol=?, contact_email=?, contact_phone=?, shop_hours=?, about=? WHERE id = 1");
    if ($stmt->execute([$shop_name, $currency_symbol, $contact_email, $contact_phone, $shop_hours, $about])) {
        $success = "Settings updated successfully.";
    } else {
        $error = "Something went wrong.";
    }
}

// Fetch existing settings
$settings = $conn->query("SELECT * FROM settings WHERE id = 1")->fetch();
?>

<h2>Shop Settings</h2>

<?php if ($success) echo "<div class='alert alert-success'>$success</div>"; ?>
<?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">
  <div class="mb-3">
    <label>Shop Name</label>
    <input type="text" name="shop_name" class="form-control" value="<?= htmlspecialchars($settings['shop_name']) ?>" required>
  </div>
  <div class="mb-3">
    <label>Currency Symbol</label>
    <input type="text" name="currency_symbol" class="form-control" value="<?= htmlspecialchars($settings['currency_symbol']) ?>" required>
  </div>
  <div class="mb-3">
    <label>Contact Email</label>
    <input type="email" name="contact_email" class="form-control" value="<?= htmlspecialchars($settings['contact_email']) ?>">
  </div>
  <div class="mb-3">
    <label>Contact Phone</label>
    <input type="text" name="contact_phone" class="form-control" value="<?= htmlspecialchars($settings['contact_phone']) ?>">
  </div>
  <div class="mb-3">
    <label>Shop Hours</label>
    <input type="text" name="shop_hours" class="form-control" value="<?= htmlspecialchars($settings['shop_hours']) ?>">
  </div>
  <div class="mb-3">
    <label>About Message</label>
    <textarea name="about" class="form-control" rows="3"><?= htmlspecialchars($settings['about']) ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Settings</button>
</form>

<?php include 'includes/footer.php'; ?>
