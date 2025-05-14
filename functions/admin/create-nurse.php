<?php
require_once __DIR__ . '/../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $license_number = $_POST['license_number'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $specialization = $_POST['specialization'] ?? '';
    $hospital_id = $_POST['hospital_id'] ?? null;

    if (empty($name) || empty($email) || empty($password) || empty($hospital_id)) {
        die('Required fields are missing.');
    }

    try {
        $stmt = $conn->prepare("
            INSERT INTO users (
                name, email, password, role, hospital_id, license_number, phone_number, specialization
            ) VALUES (
                :name, :email, :password, 'nurse', :hospital_id, :license_number, :phone_number, :specialization
            )
        ");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':hospital_id' => $hospital_id,
            ':license_number' => $license_number ?: null,
            ':phone_number' => $phone_number ?: null,
            ':specialization' => $specialization ?: null
        ]);

        header("Location: ../../admin/view_nurses.php?created=1");
        exit;
    } catch (PDOException $e) {
        error_log("Create nurse error: " . $e->getMessage());
        header("Location: ../../admin/create_nurse.php?error=1");
        exit;
    }
} else {
    header("Location: ../../admin/create_nurse.php");
    exit;
}
?>
