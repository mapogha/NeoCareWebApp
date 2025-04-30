<?php
require_once __DIR__ . '/../../db/db.php'; // Database connection

function getHospitalById($id) {
    global $conn;

    if (!is_numeric($id)) {
        return null;
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM hospitals WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching hospital: " . $e->getMessage());
        return null;
    }
}

function updateHospital($id, $data) {
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE hospitals SET 
            hospital_name = :hospital_name,
            hospital_email = :hospital_email,
            region = :region,
            district = :district,
            phone_number = :phone_number,
            hospital_address = :hospital_address,
            license_number = :license_number,
            website = :website
            WHERE id = :id
        ");

        $stmt->bindParam(':hospital_name', $data['hospital_name']);
        $stmt->bindParam(':hospital_email', $data['hospital_email']);
        $stmt->bindParam(':region', $data['region']);
        $stmt->bindParam(':district', $data['district']);
        $stmt->bindParam(':phone_number', $data['phone_number']);
        $stmt->bindParam(':hospital_address', $data['hospital_address']);
        $stmt->bindParam(':license_number', $data['license_number']);
        $stmt->bindParam(':website', $data['website']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
        header('Location: ../../superadmin/view_hospitals.php');
        exit();
    } catch (PDOException $e) {
        error_log("Error updating hospital: " . $e->getMessage());
        return false;
    }
}
?>
