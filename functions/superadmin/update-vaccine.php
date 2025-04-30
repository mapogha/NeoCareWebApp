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

function updateVaccineById($id, $data) {
    global $conn;

    try {
        $stmt = $conn->prepare("UPDATE vaccines SET 
            vaccine_name = :vaccine_name,
            child_age = :child_age,
            vaccine_type = :vaccine_type,
            description = :description,
            recommended_dose = :recommended_dose,
            side_effects = :side_effects,
            is_mandatory = :is_mandatory,
            updated_at = CURRENT_TIMESTAMP
            WHERE id = :id");

        $stmt->bindParam(':vaccine_name', $data['vaccine_name']);
        $stmt->bindParam(':child_age', $data['child_age']);
        $stmt->bindParam(':vaccine_type', $data['vaccine_type']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':recommended_dose', $data['recommended_dose']);
        $stmt->bindParam(':side_effects', $data['side_effects']);
        $stmt->bindParam(':is_mandatory', $data['is_mandatory'], PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
        header('Location: ../../superadmin/view_vaccines.php');
    } catch (PDOException $e) {
        error_log("Update vaccine failed: " . $e->getMessage());
        return false;
    }
}
?>
