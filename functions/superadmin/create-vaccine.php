<?php
require_once __DIR__ . '/../../db/db.php'; // Ensure $conn is your PDO connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vaccine_name = $_POST['vaccine_name'] ?? '';
    $child_age = $_POST['child_age'] ?? '';
    $vaccine_type = $_POST['vaccine_type'] ?? '';
    $description = $_POST['description'] ?? '';
    $recommended_dose = $_POST['recommended_dose'] ?? null;
    $side_effects = $_POST['side_effects'] ?? '';
    $is_mandatory = isset($_POST['is_mandatory']) ? (int)$_POST['is_mandatory'] : 1;

    try {
        $stmt = $conn->prepare("INSERT INTO vaccines 
            (vaccine_name, child_age, vaccine_type, description, recommended_dose, side_effects, is_mandatory)
            VALUES (:vaccine_name, :child_age, :vaccine_type, :description, :recommended_dose, :side_effects, :is_mandatory)");

        $stmt->bindParam(':vaccine_name', $vaccine_name);
        $stmt->bindParam(':child_age', $child_age);
        $stmt->bindParam(':vaccine_type', $vaccine_type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':recommended_dose', $recommended_dose);
        $stmt->bindParam(':side_effects', $side_effects);
        $stmt->bindParam(':is_mandatory', $is_mandatory, PDO::PARAM_BOOL);

        $stmt->execute();

        // Redirect after success
        header('Location: ../../superadmin/view_vaccines.php?created=1');
        exit;
    } catch (PDOException $e) {
        error_log("Vaccine insert failed: " . $e->getMessage());
        header('Location: ../../superadmin/view_vaccines.php?error=insert_failed');
        exit;
    }
}
?>
