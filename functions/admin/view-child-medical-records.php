<?php
require_once __DIR__ . '/../../db/db.php'; // Adjust the path as needed

$child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$child_id) {
    die('Child ID is required.');
}

try {
    // Fetch child basic info
    $child_stmt = $conn->prepare("SELECT child_name FROM children WHERE id = :id");
    $child_stmt->execute([':id' => $child_id]);
    $child = $child_stmt->fetch(PDO::FETCH_ASSOC);

    if (!$child) {
        die("Child not found.");
    }

    // Fetch child's health records
    $records_stmt = $conn->prepare("
        SELECT cmr.*, v.vaccine_name
        FROM child_medical_records cmr
        JOIN vaccines v ON cmr.vaccine_id = v.id
        WHERE cmr.child_id = :child_id
        ORDER BY cmr.vaccination_date DESC
    ");
    $records_stmt->execute([':child_id' => $child_id]);
    $records = $records_stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Error fetching records: " . $e->getMessage());
    die("An error occurred while retrieving the child's health records.");
}
?>