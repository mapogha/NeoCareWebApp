<?php

require_once __DIR__ . '/../../db/db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $admin_id = (int) $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id AND role = 'hospital_admin'");
        $stmt->execute([':id' =>  $admin_id]);

        header("Location: ../../superadmin/view_admins.php?deleted=1");
        exit;
    } catch (PDOException $e) {
        error_log("Delete doctor error: " . $e->getMessage());
        header("Location: ../../superadmin/view_admins.php?error=1");
        exit;
    }
} else {
    header("Location: ../../superadmin/view_admins.php?invalid=1");
    exit;
}
?>