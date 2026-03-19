<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<a href="logout.php" class="btn btn-outline-light btn-sm ms-2">Logout</a>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
 


  
  

  <style>
    body {
      display: flex;
      min-height: 100vh;
      margin: 0;
    }
    .sidebar {
      width: 220px;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
      position: fixed;
      height: 100%;
    }
    .sidebar a {
      color: white;
      padding: 10px 20px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h4 class="text-center">Frederiksberg Ishus</h4>
  <a href="dashboard.php">Dashboard</a>
  <a href="manage_gallery.php">Manage Gallery</a>
  <a href="manage_reviews.php">Manage Reviews</a>
   <a href="contact_messages.php">Contact Messages</a>
  <a href="settings.php">Settings</a>
  <a href="logout.php" class="text-danger">Logout</a>
</div>

<div class="content">
