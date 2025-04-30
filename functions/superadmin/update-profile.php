<?php
require_once __DIR__ . '/../../db/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $address = trim($_POST['address']);
    $ward = trim($_POST['ward']);
    $street = trim($_POST['street']);
    $street_chairman_name = trim($_POST['street_chairman_name']);
    $license_number = trim($_POST['license_number']);
    $specialization = trim($_POST['specialization']);

    try {
        $stmt = $conn->prepare("UPDATE users SET
            name = :name,
            email = :email,
            phone_number = :phone_number,
            address = :address,
            ward = :ward,
            street = :street,
            street_chairman_name = :street_chairman_name,
            license_number = :license_number,
            specialization = :specialization,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = :id");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':ward', $ward);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':street_chairman_name', $street_chairman_name);
        $stmt->bindParam(':license_number', $license_number);
        $stmt->bindParam(':specialization', $specialization);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: ../profile.php?updated=1");
        exit;
    } catch (PDOException $e) {
        error_log("Profile update failed: " . $e->getMessage());
        header("Location: ../profile.php?error=update_failed");
        exit;
    }
}
?>
