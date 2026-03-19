<?php
require_once '../includes/db_connect.php';
include '../includes/header.php';

// Fetch all gallery images
$gallery = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery - Ice Cream Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <style>
        html, body {
            height: 100%;
        }
        .gallery-container {
            padding: 40px 20px;
        }
        .gallery-img {
            border-radius: 12px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .gallery-img:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <main class="flex-grow-1">
        <div class="container gallery-container">
            <h2 class="text-center mb-5">🍦 Our Gallery</h2>
            <div class="row">
                <?php if ($gallery): ?>
                    <?php foreach ($gallery as $img): ?>
                        <div class="col-md-3 col-sm-6 mb-4 text-center">
                            <img src="../uploads/gallery_image/<?= htmlspecialchars($img['image_path']) ?>" 
                                 alt="<?= htmlspecialchars($img['caption']) ?>" 
                                 class="img-fluid gallery-img">
                            <?php if (!empty($img['caption'])): ?>
                                <p class="mt-2 text-muted small"><?= htmlspecialchars($img['caption']) ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No images found in the gallery.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>

</body>
</html>
