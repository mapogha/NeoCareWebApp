<?php
require_once __DIR__ . '/../../db/db.php';

function fetchVaccines() {
    global $conn;

    try {
        $stmt = $conn->query("SELECT * FROM vaccines ORDER BY child_age ASC, vaccine_name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Fetch vaccines failed: " . $e->getMessage());
        return [];
    }
}
?>
