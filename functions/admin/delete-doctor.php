<?php

require_once __DIR__ . '/../../db/db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $doctor_id = (int) $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id AND role = 'doctor'");
        $stmt->execute([':id' => $doctor_id]);

        header("Location: ../../admin/view_doctors.php?deleted=1");
        exit;
    } catch (PDOException $e) {
        error_log("Delete doctor error: " . $e->getMessage());
        header("Location: ../../admin/view_doctors.php?error=1");
        exit;
    }
} else {
    header("Location: ../../admin/view_doctors.php?invalid=1");
    exit;
}
?>
