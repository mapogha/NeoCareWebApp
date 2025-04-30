<?php
require_once __DIR__ . '/../../db/db.php';
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid admin ID.');
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id AND role = 'hospital_admin'");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['user_name'] = $user['name'];

    header('Location: ../../admin/dashboard.php');
    exit;
} else {
    die('Admin not found or invalid role.');
}
