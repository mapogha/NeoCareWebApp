<?php
require_once __DIR__ . '/../../db/db.php'; // Adjust the path as needed

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid child ID.');
}

$child_id = (int)$_GET['id'];

try {
    $stmt = $conn->prepare("SELECT c.*, h.hospital_name AS hospital_name FROM children c LEFT JOIN hospitals h ON c.hospital_id = h.id WHERE c.id = :id");
    $stmt->execute([':id' => $child_id]);
    $child = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$child) {
        die('Child not found.');
    }
} catch (PDOException $e) {
    error_log('Error fetching child: ' . $e->getMessage());
    die('An error occurred while retrieving the child details.');
}
?>
