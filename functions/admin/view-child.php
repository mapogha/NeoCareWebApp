<?php
require_once __DIR__ . '/../../db/db.php';

function getChildById($id) {
    global $conn;

    if (!is_numeric($id)) {
        return null;
    }

    try {
        $stmt = $conn->prepare("
            SELECT c.*, h.hospital_name, u.name AS parent_name
            FROM children c
            LEFT JOIN hospitals h ON c.hospital_id = h.id
            LEFT JOIN users u ON c.parent_id = u.id
            WHERE c.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Error fetching child: ' . $e->getMessage());
        return null;
    }
}
