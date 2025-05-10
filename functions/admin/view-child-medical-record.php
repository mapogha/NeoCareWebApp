<?php
require_once __DIR__ . '/../../db/db.php';

$child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$child_stmt = $conn->prepare("SELECT * FROM children WHERE id = :id");
$child_stmt->execute([':id' => $child_id]);
$child = $child_stmt->fetch(PDO::FETCH_ASSOC);

$records_stmt = $conn->prepare("
    SELECT cmr.*, v.vaccine_name 
    FROM child_medical_records cmr 
    JOIN vaccines v ON cmr.vaccine_id = v.id 
    WHERE cmr.child_id = :id 
    ORDER BY cmr.vaccination_date DESC
");
$records_stmt->execute([':id' => $child_id]);
$records = $records_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
