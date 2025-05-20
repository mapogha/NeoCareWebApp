<?php
require_once __DIR__ . '/../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn->beginTransaction();

        $child_name = trim($_POST['child_name']);
        $mother_name = trim($_POST['mother_name']);
        $birth_date = $_POST['birth_date'];
        $hospital_id = $_POST['hospital_id'] ?? null;

        // Prevent duplicate entries
        $checkStmt = $conn->prepare("
            SELECT 1 FROM children 
            WHERE child_name = :child_name 
              AND mother_name = :mother_name 
              AND birth_date = :birth_date 
              AND hospital_id = :hospital_id
            LIMIT 1
        ");
        $checkStmt->execute([
            ':child_name' => $child_name,
            ':mother_name' => $mother_name,
            ':birth_date' => $birth_date,
            ':hospital_id' => $hospital_id
        ]);

        if ($checkStmt->fetchColumn()) {
            header('Location: ../../admin/create_child.php?error=exists');
            exit;
        }

        // Insert new child
        $stmt = $conn->prepare("
            INSERT INTO children (
                child_name, mother_name, birth_date, street, ward, hospital_id,
                registration_number, street_chairman_name, father_name,
                weight_on_birth, height_on_birth, twin_status, birth_rank,
                previous_sibling_birth_date, parent_id
            ) VALUES (
                :child_name, :mother_name, :birth_date, :street, :ward, :hospital_id,
                :registration_number, :street_chairman_name, :father_name,
                :weight_on_birth, :height_on_birth, :twin_status, :birth_rank,
                :previous_sibling_birth_date, :parent_id
            )
        ");

        $stmt->execute([
            ':child_name' => $child_name,
            ':mother_name' => $mother_name,
            ':birth_date' => $birth_date,
            ':street' => $_POST['street'] ?? null,
            ':ward' => $_POST['ward'] ?? null,
            ':hospital_id' => $hospital_id,
            ':registration_number' => $_POST['registration_number'] ?? null,
            ':street_chairman_name' => $_POST['street_chairman_name'] ?? null,
            ':father_name' => $_POST['father_name'] ?? null,
            ':weight_on_birth' => $_POST['weight_on_birth'] ?? null,
            ':height_on_birth' => $_POST['height_on_birth'] ?? null,
            ':twin_status' => $_POST['twin_status'] ?? 'single',
            ':birth_rank' => $_POST['birth_rank'] ?? null,
            ':previous_sibling_birth_date' => $_POST['previous_sibling_birth_date'] ?? null,
            ':parent_id' => $_POST['parent_id'] ?? null
        ]);

        $child_id = $conn->lastInsertId();

        // Generate vaccination schedule based on child_age (assumed to be in weeks)
        $vaccineStmt = $conn->query("SELECT id, child_age FROM vaccines");
        $vaccines = $vaccineStmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($vaccines as $vaccine) {
            $ageWeeks = (int) filter_var($vaccine['child_age'], FILTER_SANITIZE_NUMBER_INT);
            $scheduledDate = date('Y-m-d', strtotime("{$birth_date} +{$ageWeeks} weeks"));

            $scheduleInsert = $conn->prepare("
                INSERT INTO vaccination_schedule (child_id, vaccine_id, scheduled_date)
                VALUES (:child_id, :vaccine_id, :scheduled_date)
            ");
            $scheduleInsert->execute([
                ':child_id' => $child_id,
                ':vaccine_id' => $vaccine['id'],
                ':scheduled_date' => $scheduledDate
            ]);
        }

        $conn->commit();
        header('Location: ../../admin/view_children.php?added=1');
        exit;

    } catch (PDOException $e) {
        $conn->rollBack();
        error_log('Insert child + schedule error: ' . $e->getMessage());
        header('Location: ../../admin/create_child.php?error=1');
        exit;
    }
} else {
    header('Location: ../../admin/create_child.php');
    exit;
}
?>
