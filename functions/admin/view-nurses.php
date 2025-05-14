<?php

require_once __DIR__ . '/../../db/db.php';

function viewNurses() {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT u.id, u.name, u.email, u.phone_number, u.specialization, h.hospital_name
            FROM users u
            LEFT JOIN hospitals h ON u.hospital_id = h.id
            WHERE u.role = 'nurse'
            ORDER BY u.name ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("View nurses error: " . $e->getMessage());
        return [];
    }
}
?>
