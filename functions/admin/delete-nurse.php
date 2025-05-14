<?php
require_once '../../db/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid nurse ID.');
}

$nurse_id = (int)$_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id AND role = 'nurse'");
    $stmt->execute([':id' => $nurse_id]);

    header('Location: ../../admin/view_nurses.php?deleted=1');
    exit;
} catch (PDOException $e) {
    error_log('Delete nurse error: ' . $e->getMessage());
    die('An error occurred while deleting the nurse.');
}
?>
