<?php
session_start();
require_once '../db/db.php'; // Ensure this connects using PDO as $conn

// Capture login inputs
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate inputs
if (empty($email) || empty($password)) {
    die('Email and password are required.');
}

// Fetch user from database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Secure password check
    if (password_verify($password, $user['password'])) {
        if ($user['is_active']) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['hospital_id'] = $user['hospital_id'];

            // Redirect based on role
            switch ($user['role']) {
                case 'super_admin':
                    header('Location: ../superadmin/dashboard.php');
                    exit;
                case 'hospital_admin':
                    header('Location: ../admin/dashboard.php');
                    exit;
                case 'doctor':
                    header('Location: ../doctor/dashboard.php');
                    exit;
                case 'nurse':
                    header('Location: ../nurse/dashboard.php');
                    exit;
                case 'parent':
                    header('Location: ../parent/dashboard.php');
                    exit;
                default:
                    die('Invalid user role.');
            }
        } else {
            die('Account is deactivated. Please contact support.');
        }
    } else {
        die('Invalid email or password.');
    }
} else {
    die('Invalid email or password.');
}
?>
