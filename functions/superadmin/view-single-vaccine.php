<?php
require_once __DIR__ . '/../../db/db.php';

function getVaccineById($id) {
    global $conn;

    if (!is_numeric($id)) return null;

    try {
        $stmt = $conn->prepare("SELECT * FROM vaccines WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Fetch vaccine failed: " . $e->getMessage());
        return null;
    }
}
?>
