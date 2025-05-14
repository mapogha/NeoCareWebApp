<?php
require_once __DIR__ . '/../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $hospital_id = $_POST['hospital_id'] ?? null;
    $license_number = $_POST['license_number'] ?? null;
    $phone_number = $_POST['phone_number'] ?? null;
    $specialization = $_POST['specialization'] ?? null;

    if (empty($name) || empty($email) || empty($password) || empty($hospital_id)) {
        die('Required fields are missing.');
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("
            INSERT INTO users (
                name, email, password, role, hospital_id,
                license_number, phone_number, specialization
            ) VALUES (
                :name, :email, :password, 'doctor', :hospital_id,
                :license_number, :phone_number, :specialization
            )
        ");

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':hospital_id' => $hospital_id,
            ':license_number' => $license_number,
            ':phone_number' => $phone_number,
            ':specialization' => $specialization
        ]);

        header('Location: ../../admin/view_doctors.php?success=1');
        exit;
    } catch (PDOException $e) {
        error_log('Error creating doctor: ' . $e->getMessage());
        header('Location: ../../admin/create_doctor.php?error=1');
        exit;
    }
} else {
    header('Location: ../../admin/create_doctor.php');
    exit;
}
