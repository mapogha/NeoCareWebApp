<?php
require_once __DIR__ . '/../../db/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../../superadmin/view_vaccinations.php?error=invalid_id");
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM vaccines WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../../superadmin/view_vaccines.php?deleted=1");
    exit;
} catch (PDOException $e) {
    error_log("Delete vaccine error: " . $e->getMessage());
    header("Location: ../../superadmin/view_vaccines.php?error=delete_failed");
    exit;
}
?>
