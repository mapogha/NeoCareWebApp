<?php
require_once '../db/db.php'; // Ensure this provides $conn as a PDO instance

function viewDoctors() {
    global $conn;

    $sql = "SELECT 
                u.id, u.name, u.email, u.phone_number, u.specialization, 
                h.hospital_name 
            FROM users u 
            LEFT JOIN hospitals h ON u.hospital_id = h.id 
            WHERE u.role = 'doctor'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
