<?php
require_once __DIR__ . '/../../db/db.php'; // Ensure this path is correct

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
?>
