<?php
// Include database connection
require_once __DIR__ . '/../../db/db.php';
try {
    // Fetch hospitals
    $stmt = $conn->query("SELECT * FROM hospitals ORDER BY created_at DESC");
    $hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching hospitals: " . $e->getMessage();
    exit();
}
?>