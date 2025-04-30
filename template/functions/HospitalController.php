<?php
// session_start();
include_once(__DIR__ . '/../db/db.php'); // Ensure this path is correct and db connects

function registerHospital($hospital_name, $region, $district, $phone, $hospital_address) {
    global $conn;
    try {
        // Insert hospital data into database
        $stmt = $conn->prepare("INSERT INTO hospitals (hospital_name, region, district, phone, hospital_address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$hospital_name, $region, $district, $phone, $hospital_address]);
        header('Location: ../admin/view');
    } catch (PDOException $e) {
        // Handle errors
    }
}

function viewHospitals() {
    global $conn;
    try {
        // Prepare query to select all hospitals
        $stmt = $conn->prepare("SELECT * FROM hospitals");
        $stmt->execute();
        $hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hospitals;
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }
}



// --- Handle incoming requests ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'add_hospital':
            // Basic validation for required fields from the form
            if (empty($_POST['hospital_name']) || empty($_POST['region']) || empty($_POST['phone']) || empty($_POST['hospital_address'])) {
                $_SESSION['register_error'] = "Please fill in all required fields.";
                header('Location: ../admin.create_hospital.php');
                exit();
            }
            registerHospital(
                $_POST['hospital_name'],
                $_POST['region'],
                $_POST['district'],
                $_POST['phone'],
                $_POST['hospital_address']
            );
            // Success case is handled by redirect inside registerHospital, so no 'echo' needed here
            break; // End case 'register'
    }
} else {
    // Handle direct access or non-POST requests if necessary
    // For security, often best to just redirect away
    header('Location: ../index.php'); // Redirect to home page
    exit();
}