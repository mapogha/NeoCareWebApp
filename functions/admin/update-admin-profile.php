<?php
require_once '../../db/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_SESSION['user_id'] ?? null;
    if (!$admin_id) {
        die('Access denied.');
    }

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $address = $_POST['address'] ?? '';
    $ward = $_POST['ward'] ?? '';
    $street = $_POST['street'] ?? '';
    $street_chairman_name = $_POST['street_chairman_name'] ?? '';

    try {
        $stmt = $conn->prepare("UPDATE users SET
            name = :name,
            email = :email,
            phone_number = :phone_number,
            address = :address,
            ward = :ward,
            street = :street,
            street_chairman_name = :street_chairman_name
            WHERE id = :id AND role = 'hospital_admin'");

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone_number' => $phone_number,
            ':address' => $address,
            ':ward' => $ward,
            ':street' => $street,
            ':street_chairman_name' => $street_chairman_name,
            ':id' => $admin_id
        ]);

        header('Location: ../../admin/profile.php?success=1');
        exit;
    } catch (PDOException $e) {
        error_log('Admin update failed: ' . $e->getMessage());
        header('Location: ../../admin/profile.php?error=1');
        exit;
    }
} else {
    header('Location: ../../admin/profile.php');
    exit;
}
