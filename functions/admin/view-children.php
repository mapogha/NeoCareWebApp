<?php
require_once __DIR__ . '/../../db/db.php';

function fetchChildren() {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT c.*, h.hospital_name, u.name AS parent_name
            FROM children c
            LEFT JOIN hospitals h ON c.hospital_id = h.id
            LEFT JOIN users u ON c.parent_id = u.id
            ORDER BY c.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Fetch children error: ' . $e->getMessage());
        return [];
    }
}
?>
