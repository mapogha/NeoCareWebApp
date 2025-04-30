<?php
session_start();

// Include the existing database connection
require_once '../db/db.php'; // This should create $pdo

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
$user = $stmt->fetch();

if ($user) {
    // Password check (In production, use password_hash() and password_verify())
    if ($password === $user['password']) { // You should upgrade to password_hash() for better security
        if ($user['is_active']) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['name'];

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
