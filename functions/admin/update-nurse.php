<?php
require_once '../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $address = $_POST['address'] ?? '';
    $ward = $_POST['ward'] ?? '';
    $street = $_POST['street'] ?? '';
    $street_chairman_name = $_POST['street_chairman_name'] ?? '';
    $specialization = $_POST['specialization'] ?? '';
    $license_number = $_POST['license_number'] ?? '';
    $hospital_id = $_POST['hospital_id'] ?? null;

    if (!$id || !$name || !$email) {
        die('Missing required fields.');
    }

    try {
        $stmt = $conn->prepare("UPDATE users SET 
            name = :name,
            email = :email,
            phone_number = :phone_number,
            address = :address,
            ward = :ward,
            street = :street,
            street_chairman_name = :street_chairman_name,
            specialization = :specialization,
            license_number = :license_number,
            hospital_id = :hospital_id
            WHERE id = :id AND role = 'nurse'
        ");

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone_number' => $phone_number,
            ':address' => $address,
            ':ward' => $ward,
            ':street' => $street,
            ':street_chairman_name' => $street_chairman_name,
            ':specialization' => $specialization,
            ':license_number' => $license_number,
            ':hospital_id' => $hospital_id,
            ':id' => $id
        ]);

        header('Location: ../../admin/view_nurses.php?success=1');
        exit;
    } catch (PDOException $e) {
        error_log('Error updating nurse: ' . $e->getMessage());
        die('An error occurred while updating the nurse.');
    }
} else {
    header('Location: ../../admin/view_nurses.php');
    exit;
}
?>
