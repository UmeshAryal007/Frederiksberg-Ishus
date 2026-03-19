<?php
require_once '../includes/db_connect.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message']);
$errors = [];

// Basic validation
if (empty($name) || empty($email) || empty($message)) {
    $errors[] = "Please fill out all required fields.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (count($errors) === 0) {
    try {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message]);
        header("Location: contact.php?success=1");
        exit();
    } catch (Exception $e) {
        header("Location: contact.php?error=1");
        exit();
    }
} else {
    header("Location: contact.php?error=1");
    exit();
}
