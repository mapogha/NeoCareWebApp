<?php
require_once __DIR__ . '/../../db/db.php';

function fetchAdmins() {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT u.id, u.name, u.email, u.role, u.phone_number, h.hospital_name
            FROM users u
            LEFT JOIN hospitals h ON u.hospital_id = h.id
            WHERE u.role = 'hospital_admin'
            ORDER BY u.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Fetch admins error: ' . $e->getMessage());
        return [];
    }
}
?>
