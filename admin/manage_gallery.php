<?php
require_once '../includes/db_connect.php';
include 'includes/header.php';

$msg = "";

// ✅ Handle deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("SELECT image_path FROM gallery WHERE id = ?");
    $stmt->execute([$id]);
    $image = $stmt->fetch();

    if ($image) {
        $filePath = "../uploads/gallery_image/" . $image['image_path'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $delStmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
        $delStmt->execute([$id]);
        $msg = "🗑️ Image deleted successfully.";
    } else {
        $msg = "⚠️ Image not found.";
    }
}

// ✅ Handle upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $caption = trim($_POST['caption']);
    $file = $_FILES['image'];

    $uploadDir = "../uploads/gallery_image/";
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];

    if (in_array($file['type'], $allowedTypes)) {
        $filename = strtolower(preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', basename($file['name'])));
        $targetPath = $uploadDir . $filename;

        if (!file_exists($targetPath)) {
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $stmt = $conn->prepare("INSERT INTO gallery (image_path, caption) VALUES (?, ?)");
                $stmt->execute([$filename, $caption]);
                $msg = "✅ Image uploaded successfully!";
            } else {
                $msg = "❌ Failed to move uploaded file.";
            }
        } else {
            $msg = "⚠️ File already exists.";
        }
    } else {
        $msg = "❌ Invalid file type. Only JPG, PNG, or WEBP allowed.";
    }
}

$gallery = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Gallery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .gallery-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">📸 Manage Gallery</h2>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <input type="file" name="image" class="form-control" required accept="image/*">
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption (optional)</label>
            <input type="text" name="caption" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div class="row">
        <?php foreach ($gallery as $img): ?>
            <div class="col-md-3 col-sm-6 mb-4 text-center">
                <img src="../uploads/gallery_image/<?= htmlspecialchars($img['image_path']) ?>"
                     alt="<?= htmlspecialchars($img['caption']) ?>"
                     class="gallery-img">
                <p class="mt-2 small"><?= htmlspecialchars($img['caption']) ?></p>
                <a href="?delete=<?= $img['id'] ?>" 
                   onclick="return confirm('Are you sure you want to delete this image?')"
                   class="btn btn-sm btn-danger">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
