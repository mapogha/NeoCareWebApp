<?php
session_start();

// Include database connection
require_once '../../db/db.php'; // $conn is your PDO connection

if (isset($_POST['submit'])) {
    try {
        // Prepare an insert statement
        $stmt = $conn->prepare("INSERT INTO hospitals 
            (hospital_name, hospital_address, phone_number, hospital_email, region, district, license_number, website) 
            VALUES (:hospital_name, :hospital_address, :phone_number, :hospital_email, :region, :district, :license_number, :website)");

        // Bind parameters
        $stmt->bindParam(':hospital_name', $_POST['hospital_name']);
        $stmt->bindParam(':hospital_address', $_POST['hospital_address']);
        $stmt->bindParam(':phone_number', $_POST['phone_number']);
        $stmt->bindParam(':hospital_email', $_POST['hospital_email']);
        $stmt->bindParam(':region', $_POST['region']);
        $stmt->bindParam(':district', $_POST['district']);
        $stmt->bindParam(':license_number', $_POST['license_number']);
        $stmt->bindParam(':website', $_POST['website']);

        // Execute the statement
        $stmt->execute();

        // Redirect to view hospitals page
        header('Location: ../../superadmin/view_hospitals.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
