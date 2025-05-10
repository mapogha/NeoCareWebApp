<?php
require_once __DIR__ . '/../../db/db.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $child_id = isset($_POST['child_id']) ? (int)$_POST['child_id'] : 0;
    $vaccination_date = $_POST['vaccination_date'] ?? null;
    $vaccine_id = isset($_POST['vaccine_id']) ? (int)$_POST['vaccine_id'] : 0;
    $age = isset($_POST['age']) ? (int)$_POST['age'] : null;
    $weight = isset($_POST['weight']) ? (float)$_POST['weight'] : null;
    $height = isset($_POST['height']) ? (float)$_POST['height'] : null;
    $observations = $_POST['observations'] ?? null;

    // Basic validation
    if ($child_id && $vaccination_date && $vaccine_id) {
        try {
            $stmt = $conn->prepare("
                INSERT INTO child_medical_records 
                (child_id, vaccination_date, vaccine_id, age, weight, height, observations)
                VALUES 
                (:child_id, :vaccination_date, :vaccine_id, :age, :weight, :height, :observations)
            ");
            $stmt->execute([
                ':child_id' => $child_id,
                ':vaccination_date' => $vaccination_date,
                ':vaccine_id' => $vaccine_id,
                ':age' => $age,
                ':weight' => $weight,
                ':height' => $height,
                ':observations' => $observations
            ]);

            // Redirect to the view page after successful insertion
            header("Location: ../../admin/view_children.php");
            exit();
        } catch (PDOException $e) {
            error_log('Database Insertion Error: ' . $e->getMessage());
            die('An error occurred while saving the medical record.');
        }
    } else {
        die('Required fields are missing.');
    }
} else {
    die('Invalid request method.');
}
?>
