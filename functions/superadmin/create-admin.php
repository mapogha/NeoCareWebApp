<?php
require_once __DIR__ . '/../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $hospital_id = !empty($_POST['hospital_id']) ? (int) $_POST['hospital_id'] : null;
    $phone_number = trim($_POST['phone_number']);
    $is_active = 1;

    try {
        $stmt = $conn->prepare("INSERT INTO users 
            (name, email, password, role, hospital_id, phone_number, is_active, created_at)
            VALUES (:name, :email, :password, :role, :hospital_id, :phone_number, :is_active, NOW())");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':hospital_id', $hospital_id, PDO::PARAM_INT);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':is_active', $is_active, PDO::PARAM_BOOL);

        $stmt->execute();
        header('Location: ../../superadmin/view_admins.php?created=1');
        exit;
    } catch (PDOException $e) {
        error_log('Admin insert error: ' . $e->getMessage());
        header('Location: ../../superadmin/view_admins.php?error=insert_failed');
        exit;
    }
}
?>
