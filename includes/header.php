<?php
// Fetch settings from DB to show shop name
require_once 'db_connect.php';
$settings = $conn->query("SELECT * FROM settings WHERE id = 1")->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($settings['shop_name']) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php"><?= htmlspecialchars($settings['shop_name']) ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
