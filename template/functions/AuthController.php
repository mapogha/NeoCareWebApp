<?php
session_start();
// error_reporting(E_ALL); // Uncomment during development to see errors
// ini_set('display_errors', 1); // Uncomment during development to see errors

include_once(__DIR__ . '/../db/db.php'); // Ensure this path is correct and db connects

// --- Updated Register User Function with Password Hashing ---
function registerUser( $full_name, $phone, $user_role, $license_number, $email, $password)
{
    global $conn;

    // --- Hash the password before storing ---
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if ($hashed_password === false) {
        // Handle hashing error, maybe log it and return an error message
        error_log("Password hashing failed for email: " . $email);
        return "Error processing registration (hash failure).";
    }

    try {
        // Ensure column names match your database table exactly
        $stmt = $conn->prepare("INSERT INTO users (full_name, phone, user_role, license_number, email, password) VALUES (?, ?, ?, ?, ?, ?)");

        // Use the hashed password in the execute array
        if ($stmt->execute([$full_name, $phone, $user_role, $license_number, $email, $hashed_password])) {
            // Registration successful, set success message and redirect to login
            $_SESSION['registration_success'] = "Registration successful! Please log in.";
            header('Location: ../login.php');
            exit(); // Stop script execution after redirect
        } else {
            // Execution failed, provide a generic error
            // Log the detailed error from $stmt->errorInfo() on the server for debugging
            error_log("User registration failed: " . implode(" | ", $stmt->errorInfo()));
            return "Error registering user. Please try again later.";
        }
    } catch (PDOException $e) {
        // Catch potential PDO exceptions (like connection errors, constraint violations)
        error_log("PDOException during registration: " . $e->getMessage());
        // Provide a user-friendly error message
        // Check for specific error codes if needed (e.g., duplicate email)
        if ($e->getCode() == '23000') { // Integrity constraint violation (like duplicate entry)
             // Check which constraint failed if possible (requires more specific DB error parsing or separate checks)
             // For now, assume email or phone might be duplicates
             return "Error: Email or phone number might already be registered.";
        }
        return "Database error during registration. Please contact support.";
    }
}


// --- Updated Login User Function with Password Verification and Role Redirect ---
// *** Changed parameter name from $login_identifier to $email for clarity ***
function loginUser($email, $password)
{
    global $conn;

    // Prepare query - Login via EMAIL
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1"); // Find by email
    // *** Use the $email parameter directly ***
    $params = [$email];

    try {
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify user exists AND password is correct using password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start session management
            session_regenerate_id(true); // Prevent session fixation attacks

            // Store essential user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name']; // Store full name
            $_SESSION['user_role'] = $user['user_role']; // Store role for authorization checks later
            // Set a general success message (optional, can be removed if redirection is enough)
            $_SESSION['log'] = "Welcome, " . htmlspecialchars($user['full_name']) . "!";

            // --- Role-Based Redirection ---
            $redirect_url = '../login.php'; // Default fallback redirect if role is unknown
            switch ($user['user_role']) {
                case 'parent':
                    $redirect_url = '../parent/dashboard.php';
                    break;
                case 'doctor':
                case 'nurse':
                    $redirect_url = '../health-officer/dashboard.php';
                    break;
                case 'admin':
                    $redirect_url = '../admin/dashboard.php'; // Keep original admin destination
                    break;
                // Add other roles if necessary
                default:
                    // Log unexpected role and redirect safely
                    error_log("Unknown user role encountered during login: " . $user['user_role'] . " for user ID: " . $user['id']);
                    $_SESSION['no-log'] = "Login successful, but your role assignment needs review."; // Inform user
                    $redirect_url = '../login.php'; // Redirect back to login
                    break;
            }

            header('Location: ' . $redirect_url);
            exit(); // Stop script execution after redirect

        } else {
            // Invalid credentials (user not found or password incorrect)
            $_SESSION['no-log'] = "Incorrect email or password.";
            header('Location: ../login.php');
            exit(); // Stop script execution
        }
    } catch (PDOException $e) {
        error_log("PDOException during login: " . $e->getMessage());
        $_SESSION['no-log'] = "Database error during login. Please try again.";
        header('Location: ../login.php');
        exit(); // Stop script execution
    }
}


// --- Handle incoming requests ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'register':
            // Basic validation for required fields from the form
             if (empty($_POST['full_name']) || empty($_POST['phone']) || empty($_POST['password']) || empty($_POST['user_role'])) {
                 $_SESSION['register_error'] = "Please fill in all required fields.";
                 header('Location: ../register.php');
                 exit();
            }
            // Handle optional fields (provide null if empty/not set)
            $email = isset($_POST['email']) && !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
            $license_number = isset($_POST['license_number']) && !empty(trim($_POST['license_number'])) ? trim($_POST['license_number']) : null;

            // Call registerUser (ensure arguments match function definition)
            // The password will be hashed inside the registerUser function
            $registration_result = registerUser(
                $_POST['full_name'],
                $_POST['phone'],
                $_POST['user_role'],
                $license_number, // Use variable that handles null
                $email,          // Use variable that handles null
                $_POST['password']
            );

             // If registerUser returns an error message (string), store it in session and redirect back
            if (is_string($registration_result)) {
                 $_SESSION['register_error'] = $registration_result;
                 // Optionally preserve non-sensitive form data to refill the form upon error
                 // Be careful not to store/re-display the password
                 $_SESSION['form_data'] = [
                     'full_name' => $_POST['full_name'],
                     'phone' => $_POST['phone'],
                     'user_role' => $_POST['user_role'],
                     'license_number' => $_POST['license_number'] ?? '',
                     'email' => $_POST['email'] ?? ''
                 ];
                 header('Location: ../register.php');
                 exit();
            }
            // Success case is handled by redirect inside registerUser, so no 'echo' needed here
            break; // End case 'register'

        case 'login':
            // Check if login fields are provided from the form
            // *** Changed check from 'email-username' to 'email' ***
            if (empty($_POST['email']) || empty($_POST['password'])) {
                 $_SESSION['no-log'] = "Please enter both your email and password.";
                 header('Location: ../login.php');
                 exit();
            }
            // Call loginUser with the email from the form
            // *** Changed $_POST key from 'email-username' to 'email' ***
            loginUser($_POST['email'], $_POST['password']);
            // loginUser handles redirects internally, no need for 'echo'
            break; // End case 'login'

        default:
            // Handle invalid or unknown actions
            $_SESSION['error_message'] = "Invalid action requested."; // Optional message
            header('Location: ../index.php'); // Redirect to home or login page
            exit();
    }
} else {
    // Handle direct access or non-POST requests if necessary
    // For security, often best to just redirect away
    header('Location: ../index.php'); // Redirect to home page
    exit();
}

?>
