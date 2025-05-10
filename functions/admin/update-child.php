<?php
require_once __DIR__ . '/../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $child_name = $_POST['child_name'] ?? null;
    $mother_name = $_POST['mother_name'] ?? null;
    $father_name = $_POST['father_name'] ?? null;
    $birth_date = $_POST['birth_date'] ?? null;
    $weight_on_birth = $_POST['weight_on_birth'] ?? null;
    $height_on_birth = $_POST['height_on_birth'] ?? null;
    $twin_status = $_POST['twin_status'] ?? 'single';
    $birth_rank = $_POST['birth_rank'] ?? null;
    $previous_sibling_birth_date = $_POST['previous_sibling_birth_date'] ?? null;
    $street = $_POST['street'] ?? null;
    $ward = $_POST['ward'] ?? null;
    $street_chairman_name = $_POST['street_chairman_name'] ?? null;
    $registration_number = $_POST['registration_number'] ?? null;
    $hospital_id = $_POST['hospital_id'] ?? null;

    if (!$id || !$child_name || !$mother_name || !$birth_date) {
        die('Required fields are missing.');
    }

    try {
        $stmt = $conn->prepare("
            UPDATE children SET
                child_name = :child_name,
                mother_name = :mother_name,
                father_name = :father_name,
                birth_date = :birth_date,
                weight_on_birth = :weight_on_birth,
                height_on_birth = :height_on_birth,
                twin_status = :twin_status,
                birth_rank = :birth_rank,
                previous_sibling_birth_date = :previous_sibling_birth_date,
                street = :street,
                ward = :ward,
                street_chairman_name = :street_chairman_name,
                registration_number = :registration_number,
                hospital_id = :hospital_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':child_name' => $child_name,
            ':mother_name' => $mother_name,
            ':father_name' => $father_name,
            ':birth_date' => $birth_date,
            ':weight_on_birth' => $weight_on_birth,
            ':height_on_birth' => $height_on_birth,
            ':twin_status' => $twin_status,
            ':birth_rank' => $birth_rank,
            ':previous_sibling_birth_date' => $previous_sibling_birth_date,
            ':street' => $street,
            ':ward' => $ward,
            ':street_chairman_name' => $street_chairman_name,
            ':registration_number' => $registration_number,
            ':hospital_id' => $hospital_id,
            ':id' => $id
        ]);

        header('Location: ../../admin/view_children.php?updated=1');
        exit;
    } catch (PDOException $e) {
        error_log('Update child error: ' . $e->getMessage());
        die('An error occurred while updating the child details.');
    }
} else {
    header('Location: ../../admin/view_children.php');
    exit;
}
